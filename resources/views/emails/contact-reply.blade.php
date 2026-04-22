<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #f59e0b; /* Amber 500 */
            color: #000;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .reply-box {
            background-color: #f3f4f6;
            padding: 20px;
            border-radius: 6px;
            border-left: 4px solid #f59e0b;
            margin-top: 20px;
        }
        .footer {
            background-color: #000;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 0.8em;
        }
        h2 {
            margin-top: 0;
            color: #f59e0b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tasty Food</h1>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $contact->name }}</strong>,</p>
            <p>Terima kasih telah menghubungi kami mengenai subjek: <em>"{{ $contact->subject }}"</em>.</p>
            <p>Berikut adalah balasan dari tim kami:</p>
            
            <div class="reply-box">
                {!! nl2br(e($replyMessage)) !!}
            </div>

            <p style="margin-top: 30px;">Semoga informasi ini membantu. Jika ada pertanyaan lebih lanjut, jangan ragu untuk membalas email ini.</p>
            
            <p>Salam hangat,<br><strong>Tim Tasty Food</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Tasty Food. All rights reserved.
        </div>
    </div>
</body>
</html>
