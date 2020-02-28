<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>M.I.S | COMPLAINT FORM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="images/uilogo.jpg" />
</head>

<body style="background-color: #e8fae4  ; align-content: center; margin: 0px; padding: 0px">

    <!-- header-->
    <div class="container">
        <div class="row">
            <div class="col-md-1" style="background-color: "></div>
            <div class="col-md-10">
                <div>
                    <a href="index.php">
                        <img src="images/ui.jpg" class="img-responsive center-block" alt="University of Ibadan.">
                    </a>
                </div>
                <button type="button" class="btn btn-primary btn-block active"> INFORMATION TECHNOLOGY AND MEDIA SERVICES</button>
<?php
	session_start();
	//echo $_SESSION['user_id'];
	if(isset($_SESSION['user_id'])){
				
				//echo $_SESSION['user_id'];
		                
				echo"<div style=\"text-align: right; font-size: 18px\">
                        <a href=\"add_edit.php\" class=\"btn btn-info btn-xs\" target=\"_blank\">
                            <span class=\"glyphicon glyphicon-pencil\"> COMPLAINT REVIEW</span>
                        </a>
                        <a href=\"spreadsheet.php\" class=\"btn btn-danger btn-xs\" target=\"_blank\">
                            <span class=\"glyphicon glyphicon-book\"> VIEW TRANSACTIONS</span>
                        </a>
                        <a href=\"report.php\" class=\"btn btn-warning btn-xs\" target=\"_blank\">
                            <span class=\"glyphicon glyphicon-envelope\"> GENERATE REPORT</span>
                        </a>
						<a href='logout.php'>LOGOUT</a>
                </div>";
	}else{
			echo"<div style=\"text-align: right; font-size: 18px\">
                    <a href=\"login.php\" class=\"btn btn-info btn-xs\" target=\"_blank\">
                        <span class=\"glyphicon glyphicon-pencil\"> ADMIN LOGIN</span>
                    </a>
                </div>";
	
	
	}
?>	

            </div>
            </div>
            <div class="col-md-1"></div>
        </div><br/>

    <!-- body -->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div id="body" style="background-color: #f8ffff; text-align:left:auto;margin: auto; margin-top: 10px; border: solid 1px #19b220; padding: 10px">
                    <p class="text-info" style="text-align: center"> Please fill the form with reference to your complaint</p>
                    <form role="form" method="post" action="index.php" novalidate="" >
                        <!-- Matric/PFNo input-->
                        <div class="form-group">
                        <label for='fullname'>MatricNo / PFNumber:</label>
                        <input type='text' name='mat_no' class="form-control" maxlength='60' placeholder="Enter Student Matric Number or Staff PF Number" required/>
                            <span id="matricError"></span>
                        </div>
						<!-- name input-->
                        <div class="form-group">
                        <label for='fullname'>Fullname:</label>
                        <input type='text' name='fullname' class="form-control" maxlength='60' placeholder="Enter Fullname" required/>
                            <span id="nameError"></span>

                        </div>
                        <!-- Category -->
                        <div class="form-group">
                        <label for='category'>Category:</label>
                        <select class="form-control" id='category' name="category">
                            <option value='--Select Category--' selected>--Select Category--</option>
                            <option value='Staff'>Staff</option>
                            <option value='Student'>Student</option>
                        </select>
                            <span id="catError"></span>

                        </div>
                        <!-- Complaint type -->
                        <div class="form-group">
                        <label for='type'>Complaint Type:</label>
                        <select class="form-control" id='complaintType' name="complaintType">
                            <option value='--Complaint Type--' selected>--Complaint Type--</option>
							<?php

							$connection = mysql_connect('localhost','root','');
							$db = mysql_select_db('id_cards',$connection);
							
							$query = "SELECT * FROM complaint_type";
							
							$result = mysql_query($query,$connection);
							while($row = mysql_fetch_array($result)){
								$type_id = $row['type_id'];
								$type = $row['type'];
								$cost = $row['cost'];
							
							    echo"<option value='$type_id'> $type - N$cost</option>";
							}
							?>
						</select>
                            <span id="compError"></span>
                        </div>
                        <input class="btn btn-success" type="submit" value="Submit" name="submitBtn" id="submitBtn">
                    </form>

                    <!-- Save data into database -->
                    <?php
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
                    if(isset($_POST['submitBtn']))
                    {
						if(isset($_SESSION['user_id'])){// remove restriction in case of online hosting
                        if (isset($_POST['mat_no']) && isset($_POST['fullname']) && ($_POST['category'] != '--Select Category--') && ($_POST['complaintType'] != '--Complaint Type--'))
                        {
							$mat_no = trim($_POST['mat_no']);
                            $fullname = trim($_POST['fullname']);
                            $category = $_POST['category'];
                            $complaint_type = $_POST['complaintType'];

							if(!isset($_SESSION['user_id'])){// just in case we are going online and need for checking whether admin exists
								$admin_id = 0;
							}else $admin_id = $_SESSION['user_id'];
							
							$pre_query = "SELECT * FROM complaints WHERE mat_no='$mat_no' AND complaint_type='$complaint_type'";
							$pre_result = mysql_query($pre_query,$connection);

							$pre_num = mysql_num_rows($pre_result);
							
							if($pre_num == 0){
                                $connection = mysql_connect('localhost','root','');
                                $db = mysql_select_db('id_cards',$connection);
								$query = "INSERT INTO complaints(mat_no,full_name,category,complaint_type,admin_id) VALUES('$mat_no','$fullname','$category','$complaint_type','$admin_id')";

								$result = mysql_query($query, $connection) or die('Invalid query: ' .mysql_error());
								
								if ($result) {
									echo "<b style='color: #0a13ff'><small>Your complaint has been submitted Successfully!</small></b>";
								}else {
									echo "<b style='color: red'><small>Submission Error...Try again</small></b> ";
								}
							}else{
								echo "<b style='color: red'><small>Submission Error... Complaint has been previously submitted, please be patient.</small></b>";
							}

                        }else{

                            echo "<b style='color: red'><small>All the fields are compulsory</small></b>";
                        }
						} echo "<b style='color: red'><small>permission denied; Administrator should Login</small></b>";//remove just in case of online hosting
                    }
                    ?>

                    <br/>
                    <br/>

        </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <br/>
	<br/>
    <br/>

    <!-- footer tab -->
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                    <footer>
                        <div class="col-md-10">
                                <p class="btn-default" style="text-align: center; font-family: 'Glyphicons Halflings'"> &bigstar;MANAGEMENT INFORMATION SERVICES&bigstar;  UNIVERSITY OF IBADAN &copy; 2015</p>
                        </div>
                    </footer>
                <div class="col-md-1"></div>
            </div>
        </div>


   <script src="js/myscript.js" type="text/javascript"></script>
</body>
</html>