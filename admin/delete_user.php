<?php 
include "../conn.php";

$id=$_GET["id"];
mysqli_query($link, "delete from user_register where id=$id");

?>
			<script type="text/javascript">

	             window.location="add_new.php";
	             
	         </script>


