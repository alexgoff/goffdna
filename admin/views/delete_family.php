<?php
//get families for editing
$stmt = $db->query('SELECT id, family FROM family');
$families = $stmt->fetchAll(PDO::FETCH_NUM);

?>
<form method='post' action='data/delete_family_process.php' name='deletefamily'>
    <div class='row'>
        <h3>Select a family to delete</h3>
    </div>
    <div class='row'>
        <div class='six columns'>
            <label for='family'>Family</label>
            <select name='family' id='family' class='u-full-width'>
                <?php
                foreach($families as $family) {
                    echo '<option value='.$family[0].'>'.$family[1].'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class='row'>
        <div class='six columns'>
            <h4>Warning: Deleting families is permanent and cannot be undone</h4>
            <input class='button-primary' type='submit' name='deletefamily' id='deletefamily' value='Delete Family'>
            <a class='button' href='index.php'>Cancel</a>
        </div>
    </div>
</form>    
