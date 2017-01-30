<?php
    include '../config_database.php';
?>
<html>
<head>
    <link rel="icon" href="../img/favicon.jpg" type="image" sizes="16x16">
    <title>New Locker</title>
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
    <form action="new_locker.php" method="post" name="add_locker">
        <table class="table">
            <tbody>
                <tr>
                    <td>Locker Name</td>
                    <td><input type="text" name="name" pattern="[a-zA-Z ]+" title="Only Alphabets are allowed" required></td>
                </tr>
                <tr>
                    <td>locker City</td>
                    <td><input type="text" name="city" required></td>
                </tr>
                <tr>
                    <td>Locker State</td>
                    <td><input type="text" name="state" pattern="[a-zA-Z ]+" required></td>
                </tr>
                <tr>
                    <td>Locker Pincode</td>
                    <td><input type="text" pattern="^\d{6}$" name="pincode" minlength="6" maxlength="6" required></td>
                </tr>
                <tr>
                    <td>Locker Prime Capacity</td>
                    <td><input type="text" name="prime" pattern="[0-9]+" required></td>
                </tr>
                <tr>
                    <td>Locker Standard Capacity</td>
                    <td><input type="text" name="standard" pattern="[0-9]+" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Save" class="btn btn-warning" value="Save"></td>
                </tr>
            </tbody>
        </table>
    </form>
<?php
    if (isset($_POST['name'])) {
        $sql = "INSERT INTO locker (locker_name, locker_city, locker_state, locker_pincode, prime_capacity, standard_capacity) VALUES('$_POST[name]', '$_POST[city]', '$_POST[state]', '$_POST[pincode]', '$_POST[prime]', '$_POST[standard]')";
        mysqli_query($conn, $sql);
        header('Location: list.php');    
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