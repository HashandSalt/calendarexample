<?php snippet('header') ?>
<div id="main">
<h1><?= $page->title()->html() ?></h1>
<?= $page->text()->kirbytext() ?>
</div>
<?php snippet('footer') ?>
