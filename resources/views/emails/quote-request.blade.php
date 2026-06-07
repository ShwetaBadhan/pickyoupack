<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Quote Request</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #d4a017; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .detail { margin: 10px 0; padding: 10px; background: white; border-left: 4px solid #d4a017; }
        .label { font-weight: bold; color: #666; }
        .footer { text-align: center; margin-top: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎯 New Bulk Quote Request</h1>
        </div>
        <div class="content">
            <p>A new customer has submitted a quote request:</p>
            
            <div class="detail">
                <span class="label">Name:</span> {{ $quoteData['name'] }}
            </div>
            
            <div class="detail">
                <span class="label">WhatsApp Number:</span> {{ $quoteData['phone'] }}
            </div>
            
            <div class="detail">
                <span class="label">Product Needed:</span> {{ $quoteData['product'] }}
            </div>
            
            <div class="detail">
                <span class="label">Quantity:</span> {{ number_format($quoteData['quantity']) }} units
            </div>
            
            <div class="detail">
                <span class="label">Submitted At:</span> {{ now()->format('d M Y, h:i A') }}
            </div>
        </div>
        
        <div class="footer">
            <p>This is an automated email from PickYourPack</p>
        </div>
    </div>
</body>
</html>