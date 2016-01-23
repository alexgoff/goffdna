<?php
//get families for editing
$stmt = $db->query('SELECT id, family FROM family');
$families = $stmt->fetchAll(PDO::FETCH_NUM);

$stmt = $db->query('DESCRIBE kit');
$stmt->execute();
$tableFields = $stmt->fetchAll(PDO::FETCH_COLUMN);

if(isset($_POST['editkit'])) {
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
        <form method='post' action='index.php?action=editkit' name='editkit'>
            <div class='row'>
                <h3>Select a kit to edit</h3>
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
                    <input type='submit' class='button-primary' name='submitkit' id='submitkit'>
                    <a class='button' href='index.php'>Cancel</a>
                </div>
            </div>
        </form>    
    ";
} elseif(isset($_POST['submitkit'])) {
    //get selected kit
    $stmt = $db->prepare('SELECT * FROM kit WHERE kit = :kit');
    $stmt->bindParam(':kit', $_POST['kit']);
    $stmt->execute();
    $kitInfo = $stmt->fetchAll(PDO::FETCH_NUM);
?>
<form method="post" action="data/edit_kit_process.php" name="editkit">
    <div class="row">
        <h3>Kit Data</h3>
    </div>
    <div class="row">
        <div class="twelve columns">
            <label for="family">Family</label>
            <select name="family" id="family">
                <?php
                $id = $kitInfo[0][0];
                echo "<option value=".$id." selected='selected'>".$families[--$id][1]."</option>";
                foreach($families as $family) {
                    echo "<option value=".$family[0].">".$family[1]."</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="kit">Kit ID</label>
            <input id="kit" class="u-full-width" type="text" name="kit" value="<?php echo $kitInfo[0][1]?>" required/>
        </div>
        <div class="four columns">
            <label for="ancestor">Common Ancestor</label>
            <input id="ancestor" class="u-full-width" type="text" name="ancestor" value="<?php echo $kitInfo[0][2]?>" required/>
        </div>
        <div class="four columns">
            <label for="haplogroup">Haplogroup</label>
            <input id="haplogroup" class="u-full-width" type="text" name="haplogroup" value="<?php echo $kitInfo[0][3]?>" required />            
        </div>
    </div>
    <div class="row">
        <h3>Chromosomes</h3>
    </div>
    <div class="row">
        <?php
        $i = 4;
        $counter = 1;
        do {
            $column = $tableFields[$i];
            $value = $kitInfo[0][$i];
            $stripvalue = str_replace('/','',$value);
            echo "
            <div class='one column'>
                <label for=".$column.">".$column."</label>
                <input id=".$column." class='u-full-width' type='text' name=".$column." value=".$stripvalue." />
            </div>";
            if ($counter == 12) {
                echo "
                </div><div class='row'>";
                $counter = 0;
            }
            $counter++;
            $i++;
        } while ($i < 83);     
        ?>
    </div>
    <div class="row">
        <input type="hidden" name="kitold" id="kitold" value="<?php echo $kitInfo[0][1]?>">
        <input type="submit" class="button-primary" id="addkit" name="addkit" value="Update">
        <a class="button" href="index.php">Cancel</a>
    </div>
</form>
<?php
} else {
    echo "
        <form method='post' action='index.php?action=editkit' name='editkit'>
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
                    <input class='button' type='submit' name='editkit' id='editkit' value='Select Family'>
                    <a class='button' href='index.php'>Cancel</a>
                </div>
            </div>
        </form>    
    ";
}
?>
