<?php
$path = $_SERVER['DOCUMENT_ROOT']."/include/functions.php";
include_once($path);

//get read access to database
pdo_open_admin();

global $db;

$family = $_POST['familyname'];
$description = $_POST['familydesc'];

$sql = "INSERT INTO family (family, description) VALUES (:family, :description)";
$stmt = $db->prepare($sql);
$stmt->bindValue(':family', $family);
$stmt->bindValue(':description', $description);

if($stmt->execute()) {
    header("location: /admin/index.php?action=addfamily&status=success");
    die();
} else {
    header("location: /admin/index.php?action=addfamily&status=failure");
    die();
}
?>