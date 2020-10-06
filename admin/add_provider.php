<?php

include  ('../conn.php');
include "../includes/header.php"

?>



      
      
 

          <div class="span10">
      <div class="widget-box" id="widget_box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Adicionar Fornecedor</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nome Completo :</label>
              <div class="controls" >
                <input type="text" class="span11" placeholder="Nome Completo" name="provider_name" required="true" />

              </div>
            </div>
            <div class="control-group" >
              <label class="control-label">Email :</label>
              <div class="controls" >
                <input type="email" class="span11" placeholder="Email " name="provider_email"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Endereço :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Endereço" name="provider_address"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Telefone :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Telefone" name="provider_tel" />
              </div>
            </div>
           
           
                <div class="alert alert-danger" id="error" style="display: none;" >
                 Cliente já existe, verifique!
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
                $res=mysqli_query($link,"select * from providers");
                while ($row=mysqli_fetch_array($res)) {


                    ?>
                        <tr>
                          <td><?php echo $row["provider_name"];?> </td>
                          <td><?php echo $row["provider_email"];?> </td>
                          <td><?php echo $row["provider_address"];?> </td>
                          <td><?php echo $row["provider_tel"];?> </td>
                          <td> <?php echo $row["status"];?> </td>
                          <td><a href="#" class="btn btn-success" id="edit_button">Editar</a> </td>
                          <td><a   href="#" class="btn btn-danger" id="delete_button" >Deletar</a> </td>
   
 
                        </tr>

                        <!-- edit MESSAGE-->

 <script>

               document.getElementById('edit_button').onclick = function(){
                        swal({
                          icon: "warning",
                          text: "Deseja realmente editar?",
                          buttons: true,
                          closeOnClickOutside: true,
                          dangerMode: true,
                     

}). then(function(result){
                 if (result){
                  window.location = "/sistema/admin/edit_provider.php?id=<?php echo $row["id"];?>";

                }
 else {
                 window.location = "http://localhost/sistema/admin/add_provider.php";

                }
  
             });
              }

                                                    
 </script>


        <!-- END edit MESSAGE-->
<!-- DELETE MESSAGE-->

 <script>

               document.getElementById('delete_button').onclick = function(){
                        swal({
                          icon: "warning",
                          text: "Deseja realmente excluir?",
                          buttons: true,
                          closeOnClickOutside: true,
                          dangerMode: true,
                     

}). then(function(result){
                 if (result){
                  window.location = "/sistema/admin/delete_provider.php?id=<?php echo $row["id"];?>";

                }
 else {
                 window.location = "http://localhost/sistema/admin/add_provider.php";

                }
  
             });
              }

                                                    
 </script>


        <!-- END DELETE MESSAGE-->


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

    $res=mysqli_query($link,"select * from providers where provider_name='$_POST[provider_name]'");
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
        mysqli_query($link,"insert into providers values(NULL,'$_POST[provider_name]','$_POST[provider_email]','$_POST[provider_address]','$_POST[provider_tel]','active')");

        ?>
        <script type="text/javascript">

             document.getElementById('success').style.display="block";

              document.getElementById('error').style.display="none";
            
          
        </script>
        

        <script type="text/javascript">

             document.getElementById('success').style.display="block";
             setTimeout(function(){
             window.location="add_provider.php";
         },1500);


              
          
        </script>


   


        <?php
    }
}


?>




<?php


include "../includes/footer.php";

?>
