<?php 
include "../conn.php";

$id=$_GET["id"];
mysqli_query($link, "delete from products where id=$id");

?>
			<script type="text/javascript">

	             window.location="add_product.php";
	             
	         </script>


