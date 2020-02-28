<?php
session_start();
if(!isset($_SESSION['user_id'])) header('location:index.php');
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>CONFIRM DELETE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="images/uilogo.jpg" />
</head>
<body>
<?php
if(isset($_SESSION['user_id'])){
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	if(isset($_POST['no'])){
		header('location:add_edit.php');	
	}else if(isset($_POST['yes'])){
		$connection = mysql_connect('localhost','root','');
		$db = mysql_select_db('id_cards',$connection);	
		$type_id = $_GET['id'];
		$query = "DELETE FROM complaint_type WHERE type_id=$type_id";
		$result = mysql_query($query,$connection);
		if($result){
			header('location:add_edit.php');		
		}else{
			echo "Error in Deletion";
		}
	}
	
	if(isset($_GET['id'])){
	
		$connection = mysql_connect('localhost','root','');
		$db = mysql_select_db('id_cards',$connection);	
		$type_id = $_GET['id'];
	
		$query = "SELECT * FROM complaint_type WHERE type_id='$type_id'";
		
		$result = mysql_query($query,$connection);
		while($row = mysql_fetch_array($result)){
			$type = $row['type'];
		}
        echo"<div class='container'>
                <div class='row'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6' style='text-align: center'><br/><br/><br/><br/><br/><br/>
                        <div id='body' style='background-color: #f8ffff; text-align:left:auto;margin: auto; margin-top: 10px; border: solid 1px #19b220; padding: 10px'>
                        <p class='text-info' style='text-align: center'>Are You Sure You Want to delete complaint Type <br/><b style='color: crimson'>'$type'</b> ??</p>

                        <form action =\"deleteComplaint.php?id=$type_id\" method='post'>
			                <input class='btn btn-success' type='submit' name='yes' value='YES'/>
			                <input class='btn btn-warning' type='submit' name='no' value='No'/>
			            </form></center>
                        </div>
                    </div>
                    <div class='col-md-3'></div>
				</div>";
	}else{
		echo" I think you need to take a <b>DEEP BREATH</b> ??";
	}
}
?>

<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>