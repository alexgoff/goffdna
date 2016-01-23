<?php
$path = $_SERVER['DOCUMENT_ROOT']."/include/functions.php";
include_once($path);

//get read access to database
pdo_open_admin();

global $db;

$id = $_POST['family'];

$sql = "DELETE FROM family WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);

if($stmt->execute()) {
    header("location: /admin/index.php?action=deletefamily&status=success");
   die(); 
} else {
    header("location: /admin/index.php?action=deletefamily&status=failure");
    die(); 
}
?>