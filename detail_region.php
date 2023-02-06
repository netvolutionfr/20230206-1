<?php
require_once 'db.php';
require_once 'Region.php';
require_once 'Department.php';

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
            echo $departement->name . '<br>';
        }
    }
}
