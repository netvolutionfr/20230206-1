<?php

class City
{
    public int $id;
    public string|null $insee_code;
    public string|null $zip_code;
    public string $name;
    public string $slug;
    public float $gps_lat;
    public float $gps_lng;
    public Department $department;
}