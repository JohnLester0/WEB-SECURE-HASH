<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2f6f7e;
            box-shadow: 0 0 4px rgba(47, 111, 126, 0.5);
        }
    p {
    text-align: center;
    font-size: 14px;
    color: #555;
    margin-top: 15px;
    }

    p a {
    color: #2f6f7e;
    font-weight: bold;
    text-decoration: none;
    
}

    p a:hover {
    text-decoration: underline;
    }
    
        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #2f6f7e;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #244f5a;
        }
    </style>
</head>
<body>

    <form action="logindb.php" method="POST">
        <h2>Login Now!</h2>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
       <p>Don't have an account?<a href = "index.php"> Register here.</a></p>
        <button type="submit" name="login">Login</button>
    </form>

</body>
</html>