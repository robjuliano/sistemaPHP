<?php 
include '../includes/header.php';
include "../conn.php";
$id=$_GET["id"];
$product_name="";
$company_name="";
$unit="";
$product_cod="";
$weight="";
$product_sizes="";
$product_type="";
$product_stock="";

$res=mysqli_query($link,"select * from products where id=$id");
    while ($row=mysqli_fetch_array($res))
    {
        $product_name=$row["product_name"];
        $company_name=$row["company_name"];
        $unit=$row["unit"];
        $product_cod=$row["product_cod"];
        $weight=$row["weight"];
        $product_sizes=$row["product_sizes"];
        $product_type=$row["product_type"];
        $product_stock=$row["product_stock"];
    }
?>



        	          <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Adicionar Produto</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nome do Produto :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Nome do Produto"  name="product_name" value="<?php echo $product_name ;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Codigo do produto :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Codigo do produto" name="product_cod" value="<?php echo $product_cod ;?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Fornecedor :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fabricante" name="company_name" value="<?php echo $company_name ;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Peso</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Peso" name="weight" value="<?php echo $weight ;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Dimensões</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Dimensões" name="product_sizes" value="<?php echo $product_sizes ;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tipo</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Tipo" name="product_type" value="<?php echo $product_type ;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Estoque</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Estoque" name="product_stock" value="<?php echo $product_stock ;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Formato</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Formato" name="unit"  value="<?php echo $unit ;?>"/>
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
	mysqli_query($link,"update products set product_name ='$_POST[product_name]',product_cod='$_POST[product_cod]',company_name='$_POST[company_name]',weight='$_POST[weight]',product_sizes='$_POST[product_sizes]', product_type='$_POST[product_type]',product_stock='$_POST[product_stock]',unit='$_POST[unit]' where id=$id")
	or die(mysqli_error($link));
	?>

	     <script type="text/javascript">

             document.getElementById('success').style.display="block";
             setTimeout(function(){
             window.location="add_product.php";
         },2000);


                  
          
        </script>
        <?php

} 
?>
<?php 
include "../includes/footer.php"
?>