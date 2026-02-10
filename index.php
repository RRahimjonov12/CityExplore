<?php

require __DIR__ . '/inc/all.inc.php';


$worldcityrepository = new WorldCityRepository($pdo);

$perPage = 10;
$page = (int)($_GET['page'] ?? 1);

$entries = $worldcityrepository->fetch($perPage, $page);

$countEntries = $worldcityrepository->getCount();

$countPage = ceil($countEntries/$perPage) ?? 1;

render('index.view', [
    'entries' => $entries, 
    'countPage' => $countPage
]);