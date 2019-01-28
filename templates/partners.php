<div class="container-fluid py-3 px-5">
  <div class="row justify-content-between align-items-center">
    <div class="col-12 col-sm-7 col-md-6 col-lg-3">
        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success" role="alert">
              <?= $_SESSION['success'];
              unset($_SESSION['success']); ?>
          </div>
        <?php endif; ?>
    </div>

      <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['errors'];
            unset($_SESSION['errors']); ?>
        </div>
      <?php endif; ?>
    <div class="col-12 col-sm-5 col-md-6">
      <form class="form-inline justify-content-end mb-3">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success m-0 ml-2 xs-hide sm-hide" type="submit">Search</button>
      </form>
    </div>
  </div>
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
</div>