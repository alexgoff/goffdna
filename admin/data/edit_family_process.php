<?php
$path = $_SERVER['DOCUMENT_ROOT']."/include/functions.php";
include_once($path);

//get read access to database
pdo_open_admin();

global $db;

$id = $_POST['id'];
$family = $_POST['familyname'];
$description = $_POST['familydescription'];

$sql = "UPDATE family SET family = :family, description = :description WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->bindValue(':family', $family);
$stmt->bindValue(':description', $description);

if($stmt->execute()) {
    header("location: /admin/index.php?action=editfamily&status=success");
    die();
} else {
    header("location: /admin/index.php?action=editfamily&status=failure");
    die();
}
?>