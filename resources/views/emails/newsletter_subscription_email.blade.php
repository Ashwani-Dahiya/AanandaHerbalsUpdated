<!-- resources/views/newsletter.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <style>
        /* Inline CSS for styling */
        /* Example styles - customize as needed */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        p {
            color: #666666;
            line-height: 1.6;
        }

        .cta-button {
            display: inline-block;
            background-color: #7db390;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        a {
            color: #fff;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Aananda Herbals Weekly Newsletter</h1>
        <p>Hello and thank you for subscribing to our newsletter!</p>
        <p>This is your weekly update on the latest herbal products and news from Aananda Herbals.</p>
        <p>Highlights:</p>
        <ul>
            <li>Introducing our new <strong>Herbal Immunity Booster</strong> - fortified with natural ingredients to support your immune system.</li>
            <li>Don't miss out on our limited-time offer: <strong>Buy One, Get One Free</strong> on select herbal supplements!</li>
            <li>Join us for our upcoming <strong>Herbal Wellness Workshop</strong> and learn how to incorporate herbs into your daily routine for better health.</li>
        </ul>
        <ul>
            <li>Discover our new range of organic herbal teas, perfect for relaxation and wellness.</li>
            <li>Upcoming workshop on herbal remedies for stress relief and mental well-being.</li>
            <li>Read our latest blog post on the benefits of incorporating herbs into your daily routine.</li>
        </ul>
        <p>Stay tuned for more exciting updates on herbal products, recipes, and wellness tips!</p>
        <p>Best regards,<br> The Aananda Herbals Team</p>
        <p style="text-align: center;"><a href="{{ $websiteLink }}" class="cta-button">Go to Website</a></p>
    </div>
</body>

</html>
