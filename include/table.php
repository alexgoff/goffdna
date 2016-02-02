<?php
//store GET as variable
$id = $_GET['id'];

//home button
$home = '<p><a href="index.php" class="button">Return to home</a></p>';

//get family info and kit members
$stmt = $db->prepare('SELECT description, family FROM family WHERE id = :id');
$stmt->bindParam(':id', $id);
$stmt->execute();

//retrieve results
$familyResults = $stmt->fetchAll(PDO::FETCH_BOTH);

//get kit members
$stmtKit = $db->prepare('SELECT * FROM kit WHERE family = :id');
$stmtKit->bindParam(':id', $id);
$stmtKit->execute();

//retrieve results
$results = $stmtKit->fetchAll(PDO::FETCH_NUM);

//print description of family
echo "<h4>Family: ".$familyResults[0]['family']."</h4>";
echo $familyResults[0]['description'];

//store first row as reference
$reference = $results[0];

//begin outputting data
//echo table
echo '
    <table id="family" class="display compact">
        <thead>
            <tr>
                <th>Kit #</th>
                <th>Earliest Known Ancestor</th>
                <th>Hg</th>
                <th>393</th>
                <th>390</th>
                <th>19</th>
                <th>391</th>
                <th>385a(1)</th>
                <th>385b(1)</th>
                <th>426</th>
                <th>388</th>
                <th>439</th>
                <th>389i</th>
                <th>392</th>
                <th>389ii</th>
                <th>458</th>
                <th>459a</th>
                <th>459b</th>
                <th>455</th>
                <th>454</th>
                <th>447</th>
                <th>437</th>
                <th>448</th>
                <th>449</th>
                <th>464a</th>
                <th>464b</th>
                <th>464c</th>
                <th>464d</th>
                <th>464e(2)</th>
                <th>464f(2)</th>
                <th>460</th>
                <th>GATAH4</th>
                <th>YCAIIa</th>
                <th>YCAIIb</th>
                <th>456</th>
                <th>607</th>
                <th>576</th>
                <th>570</th>
                <th>CDYa</th>
                <th>CDYb</th>
                <th>442</th>
                <th>438</th>
                <th>531</th>
                <th>578</th>
                <th>395S1a</th>
                <th>395S1a</th>
                <th>590</th>
                <th>537</th>
                <th>641</th>
                <th>472</th>
                <th>406S1</th>
                <th>511</th>
                <th>425</th>
                <th>413a</th>
                <th>413b</th>
                <th>557</th>
                <th>594</th>
                <th>436</th>
                <th>490</th>
                <th>534</th>
                <th>450</th>
                <th>444</th>
                <th>481</th>
                <th>520</th>
                <th>446</th>
                <th>617</th>
                <th>568</th>
                <th>487</th>
                <th>572</th>
                <th>640</th>
                <th>492</th>
                <th>565</th>
                <th>462</th>
                <th>452</th>
                <th>445</th>
                <th>A10</th>
                <th>463</th>
                <th>441</th>
                <th>B07</th>
                <th>635</th>
                <th>643</th>
                <th>461</th>
            </tr>
        </thead>
        <tbody>';
  
//output table body
foreach($results as $row) {
    //set counter equal to one, item 0 in array is family id #
    $i = 1;
    //open row
    echo '<tr>';
    do {
        if ($row[$i] == 0 || $reference[$i] == 0 && $i > 3) {
            echo "<td>$row[$i]</td>";
        } elseif($row[$i] !== $reference[$i] && $i > 3) {
            echo "<td class='highlight'>$row[$i]</td>";
        } else {
            echo "<td>$row[$i]</td>";
        }
        $i++;
    //maximum number of values in table
    } while ($i < 83);
    //close row
    echo '</tr>';
}
echo '
        </tbody>
    </table>
';
echo $home;
?>