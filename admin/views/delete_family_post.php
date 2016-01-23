<?php
if (isset($_GET['status']) && $_GET['status']=="success") {
    echo "<h3>Family successfully deleted.</h3>";
} elseif(isset($_GET['status']) && $_GET['status']=="failure") {
    echo "<h3>Family failed to delete.</h3>";
}
?>