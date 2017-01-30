<?php
    include '../config_database.php';
?>
<html>
<head>
    <link rel="icon" href="../img/favicon.jpg" type="image" sizes="16x16">
    <title>Dashboard</title>
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
            <table class="table table-bordered">
            <thead>
                <th>Number</th>
                <th>Name</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
                <th>Prime</th>
                <th>Standard</th>
                <th>Ratio</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();   
                });
            </script>
<?php
            $query="SELECT * FROM locker;";
            $res = mysqli_query($conn, $query);
            while ($r = mysqli_fetch_assoc($res)){
                echo "<tr class='post'>";
                echo "<td>".$r['locker_id']."</td>";
                echo "<td>".$r['locker_name']."</td>";
                echo "<td>".$r['locker_city']."</td>";
                echo "<td>".$r['locker_state']."</td>";
                echo "<td>".$r['locker_pincode']."</td>";
                echo "<td>".$r['prime_capacity']."</td>";
                echo "<td>".$r['standard_capacity']."</td>";
                echo "<td>
                        <a class='btn btn-warning' href='#'>
                            <span class='glyphicon glyphicon-wrench' data-toggle='tooltip' data-placement='bottom' title='Change Prime:Standard Ratio'></span>
                        </a>
                    </td>";
                echo "<td>
                        <a class='btn btn-warning' href='edit_locker.php?id=".$r['locker_id']."'>
                            <span class='glyphicon glyphicon-pencil' data-toggle='tooltip' data-placement='bottom' title='Edit Details'></span>
                        </a>
                    </td>";
                echo "<td>
                        <a class='btn btn-warning' href='delete.php?id=".$r['locker_id']."'>
                            <span class='glyphicon glyphicon-trash' data-toggle='tooltip' data-placement='bottom' title='Delete Locker'></span>
                        </a>
                    </td>";
                echo "</tr>";
            }
?>
            </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class='container'>
        <table class="table table-bordered">
            <thead>
                <th>Number</th>
                <th>Delivery Date</th>
                <th>Count</th>
                <th>Capacity</th>
                <th>Type</th>
            </thead>
            <tbody>
<?php
            $query="SELECT * FROM orders;";
            $res = mysqli_query($conn, $query);
            while ($r = mysqli_fetch_assoc($res)){
                echo "<tr class='post'>";
                echo "<td>".$r['locker_id']."</td>";
                echo "<td>".$r['delivery_date']."</td>";
                echo "<td>".$r['count']."</td>";;
                echo "<td>".$r['locker_capacity']."</td>";
                echo "<td>".$r['type']."</td>";
                echo "</tr>";
            }
?>
            </tbody>
        </table>
    </div>
</body>
</html>