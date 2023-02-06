<?php
require_once 'db.php';
require_once 'Region.php';

// Récupération des régions
if (isset($db)) {
    echo "<h1>Liste des régions</h1>";
    $sql = 'SELECT * FROM regions ORDER BY name';
    $stmt = $db->query($sql);
    $regions = $stmt->fetchAll(PDO::FETCH_CLASS, 'Region');
    foreach ($regions as $region) {
        echo '<a href="detail_region.php?code_region=' . $region->code . '">' . $region->name . '</a><br>';
    }
}

