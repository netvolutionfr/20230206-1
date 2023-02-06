<?php
require_once 'db.php';

if (isset($_GET['code_department'])) {
    $code_departement = $_GET['code_department'];
    $sql = 'SELECT * FROM departments WHERE code = :code_departement';
    $stmt = $db->prepare($sql);
    $stmt->execute(['code_departement' => $code_departement]);
    $departement = $stmt->fetchObject('Department');
    if ($departement) {
        echo '<h1>' . $departement->name . '</h1>';

        $region = $departement->getRegion();
        echo '<h2>Région: ' . $region->name . '</h2>';

        $cities = $departement->getCities();
        foreach ($cities as $city) {
            echo $city->zip_code . " - " . $city->insee_code . " - " . $city->name . '<br>';
        }
    }
}