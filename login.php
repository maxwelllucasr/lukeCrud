<?php
    require "stubs/header.php";

    if(!isset($_SESSION['userid'])){
        if(isset($_POST['submit'])){
            if(isset($_POST['username'])&&isset($_POST['password'])){
                $user = $_POST['username'];
                $pass = $_POST['password'];


                //validation

                $link = mysqli_connect($hn,$us,$ps,$db);
                $res = $link->prepare('SELECT name, pass, id, role FROM users WHERE name = ?');
                $res->bind_param('s',$user);
                $res->execute();
                $res->store_result();

                if ($res->num_rows > 0) {
                    $res->bind_result($dbuser,$dbpass, $dbid,$dbrole);
                    $res->fetch();

                    if (($dbuser == $user) && ($dbpass == $pass)){
                        $_SESSION['userid'] = $dbid;
                        echo "Logged in!";
                        if ($dbrole == "Admin"){
                            $_SESSION['isadmin'] = true;
                        }
                    }

                }

            }
        }
    
?>

<form action="login.php" method="post">

    <input style="display:block; margin:1rem" placeholder="Username" type="text" name="username">
    <input style="display:block; margin:1rem" placeholder="Password" type="password" name="password">
    <input style="display:block; margin:1rem" type="submit" name="submit" value="Submit">

</form>

<?php } 
    else echo "You're logged in.";
?>
