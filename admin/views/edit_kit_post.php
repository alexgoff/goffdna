<?php
if (isset($_GET['status']) && $_GET['status']=="success") {
    echo "<h3>Kit successfully updated.</h3>";
} elseif(isset($_GET['status']) && $_GET['status']=="failure") {
    echo "<h3>Kit failed to updated, please check data input.</h3>";
}
?>