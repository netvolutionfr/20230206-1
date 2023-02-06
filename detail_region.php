<?php
require_once 'db.php';

if (isset($_GET['code_region'])) {
    $code_region = $_GET['code_region'];
    $sql = 'SELECT * FROM regions WHERE code = :code_region';
    $stmt = $db->prepare($sql);
    $stmt->execute(['code_region' => $code_region]);
    $region = $stmt->fetchObject('Region');
    if ($region) {
        echo '<h1>' . $region->name . '</h1>';
        $departements = $region->getDepartments();
        foreach ($departements as $departement) {
            echo '<a href="detail_department.php?code_department=' . $departement->code . '">' . $departement->name . '</a><br>';
        }
    }
}
