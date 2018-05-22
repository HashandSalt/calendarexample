<ul>
  <?php foreach ($pages->visible() as $sitenav): ?>
    <li><a <?php e($sitenav->isOpen(), ' class="active"') ?> href="<?= $sitenav->url() ?>"><?= $sitenav->title()->html() ?></a></li>
  <?php endforeach ?>
</ul>
