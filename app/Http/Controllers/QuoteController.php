<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use App\Mail\QuoteRequestMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        Log::info('=== QUOTE FORM SUBMITTED ===');
        Log::info('Request Data:', $request->all());

        try {
            // Validate
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|min:10|max:15',
                'product' => 'required|string',
                'quantity' => 'required|integer|min:1',
            ]);

            Log::info('Validation Passed:', $validated);

            // Save to database
            $quote = QuoteRequest::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'product' => $validated['product'],
                'quantity' => $validated['quantity'],
            ]);

            Log::info('Quote saved to database with ID: ' . $quote->id);

            // Send email
            $this->sendQuoteEmail($validated);

            return response()->json([
                'success' => true,
                'message' => 'Quote request submitted successfully! Our team will contact you shortly.',
                'quote_id' => $quote->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation Failed:', $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Please check your input and try again.',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Quote submission error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit quote. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Send quote email
     */
  private function sendQuoteEmail($data)
{
    try {
        Log::info('=== STARTING EMAIL SEND ===');
        
        // Get emails directly from .env
        $mainEmail = env('MAIL_FROM_ADDRESS');
        $ccEmail = env('MAIL_CC_ADDRESS');
        
        Log::info('Main Email: ' . $mainEmail);
        Log::info('CC Email: ' . $ccEmail);
        
        // Send email
        Mail::to($mainEmail)
            ->cc($ccEmail)
            ->send(new QuoteRequestMail($data));

        Log::info('✅ Email sent successfully!');
        
        return true;

    } catch (\Exception $e) {
        Log::error('❌ EMAIL SEND FAILED: ' . $e->getMessage());
        throw $e;
    }
}
}