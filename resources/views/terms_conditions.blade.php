@extends('layouts.app')
@section('content')
<div class="terms-and-conditions">
    <h2>Terms and Conditions</h2>
    <p><strong>Last Updated:</strong> 24-Apr-2024 </p>

    <h3>1. Introduction</h3>
    <p>Welcome to MyAyushKart. By accessing this website, we assume you accept these terms and conditions. Do not continue to use MyAyushKart if you do not agree to all of the terms and conditions stated on this page.</p>

    <h3>2. Intellectual Property Rights</h3>
    <p>Other than the content you own, under these terms, MyAyushKart and/or its licensors own all the intellectual property rights and materials contained in this website.</p>

    <!-- Add more sections as needed -->

    <h3>7. Governing Law & Jurisdiction</h3>
    <p>These terms will be governed by and construed in accordance with the laws of India, and you submit to the non-exclusive jurisdiction of the state and federal courts located in India for the resolution of any disputes.</p>

    <h3>Contact Us</h3>
    <p>If you have any questions or concerns about our terms and conditions, please don't hesitate to contact us at {{ $comp_email }} </p>

    <h3>Policy Updates</h3>
    <p>We reserve the right to update or modify these terms and conditions at any time without prior notice. Please review this page periodically for any changes.</p>

    <p>By using MyAyushKart services, you agree to the terms and conditions outlined on this page.</p>
</div>


<style>
    .terms-and-conditions {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    .terms-and-conditions h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .terms-and-conditions h3 {
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .terms-and-conditions p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Media Query for Mobile */
    @media (max-width: 600px) {
        .terms-and-conditions {
            padding: 10px;
        }

        .terms-and-conditions h2 {
            font-size: 20px;
        }

        .terms-and-conditions h3 {
            font-size: 18px;
        }

        .terms-and-conditions p {
            font-size: 14px;
            line-height: 1.5;
        }
    }
</style>
@endsection
