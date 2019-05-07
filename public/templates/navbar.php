<?php if (isset($navbar)): ?>
  <ul class="navbar-nav">
      <?php foreach ($navbar as $value): ?>
        <li class="nav-item">
          <a class="<?= $value['class']; ?>" href="<?= $value['link']; ?>"><?= $value['title']; ?></a>
        </li>
      <?php endforeach; ?>
  </ul>
<?php endif; ?>

