<?php
    include '../config_database.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM locker WHERE locker_id=".$id.";";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
?>
<html>
<head>
    <link rel="icon" href="../img/favicon.jpg" type="image" sizes="16x16">
    <title>Edit Locker</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link href='//fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="page-header">
        <a href="../index.html" class="logout_button">
            <span class="glyphicon glyphicon-log-out" data-toggle="tooltip" data-placement="bottom" title="Logout"></span>
        </a>
        <center><img id="logo" src="../img/amazon_logo1.png" /></center>
        <a href="/dashboard/list.php" class="home_button">
            <span class="glyphicon glyphicon-home" data-toggle="tooltip" data-placement="bottom" title="Dashboard Home"></span>
        </a>
        <a href="/dashboard/new_locker.php" class="new_locker_button">
            <span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="left" title="New Locker"></span>
        </a>
    </div>
<?php
    if(isset($_POST['Save'])) {
        $sql="SELECT * FROM orders WHERE locker_id=".$_POST['id'].";";
        $res=mysqli_query($conn,$sql);
        $flag=0;
        $p=0;
        $s=0;
        while($r=mysqli_fetch_assoc($res)){
            if($r['type']==1 && $r['count']>$p){
                    $p=$r['count'];
            }
            else if($r['type']==2 && $r['count']>$s){
                        $s=$r['count'];
            }
        }
        if($p!=0){
            if($_POST['prime']<$p){
                echo "Cannot update locker. Increase prime capacity to atleast ".$p;
                $flag=1;
            }
            else{
                $order_sql="UPDATE orders SET 
                            locker_capacity='".$_POST['prime']."'
                            WHERE locker_id='".$_POST['id']."' AND type='1';";
                mysqli_query($conn,$order_sql);
            }
        }
        if($s!=0){
            if($_POST['standard']<$s){
                echo "Cannot update locker. Increase standard capacity to atleast ".$s;
                $flag=1;
            }
            else{
                $order_sql="UPDATE orders SET 
                            locker_capacity='".$_POST['standard']."'
                            WHERE locker_id='".$_POST['id']."' AND type='2';";
                mysqli_query($conn,$order_sql);
            }
        }
        if($flag==0){
            $sql = "UPDATE locker SET 
                locker_name = '".$_POST['name']."',
                locker_city = '".$_POST['city']."',
                locker_state = '".$_POST['state']."',
                locker_pincode = '".$_POST['pincode']."',
                prime_capacity = '".$_POST['prime']."',
                standard_capacity = '".$_POST['standard']."'
                WHERE locker_id= '".$_POST['id']."';";
            mysqli_query($conn, $sql);
            header('Location: list.php');    
        }
        else{
            $id = $_POST['id'];
            $sql = "SELECT * FROM locker WHERE locker_id=".$id.";";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($query);
            include "edit_locker_form.php";
        }
    }
    else{
        $id = $_GET['id'];
        $sql = "SELECT * FROM locker WHERE locker_id=".$id.";";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
        include 'edit_locker_form.php';
    }
?>
</body>
</html>