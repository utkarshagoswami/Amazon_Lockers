<?php
    include '../config_database.php';
?>
<html>
<head>
    <link rel="icon" href="../img/favicon.jpg" type="image" sizes="16x16">
    <title>Amazon</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href='//fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="page-header">
        <center><img id="logo" src="../img/amazon_logo1.png" /></center>
         <a href="../index.html" class="home_button">
            <span class="glyphicon glyphicon-home" data-toggle="tooltip" data-placement="bottom" title="Dashboard Home"></span>
        </a>
    </div>
    <center><img src="../img/order_header.gif" /></center>
    <br><br><br>
    <div class="container">
        <form action="search.php" method="POST">
            <table class="table">
                <thead>
                    <th>Order Item</th>
                    <th>Order Quantity</th>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="item"></td>
                        <td><input type="text" name="qty"></td>
                        <td><input type="submit" name="order" value="Order" class="btn btn-warning"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>