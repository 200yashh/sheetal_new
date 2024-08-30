<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            overflow: hidden;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Us Details</h2>
        <table>
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td>{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $data['phone'] }}</td>
                </tr>
                <tr>
                    <th>Message:</th>
                    <td>{{ $data['message'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
