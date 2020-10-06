<?php

include  ('../conn.php');
//include "../includes/header.php"

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Adicionar Usuário</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
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
   
 

      //
      
      
      
        
    </div>
  </div>
</div>

</div>

<?php 

if (isset($_POST["submit1"]))
{

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
        mysqli_query($link,"insert into user_register values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[role]','active')");

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