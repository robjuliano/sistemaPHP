<?php

include  ('../conn.php');
include "../includes/header.php"

?>



      
      
 


          <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Editar Produto</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nome do Produto :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Nome do Produto" name="product_name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Codigo do produto :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Codigo do produto" name="product_cod"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Fornecedor :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Fabricante" name="company_name"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Peso</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Peso" name="weight" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Dimensões</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Dimensões" name="product_sizes" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tipo</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Tipo" name="product_type" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Estoque</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Estoque" name="product_stock" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Formato</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Formato" name="unit" />
              </div>
            </div>
            

                <div class="alert alert-danger" id="error" style="display: none;" >
                 Produto já existe, escolha outra nome!
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
                  <th>Produto</th>
                  <th>Fornecedor</th>
                  <th>Peso</th>
                  <th>Tipo</th>
                  <th>Dimensões</th>
                  <th>Estoque</th>
                  <th>Editar</th>
                  <th>Remover</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $res=mysqli_query($link,"select * from products");
                while ($row=mysqli_fetch_array($res)) {


                    ?>
                        <tr>
                          <td><?php echo $row["product_name"];?> </td>
                          <td><?php echo $row["company_name"];?> </td>
                          <td><?php echo $row["weight"];?> </td>
                          <td><?php echo $row["product_type"];?> </td>
                          <td> <?php echo $row["product_sizes"];?> </td>
                          <td><?php echo $row["product_stock"];?> </td>
                          <td><a href="edit_product.php?id=<?php echo $row["id"];?>" class="btn btn-success">Editar</a> </td>
                          <td><a href="delete_product.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Deletar</a> </td>
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

    $res=mysqli_query($link,"select * from products where product_name='$_POST[product_name]'");
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
        mysqli_query($link,"insert into products values(NULL,'$_POST[product_name]','$_POST[company_name]','$_POST[unit]','$_POST[product_cod]','$_POST[weight]','$_POST[product_sizes]','$_POST[product_type]','$_POST[product_stock]')");

        ?>
        <script type="text/javascript">

             document.getElementById('success').style.display="block";

              document.getElementById('error').style.display="none";
            
          
        </script>

<script type="text/javascript">

             document.getElementById('success').style.display="block";
             setTimeout(function(){
             window.location="add_product.php";
         },1000);


                  
          
        </script>
        <?php
    }
}


?>




<?php


include "../includes/footer.php";

?>
