<?php
session_start();
if(!isset($_SESSION['user_id'])) header('location:index.php');
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>M.I.S | Updating Transactions</title>
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
                    <button type="button" class="btn btn-primary btn-block active">INFORMATION TECHNOLOGY AND MEDIA SERVICES</button>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
<!-- body -->
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center; font-size: 16px">TRANSACTIONS REVIEW</h3>
                     </div>
                    <div class="panel-body">
                        <table class="table table-condensed table-responsive table-hover">
                                <tr>
                                    <?php
                                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
                                    $connection = mysql_connect('localhost','root','');
                                    $db = mysql_select_db('id_cards',$connection);

                                    $query = "SELECT * FROM complaint_type";
                                    $result = mysql_query($query,$connection);
                                    while($row = mysql_fetch_array($result)){
                                        $type_id = $row['type_id'];
                                        $type = $row['type'];
                                        $cost = $row['cost'];

                                        // displaying transaction list

                                        echo" <ul class='list-group-item-text'>
                                            <li class='list-group-item text-info' >$type N$cost &rarr;
                                            <a href='deleteComplaint.php?id=$type_id'style='float: right'><button type='button' class='btn btn-warning btn-xs'>DELETE</button></a>
                                            <a href='editComplaint.php?id=$type_id' style='float: right'><button type='button' class='btn btn-primary btn-xs'>EDIT</button></a>
                                            </li>
                                            </ul>";

                                    }


                                    ?>


                                    </div>

                                    <br/>
                                    <br/>
                                    <!-- TABLE TO ADD NEW COMPLAINT/REQUEST -->

                                    <div id="body" style="background-color: #f8ffff; text-align:left:auto;margin: auto; margin-top: 10px; margin-left: 150px; margin-right: 150px; border: solid 1px #19b220; padding: 10px">
                                        <p class="text-warning" style="text-align: center; font-size: 16px"><b>ADD NEW COMPLAINT / REQUEST TYPE</b></p>
                                        <form role="form" method="post" action="add_edit.php" novalidate="" >
                                            <!--Complaint type input-->
                                            <div class="form-group">
                                                <label for='complaint_type'>New Complaint Type:</label>
                                                <input type='text' name='complaint_type' class="form-control" maxlength='60' placeholder="Enter New Complaint Type or Request" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for='Price'>Price:</label>
                                                <input type='number' name='price' class="form-control" maxlength='4' placeholder="Enter Price To Pay For New Complaint" required/>
                                            </div>
                                            <input class="btn btn-info" type='submit' name='addButton' value='Add New' id="submitbtn"/>
                                            <br/>
                                            <br/>
                                            <?php
                                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
                                            if(isset($_SESSION['user_id'])){
											if(isset($_POST['addButton'])){

                                                if(isset($_POST['complaint_type']) && isset($_POST['price']) && $_POST['price']!='' && $_POST['complaint_type'] !=''){

                                                    $type = trim($_POST['complaint_type']);
                                                    $price = trim($_POST['price']);
													if(!isset($_SESSION['user_id'])){// just in case we are going online and need for checking whether admin exists
														$admin_id = 0;
													}else $admin_id = $_SESSION['user_id'];
										

                                                    $query = "SELECT * FROM complaint_type WHERE type=$type";
                                                    $result = mysql_query($query,$connection);
                                                    if($result){
                                                        $num = mysql_num_rows($result);
                                                    }else $num = 0;
                                                    if($num>0){
                                                        echo "Record Exists in Database";
                                                    }else{
                                                        $query = "INSERT  INTO complaint_type(type,cost,last_altered_by) VALUES('$type','$price',$admin_id)";
                                                        $result = mysql_query($query,$connection);
                                                        if($result){
                                                            echo "<p class='text-success'><small>Added Successfully</small></p>";
                                                        }else{
                                                            echo "<p class='text-danger' '><small>Problem creating complaint type</small></p>";
                                                        }

                                                    }

                                                }else{
                                                    echo"<p class='text-warning' '><small>Both Fields are Required</small></p>";
                                                }

                                            }
											}else echo"<p class='text-warning' '><small>Administrator Login Required</small></p>";
                                            ?>
                                    </div>
                                    <br/>
                                    <br/>
                                    </form>
                                </tr>
                        </table>
                       </div>
                </div>
            </div>
            <div class="col-md-1"></div>
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

<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- <script src="js/myscript.js" type="text/javascript"></script> -->
</body>
</html>