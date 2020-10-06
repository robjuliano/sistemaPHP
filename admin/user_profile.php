<?php

include  ('../conn.php');
include "../includes/header.php"

?>



      
      
 


          <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Adicionar Usuário</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal" enctype='multipart/form-data' >
            <div class="control-group">
              <label class="control-label">Nome :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Nome" name="firstname" required="true" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sobre nome :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Sobre nome " name="lastname" required="true" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Usuário :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Usuário" name="username" required="true" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Senha</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Insira a senha" name="password" required="" />
              </div>
            </div>

            <!--IMAGE INPUT-->

           
            <div class="control-group">
              <label class="control-label">Imagem</label>
              <div class="controls">
                <input type="file"  class="span11" id="file" placeholder="Selecione sua imagem" name="fileupload" />

              </div>
            </div>

            <!-- END IMAGE INPUT -->

           
            <div class="control-group">
              <label class="control-label">Select rule</label>
              <div class="controls">
                <select class="span11"  name="role" >
                <option>User</option>
                <option>Admin</option>
               </select>
              </div>
            </div> 

                <div class="alert alert-danger" id="error" style="display: none;" >
                 Usuario já existe, escolha outra nome!
                 </div>

                 <div class="alert alert-success" id="success" style="display: none;" >
                 Cadastro realizado com sucesso!
                 </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>
               
               

          </form>
        </div>
      </div>
     
<!-- TABLE -->

<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Sobrenome</th>
                  <th>Usuario(s)</th>
                  <th>Tipo</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th>Editar</th>
                  <th>Deletar</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $res=mysqli_query($link,"select * from user_register");
                while ($row=mysqli_fetch_array($res)) {


                    ?>
                        <tr>
                          <td><?php echo $row["firstname"];?> </td>
                          <td><?php echo $row["lastname"];?> </td>
                          <td><?php echo $row["username"];?> </td>
                          <td><?php echo $row["role"];?> </td>
                          <td> <?php echo $row["status"];?> </td>
                          <td><img src="<?php echo $row["img_dir"];?> " width="15%"> </td>
                          <td><a href="edit_user_profile.php?id=<?php echo $row["id"];?>" class="btn btn-success">Editar</a> </td>
                          <td><a href="delete_user.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Deletar</a> </td>
                        </tr>
                
                    <?php




                }
              
                ?>
               
              </tbody>
            </table>
          </div>
<!-- END TABLE -->

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
        $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);        

        if (!file_exists($_FILES["fileupload"]["tmp_name"])) {
            // Validation goes here
        } 
        else
         {
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file));
            } 
        

                   
    $res=mysqli_query($link,"select * from user_register where username ='$_POST[username]'");
    $count=mysqli_num_rows($res);

              
              
             


                


    if ($count>0)
    {
        ?>
        <script type="text/javascript">
             document.getElementById('success').style.display="none";
            document.getElementById('error').style.display="block";
        </script>

        <?php
    }

    else{
      
     

        mysqli_query($link,"insert into user_register values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[role]','active','$target_file')");

        ?>
        <script type="text/javascript">

             document.getElementById('success').style.display="block";

              document.getElementById('error').style.display="none";
            
          
        </script>
           <script type="text/javascript">

                       document.getElementById('success').style.display="block";
                       setTimeout(function(){
                       window.location="user_profile.php";
                   },1500);
          </script>
        <?php
    }

}


?>




<?php


include "../includes/footer.php";

?>

