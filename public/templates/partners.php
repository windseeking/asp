<div class="container-fluid p-3 px-md-5">

    <?php require('bar.php');?>

    <?php if ($partners): ?>
      <div class="row">
          <?php foreach ($partners as $partner) : ?>
            <div class="col-12 col-md-4 col-lg-3 mb-4 card-group">
              <div class="card border-secondary">
                <img src="<?= $partner['image_path']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $partner['name']; ?></h5>
                  <p class="card-text"><?= $partner['description']; ?></p>
                </div>
                <div class="card-footer">
                  <a href="<?= $partner['link']; ?>" class="btn btn-outline-primary btn-block">Learn more »</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-12 col-md-6 mx-auto p-5">
          <h2 class="display-4 text-center">Nothing found according to you request</h2>
        </div>
      </div>
    <?php endif; ?>
</div>