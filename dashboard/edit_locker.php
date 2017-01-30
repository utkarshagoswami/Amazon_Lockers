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
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <form action="edit_locker.php" method="post" name="edit_locker">
        <table class="table">
            <tbody>
                <tr>
                    <td>Locker Number</td>
                    <td><input type="text" name="id" value="<?php echo $id ?>" hidden><?php echo $id ?></td>
                </tr>
                <tr>
                    <td>Locker Name</td>
                    <td><input type="text" name="name" pattern="[a-zA-Z ]+" title="Only Alphabets are allowed" value="<?php echo $data['locker_name']?>" required></td>
                </tr>
                <tr>
                    <td>locker City</td>
                    <td><input type="text" name="city" value="<?php echo $data['locker_city']?>" required></td>
                </tr>
                <tr>
                    <td>Locker State</td>
                    <td><input type="text" name="state" pattern="[a-zA-Z ]+" value="<?php echo $data['locker_state']?>" required></td>
                </tr>
                <tr>
                    <td>Locker Pincode</td>
                    <td><input type="text" pattern="^\d{6}$" name="pincode" minlength="6" maxlength="6" value="<?php echo $data['locker_pincode']?>" required></td>
                </tr>
                <tr>
                    <td>Locker Prime Capacity</td>
                    <td><input type="text" name="prime" pattern="[0-9]+" value="<?php echo $data['prime_capacity']?>" required></td>
                </tr>
                <tr>
                    <td>Locker Standard Capacity</td>
                    <td><input type="text" name="standard" pattern="[0-9]+" value="<?php echo $data['standard_capacity']?>" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Save" class="btn btn-warning" value="Save"></td>
                </tr>
            </tbody>
        </table>
    </form>
<?php
    if (isset($_POST['Save'])) {
        $sql="SELECT * FROM orders WHERE locker_id=".$_POST['id'].";";
        $res=mysqli_query($conn,$sql);
        $flag=0;
        while($r=mysqli_fetch_assoc($res)){
            if($r['type']==1){
                if($_POST['prime']<$r['count']){
                    echo "Cannot update locker. Increase prime capacity";
                    $flag=1;
                }
                else{
                    $order_sql="UPDATE orders SET 
                                locker_capacity='".$_POST['prime']."'
                                WHERE locker_id='".$_POST['id']."' AND type='1';";
                    mysqli_query($conn,$order_sql);
                }
            }
            else if($r['type']==2){
                 if($_POST['standard']<$r['count']){
                    echo "Cannot update locker. Increase standard capacity";
                    $flag=1;
                }
                else{
                    $order_sql="UPDATE orders SET 
                                locker_capacity='".$_POST['standard']."'
                                WHERE locker_id='".$_POST['id']."' AND type='2';";
                    mysqli_query($conn,$order_sql);
                }
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
    }
?>
    </div>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>
</html>