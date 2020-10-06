<?php

include  ('conn.php');

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Sistema</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>


    <div id="loginbox">
         <form name="form1" class="form-vertical" action="" method="post">
                <div class="control-group normal_text"><h3>Login</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input type="text" placeholder="Usuario" name="username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" placeholder="Senha" name="password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions" >
                    <center> 
                        <input  
                        type="submit" name="submit1" value="Login" class="btn btn-success" 
                        />
                    </center>
                        
                </div>


        </form>

        <?php
        if (isset($_POST["submit1"]))
        {
            $username=mysqli_real_escape_string($link,$_POST["username"]);
            $password=mysqli_real_escape_string($link,$_POST["password"]);

            $count=0;
            $result=mysqli_query($link,"select * from user_register where username='$username' && password='$password' && role='User' && status='active'");
            $count=mysqli_num_rows($result);
            if ($count>0)
            {
                ?>

            <script type="text/javascript">
                window.location="admin.php"  
            </script> 

                 <?php
            }

            else{
                ?>
            <div class="alert alert-danger" >
                  Usuario ou senha inválidos!
            </div>

            <?php
        
        }
    }


?>
    


        <script src="js/jquery.min.js"></script>
        <script src="js/matrix.login.js"></script>
</body>

</html>

