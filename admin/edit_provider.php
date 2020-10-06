<?php 
include '../includes/header.php';
include "../conn.php";
$id=$_GET["id"];
$provider_name="";
$provider_email="";
$provider_address="";
$provider_tel="";
$status="";


$res=mysqli_query($link,"select * from providers where id=$id");
    while ($row=mysqli_fetch_array($res))
    {
        $provider_name=$row["provider_name"];
        $provider_email=$row["provider_email"];
        $provider_address=$row["provider_address"];
        $provider_tel=$row["provider_tel"];
        $status=$row["status"];
   
    }
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
                <input type="text" class="span11" placeholder="Nome Completo" name="provider_name" value="<?php echo $provider_name;?>" required="true" />

              </div>
            </div>
            <div class="control-group" >
              <label class="control-label">Email :</label>
              <div class="controls" >
                <input type="email" class="span11" placeholder="Email " name="provider_email" value="<?php echo $provider_email;?>" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Endereço :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Endereço" name="provider_address" value="<?php echo $provider_address;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Telefone :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Telefone" name="provider_tel" value="<?php echo $provider_tel;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status</label>
              <div class="controls">
                <select class="span11"  name="status">
                <option value="active" <?php if ($status=="active"){echo "selected";}?>>Ativo</option>
                <option value="inactive" <?php if ($status=="inactive"){echo "selected";}?>  >Inativo</option>
               </select>
              </div>
            </div> 
           
                <div class="alert alert-danger" id="error" style="display: none;" >
                 Cliente já existe, escolha outra nome!
                 </div>

                 <div class="alert alert-success" id="success" style="display: none;" >
                 Cadastro realizado com sucesso!
                 </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Editar</button>
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
	mysqli_query($link,"update providers set provider_name ='$_POST[provider_name]',provider_email='$_POST[provider_email]',provider_address='$_POST[provider_address]',provider_tel='$_POST[provider_tel]',status='$_POST[status]' where id=$id")
	or die(mysqli_error($link));
	?>

	     <script type="text/javascript">

             document.getElementById('success').style.display="block";
             setTimeout(function(){
             window.location="add_providers.php";
         },2000);


                  
          
        </script>
        <?php

} 
?>
<?php 
include "../includes/footer.php"
?>