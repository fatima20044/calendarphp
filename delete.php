<?php 
include("dbConfig.php");
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$delete_query = mysqli_query($connt, "delete from reservs where id='$id'");
}
?>