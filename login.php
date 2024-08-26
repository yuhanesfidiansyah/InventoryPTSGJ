<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('selecta.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
        }
        .login-header {
            background-color: #007bff;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .login-header h2 {
            margin: 0;
            font-size: 1.8em;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        label {
            font-weight: bold;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2><i class="fas fa-user-lock"></i> Masuk</h2>
        </div>
        <form action="aksilogin.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Masuk</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
