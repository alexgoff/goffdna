<?php
if (isset($_GET['status']) && $_GET['status']=="success") {
    echo "<h3>Kit successfully deleted.</h3>";
} elseif(isset($_GET['status']) && $_GET['status']=="failure") {
    echo "<h3>Kit failed to delete.</h3>";
}
?>