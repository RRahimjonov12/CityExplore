<?php
/**
 * @var WorldCityModel $city
 */ 
?>
<h1><?= $city->cityWithCountry() ?><?= $city->getFlag() ?></h1>
<table>
    <tbody>
        <tr>
            <th>Country name:</th>
            <td><?= e($city->country) ?></td>
        </tr>
        <tr>
            <th>City ASCII:</th>
            <td><?= e($city->cityAscii) ?></td>
        </tr>
        <tr>
            <th>City name:</th>
            <td><?= e($city->city) ?></td>
        </tr>
        <tr>
            <th>Population:</th>
            <td><?= e($city->population) ?></td>
        </tr>
        <tr>
            <th>ISO2 code of the country:</th>
            <td><?= e($city->iso2) ?></td>
        </tr>
        <tr>
            <th>ISO3 code of the country:</th>
            <td><?= e($city->iso3) ?></td>
        </tr>
        <tr>
            <th>Administrative name (province/region):</th>
            <td><?= e($city->adminName) ?></td>
        </tr>
        <tr>
            <th>Capital status:</th>
            <td><?= e($city->capital ?? '—') ?></td>
        </tr>
        <tr>
            <th>Latitude:</th>
            <td><?= e($city->lat) ?></td>
        </tr>
        <tr>
            <th>Longitude:</th>
            <td><?= e($city->lng) ?></td>
        </tr>
        <tr>
            <th>ID:</th>
            <td><?= e($city->id) ?></td>
        </tr>
    </tbody>
</table>