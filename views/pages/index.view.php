<h1>Top 10 cities by population</h1>

<ul>
    <?php foreach($entries as $object): ?>
        <li>
            <a href="city.php?<?= http_build_query(['id' => $object->id]) ?>">
                <?= $object->cityWithCountry() ?>
                <?= $object->getFlag() ?>
            </a>
        </li>
    <?php endforeach;
    ?>
</ul>

<ul class="pagination">
    <?php for($i=1; $i <= $countPage; $i++): ?>
    <li><a href="?<?php echo http_build_query(['page' => $i]); ?>"><?= $i ?></a></li>
    <?php endfor; ?>
</ul>