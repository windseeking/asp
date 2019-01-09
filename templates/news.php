<div class="container-fluid py-3 px-5">
  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
  <?php endif; ?>
  <?php if (isset($_SESSION['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['errors']; unset($_SESSION['errors']); ?>
    </div>
  <?php endif; ?>
  <form class="form-inline justify-content-end mb-3">
    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success m-0 ml-2" type="submit">Search</button>
  </form>

  <div class="card-columns">
      <?php foreach ($news as $item): ?>
        <div class="card border-secondary ">
            <?php if (!empty($item['image_path'])): ?>
              <img src="<?= $item['image_path'] ?>" class="card-img-top" alt="<?= $item['title'] ?>">
            <?php endif; ?>
          <div class="card-body">
            <p class="card-text text-muted">
              <small><?= date('d.m.Y', strtotime($item['created_at'])) ?></small>
            </p>
            <h5 class="card-title"><?= $item['title'] ?></h5>
            <p class="card-text"><?= $item['text'] ?></p>
            <a href="#" class="badge badge-pill badge-primary"><?= isset($item['category']) ? $item['category'] : ''; ?></a>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
</div>