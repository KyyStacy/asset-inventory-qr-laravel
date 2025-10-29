<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print QR Code - {{ $locationAsset->ident_code }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }

        .qr-container {
            background: white;
            text-align: center;
            border: 3px solid #3B82F6;
            border-radius: 20px;
            padding: 30px;
            width: 350px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .header {
            margin-bottom: 20px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3B82F6 0%, #6366F1 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-center;
            margin-right: 12px;
        }

        .logo svg {
            width: 30px;
            height: 30px;
            stroke: white;
            stroke-width: 2.5;
            fill: none;
        }

        .company-name {
            font-size: 22px;
            font-weight: bold;
            background: linear-gradient(135deg, #3B82F6 0%, #6366F1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 12px;
            color: #6B7280;
            font-style: italic;
            margin-top: -5px;
        }

        .divider {
            height: 3px;
            background: linear-gradient(to right, #3B82F6, #6366F1);
            border-radius: 2px;
            margin: 15px 0;
        }

        .qr-code {
            margin: 20px 0;
            padding: 15px;
            background: #F3F4F6;
            border-radius: 15px;
            display: inline-block;
        }

        .asset-info {
            margin-top: 20px;
        }

        .ident-code {
            font-size: 24px;
            font-weight: bold;
            color: #1F2937;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .asset-name {
            font-size: 16px;
            color: #4B5563;
            margin-bottom: 8px;
        }

        .location {
            font-size: 14px;
            color: #6B7280;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .location svg {
            width: 16px;
            height: 16px;
            margin-right: 5px;
            fill: none;
            stroke: #6366F1;
            stroke-width: 2;
        }

        .footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px dashed #E5E7EB;
        }

        .scan-text {
            font-size: 12px;
            color: #9CA3AF;
            margin-bottom: 8px;
        }

        .print-button {
            position: fixed;
            top: 30px;
            right: 30px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #3B82F6 0%, #6366F1 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
        }

        .print-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.5);
        }

        .print-button svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            vertical-align: middle;
            fill: none;
            stroke: white;
            stroke-width: 2;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .qr-container {
                box-shadow: none;
                border: 3px solid #3B82F6;
            }

            .no-print {
                display: none !important;
            }

            @page {
                margin: 0;
                size: auto;
            }
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button no-print">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
        </svg>
        Print QR Code
    </button>

    <div class="qr-container">
        <div class="header">
            <div class="logo-section">
                <div class="logo">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div>
                    <div class="company-name">Reed Code</div>
                    <div class="subtitle">by Kyy Stacy</div>
                </div>
            </div>
            <div class="divider"></div>
        </div>

        <div class="qr-code">
            {!! QrCode::size(220)->generate($assetUrl) !!}
        </div>

        <div class="asset-info">
            <div style="font-size: 11px; color: #64748b; margin-bottom: 8px; font-weight: 500;">Scan untuk melihat detail aset</div>
            <div class="ident-code">{{ $locationAsset->ident_code }}</div>
            <div class="asset-name">{{ $locationAsset->asset->name }}</div>
            <div class="location">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                {{ $locationAsset->location->name }}
            </div>
        </div>

        <div class="footer">
            <div class="scan-text">Scan QR code untuk informasi lengkap</div>
        </div>
    </div>
</body>
</html>
