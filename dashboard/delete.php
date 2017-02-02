<html>
<head>
</head>
<body>
<?php
    include '../config_database.php';
    $id = $_GET['id'];
    $sql = "SELECT count(*) 'ct' FROM orders where locker_id=".$id;
    $res=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($res);
    if($r['ct']!=0){
    	//header('Location: list.php');
?>
		<script type="text/javascript">
	    	alert("Cannot delete this locker, orders have already been placed");
		</script>
<?php
		include "list.php";
    }
    else{    
    	$sql = " DELETE FROM locker where locker_id=".$id;
    	mysqli_query($conn, $sql);
    	header('Location: list.php');
    }    
?>
</body>
</html>