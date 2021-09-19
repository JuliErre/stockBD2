<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css" />

</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="validar.php" method="POST">
            <div class="user-box">
                <input type="text" name="user" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <input type="submit" value="Submit" name="enviar" class="submit" style="
                background-color: #00DBDE;
                background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%);

                text-decoration: none;
                color: white;
                padding: 20px;
                font-size: 1.2rem;
                border-radius: 10px;
                border: 0;">


        </form>
    </div>

</body>

</html>