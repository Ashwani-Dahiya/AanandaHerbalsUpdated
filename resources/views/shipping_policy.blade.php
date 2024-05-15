@extends('layouts.app')
@section('content')
<style>
    .shipping-policy {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .shipping-policy h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .shipping-policy h3 {
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .shipping-policy p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Media Query for Mobile */
    @media (max-width: 600px) {
        .shipping-policy {
            padding: 10px;
        }
        .shipping-policy h2 {
            font-size: 20px;
        }
        .shipping-policy h3 {
            font-size: 18px;
        }
        .shipping-policy p {
            font-size: 14px;
            line-height: 1.5;
        }
    }
</style>
<div class="shipping-policy">
    <h2>Shipping Policy</h2>
    <p><strong>Effective Date:</strong></p>
    <p>Thank you for shopping at MyAyushKart!</p>

    <h3>Shipping Zones:</h3>
    <p>We currently ship to addresses within India.</p>

    <h3>Shipping Fees:</h3>
    <p>Shipping fees are calculated based on the weight of your order and the destination address. You can view the shipping charges at checkout before completing your purchase.</p>

    <h3>Order Processing Time:</h3>
    <p>Orders are typically processed and shipped within 1-3 business days after payment confirmation. However, during peak seasons or promotional periods, processing times may be slightly longer.</p>

    <h3>Estimated Delivery Time:</h3>
    <p>Estimated delivery times vary depending on the shipping destination and the shipping method selected at checkout. Please note that these are estimates and actual delivery times may vary due to factors beyond our control, such as customs processing or weather delays.</p>

    <h3>Tracking Information:</h3>
    <p>Once your order has been shipped, you will receive a confirmation email with tracking information. You can use this tracking information to monitor the progress of your delivery.</p>

    <h3>Shipping Partners:</h3>
    <p>We partner with reputable shipping carriers to ensure reliable and timely delivery of your orders.</p>

    <h3>Delivery Attempts:</h3>
    <p>If a delivery attempt is unsuccessful, the shipping carrier may make additional attempts or hold the package at a local facility for pickup. Please make sure to provide accurate and complete shipping information to avoid any delivery issues.</p>

    <h3>Shipping Restrictions:</h3>
    <p>Some items may be subject to shipping restrictions due to size, weight, or regulatory reasons. We reserve the right to cancel orders for restricted items or locations.</p>

    <h3>International Shipping:</h3>
    <p>For international orders, please note that customs duties, taxes, and fees may apply upon delivery. These charges are the responsibility of the recipient and are not included in the item price or shipping cost.</p>

    <h3>Shipping Damage or Loss:</h3>
    <p>In the rare event that your order is damaged or lost during shipping, please contact us immediately so that we can assist you with filing a claim with the shipping carrier.</p>

    <h3>Questions or Concerns:</h3>
    <p>If you have any questions or concerns about our shipping policy, please don't hesitate to contact us at {{ $comp_mob1 }}.</p>

    <h3>Policy Updates:</h3>
    <p>We reserve the right to update or modify this shipping policy at any time without prior notice. Please review this policy periodically for any changes.</p>

    <p>By placing an order with MyAyushKart, you agree to the terms and conditions outlined in this shipping policy.</p>
</div>
@endsection
