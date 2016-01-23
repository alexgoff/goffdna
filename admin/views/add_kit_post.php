<?php
if (isset($_GET['status']) && $_GET['status']=="success") {
    echo "<h3>Kit successfully added.</h3>";
} elseif(isset($_GET['status']) && $_GET['status']=="failure") {
    echo "<h3>Kit failed to add, check to make sure the kit does not already exist.</h3>";
}
?>