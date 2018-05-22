<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

  <?= css('/assets/css/site.css') ?>
  <?= js('/assets/js/site.js') ?>
</head>
<body>

<header id="site-header">
  <nav class="header-bar">
    <?php snippet('nav-pagelist') ?>
  </nav>
</header>
