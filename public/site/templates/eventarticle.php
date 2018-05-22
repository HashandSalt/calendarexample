<?php require_once 'site/snippets/event-caldata.php'; ?>

<?php snippet('header') ?>

<div class="event-list">

<div class="main">
    <h1><?= $page->title()->html() ?></h1>
    <?= $page->eventdetail()->kirbytext() ?>
</div>

<div class="flank">
    <?php snippet('event-calendar', ['eventroot' => $chronos]) ?>
    <?php snippet('event-subnav', ['navheadertext' => "Upcoming", 'eventroot' => $chronos]) ?>
</div>

</div>



<?php snippet('footer') ?>
