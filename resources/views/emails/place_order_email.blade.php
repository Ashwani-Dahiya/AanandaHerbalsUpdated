<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <p>Thank you for placing your order with us!</p>
    <p>We have received your order and it's now being processed.</p>
    <p>Your order details:</p>
    <h2 style="text-align: center;">Order ID: {{ $orderNum }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productNames as $index => $productName)
            <tr>
                <td>{{ $productName }}</td>
                <td>{{ $productQuantities[$index] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h4 style="text-align: right; margin-right: 25px;">Total Price: {{ $amount }}</h4>
    <table class="table mt-4" style="color: black">
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $address['name'] }}</td>
            </tr>
            <tr>
                <th>Address Line 1</th>
                <td>{{ $address['address_line1'] }}</td>
            </tr>
            <tr>
                <th>Address Line 2</th>
                <td>{{ $address['address_line2'] }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $address['country'] }}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $address['state'] }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $address['city'] }}</td>
            </tr>
            <tr>
                <th>Pin Code</th>
                <td>{{ $address['pin'] }}</td>
            </tr>
        </tbody>
    </table>
    <p>We will keep you updated on the status of your order.</p>
    <p>Please feel free to contact us if you have any questions or concerns.</p>
</body>
</html>
