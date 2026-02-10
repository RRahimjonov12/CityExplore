<?php

require __DIR__ . '/inc/all.inc.php';

$id = (int)($_GET['id'] ?? 0); 

$worldcityrepository = new WorldCityRepository($pdo);

$city = $worldcityrepository->fetchById($id);

if(empty($city)){
    header('Location: index.php');
    exit;
}



render('city.view', ['city' => $city]);