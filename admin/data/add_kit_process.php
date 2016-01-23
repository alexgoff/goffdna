<?php
$path = $_SERVER['DOCUMENT_ROOT']."/include/functions.php";
include_once($path);

//get read access to database
pdo_open_admin();

global $db;

//statement for adding new row
$stmt = $db->prepare("INSERT INTO `kit` (`family`, `kit`, `ancestor`, `haplogroup`, `393`, `390`, `19`, `391`, `385a`, `385b`, `426`, `388`, `439`, `389i`, `392`, `389ii`, `458`, `459a`, `459b`, `455`, `454`, `447`, `437`, `448`, `449`, `464a`, `464b`, `464c`, `464d`, `464e`, `464f`, `460`, `GATAH4`, `YCAIIa`, `YCAIIb`, `456`, `607`, `576`, `570`, `CDYa`, `CDYb`, `442`, `438`, `531`, `578`, `395S1a`, `395S1b`, `590`, `537`, `641`, `472`, `406S1`, `511`, `425`, `413a`, `413b`, `557`, `594`, `436`, `490`, `534`, `450`, `444`, `481`, `520`, `446`, `617`, `568`, `487`, `572`, `640`, `492`, `565`, `441`, `445`, `452`, `461`, `462`, `463`, `GATAB07`, `GATAC4`, `GATAA10`, `643`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

//execute array, array must be in order of columns
if($stmt->execute(array($_POST['family'],$_POST['kit'],$_POST['ancestor'],$_POST['haplogroup'],$_POST['393/'],$_POST['390/'],$_POST['19/'],$_POST['391/'],$_POST['385a/'],$_POST['385b/'],$_POST['426/'],$_POST['388/'],$_POST['439/'],$_POST['389i/'],$_POST['392/'],$_POST['389ii/'],$_POST['458/'],$_POST['459a/'],$_POST['459b/'],$_POST['455/'],$_POST['454/'],$_POST['447/'],$_POST['437/'],$_POST['448/'],$_POST['449/'],$_POST['464a/'],$_POST['464b/'],$_POST['464c/'],$_POST['464d/'],$_POST['464e/'],$_POST['464f/'],$_POST['460/'],$_POST['GATAH4/'],$_POST['YCAIIa/'],$_POST['YCAIIb/'],$_POST['456/'],$_POST['607/'],$_POST['576/'],$_POST['570/'],$_POST['CDYa/'],$_POST['CDYb/'],$_POST['442/'],$_POST['438/'],$_POST['531/'],$_POST['578/'],$_POST['395S1a/'],$_POST['395S1b/'],$_POST['590/'],$_POST['537/'],$_POST['641/'],$_POST['472/'],$_POST['406S1/'],$_POST['511/'],$_POST['425/'],$_POST['413a/'],$_POST['413b/'],$_POST['557/'],$_POST['594/'],$_POST['436/'],$_POST['490/'],$_POST['534/'],$_POST['450/'],$_POST['444/'],$_POST['481/'],$_POST['520/'],$_POST['446/'],$_POST['617/'],$_POST['568/'],$_POST['487/'],$_POST['572/'],$_POST['640/'],$_POST['492/'],$_POST['565/'],$_POST['441/'],$_POST['445/'],$_POST['452/'],$_POST['461/'],$_POST['462/'],$_POST['463/'],$_POST['GATAB07/'],$_POST['GATAC4/'],$_POST['GATAA10/'],$_POST['643/']))) {
    header("location: /admin/index.php?action=addkit&status=success");
    die();
} else {
    header("location: /admin/index.php?action=addkit&status=failure");
    die();
}
?>