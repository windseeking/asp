<?php if (isset($navbar)): ?>
<div class="collapse navbar-collapse" id="navbarResponsive">
  <ul class="navbar-nav ml-auto ">
    <?php foreach ($navbar as $value): ?>
    <li class="nav-item">
      <a class="<?= $value['class']; ?>" href="<?= $value['link']; ?>"><?= $value['title']; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>