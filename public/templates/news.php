<div class="container-fluid p-3 px-md-5">

    <?php require('bar.php'); ?>

    <?php if ($news): ?>
      <div class="card-columns">
          <?php foreach ($news as $item): ?>
            <div class="card border-secondary">
                <?php if (!empty($item['image_path'])): ?>
                  <img src="<?= $item['image_path'] ?>" class="card-img-top" alt="<?= $item['title'] ?>">
                <?php endif; ?>
              <div class="card-body">
                <p class="card-text text-muted">
                  <small><?= date('d.m.Y', strtotime($item['created_at'])) ?></small>
                </p>
                <h5 class="card-title"><?= $item['title'] ?></h5>
                <p class="card-text"><?= $item['text'] ?></p>
                <a href="http://asp/news?cat=<?= $item['cat']; ?>"
                   class="badge badge-pill badge-primary"><?= isset($item['cat']) ? $item['cat'] : ''; ?></a>
              </div>
                <?php if (isset($_SESSION['user'])): ?>
                  <div class="card-footer text-right">
                      <span style="font-size: 1em; color: orangered;"><i
                          class="far fa-trash-alt delete-item"></i></span>
                    <span style="font-size: 1em; color: forestgreen; margin-left: 10px;"><i
                        class="far fa-edit edit-item"></i></span>
                  </div>
                <?php endif; ?>
            </div>
          <?php endforeach; ?>
      </div>

    <?php else: ?>

      <div class="col-12 col-md-6 mx-auto p-5">
        <h2 class="display-4 text-center">Nothing found according to you request</h2>
      </div>

    <?php endif; ?>

</div>
