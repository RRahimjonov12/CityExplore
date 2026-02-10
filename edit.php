<?php

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Edit city"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required';
    exit;
}

$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

// Verify password (replace with your actual password)
if ($username !== 'admin' || !password_verify($password, '$2y$10$9UApMb.9YVXa6E35cyNRU.bAhsz5yYAIv00CAVxsTXtWl88XnKFfO')) {
    header('HTTP/1.0 401 Unauthorized');
    echo 'Invalid credentials';
    exit;
}


require __DIR__ . '/inc/all.inc.php';

$id = (int)($_GET['id'] ?? 0); 

$worldcityrepository = new WorldCityRepository($pdo);

$model = $worldcityrepository->fetchById($id);

if(empty($model)){
    header('Location: index.php');
    exit;
}


if(!empty($_POST)){
    $country = (string) $_POST['country'] ?? 0;
    $cityAscii = (string) $_POST['cityAscii'] ?? 0;
    $city = (string) $_POST['city'] ?? 0;
    $population = (int) $_POST['population'] ?? 0;

    if(
        empty($country) ||
        empty($cityAscii) ||
        empty($city) ||
        empty($population)
    ){
        header('Location: index.php');
        exit;
    }

    $model = $worldcityrepository->update($id, [
        'country' => $country,
        'cityAscii' => $cityAscii,
        'city' => $city,
        'population' => $population
    ]);

    header('Location: city.php?'. http_build_query(['id' => $id]).'');
    exit;
}

render('edit.view', ['city' => $model]);