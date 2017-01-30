<html>
<head>
    <link rel="icon" href="../img/favicon.jpg" type="image" sizes="16x16">
    <title>Login</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href='//fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="page-header">
        <center><img id="logo" src="../img/amazon_logo1.png" /></center>
    </div>
    <br><br><br>
    <div class="container">
    <table>
        <form action="login.php" method="POST" name="login">
            <tr>
                <td>User ID</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td><br>Password</td>
                <td><br><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input class="btn btn-warning" type="submit" name="login" value="Login"></td>
            </tr>
        </form>
    </table>
    </div>
<?php
    if(isset($_POST['login'])) {
        if($_POST['id']=="administrator" && $_POST['password']=="admin"){
            header('Location: list.php');
        }
        else{
            echo "Incorrect Id or password";
        }
    }
?>
</body>
</html>