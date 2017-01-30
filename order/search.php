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
    <br><br>
    <div class="container">
    <table>
        <tr class="row">
        <td class="col-md-5">
            <h3>Delivery Address:</h3>
            <table>
                <form method="POST">
                    <tr>
                        <td>&nbspName&nbsp&nbsp&nbsp<br><br></td>
                        <td><input type="text" name="id" placeholder="Enter name"><br><br></td>
                    </tr>
                    <tr>
                        <td>&nbspAddress<br><br></td>
                        <td><input type="text" name="name" placeholder="Enter delivery address"><br><br></td>
                    </tr>
                    <tr>
                        <td>&nbspStreet Name<br><br></td>
                        <td><input type="text" name="city" placeholder="Enter street name"><br><br></td>
                    </tr>
                    <tr>
                        <td>&nbspCity<br><br></td>
                        <td><input type="text" name="state" placeholder="Enter city"><br><br></td>
                    </tr>
                    <tr>
                        <td>&nbspState<br><br></td>
                        <td><input type="text" name="state" placeholder="Enter state"><br><br></td>
                    </tr>
                    <tr>
                        <td>&nbspPincode<br><br></td>
                        <td><input type="text" name="pincode" placeholder="Enter pincode"><br><br></td>
                    </tr>
                    <tr>
                        <td>&nbspSpecial Demand&nbsp&nbsp&nbsp<br><br></td>
                        <td><input type="text" name="pincode" placeholder="Any special demand?"><br><br></td>
                    </tr>
                    <tr><td><input type="submit" name="search" value="Deliver!" class="btn btn-warning"></td></tr>
                </form>
            </table>
        </td>
        <td class="col-md-3"></td>
        <td class="col-md-4" style="float:center">
            <h3>Locker:</h3>
            <table>
                <form action="order.php" method="POST">
                    <tr>
                        <td><input type="radio" name="ut" value="locker_id" checked>&nbspLocker Number&nbsp&nbsp&nbsp<br><br></td>
                        <td><input type="text" name="id" placeholder="Enter locker number"><br><br></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="ut" value="locker_name">&nbspLocker Name<br><br></td>
                        <td><input type="text" name="name" placeholder="Enter locker name"><br><br></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="ut" value="locker_city">&nbspLocker City<br><br></td>
                        <td><input type="text" name="city" placeholder="Enter locker city"><br><br></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="ut" value="locker_state">&nbspLocker State<br><br></td>
                        <td><input type="text" name="state" placeholder="Enter locker state"><br><br></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="ut" value="locker_pincode">&nbspLocker Pincode<br><br></td>
                        <td><input type="text" name="pincode" placeholder="Enter locker pincode"><br><br></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="search" value="Search" class="btn btn-warning"></td>
                    </tr>
                    <input type="text" name="qty" value="<?php echo $_POST['qty']; ?>" hidden>
                </form>
            </table>
        </td>
        </tr>
    </table>
    </div>
    </div>
</body>
</html>