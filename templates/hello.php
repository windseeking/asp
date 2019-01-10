<div class="container-fluid">
  <div class="row">
    <div class="col-12 p-5">
      <p>
        <span style="font-size: 1em; color: Dodgerblue;">
          <i class="fas fa-user-tie"></i>
        </span>
        Welcome, <b><?= $user['name']; ?></b>
      </p>

      <ul class="nav nav-tabs">
          <?php if (!empty($tabs)): ?>
              <?php foreach ($tabs as $tab): ?>
              <li class="nav-item">
                <a class="nav-link <?php echo ($title == $tab['name']) ? 'active' : ''; ?>"
                   href="<?= $tab['link']; ?>"><?= $tab['title']; ?></a>
              </li>
              <?php endforeach; ?>
          <?php endif; ?>
      </ul>

      <div class="tab-content py-3 col-10 mx-auto" id="myTabContent">
        <div class="tab-pane fade show active" id="news" role="tabpanel"
             aria-labelledby="news-tab"><?= $content; ?>
        </div>
    </div>
  </div>
</div>
