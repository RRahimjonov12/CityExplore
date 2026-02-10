<form method="POST" action="edit.php?<?php echo http_build_query(['id' => $city->id]); ?>">

    <label for="country">Country:</label>
    <input type="text" name="country" id="country" value="<?= e($city->country) ?>">

    <label for="cityAscii">City ASCII::</label>
    <input type="text" name="cityAscii" id="cityAscii" value="<?= e($city->cityAscii) ?>">

    <label for="city">City name:</label>
    <input type="text" name="city" id="city" value="<?= e($city->city) ?>">

    <label for="population">Population:</label>
    <input type="text" name="population" id="population" value="<?= e($city->population) ?>">

    <br>
    <input type="submit" value="submit">
</form>

