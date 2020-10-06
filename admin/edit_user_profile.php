<?php 
include '../includes/header.php';
include "../conn.php";
$id=$_GET["id"];
$firstname="";
$lastname="";
$usertname="";
$password="";
$role="";
$status="";
$img_dir="";

$res=mysqli_query($link,"select * from user_register where id=$id");
    while ($row=mysqli_fetch_array($res))
    {
    	$firstname=$row["firstname"];
    	$lastname=$row["lastname"];
    	$username=$row["username"];
    	$password=$row["password"];
    	$role=$row["role"];
    	$status=$row["status"];
      $img_dir=$row["img_dir"];
    }
?>



        	          <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Editar usuario</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo $firstname; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo $lastname; ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="User name" name="username" readonly="true" value="<?php echo $username; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" />
              </div>
            </div>

           

            <div class="control-group">
              <label class="control-label">Select rule</label>
              <div class="controls">
                <select class="span11"  name="role">
                <option <?php if ($role=="User"){echo "selected";}?>>User</option>
                <option <?php if ($role=="Admin"){echo "selected";}?>>Admin</option>
               </select>
              </div>
            </div> 
<div class="control-group">
              <label class="control-label">Select Situação</label>
              <div class="controls">
                <select class="span11"  name="status" >
                <option <?php if ($status=="active"){echo "selected";}?> >active</option>
                <option<?php if ($status=="inactive"){echo "selected";}?> >inactive</option>
               </select>
              </div>

              <div class="control-group">
              <label class="control-label">Foto</label>
              <div class="controls" >
                <input type="file"  class="span11" placeholder="Foto" name="img_dir" />
                <div width="50%"> <img src="<?php echo $img_dir;?>" width="10%"></div>
              </div>
            </div>

            </div> 
                <div class="alert alert-danger" id="error" style="display: none;" >
                 Usuario já existe, escolha outra nome!
                 </div>

                 <div class="alert alert-success" id="success" style="display: none;" >
                 Atualizado com sucesso!
                 </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Atualizar</button>
            </div>
               
               

          </form>
        </div>
      </div>
 </div>
</div>
</div>


<?php
if (isset($_POST["submit1"]))
{


        // Set image placement folder
        $target_dir = "upload/";
        // Get file path
        $target_file = $target_dir . basename($_FILES["img_dir"]["name"]);        

        if (!file_exists($_FILES["img_dir"]["tmp_name"])) {
            // Validation goes here
        } 
        else
         {
            if (move_uploaded_file($_FILES["img_dir"]["tmp_name"], $target_file));
            } 


        
	mysqli_query($link,"update user_register set firstname='$_POST[firstname]', lastname='$_POST[lastname]',password='$_POST[password]',role='$_POST[role]', status='$_POST[status]', img_dir='$target_file$_POST[img_dir]' where id=$id")
	or die(mysqli_error($link));
	?>

	     <script type="text/javascript">

             document.getElementById('success').style.display="block";
             setTimeout(function(){
             window.location="user_profile.php";
         },3000);


                  
          
        </script>
        <?php

} 
?>
<?php 
include "../includes/footer.php"
?>