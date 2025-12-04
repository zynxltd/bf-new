<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide a valid email address.'
            ], 422);
        }

        $email = $request->email;
        $name = $request->name ?? '';

        // Log subscription (in production, integrate with email service like Mailchimp, SendGrid, etc.)
        Log::info('Newsletter subscription', [
            'email' => $email,
            'name' => $name,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // TODO: Integrate with email marketing service
        // Example: Mailchimp, SendGrid, ConvertKit, etc.
        // For now, we'll just log it

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing! Check your email for confirmation.'
        ]);
    }
}
