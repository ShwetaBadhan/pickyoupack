<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        // Step 1: Log raw request data
        Log::info('=== QUOTE FORM SUBMITTED ===');
        Log::info('Request Data:', $request->all());
        Log::info('Request Method: ' . $request->method());
        Log::info('Request URL: ' . $request->url());

        try {
            // Step 2: Validate
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|min:10|max:15',
                'product' => 'required|string',
                'quantity' => 'required|integer|min:1',
            ]);

            Log::info('Validation Passed:', $validated);

            // Step 3: Save to database (uncomment after creating model)
            // QuoteRequest::create($validated);
            // Log::info('Data saved to database');

            // Step 4: Return success response
            return response()->json([
                'success' => true,
                'message' => 'Quote request submitted successfully!',
                'data' => $validated // For debugging
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation Failed:', $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Quote submission error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}