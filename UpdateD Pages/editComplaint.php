<?php
session_start();
if(!isset($_SESSION['user_id'])) header('location:index.php');
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>CONFIRM DELETION</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="images/uilogo.jpg" />
</head>
<body>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	$connection = mysql_connect('localhost','root','');
	$db = mysql_select_db('id_cards',$connection);
if(isset($_SESSION['user_id'])){
	if(isset($_POST['edit'])){
		$type = trim($_POST['type']);
		$cost = trim($_POST['cost']);

		$type_id = $_GET['id'];
		if(!isset($_SESSION['user_id'])){// just in case we are going online and need for checking whether admin exists
			$admin_id = 0;
		}else $admin_id = $_SESSION['user_id'];
		
		$query = "UPDATE complaint_type SET type='$type',cost='$cost',last_altered_by_id='$admin_id' WHERE type_id='$type_id'";

		$result = mysql_query($query,$connection);

		if($result){
			header('location:add_edit.php');
		}else{
			echo"Unable to Update";
		}
	}


	if(isset($_GET['id'])){

		$type_id = $_GET['id'];
		$query = "SELECT * FROM complaint_type WHERE type_id=$type_id";
		$result = mysql_query($query,$connection);

		if($result){

			while($row=mysql_fetch_array($result)){

				$type= $row['type'];
				$cost = $row['cost'];

				echo"<div class='container'>
                <div class='row'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6'><br/><br/><br/><br/>
                        <div id='body' style='background-color: #f8ffff; text-align:left:auto;margin: auto; margin-top: 10px; border: solid 1px #19b220; padding: 10px'><p class='text-info' style='text-align: center'>Edit complaint type and price</p>
                    <form action='editComplaint.php?id=$type_id' method='post' role='form'>
                    <br/>
                    <label for='type'>Complaint Type</label><br/>
                    <input input class='form-control' type='text' value='$type' name='type'/>
                    <br/>
                    <label for='price'>Price</label><br/>
                    <input input class='form-control' type='number' value='$cost' name='cost'/>
                    <br/><br/>
                    <input input class='btn btn-success' type='submit' name='edit' value='Edit'>

                    </form>

                    </div>
                    </div>
                    <div class='col-md-3'></div>
				</div>";

			}

		}else{
			echo "Error fetching data from Database";
		}
	}else
        echo "Hello! How may I help you?";
}else echo "Admin Login Required First";
?>

<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>