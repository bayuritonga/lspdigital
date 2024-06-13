<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <h2 style="text-align:center">Silahkan Login</h2>

    <div class="login-container">
        <h2>Login</h2>
        <form action="proses.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>



<p>
    <center>Belum memiliki akun? Silahkan <a href="daftar.php" target="_blank" rel="noopener noreferrer">Daftar</a>
    </center>
</p>