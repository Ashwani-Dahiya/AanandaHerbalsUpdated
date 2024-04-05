<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\BrandModel;
use App\Models\CartModel;
use App\Models\CategorieModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\ReasonModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order_page()
    {
        $user = auth()->user();
        $orders = OrderModel::where('user_id', $user->id)->get();
        $reasons = ReasonModel::all();
        return view('orders', compact('orders', 'reasons'));
    }


    public function all_order_page()
    {
        $pendingOrders = null;
        $shippedOrders = null;
        $canceledOrders = null;
        $deliveredOrders = null;
        $acceptedOrders = null;
        $items = [];

        // Retrieve orders with 'pending' status and their associated items
        $orders = OrderModel::with('user')->get();

        foreach ($orders as $order) {
            // Retrieve order items along with their associated products
            $items[$order->id] = OrderItemModel::with('product')->where('order_id', $order->id)->get();

            // Determine the status of the order and store it in the corresponding array
            switch ($order->order_status) {
                case 'pending':
                    $pendingOrders[] = $order;
                    break;
                case 'shipped':
                    $shippedOrders[] = $order;
                    break;
                case 'cancelled':
                    $canceledOrders[] = $order;
                    break;
                case 'delivered':
                    $deliveredOrders[] = $order;
                    break;
                case 'accepted':
                    $acceptedOrders[] = $order;
                    break;
                default:
                    // Handle unknown status if needed
                    break;
            }
        }

        // Return the view with all the orders and items
        return view('admin.all_orders', compact('pendingOrders', 'shippedOrders', 'canceledOrders', 'deliveredOrders', 'items', 'acceptedOrders'));
    }




    public function update_status(Request $request, $id)
    {
        OrderModel::where('id', $id)->update([
            'order_status' => $request->status,
            'estimate_date' => $request->estimate_date,
        ]);
        return redirect()->back()->with('success', 'Status Updated Successfully');
    }
    public function view_order($id)
    {
        $order = OrderModel::find($id);

        if (!$order) {
            redirect()->back()->with('error', 'Order not found');
        }

        $user_id = $order->user_id;
        $user = User::findOrFail($user_id);

        $allOrders = OrderModel::where('user_id', $user_id)->get();

        $items = OrderItemModel::where('order_id', $order->id)->get();
        $product = ProductModel::whereIn('id', $items->pluck('product_id'))->first();
        $address = AddressModel::where('id', $order->address_id)->first();
        $brand = BrandModel::where('id', $product->brand_id)->first();
        $category = CategorieModel::where('id', $product->category_id)->first();
        return view('admin.view_orders_details', compact('order', 'allOrders', 'user', 'items', 'product', 'address', 'brand', 'category'));
    }


    public function datewise_order_page()
    {
        $ordersData = [];

        $orders = OrderModel::all();

        foreach ($orders as $order) {
            $user = User::find($order->user_id);
            $item = OrderItemModel::where('order_id', $order->id)->first();
            if ($item) {
                $product = ProductModel::find($item->product_id);
            } else {
                $product = null;
            }

            // Build an array containing data for each order
            $ordersData[] = [
                'order' => $order,
                'user' => $user,
                'product' => $product,
                'item' => $item,
            ];
        }

        return view('admin.datewise_orders', compact('ordersData'));
    }
    public function add_into_order_item(Request $request)
    {
        $vaild = validator($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'post_code' => 'required'

        ]);
        if ($vaild) {
            $add = AddressModel::create([
                'user_id' => Auth::user()->id,
                'name' => $request->first_name . ' ' . $request->last_name,
                'address_line1' => $request->address,
                'address_line2' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'pin' => $request->post_code,
                'country' => 'India',
            ]);
            if ($add) {
                $addressId = AddressModel::latest()->first()->id;
                $currentDateTime = Carbon::now();
                $estimateDate = $currentDateTime->addDays(7)->toDateString();

                // Create order number
                $orderNumPrefix = "ORD0000";
                $orderID = OrderModel::max('id') + 1; // Get the max order ID and increment by 1
                $orderNum = $orderNumPrefix . $orderID;

                // Create the order
                $order = OrderModel::create([
                    'user_id' => Auth::user()->id,
                    'address_id' => $addressId,
                    'phone1' => Auth::user()->phone,
                    'phone2' => Auth::user()->phone,
                    'total_price' => $request->total_price,
                    'order_status' => 'pending',
                    'estimate_date' => $estimateDate,
                    'cancelled_by' => null,
                    'order_num' => $orderNum,
                ]);
            }
        }
        if ($order) {
            $cartItems = CartModel::where('user_id', Auth::user()->id)->get();

            foreach ($cartItems as $cartItem) {
                $product = ProductModel::find($cartItem->product_id);

                if ($product) {
                    $totalPrice = $product->discounted_price * $cartItem->times;

                    $orderItem = OrderItemModel::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'original_price' => $product->price,
                        'discounted_price' => $product->discounted_price,
                        'item_count' => $cartItem->times,
                        'total_price' => $totalPrice,
                        'offer_id' => 2,
                    ]);

                    if ($orderItem) {

                        CartModel::where('id', $cartItem->id)->delete();
                    }
                }
            }

            // Redirect to the thank you page with the latest order ID
            return redirect()->route('thankyou', ['order_id' => $order->id]);
        } else {
            // Handle the case where order creation fails
            return redirect()->route('home')->with('error', 'Failed to create order.');
        }
    }



    public function thankYouPage($order_id)
    {
        $order = OrderModel::find($order_id);
        $user_id = $order->user_id;
        if ($user_id === Auth::user()->id) {
            return view('thankyoupage')->with('order_id', $order->order_num);
        } else
            $nothing = "Nothing";
        return view('thankyoupage')->with('order_id', $nothing);
    }
    public function user_cancel_order(Request $request, $id)
    {

        $order = OrderModel::find($id);
        $order->order_status = "cancelled";
        $order->cancelled_by = "User";
        $order->cancelled_remark = $request->reason;
        $order->cancelled_date = now();
        $order->save();
        return redirect()->back()->with('success', 'Order Cancelled Successfully');
    }
    public function user_view_order_details($id)
    {
        $order = OrderModel::find($id);

        if (!$order) {
            redirect()->back()->with('error', 'Order not found');
        }

        $user_id = $order->user_id;
        $user = User::findOrFail($user_id);
        $allOrders = OrderModel::where('user_id', $user_id)->get();
        $items = OrderItemModel::where('order_id', $order->id)->get();
        $product = ProductModel::whereIn('id', $items->pluck('product_id'))->first();
        $brand = BrandModel::where('id', $product->brand_id)->first();
        $category = CategorieModel::where('id', $product->category_id)->first();
        return view('user_view_orders_details', compact('order', 'allOrders', 'user', 'items', 'product', 'brand', 'category'));
    }
}
