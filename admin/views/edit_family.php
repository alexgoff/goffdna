<?php
//get families for editing
$stmt = $db->query('SELECT id, family FROM family');
$families = $stmt->fetchAll(PDO::FETCH_NUM);

if(isset($_POST['submitfamily'])){
$id = $_POST['family'];

$stmt = $db->prepare('SELECT family, description FROM family WHERE id = :id');
$stmt->bindValue(':id', $id);
$stmt->execute();
$family = $stmt->fetchall(PDO::FETCH_NUM);

?>
<form method="post" action="data/edit_family_process.php" name="editfamily">
    <div class="row">
        <div class="six columns">
            <label for="familyname">Family Name</label>
            <input type="text" name="familyname" id="familyname" class="u-full-width" value="<?php echo $family[0][0]; ?>" >
        </div>
    </div>
    <div class="row">
        <div class="twelve columns">
            <label for="familydescription">Family Description</label>
            <textarea id="familydescription" name="familydescription"><?php echo $family[0][1]; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <input type='hidden' name='id' id='id' value='<?php echo $id; ?>'>
            <input class='button-primary' type='submit' name='submiteditfamily' id='submiteditfamily' value='Update Family'>
            <a class='button' href='index.php'>Cancel</a>            
        </div>
    </div>
</form>
<?php
} else {
?>
<form method="post" action="index.php?action=editfamily" name="selectfamily">
    <div class="row">
        <div class="twelve columns">
            <h3>Select a family to edit</h3>
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <label for="family">Family</label>
            <select name="family" id="family" class="u-full-width">
                <?php
                    foreach($families as $family) {
                        echo '<option value='.$family[0].'>'.$family[1].'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <input class='button' type='submit' name='submitfamily' id='submitfamily' value='Select Family'>
            <a class='button' href='index.php'>Cancel</a>            
        </div>
    </div>
</form>
<?php    
}