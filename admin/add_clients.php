<?php

include  ('../conn.php');
include "../includes/header.php"

?>



      
      
 

          <div class="span12">
      <div class="widget-box ">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Adicionar Cliente</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nome Completo :</label>
              <div class="controls" >
                <input type="text" class="span11" placeholder="Nome Completo" name="client_name" required="true" />

              </div>
            </div>
            <div class="control-group" >
              <label class="control-label">Email :</label>
              <div class="controls" >
                <input type="email" class="span11" placeholder="Email " name="client_email"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Endereço :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Endereço" name="client_address"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Telefone :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Telefone" name="client_tel" />
              </div>
            </div>
           
           
                <div class="alert alert-danger" id="error" style="display: none;" >
                 Cliente já existe, escolha outra nome!
                 </div>

                 <div class="alert alert-success" id="success" style="display: none;" >
                 Cadastro realizado com sucesso!
                 </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Adicionar</button>
            </div>
               
               

          </form>
        </div>
      </div>
     
<!-- TABLE -->

<div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome completo</th>
                  <th>Email</th>
                  <th>Endereço</th>
                  <th>telefone</th>
                  <th>Status</th>
                  <th>Editar</th>
                  <th>Deletar</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $res=mysqli_query($link,"select * from clients");
                while ($row=mysqli_fetch_array($res)) {


                    ?>
                        <tr>
                          <td><?php echo $row["client_name"];?> </td>
                          <td><?php echo $row["client_email"];?> </td>
                          <td><?php echo $row["client_address"];?> </td>
                          <td><?php echo $row["client_tel"];?> </td>
                          <td> <?php echo $row["status"];?> </td>
                          <td><a href="edit_client.php?id=<?php echo $row["id"];?>" class="btn btn-success">Editar</a> </td>
                          <td><a href="delete_client.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Deletar</a> </td>
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

    $res=mysqli_query($link,"select * from clients where client_name='$_POST[client_name]'");
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
        mysqli_query($link,"insert into clients values(NULL,'$_POST[client_name]','$_POST[client_email]','$_POST[client_address]','$_POST[client_tel]','active')");

        ?>
        <script type="text/javascript">

             document.getElementById('success').style.display="block";

              document.getElementById('error').style.display="none";
            
          
        </script>
        <script type="text/javascript">

             document.getElementById('success').style.display="block";
             setTimeout(function(){
             window.location="add_clients.php";
         },1500);


                  
          
        </script>

        <?php
    }
}


?>




<?php


include "../includes/footer.php";

?>
