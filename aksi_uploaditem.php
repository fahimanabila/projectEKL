<?php 
include 'koneksi.php';

if(isset($_GET['type'])){
    $type = $_GET['type'];
    if($type == "1"){
      
// echo "<pre>"; print_r($_POST); exit();
$upload_date = $_POST['upload_date'];
$upload_by = $_POST['upload_by'];
$name_item = $_POST['name_item'];
$cost_price = $_POST['cost_price'];
$currency = $_POST['currency'];
$price_item = $_POST['price_item'];
$warranty_item = $_POST['warranty_item'];
$warranty_type = $_POST['warranty_type'];
$desc_item = $_POST['desc_item'];
$submit = $_POST['submit'];

mysql_query("INSERT INTO invoice_detail VALUES('','$name_item','$price_item','$cost_price', '$currency', '$warranty_item', '$warranty_type', '$desc_item', '$upload_date', '$upload_by', '$upload_date', '$upload_by')");
 
header("location:upload_item.php?pesan=input");

 	}else if ($type == "2"){
// echo "<pre>"; print_r($_POST); exit();
 		// $id = implode(glue, pieces)

$id = $_POST['btnDelete'];
mysql_query("DELETE from invoice_detail where id='$id'");
 
header("location:upload_item.php?pesan=delete");

 	}
  }
?>