<h1>Все новости</h1>

<?php foreach ($news as $key => $value): ?>
    <p><a href="view/<?= $value['slug'];?>"> <?= $value['title'];?></a></p>
<?php endforeach; ?>
