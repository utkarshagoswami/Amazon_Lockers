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
<style>
#id, #name, #city, #state, #pincode{
    display: none;
}
</style>
</head>
<body>
    <div class="page-header">
        <center><img id="logo" src="../img/amazon_logo1.png" /></center>
         <a href="../index.html" class="home_button">
            <span class="glyphicon glyphicon-home" data-toggle="tooltip" data-placement="bottom" title="Dashboard Home"></span>
        </a>
    </div>
    <br><br><br>
    <script type="text/javascript">
        function base(){
            document.getElementById('id').style.display='none';
            document.getElementById('name').style.display='none';
            document.getElementById('city').style.display='none';
            document.getElementById('state').style.display='none';
            document.getElementById('pincode').style.display='none';
        }
        function form_number(){
            base();
            document.getElementById('id').style.display='block';
        }
        function form_name(){
            base();
            document.getElementById('name').style.display='block';
        }
        function form_city(){
            base();
            document.getElementById('city').style.display='block';
        }
        function form_state(){
            base();
            document.getElementById('state').style.display='block';
        }
        function form_pincode(){
            base();
            document.getElementById('pincode').style.display='block';
        }
    </script>
    <div class="container">
        <form action="home.php" method="POST">
            <span class="btn btn-warning" onclick="form_number();">Locker Number</span>
            <span class="btn btn-warning" onclick="form_name();">Locker Name</span>
            <span class="btn btn-warning" onclick="form_city();">Locker City</span>
            <span class="btn btn-warning" onclick="form_state();">Locker State</span>
            <span class="btn btn-warning" onclick="form_pincode();">Locker Pincode</span><br><br>
            <input type="text" name="id" id="id" placeholder="Enter locker number" value="-1">
            <input type="text" name="name" id="name" placeholder="Enter locker name" value="-1">
            <input type="text" name="city" id="city" placeholder="Enter locker city" value="-1">
            <input type="text" name="state" id="state" placeholder="Enter locker state" value="-1">
            <input type="text" name="pincode" id="pincode" placeholder="Enter locker pincode" value="-1"><br>
            <input type="submit" name="search" class="btn btn-warning">
        </form>
    </div>
<?php
    if (isset($_POST['search'])) {
        echo "<div class='container'>
                <table class='table table-bordered'>
                    <thead>
                        <th>Number</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>Prime Capacity</th>
                        <th>Standard capacity</th>
                    </thead>
                    <tbody>";

        if (isset($_POST['id']) && $_POST['id']!=-1)
            $sql = "SELECT * FROM locker where locker_id=".$_POST['id'];
        else if (isset($_POST['name']) && $_POST['name']!=-1)
            $sql = "SELECT * FROM locker where locker_name='".$_POST['name']."';";
        else if (isset($_POST['city']) && $_POST['city']!=-1)
            $sql = "SELECT * FROM locker where locker_city='".$_POST['city']."';";
        else if (isset($_POST['state']) && $_POST['state']!=-1)
            $sql = "SELECT * FROM locker where locker_state='".$_POST['state']."';";
        else if (isset($_POST['pincode']) && $_POST['pincode']!=-1)
            $sql = "SELECT * FROM locker where locker_pincode=".$_POST['pincode'];
        $res=mysqli_query($conn, $sql);
        while ($r = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>".$r['locker_id']."</td>";
            echo "<td>".$r['locker_name']."</td>";
            echo "<td>".$r['locker_city']."</td>";
            echo "<td>".$r['locker_state']."</td>";
            echo "<td>".$r['locker_pincode']."</td>";
            echo "<td>".$r['prime_capacity']."</td>";
            echo "<td>".$r['standard_capacity']."</td>";
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    }
?>
</body>
</html>