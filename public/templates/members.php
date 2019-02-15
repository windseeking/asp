<div class="container-fluid py-3 px-5">

    <?php require('bar.php');?>

    <?php if ($members): ?>
      <div class="row">
          <?php foreach ($members as $member) : ?>
            <div class="col-12 col-md-4 col-lg-3 mb-4 card-group">
              <div class="card border-secondary">
                  <?php if (!empty($member['image_path']) ? $member['image_path'] : $member['image_path'] = 'https://www.woodfordoil.com/wp-content/uploads/2018/02/placeholder.jpg') {
                      ;
                  } ?>
                <img src="<?= $member['image_path']; ?>" class="card-img-top" alt="<?= $member['image_path']; ?>"
                     style="max-height: 200px">
                <div class="card-body">
                  <h5 class="card-title"><?= $member['name']; ?></h5>
                  <p class="card-text"><?= $member['activities']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <?php if (!empty($member['phone'])): ?>
                      <li class="list-group-item"><a href="tel:<?= $member['phone']; ?>"><?= $member['phone']; ?></a>
                      </li>
                    <?php endif; ?>
                    <?php if (!empty($member['email'])): ?>
                      <li class="list-group-item"><a href="mailto:<?= $member['email']; ?>"><?= $member['email']; ?></a>
                      </li>
                    <?php endif; ?>
                    <?php if (!empty($member['address'])): ?>
                      <li class="list-group-item">
                            <span style="font-size: 1em; color: Dodgerblue;">
                                <i class="far fa-compass"></i>
                            </span>
                          <?= $member['address']; ?>
                      </li>
                    <?php endif; ?>
                </ul>
                  <?php if (!empty($member['website'])): ?>
                    <div class="card-footer">
                      <a href="<?= $member['website']; ?>" class="btn btn-outline-primary btn-block">Learn more »</a>
                    </div>
                  <?php endif; ?>
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
