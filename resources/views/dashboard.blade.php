<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 2px 2px 10px #eee;
        }
        h2 {
            color: #333;
        }
        .info {
            margin-top: 20px;
        }
        .logout {
            margin-top: 30px;
        }
        .logout a {
            color: #fff;
            background-color: #e74c3c;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Welcome, {{ Auth::user()->name }}!</h2>

            <div class="info">
                <p><b>Email:</b> {{ Auth::user()->email }}</p>
            </div>

            <div class="logout">
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
