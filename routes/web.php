<?php

use App\Http\Controllers\AdminControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FooterPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WithoutLoginCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/test/post', [TestController::class, 'req_test'])->name('test.post');
Route::get('/test/get', [TestController::class, 'req_ip'])->name('test.get');
Route::get('/add-item-into-cart/{productId}', [WithoutLoginCartController::class, 'add_to_cart'])->name('without.login.add.cart');
Route::get('/about-us', function () {
    return view('about');
})->name('about.page');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact.us');
Route::get('/admin', [AdminControler::class, 'login_page'])->name('adm.login.page');
Route::post('/admin/login', [AdminControler::class, 'login'])->name('adm.login');
Route::post('/subscribe/newsletter', [NewsletterController::class, 'newsletter_save'])->name('newsletter.post');
Route::post('/filterprice', [HomeController::class, 'filter_search'])->name('filter.by.price');
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/products-list', [ProductController::class, 'index'])->name('product.list');
Route::post('/products-list', [ProductController::class, 'index'])->name('search.products');
Route::get('/blog', [BlogController::class, 'show'])->name('blog.page');
Route::get('/read-more-blog/{id}', [BlogController::class, 'more'])->name('blog.more.detail');;
Route::get('/shop', [ProductController::class, 'shop'])->name('shop.page');
Route::get('/product-detail/{id}', [ProductController::class, 'more'])->name('more.detail');
Route::post('/message-send', [ContactController::class, 'save'])->name('data.send');
Route::get('/get-cities/{stateId}', [UserController::class, 'getCities'])->name('getCities');
Route::get('/cart/count', [CartController::class, 'cart_count'])->name('cart.count');
Route::put('/cart/update_quantity', [CartController::class, 'updateQuantity'])->name('cart.update.quantity');
Route::get('login/with/facebook', [AuthController::class, 'facebook_login_page'])->name('login.with.facebook');
Route::get('/auth/facebook/callback', [AuthController::class, 'handlefacebookCallback'])->name('callback.facebook');
Route::get('/temp-cart', [GuestController::class, 'temp_cart_page'])->name('cart.page.temp');
Route::get('/delete-cart-item/{id}', [AuthController::class, 'delete_cart_item'])->name('delete.card.item');
Route::put('/cart/update_quantity/withoutLogin',[GuestController::class, 'updateQuantity'])->name('cart.updateQuantity.withoutLogin');
Route::get('/privacy-policy',[FooterPageController::class, 'privacy_policy_page'])->name('privacy.policy.page');
Route::get('/terms-and-conditions',[FooterPageController::class, 'terms_conditions_page'])->name('terms.conditions.page');
Route::get('/returns-and-refunds',[FooterPageController::class, 'returns_refunds_page'])->name('returns.refunds.page');
Route::get('/shipping-policy',[FooterPageController::class, 'shipping_policy_page'])->name('shipping.policy.page');




Route::group(
    ['middleware' => 'guest'],
    function () {
        Route::get('login', [AuthController::class, 'login_page'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('login/with/google', [AuthController::class, 'google_login_page'])->name('login.with.google');
        Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('callback');
        Route::get('login/with/linkedin', [AuthController::class, 'linkedin_login_page'])->name('login.with.linkedin');
        Route::get('/auth/linkedin/callback', [AuthController::class, 'handleLinkedinCallback'])->name('callback.linkedin');
        Route::get('register', [AuthController::class, 'register_page'])->name('register');
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.page');
        Route::post('forget-password-post', [ForgotPasswordController::class, 'sendPasswordResetEmail'])->name('forget.password.post');
        Route::post('very-user-otp', [ForgotPasswordController::class, 'verify_otp'])->name('verify.otp.post');
        Route::get('very-user-otp', [ForgotPasswordController::class, 'verify_otp_page'])->name('verify.otp');
        Route::post('new-password', [ForgotPasswordController::class, 'create_new_password'])->name('new.password.post');
    }
);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/checkout', [CheckoutController::class, 'page'])->name('checkout.page');
    Route::get('/cart/{id}', [CartController::class, 'add_to_cart'])->name('add.cart');
    Route::get('/buynow/{id}', [CartController::class, 'buy_now'])->name('buy.now');
    Route::get('/cart', [CartController::class, 'cart_page'])->name('cart.page');
    Route::get('/update-profile', [AuthController::class, 'update_profile_page'])->name('profile.update');
    Route::post('/update', [AuthController::class, 'update_profile'])->name('profile.update.data');
    Route::get('/view-profile', [AuthController::class, 'profile_page'])->name('profile.view');
    Route::get('/my-orders', [OrderController::class, 'order_page'])->name('order.page');
    Route::get('/dashboard', [UserController::class, 'main_page'])->name('user.dashboard');
    Route::get('/orders', [UserController::class, 'your_orders'])->name('user.orders');
    Route::get('/user-update-profile', [UserController::class, 'update_profile'])->name('user.update.profile');
    Route::post('/delete-auth', [AuthController::class, 'delete'])->name('delete.auth');
    Route::post('/change-password', [AuthController::class, 'change_password'])->name('change.password');
    Route::get('/delete-account', [UserController::class, 'delete_page'])->name('delete.account.page');
    Route::get('/user-change-password', [UserController::class, 'change_password_page'])->name('change.password.page');
    Route::post('/add-to-order-item/', [OrderController::class, 'add_into_order_item'])->name('add.to.orderItem');
    Route::get('/thankyou/{order_id}', [OrderController::class, 'thankYouPage'])->name('thankyou');
    Route::post('/user/cancel-order/{id}', [OrderController::class, 'user_cancel_order'])->name('user.cancel.order');
    Route::get('/user/view-order/{id}', [OrderController::class, 'user_view_order_details'])->name('user.view.order.details');
    Route::post('/vaild.coupon', [DiscountController::class, 'validateCoupon'])->name('vaild.coupon');
    Route::post('/cart/update_quantity', 'CartController@updateQuantity')->name('cart.update_quantity');
});



Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [AdminControler::class, 'index'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminControler::class, 'logout'])->name('adm.logout');
    Route::get('admin/all-user', [AdminControler::class, 'all_user'])->name('adm.all.user');
    Route::get('admin/add-main-banner', [BannersController::class, 'main_banner'])->name('adm.main.banner');
    Route::post('admin/add-main-banner', [BannersController::class, 'insert_main_banner'])->name('adm.insert.mainbanner');
    Route::post('admin/del-main-banner/{id}', [BannersController::class, 'delete_main_banner'])->name('adm.del.main.banner');
    Route::post('admin/update-main-banner/{id}', [BannersController::class, 'update_main_banner'])->name('adm.update.main.banner');
    Route::get('admin/add-middle-banner', [BannersController::class, 'middle_banner'])->name('adm.middle.banner');
    Route::post('admin/add-middle-banner', [BannersController::class, 'insert_middle_banner'])->name('adm.insert.middlebanner');
    Route::post('admin/del-middle-banner/{id}', [BannersController::class, 'delete_middle_banner'])->name('adm.del.middle.banner');
    Route::post('admin/update-middle-banner/{id}', [BannersController::class, 'update_middle_banner'])->name('adm.update.middle.banner');
    Route::get('admin/add-last-banner', [BannersController::class, 'last_banner'])->name('adm.last.banner');
    Route::post('admin/add-last-banner', [BannersController::class, 'insert_last_banner'])->name('adm.insert.lastbanner');
    Route::post('admin/update-last-banner/{id}', [BannersController::class, 'update_last_banner'])->name('adm.update.last.banner');
    Route::post('admin/del-last-banner/{id}', [BannersController::class, 'delete_last_banner'])->name('adm.del.last.banner');
    Route::get('admin/create-offers', [OffersController::class, 'offers_page'])->name('adm.offer.page');
    Route::post('admin/add-offer', [OffersController::class, 'add_offer'])->name('adm.add.offer');
    Route::post('admin/update-offer/{id}', [OffersController::class, 'update_offer'])->name('adm.update.offer');
    Route::get('admin/ratings', [RatingController::class, 'rating_page'])->name('adm.rating.page');
    Route::post('admin/del-rating/{id}', [RatingController::class, 'delete_rating'])->name('adm.del.rating');
    Route::get('admin/sections', [SectionController::class, 'section_page'])->name('adm.home.section.page');
    Route::post('admin/add-sections', [SectionController::class, 'add_section'])->name('adm.add.section');
    Route::post('admin/add-sections/{id}', [SectionController::class, 'delete_section'])->name('adm.del.section');
    Route::post('admin/update-sections/{id}', [SectionController::class, 'update_section'])->name('adm.update.section');
    Route::get('admin/assignproducts', [SectionController::class, 'assign_product_page'])->name('adm.assign.section.page');
    Route::post('admin/assign-product', [SectionController::class, 'assign_product'])->name('adm.assign.product');
    Route::get('admin/add-category', [CategoryController::class, 'add_categoty_page'])->name('adm.add.category.page');
    Route::post('admin/add-category', [CategoryController::class, 'add_categoty'])->name('adm.add.category');
    Route::get('admin/all-category-list', [CategoryController::class, 'all_categoty_page'])->name('adm.all.category.page');
    Route::post('admin/update-category/{id}', [CategoryController::class, 'update_category'])->name('adm.update.category');
    Route::post('admin/del-category/{id}', [CategoryController::class, 'delete_category'])->name('adm.del.category');
    Route::get('admin/all-brands', [BrandController::class, 'all_brand_page'])->name('adm.all.brands.page');
    Route::post('admin/add-brand', [BrandController::class, 'add_brand'])->name('adm.add.brand');
    Route::post('admin/update-brand/{id}', [BrandController::class, 'update_brand'])->name('adm.update.brand');
    Route::get('admin/all-products-list', [ProductController::class, 'all_products_page'])->name('adm.all.products.page');
    Route::get('admin/add-product-page', [ProductController::class, 'add_products_page'])->name('adm.add.product.page');
    Route::post('admin/add-product', [ProductController::class, 'add_products'])->name('adm.add.product');
    Route::post('admin/delete-product/{id}', [ProductController::class, 'delete_product'])->name('adm.del.product');
    Route::get('admin/all-orders-page', [OrderController::class, 'all_order_page'])->name('adm.all.order.page');
    Route::post('admin/update-order-status/{id}', [OrderController::class, 'update_status'])->name('adm.update.order.status');
    Route::post('admin/view-order/{id}', [OrderController::class, 'view_order'])->name('adm.view.order');
    Route::get('admin/date-wise-order', [OrderController::class, 'datewise_order_page'])->name('adm.datewise.order.page');
    Route::get('admin/blog-page', [BlogController::class, 'blog_page'])->name('adm.blog.page');
    Route::post('admin/blog-page', [BlogController::class, 'add_blog'])->name('adm.insert.blog');
    Route::post('admin/update-blog-page/{id}', [BlogController::class, 'update_blog_page'])->name('adm.update.blog.page');
    Route::post('admin/update-blog/{id}', [BlogController::class, 'update_blog'])->name('adm.update.blog');
    Route::post('admin/delete-blog/{id}', [BlogController::class, 'delete_blog'])->name('adm.del.blog');
    Route::get('admin/update-company-detail', [CompanyDetailsController::class, 'update_detail_page'])->name('adm.company.detail.page');
    Route::post('admin/update-company-detail', [CompanyDetailsController::class, 'update_company_detail'])->name('adm.update.company.details');
    Route::get('/admin/redirect/page', [AdminControler::class, 'redirect_page'])->name('redirect.page');
});
