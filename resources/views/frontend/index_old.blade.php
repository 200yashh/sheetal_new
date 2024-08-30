<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('{{ asset("frontend/background.jpeg") }}'); /* Replace 'background.jpg' with your background image path */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            color: #333;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 30px;
            max-width: 600px; /* Adjust the maximum width as needed for a medium-sized container */
            margin: 0 auto; /* Center horizontally */
            margin-top: 15vh; /* Center vertically */
        }

        .logo {
            max-width: 100%;
            height: auto;
        }

        /* Responsive background image adjustments */
        @media (max-width: 768px) {
            body {
                background-size: contain;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Under Construction</h1>
        <p>We are working on something awesome and will be back soon.</p>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
