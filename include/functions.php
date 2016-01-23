<?php
function pdo_open_read() {
    global $db;
	//define database informaiton
	$dsn = 'mysql:dbname=;host=localhost;';
	//database username, this will need to be changed
	$username = '';
	$password = '';
	//attempt to open connection, if connection is not available then give an error
    try {
        $db = new PDO($dsn, $username, $password);
    } catch(PDOException $e) {
        echo "<p>Could not establish database connection.</p>";
    }
}
function pdo_open_admin() {
    global $db;
	//define database informaiton
	$dsn = 'mysql:dbname=;host=localhost;';
	//database username, this will need to be changed
	$username = '';
	//database password, this will need to be changed
    $password = '';
	
    //attempt to open connection, if connection is not available then give an error
    try {
        $db = new PDO($dsn, $username, $password);
    } catch(PDOException $e) {
        echo "<p>Could not establish database connection.</p>";
    }
}
function table_head() {
	//open row
	$tHead = "<tr>";
	$tHead .="
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
	<th>441</th>
	<th>445</th>
	<th>452</th>
	<th>461</th>
	<th>462</th>
	<th>463</th>
	<th>GATAB07</th>
	<th>GATAC4</th>
	<th>GATAA10</th>
	<th>643</th>
	";
	//close row
	$tHead .="</tr>";
	return $tHead;
}
?>