@extends('layouts.app')
@section('content')
<div class="returns-and-refunds">
    <h2>Returns and Refunds Policy</h2>
    <p><strong>Last Updated:</strong> 24-Apr-2024</p>

    <h3>1. Returns</h3>
    <p>We accept returns within 7 days of the original purchase date. To be eligible for a return, your item must be unused and in the same condition that you received it. It must also be in the original packaging.</p>

    <h3>2. Refunds</h3>
    <p>Once we receive your item, we will inspect it and notify you that we have received your returned item. We will immediately notify you on the status of your refund after inspecting the item. If your return is approved, we will initiate a refund to your original method of payment. You will receive the credit within a certain amount of days, depending on your card issuer's policies.</p>

    <!-- Add more sections as needed -->

    <h3>Contact Us</h3>
    <p>If you have any questions or concerns about our returns and refunds policy, please don't hesitate to contact us at {{ $comp_email }} </p>

    <h3>Policy Updates</h3>
    <p>We reserve the right to update or modify this returns and refunds policy at any time without prior notice. Please review this page periodically for any changes.</p>

    <p>By making a purchase with MyAyushKart, you agree to the terms and conditions outlined on this page.</p>
</div>


<style>
    .returns-and-refunds {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    .returns-and-refunds h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .returns-and-refunds h3 {
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .returns-and-refunds p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Media Query for Mobile */
    @media (max-width: 600px) {
        .returns-and-refunds {
            padding: 10px;
        }

        .returns-and-refunds h2 {
            font-size: 20px;
        }

        .returns-and-refunds h3 {
            font-size: 18px;
        }

        .returns-and-refunds p {
            font-size: 14px;
            line-height: 1.5;
        }
    }
</style>
@endsection
