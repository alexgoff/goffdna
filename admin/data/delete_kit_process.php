<?php
$path = $_SERVER['DOCUMENT_ROOT']."/include/functions.php";
include_once($path);

//get read access to database
pdo_open_admin();

global $db;

$id = $_POST['kit'];

$sql = "DELETE FROM kit WHERE kit = :kit";
$stmt = $db->prepare($sql);
$stmt->bindParam(':kit', $id);

if($stmt->execute()) {
    header("location: /admin/index.php?action=deletekit&status=success");
   die(); 
} else {
    header("location: /admin/index.php?action=deletekit&status=failure");
    die(); 
}
?>