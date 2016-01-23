<?php
//get families for editing
$stmt = $db->query('SELECT id, family FROM family');
$families = $stmt->fetchAll(PDO::FETCH_NUM);

$stmt = $db->query('DESCRIBE kit');
$stmt->execute();
$tableFields = $stmt->fetchAll(PDO::FETCH_COLUMN);

if(isset($_POST['deletekit'])) {
    $id = $_POST['family'];
    $stmt = $db->prepare('SELECT family FROM family WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $familyName = $stmt->fetchAll(PDO::FETCH_NUM);
    
    $stmt = $db->prepare('SELECT kit FROM kit WHERE family = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $kits = $stmt->fetchAll(PDO::FETCH_NUM);
    echo "
        <form method='post' action='data/delete_kit_process.php' name='deletekit'>
            <div class='row'>
                <h3>Select a kit to delete</h3>
            </div>
            <div class='row'>
                <div class='six columns'>
                    <label for='family'>Family</label>
                    <select disabled id='family' name='family' class='u-full-width'>
                        ";
    echo '<option value='.$id.'>'.$familyName[0][0].'</option>';
    echo                "
                    </select>
                </div>
                <div class='six columns'>
                    <label for 'kit'>Kit</label>
                    <select id='kit' name='kit'>";
    foreach($kits as $row) {
        echo '<option value='.$row[0].'>'.$row[0].'</option>';
    }
    echo"       </select>
                </div>
            </div>
            <div class='row'>
                <div class='six columns'>
                    <h4>Warning: Deleting kits is permanent and cannot be undone</h4>
                    <input type='submit' class='button-primary' name='submitdelete' id='submitdelete' value='Delete'>
                    <a class='button' href='index.php'>Cancel</a>

                </div>
            </div>
        </form>    
    ";
} else {
    echo "
        <form method='post' action='index.php?action=deletekit' name='deletekit'>
            <div class='row'>
                <h3>Select a family</h3>
            </div>
            <div class='row'>
                <div class='six columns'>
                    <label for='family'>Family</label>
                    <select name='family' id='family' class='u-full-width'>
                        ";
                        foreach($families as $family) {
                            echo '<option value='.$family[0].'>'.$family[1].'</option>';
                        }
    echo                "
                    </select>
                </div>
            </div>
            <div class='row'>
                <div class='six columns'>
                    <input class='button' type='submit' name='deletekit' id='deletekit' value='Select Family'>
                    <a class='button' href='index.php'>Cancel</a>
                </div>
            </div>
        </form>    
    ";
}
?>
