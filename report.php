<!DOCTYPE html>
<html lang="en">
    <head>
        <title>M.I.S | REPORT PAGE</title>
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
                            <img src="images/ui.jpg" class="img-responsive center-block" alt="University of Ibadan.">
                        </a>
                    </div>
                    <button type="button" class="btn btn-success btn-block active">REPORT PAGE</button>
					<div style="text-align: right; font-size: 18px">
						<a href="spreadsheet.php" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-envelope"> VIEW ALL TRANSACTIONS</span>
                    </a>
                </div>
                    </div>
                </div>
            <div class="col-md-1"></div>
            </div>
        </div><br/>

        <!-- body -->
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Panel for the transaction table -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">REPORT TABLE</h3>
                        </div>
                        <div class="panel-body" style="align-content: center">
                            <table class="table table-hover table-bordered table-responsive">
                                <caption class="text-warning" style="text-align: center">TOTAL COMPLAINT CASES AND TRANSACTION REPORT</caption>
                                <thead>
                                    <tr>
                                        <th>No.</th> <th>COMPLAINT TYPE</th> <th>TOTAL CASES</th> <th>TOTAL COST(N)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
                                    $connection = mysql_connect('localhost','root','');
                                    $db = mysql_select_db('id_cards',$connection);

                                    $query = mysql_query("SELECT *,count(*) AS num FROM complaints GROUP BY complaint_type");
                                    $count = 0;
                                    while($row = mysql_fetch_array($query)){

                                        $type = $row['complaint_type'];
                                        $num = $row['num'];
                                        $q = mysql_query("SELECT * FROM  complaint_type WHERE type_id=$type");
                                        if($q){
                                            while($r = mysql_fetch_array($q)){
                                                $name = $r['type'];
                                                $price = $num * $r['cost'];
                                                 $count++;
                                                echo"
                                                    <tr>
                                                        <td>$count</td> <td>$name</td> <td>$num</td> <td>$price</td>
                                                    </tr>
                                                ";
                                            }
                                        }

                                    }
                                ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
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
        <script src="jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/myscript.js" type="text/javascript"></script>
</body>
</html>