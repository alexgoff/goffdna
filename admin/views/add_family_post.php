<?php
if (isset($_GET['status']) && $_GET['status']=="success") {
    echo "<h3>Family successfully added.</h3>";
} elseif(isset($_GET['status']) && $_GET['status']=="failure") {
    echo "<h3>Family failed to add, check to make sure the family does not already exist.</h3>";
}
?>