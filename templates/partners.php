<div class="container-fluid py-3 px-5">
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