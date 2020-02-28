<!DOCTYPE html>
<html>
<head>
    <title>Authority To Pay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="images/uilogo.jpg" />
    <script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
</head>
<body>
    <!-- header-->
    <div id="some_div">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                    <div class="col-md-6"><br/><br/>
                        <div>
                            <p style="text-align: center; margin: 0px"><strong>UNIVERSITY OF IBADAN</strong></p>
                            <p style="text-align: center; margin: 0px"><strong>INFORMATION TECHNOLOGY AND MEDIA SERVICES DIRECTORATE</strong></p>
                            <p style="text-align: center; margin: 0px"><em><strong>MANAGEMENT INFORMATION SYSTEM (MIS) UNIT</strong></em></p>
                        </div>
                        <p style="text-align: right">Date:
                            <b id="date">
                                <script type="text/javascript">
                                    d = new Date();
                                    document.getElementById("date").innerHTML = d.toDateString();
                                </script>
                            </b>
                        <p>
                    </div>
                <div class="col-md-3"></div>
            </div>
        </div><br/>
    <!-- body -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <p style="text-align: left; margin: 0px"><b><em>Chief Accountant, </em></b></p>
                    <p style="text-align: left; margin: 0px"><b><em>Grants Section, </em></b></p>
                    <p style="text-align: left; margin: 0px"><b><em>University of Ibadan,</em></b></p>
                    <p style="text-align: left; margin: 0px"><b><em>Ibadan. </em></b></p>
                    <br/>
                    <div style="text-align: left"><b><em>AUTHORITY TO PAY</em></b></div>
                    <br/>
                    <div>
                        <p>Please note that the bearer <b><em>
                            ... <!--Retrieve last submitted request-->
                                    <?php echo htmlspecialchars($_POST["fullname"]); ?> ...
                        </em></b> is being requested to pay for the ID Card Production Cost as follows:
                        </p>
                    </div>
                    <br/>
                    <div>
                        <!-- Retrieve Complaint type from database table-->
                    </div>
                    <br/>
                    <div>
                        <p>Because of the foregoing, he/she has been mandated by the MIS Management to pay the sum of ....<b><!-- Retrieve cost from complaint table-->
                                <?php echo htmlspecialchars($_POST["complaintType"]); ?>
                            </b>...into <b><em>MIS-IGR Account, Code 7/551/134 at the Cash Office.</em></b>.</p>
                        <br/>
                        <p style="text-align: left">Thank you</p><br/>
                        <p style="text-align: left;"><b>Mr. T.S. Ajisafe.</b></p>
                        <p style="text-align: left; margin: 0px"><em>Deputy Director, MIS</em></p>
                    </div>

                    <br/>




                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

</body>
</html>