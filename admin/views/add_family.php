<?php

?>
<form method="post" action="data/add_family_process.php" name="addfamily">
    <div class="row">
        <div class="twelve columns">
            <h3>Add Family</h3>
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <label for="familyname">Family Name</label>
            <input type="text" name="familyname" id="familyname" class="u-full-width" placeholder="Family name e.g. 1745 Goff (Lee Co., Va, USA)" required>
        </div>
    </div>
    <div class="row">
        <div class="twelve columns">
            <label for="familydesc">Family Description</label>
            <textarea id="familydesc" name="familydesc"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="twelve columns">
            <input type="submit" class="button-primary" id="addfamily" name="addfamily">
            <a class="button" href="index.php">Cancel</a>            
        </div>
    </div>
</form>