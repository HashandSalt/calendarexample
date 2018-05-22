<?php require_once 'site/snippets/event-caldata.php'; ?>

<?php snippet('header') ?>

<div id="main">

<h1><?= $page->title()->html() ?></h1>

<?php if ($chronos == null): ?>
  <!-- if there are no events -->
  <section class="noevents">
    <article>
      <header>
        <h1>Snap! There are no upcoming events</h1>
      </header>
      <p>Check back soon to find out whats happening</p>
    </article>
  </section>

  <?php else: ?>
  <!-- if there are events -->
  <div class="event-list">
      <div class="main">
          <?php snippet('event-calendar', ['eventroot' => $chronos]) ?>
    	</div>

      <div class="flank">
          <?php snippet('event-subnav', ['navheadertext' => "Upcoming", 'eventroot' => $chronos]) ?>
      </div>

  </div>

<?php endif ?>

</div>


<?php snippet('footer') ?>
