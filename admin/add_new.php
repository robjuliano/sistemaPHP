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
          <form name="form1" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Nome :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Nome" name="firstname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sobre nome :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Sobre nome " name="lastname"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Usuário :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Usuário" name="username"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Senha</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Insira a senha" name="password" />
              </div>
            </div>

            <!--IMAGE INPUT-->

           
            <div class="control-group">
              <label class="control-label">Imagem</label>
              <div class="controls">
                <input type="file"  class="span11" placeholder="Selecione sua imagem" name="file" />

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
				  <th>Imagem</th>
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
						  <td><img src="<?php echo $row["img_dir"];?>" width="90px" >  </td>
                          <td><a href="edit_user.php?id=<?php echo $row["id"];?>" class="btn btn-success">Editar</a> </td>
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


					$allowTypes = array('jpg','png','jpeg','gif','pdf');
                    
					// Count total files
                     $countfiles = count($_FILES['file']['name']);

                      $filename = $_FILES['file']['name'];
					  $target = 'upload/';
					  $upload = $target.basename($_FILES['file']['name']);
                     
                      // Upload file
					  move_uploaded_file($_FILES['file']['tmp_name'],$upload);


                     
                      
                     

    $res=mysqli_query($link,"select * from user_register where username='$_POST[username]'");
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
        mysqli_query($link,"insert into user_register values(NULL,
		'$_POST[firstname]',
		'$_POST[lastname]',
		'$_POST[username]',
		'$_POST[password]',
		'$_POST[role]',
		'active',
		'$upload')");

        ?>
        <script type="text/javascript">

             document.getElementById('success').style.display="block";

              document.getElementById('error').style.display="none";
            
          
        </script>
           <script type="text/javascript">

                       document.getElementById('success').style.display="block";
                       setTimeout(function(){
                       window.location="add_new.php";
                   },1500);
          </script>
        <?php
    }
}


?>




<?php


include "../includes/footer.php";

?>
