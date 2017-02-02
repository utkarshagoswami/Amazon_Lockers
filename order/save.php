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
    <center><img src="../img/order_header.gif" /></center><br><br>
    <div class='container'>
<?php
    $now = date('Y-m-d',time());
    if(isset($_POST['standard']))
    {
        $capacity=$_POST['standard_capacity'];
        $del_date = strtotime($now. ' + 5 days');
        $type=2;
    }
    else if(isset($_POST['prime']))
    {
        $capacity=$_POST['prime_capacity'];
        $del_date = strtotime($now. ' + 2 days');
        $type=1;
    }

    $order_sql="SELECT * FROM orders WHERE locker_id='".$_POST['locker_id']."' AND delivery_date='20".date('y-m-d',$del_date)."';";
    $order_res=mysqli_query($conn,$order_sql);
    $num_rows = mysqli_num_rows($order_res);
    if($num_rows==0){
        $sql="INSERT INTO orders(locker_id, delivery_date, count, locker_capacity,type) VALUES('".$_POST['locker_id']."','20".date('y-m-d',$del_date)."','".$_POST['qty']."','".$capacity."','".$type."');";
        mysqli_query($conn,$sql);
    }
    else{
        $r=mysqli_fetch_assoc($order_res);
        $ct=$r['count']+$_POST['qty'];
        $sql="UPDATE orders SET locker_id='".$r['locker_id']."',delivery_date='".$r['delivery_date']."',count='".$ct."',locker_capacity='".$r['locker_capacity']."',type='".$type."' WHERE locker_id='".$r['locker_id']."' AND delivery_date='".$r['delivery_date']."';";
        mysqli_query($conn,$sql);
    }
    echo "<h3>Order placed successfully!!</h3><br>";
?>
    </div>
    <div class="container">
        <a href="./home.php" class="btn btn-warning">Order More</a>
    </div>
    
</body>
</html>