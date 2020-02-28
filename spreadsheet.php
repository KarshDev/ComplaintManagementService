<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	$connection = mysql_connect('localhost','root','');
    $db = mysql_select_db('id_cards',$connection);

	if(isset($_POST['searchBtn'])){
	
		if(isset($_POST['name']) || ($_POST['complaint-type'] !="--Complaint Type--") || ($_POST['category'] != "--Select Category--")){
			$query = "SELECT * FROM complaints WHERE ";
			
			if(isset($_POST['name']) && $_POST['name']!=''){
				$name = $_POST['name'];
				$query .= "mat_no=$name AND ";
			}
			
			if($_POST['complaint-type'] != "--Complaint Type--"){
				
				$type = $_POST['complaint-type'];
				$query .= "complaint_type='$type' AND ";
			
			}
			
			if($_POST['category'] != "--Select Category--"){
			
				$category = $_POST['category'];
				$query.= "category='$category' AND ";
			
			}
			
			$query .= "form_number>0 ORDER BY form_number DESC";
		
			//echo "$query";
		}
	
	}else{
    $query = "SELECT * FROM complaints ORDER BY form_number DESC";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>M.I.S | SPREADSHEET</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="icon" type="image/jpg" href="images/uilogo.jpg" />
    </head>
    <body style="background-color: #e8fae4  ; align-content: center; margin: 0px; padding: 0px">

        <!-- header-->
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div>
                        <a href="index.php">
                            <img src="images/ui.jpg" class="img-responsive center-block" alt="University of Ibadan">
                        </a>
                    </div>
                    <button type="button" class="btn btn-success btn-block active">SPREADSHEET (ALL COMPLAINTS)</button>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <br/>
        <br/>

        <!-- body -->
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <!-- QUERY AND FILTERS -->
                    <div style="float: ">
                    <form action="spreadsheet.php" method="post" class="form-inline" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder='Matric / PF Number' name='name'>
                        </div>

                        <div class="form-group">
						<select name='complaint-type' class="form-control input-sm" id="complaint-type">
                            <option value='--Complaint Type--' selected>--Complaint Type--</option>
							<?php
                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
							$q = "SELECT * FROM complaint_type";
							
							$r = mysql_query($q,$connection);
							while($row = mysql_fetch_array($r)){
								$type_id = $row['type_id'];
								$type = $row['type'];
								$cost = $row['cost'];
							
							    echo"<option value='$type_id'>$type</option>";
							}
							?>
						</select>
                        </div>

                        <div class="form-group">
						<select id='category' name="category" class="form-control input-sm">
                            <option value='--Select Category--' selected>--Select Category--</option>
                            <option value='Staff'>Staff</option>
                            <option value='Student'>Student</option>
                        </select>
                        </div>
                        <input class="btn btn-info btn-sm" type="submit" value="Search" name="searchBtn" id="searchBtn">

						</form>
                    </div>

                    <!-- Panel for the transaction table -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h5 class="panel-title">SPREADSHEET</h5>
                        </div>
                        <div class="panel-body" style="align-content: center">
                            <table class="table table-hover table-bordered table-responsive">
                                <caption class="text-warning" style="text-align: center">TRANSACTION DETAILS</caption>
                                <thead>
                                    <tr>
                                        <th>No.</th><th>NAME</th><th>MATRIC/PF NO</th><th>CATEGORY</th> <th>COMPLAINT</th><th>AMOUNT PAYABLE(N)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
									$result = mysql_query($query,$connection);
									$count = 0;
                                    if($result){
										while($row = mysql_fetch_array($result)){

											$mat_no = $row['mat_no'];
											$fullname = $row['full_name'];
											$type = $row['complaint_type'];
											//$num = $row['num'];
											$category = $row['category'];
											$q = mysql_query("SELECT * FROM  complaint_type WHERE type_id=$type");
                                            if($q){
                                                while($r = mysql_fetch_array($q)){
												    $name = $r['type'];
												    $price = $r['cost'];
												    $count++;
                                                    echo"
											     	<tr>
											     		<td>$count</td> <td>$fullname</td> <td>$mat_no</td><td>$category</td><td>$name</td><td>N$price</td>
									       			</tr>
								    			";
											   }
                                            }

										}
									}
                                ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-1"></div>
            </div>
        </div>
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
        <script src="jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>
</body>
</html>