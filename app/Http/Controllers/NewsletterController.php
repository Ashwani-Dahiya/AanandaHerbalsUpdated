<?php

namespace App\Http\Controllers;

use App\Models\NewsletterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewsletterSubscriptionEmail;
use App\Models\CompanyDetailsModel;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function newsletter_save(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);
        if ($validatedData) {
            if (NewsletterModel::where('email', $request->email)->first()) {
                return redirect()->back()->with('subscribe_error', 'You have already subscribed');
            } else {
                NewsletterModel::create([
                    'email' => $request->email,
                ]);
                $email = $request->email;
                $detail = CompanyDetailsModel::first();

                $websiteLink = $detail->company_website;
                try {
                    Mail::to($email)->send(new SendNewsletterSubscriptionEmail($websiteLink));
                    return redirect()->back()->with('subscribe_success', 'You have subscribed successfully');
                } catch (\Exception $e) {
                    // Log the error
                    Log::error('Error sending newsletter subscription email: ' . $e->getMessage());
                    return redirect()->back()->with('error', 'Failed to send newsletter subscription email. Please try again later.');
                }
            }
        } else {
            return redirect()->back()->withError('error');
        }
    }
}
