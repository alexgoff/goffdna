<?php
    //print page header
    $stmt = $db->query('SELECT content FROM content WHERE id = 1');
    $frontpageContent = $stmt->fetchAll(PDO::FETCH_BOTH);
    echo html_entity_decode($frontpageContent[0][0]);
    echo "<h3>Select a family to view:</h3>";
    echo "<ul>";
    
    //get all families and ID's from database
    $stmt = $db->query('SELECT id, family FROM family');
    $results = $stmt->fetchAll(PDO::FETCH_BOTH);
    
    $db = null;
    
    //print all families in database to list
    echo "<div id='family-list'>";
    foreach ($results as $row) {
        $id = $row[0];
        $name = $row[1];
        
        echo "<li><a href='index.php?id=".$id."'>".$name."</a></li>";
    }
    echo "</ul>";
    echo "</div>";
?>