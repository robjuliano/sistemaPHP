<?php 
include '../includes/header.php';
include "../conn.php";
$id=$_GET["id"];
$client_name="";
$client_email="";
$client_address="";
$client_tel="";
$status="";


$res=mysqli_query($link,"select * from clients where id=$id");
    while ($row=mysqli_fetch_array($res))
    {
        $client_name=$row["client_name"];
        $client_email=$row["client_email"];
        $client_address=$row["client_address"];
        $client_tel=$row["client_tel"];
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
                <input type="text" class="span11" placeholder="Nome Completo" name="client_name" value="<?php echo $client_name;?>" required="true" />

              </div>
            </div>
            <div class="control-group" >
              <label class="control-label">Email :</label>
              <div class="controls" >
                <input type="email" class="span11" placeholder="Email " name="client_email" value="<?php echo $client_email;?>" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Endereço :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Endereço" name="client_address" value="<?php echo $client_address;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Telefone :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Telefone" name="client_tel" value="<?php echo $client_tel;?>" />
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
              <button type="submit" name="submit1" class="btn btn-success">Adicionar</button>
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
	mysqli_query($link,"update clients set client_name ='$_POST[client_name]',client_email='$_POST[client_email]',client_address='$_POST[client_address]',client_tel='$_POST[client_tel]',status='$_POST[status]' where id=$id")
	or die(mysqli_error($link));
	?>

	     <script type="text/javascript">

             document.getElementById('success').style.display="block";
             setTimeout(function(){
             window.location="add_clients.php";
         },2000);


                  
          
        </script>
        <?php

} 
?>
<?php 
include "../includes/footer.php"
?>