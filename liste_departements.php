<?php
require_once 'db.php';

// On récupère tous les départements
if (isset($db)) {
    echo "<h1>Liste des départements</h1>";
    $sql = 'SELECT * FROM departments ORDER BY name';
    $stmt = $db->query($sql);
    $departments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Department');
    foreach ($departments as $department) {
        echo '<a href="detail_department.php?code_department=' . $department->code . '">' . $department->name . '</a><br>';
    }
}
