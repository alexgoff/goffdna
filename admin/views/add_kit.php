<?php
//get families for editing
$stmt = $db->query('SELECT id, family FROM family');
$families = $stmt->fetchAll(PDO::FETCH_NUM);

$stmt = $db->query('DESCRIBE kit');
$stmt->execute();
$tableFields = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>
<form method="post" action="data/add_kit_process.php" name="addkit">
    <div class="row">
        <h3>Kit Data</h3>
    </div>
    <div class="row">
        <div class="twelve columns">
            <label for="family">Family</label>
            <select name="family" id="family">
                <?php
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
            <input id="kit" class="u-full-width" type="text" name="kit" placeholder="0000000" required/>
        </div>
        <div class="four columns">
            <label for="ancestor">Common Ancestor</label>
            <input id="ancestor" class="u-full-width" type="text" name="ancestor" placeholder="set to 'Reference' to use as family reference kit" required/>
        </div>
        <div class="four columns">
            <label for="haplogroup">Haplogroup</label>
            <input id="haplogroup" class="u-full-width" type="text" name="haplogroup" required />            
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
            echo "
            <div class='one column'>
                <label for=".$column.">".$column."</label>
                <input id=".$column." class='u-full-width' type='text' name=".$column."/>
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
        <input type="submit" class="button-primary" id="addkit" name="addkit">
        <a class="button" href="index.php">Cancel</a>
    </div>
</form>