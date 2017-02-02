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
<?php
    if (isset($_POST['search'])) {
        $now = date('Y-m-d',time());
        echo "Current Date:".$now;
        echo "<div class='container'><br>";
        $qty=$_POST['qty'];
            echo "<table class='table table-bordered'>
                    <thead>
                        <th>Number</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>Prime Order</th>
                        <th>Standard Order</th>
                    </thead>
                    <tbody>";
        $sql=0;
        if (isset($_POST['id']) && $_POST['ut']=="locker_id")
            $sql = "SELECT * FROM locker where locker_id=".$_POST['id'];
        else if (isset($_POST['name']) && $_POST['ut']=="locker_name")
            $sql = "SELECT * FROM locker where locker_name='".$_POST['name']."';";
        else if (isset($_POST['city']) && $_POST['ut']=="locker_city")
            $sql = "SELECT * FROM locker where locker_city='".$_POST['city']."';";
        else if (isset($_POST['state']) && $_POST['ut']=="locker_state")
            $sql = "SELECT * FROM locker where locker_state='".$_POST['state']."';";
        else if (isset($_POST['pincode']) && $_POST['ut']=="locker_pincode")
            $sql = "SELECT * FROM locker where locker_pincode=".$_POST['pincode'];
        $res=mysqli_query($conn, $sql);
        
        $del_sql="DELETE FROM orders WHERE delivery_date<='".date('Y-m-d', strtotime($now. ' - 1 days'))."';";
        mysqli_query($conn,$del_sql);

        while ($r = mysqli_fetch_assoc($res)){
            echo "<form action='save.php' method='POST'>";
            echo "<input type=text name=locker_id value=".$r['locker_id']." hidden>";
            echo "<tr>";
                echo "<td>".$r['locker_id']."</td>";
                echo "<td>".$r['locker_name']."</td>";
                echo "<td>".$r['locker_city']."</td>";
                echo "<td>".$r['locker_state']."</td>";
                echo "<td>".$r['locker_pincode']."</td>";
                echo "<input type=text name=prime_capacity value=".$r['prime_capacity']." hidden>";
                echo "<input type=text name=standard_capacity value=".$r['standard_capacity']." hidden>";
                echo "<input type=text name=qty value=".$qty." hidden>";
                
                $order_sql="SELECT * FROM orders WHERE locker_id='".$r['locker_id']."' AND (delivery_date='".date('Y-m-d', strtotime($now. ' + 5 days'))."' OR delivery_date='".date('Y-m-d', strtotime($now. ' + 2 days'))."');";
                $order_res=mysqli_query($conn,$order_sql);
                $num_rows = mysqli_num_rows($order_res);
                $prime=0;
                $stand=0;
                if($num_rows!=0)
                {
                    while($order_r = mysqli_fetch_assoc($order_res))
                    {   
                        if($order_r['delivery_date']==date('Y-m-d', strtotime($now. ' + 2 days')))
                        {
                            $prime=1;
                            if($order_r['locker_capacity']-$order_r['count']<$qty)
                                echo "<td>-</td>";
                            else
                                echo "<td><input type=submit name=prime value=Order class='btn btn-warning' /></td>";
                        }
                        if($order_r['delivery_date']==date('Y-m-d', strtotime($now. ' + 5 days')))
                        {
                            if($prime==0){
                                echo "<td><input type=submit value=Order name=prime class='btn btn-warning' /></td>";
                                $prime=1;
                            }
                            $stand=1;
                            if($order_r['locker_capacity']-$order_r['count']<$qty)
                                echo "<td>-</td>";
                            else
                                echo "<td><input type=submit name=standard value=Order class='btn btn-warning' /></td>";
                        }
                    }
                }
                if($prime==0){
                    if($r['prime_capacity']-$qty<0)
                        echo "<td>-</td>";
                    else
                        echo "<td><input type=submit value=Order name=prime class='btn btn-warning' /></td>";
                }
                if($stand==0){
                    if($r['standard_capacity']-$qty<0)
                        echo "<td>-</td>";
                    else
                        echo "<td><input type=submit value=Order name=standard class='btn btn-warning' /></td>";
                }
            echo "</tr></form>";
        }
        echo "</tbody></table></div>";
        /*
        $now = date('Y-m-d',time());
        $your_date = strtotime($now. ' + 2 days');
        echo date('y-m-d',$your_date)."  ";
        echo date('Y-m-d', strtotime($now. ' + 5 days')); 
        */
?>
<div class="container">
    <form action="search.php" method="POST">
        <input type="text" name="qty" value='<?php echo $_POST['qty']; ?>' hidden>
        <input type="submit" name="search" value="Search More" class="btn btn-warning">
    </form>
</div>
<?php
    }
?>
</body>
</html>