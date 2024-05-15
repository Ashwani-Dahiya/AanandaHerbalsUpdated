@extends('layouts.app')
@section('content')

<style>
    .privacy-policy {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    .privacy-policy h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .privacy-policy h3 {
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .privacy-policy p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* Media Query for Mobile */
    @media (max-width: 600px) {
        .privacy-policy {
            padding: 10px;
        }

        .privacy-policy h2 {
            font-size: 20px;
        }

        .privacy-policy h3 {
            font-size: 18px;
        }

        .privacy-policy p {
            font-size: 14px;
            line-height: 1.5;
        }
    }
</style>

<div class="privacy-policy">
    <h2>Privacy Policy</h2>
    <p><strong>Last Updated:</strong> 24-Apr-2024</p>

    <h3>Information Collection and Use:</h3>
    <p>We respect your privacy and are committed to protecting it. This Privacy Policy describes how MyAyushKart collects, uses, and shares information when you use our services.</p>

    <!-- Add more sections as needed -->

    <h3>Questions or Concerns:</h3>
    <p>If you have any questions or concerns about our privacy policy, please don't hesitate to contact us at {{ $comp_mob1 }}.</p>

    <h3>Policy Updates:</h3>
    <p>We reserve the right to update or modify this privacy policy at any time without prior notice. Please review this policy periodically for any changes.</p>

    <p>By using MyAyushKart services, you agree to the terms and conditions outlined in this privacy policy.</p>
</div>
@endsection
