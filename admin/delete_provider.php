<?php 


include "../conn.php";

$id=$_GET["id"];
mysqli_query($link, "delete from providers where id=$id");

?>


			<script type="text/javascript">

	             window.location="add_provider.php";
	             
	         </script>


