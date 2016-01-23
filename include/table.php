<?php
//store GET as variable
$id = $_GET['id'];

//home button
$home = "<p><a href='index.php' class='button'>Return to home</a></p>";

//get family info and kit members
$stmt = $db->prepare('SELECT description, family FROM family WHERE id = :id');
$stmt->bindParam(':id', $id);
$stmt->execute();

//retrieve results
$results = $stmt->fetchAll(PDO::FETCH_BOTH);

//print description of family
echo "<h4>Family: ".$results[0]['family']."</h4>";
echo $results[0]['description'];

//get kit members
$stmt = $db->prepare('SELECT * FROM kit WHERE family = :id');
$stmt->bindParam(':id', $id);
$stmt->execute();

//retrieve results
$results = $stmt->fetchAll(PDO::FETCH_NUM);	

$db = null;

//store first row as reference
$reference = $results[0];

//begin outputting data
//echo table
echo "
    <table id='family' class='display compact'>
        <thead>";
//function to output table heads
echo table_head();
echo "	
        </thead>
        <tbody>";
//output table body
foreach($results as $row) {
    //open row
    echo "<tr>";
    //set counter equal to one, item 0 in array is family id #
    $i = 1;
    do {
        if ($row[$i] == 0 || $reference[$i] == 0 && $i > 3) {
            echo "<td>".$row[$i]."</td>";
        } elseif($row[$i] !== $reference[$i] && $i > 3) {
            echo "<td class='highlight'>".$row[$i]."</td>";
        } else {
            echo "<td>".$row[$i]."</td>";
        }
        $i++;
    //maximum number of values in table
    } while ($i < 83);
    //close row
    echo "</tr>";
}
echo "
        </tbody>
    </table>
";
echo $home;
?>