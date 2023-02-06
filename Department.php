<?php

class Department
{
    public int $id;
    public string $code;
    public string $name;
    public string $slug;
    public Region $region;

    public function getRegion(): Region
    {
        global $db;
        $sql = 'SELECT * FROM regions WHERE code = :region_code';
        $stmt = $db->prepare($sql);
        $stmt->execute(['region_code' => $this->region_code]);
        return $stmt->fetchObject('Region');
    }

    public function getCities(): array
    {
        global $db;
        $sql = 'SELECT * FROM cities WHERE department_code = :department_code ORDER BY name';
        $stmt = $db->prepare($sql);
        $stmt->execute(['department_code' => $this->code]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'City');
    }
}
