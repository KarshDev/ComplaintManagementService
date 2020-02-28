<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='post' role="form">
        <div class="form-group">
            <label for="username">Administator's ID: </label>
            <input type="text" class="form-control" name="username" id="username"><br/><br/>
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" class="form-control" name="password" id="password"><br/><br/>
        </div>
        <input class="btn btn-default btn-sm" type="submit" value="LOGIN" style="color: red" name="login" id="login"><br/>
        <br/>
    </form>
    <!-- Administrator's Form processing and Validation-->
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED)); // Suppress deprecated mysql code errors, need to switch to mysqli
if(isset($_POST['login']))
{
    if(!isset($_POST['password']) || !isset($_POST['username']) || trim($_POST['username'])=='' || trim($_POST['password'])==''){
        echo("<p style='color: red'><small>INVALID USERNAME OR PASSWORD</small></p>");
    }else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $connection = mysql_connect('localhost','root','');
        $db = mysql_select_db('id_cards',$connection);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysql_query($query,$connection);
        if($result){
            //echo "Result Exists";
            $num = mysql_num_rows($result);
            if($num>0){
                session_start();
                while($row = mysql_fetch_array($result)){
                    $user_id = $row['user_id'];
                }
                $_SESSION['user_id'] = $user_id;
                header('location:index.php');
            }else{
                echo"INVALID USERNAME OR PASSWORD";
            }
        }else echo"INVALID USERNAME OR PASSWORD<br/>";
    }
}
?>