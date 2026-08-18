<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .welcome-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-top: 0;
            margin-bottom: 10px;
        }

        p, h2 {
        color: #555;
        font-size: 14px;
        margin-top: 0;
        margin-bottom: 25px;
        font-weight: normal;
    }

        a {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background-color: #2f6f7e;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            border-bottom: 2px solid #244f5a;
            margin-bottom: 10px;
        }

        a:hover {
            background-color: #244f5a;
        }
    </style>
</head>
<body>

    <div class="welcome-box">
        <h1>Password or Email is incorrect!</h1>
        <h2>Please try again.</h2>
        <a href="login.php">Back to login</a> 
        <a href="index.php">Register</a> 
    </div>

</body>
</html>