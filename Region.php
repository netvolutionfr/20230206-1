<?php
require_once 'db.php';

class Region
{
    public int $id;
    public string $code;
    public string $name;
    public string $slug;

    public function getDepartments(): array
    {
        global $db;
        $sql = 'SELECT * FROM departments WHERE region_code = :region_code ORDER BY name';
        $stmt = $db->prepare($sql);
        $stmt->execute(['region_code' => $this->code]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Department');
    }
}