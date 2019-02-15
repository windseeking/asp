<form method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-12 col-sm-6">
      <div class="form-group">
        <label for="name">Name<sup> *</sup></label>
          <?php $class = isset($errors['name']) ? 'is-invalid' : '';
          $value = isset($partner['name']) ? $partner['name'] : ''; ?>
        <input type="text" class="form-control <?= $class; ?>" id="name" name="partner[name]"
               placeholder="Full name of the partner"
               value="<?= filter_tags($value); ?>">
          <?php if (isset($errors['name'])): ?>
            <div class="invalid-feedback">
                <?= $errors['name']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" name="partner[link]" placeholder="https://site.com"
               value="<?= filter_tags($value); ?>">
          <?php if (isset($errors['link'])): ?>
            <div class="invalid-feedback">
                <?= $errors['link']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-group">
        <p class="mb-2">Image</p>
        <div class="custom-file">
            <?php $class = isset($errors['image_path']) ? 'is-invalid' : ''; ?>
          <input type="file" class="custom-file-input <?= $class; ?>" id="image_path" name="partner[image_path]">
            <?php if (isset($errors['image_path'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['image_path']; ?>
              </div>
            <?php endif; ?>
          <label class="custom-file-label" for="image_path">Choose image</label>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 mb-3">
        <label for="description">Description<sup> *</sup></label>
          <?php $class = isset($errors['description']) ? 'is-invalid' : '';
          $value = isset($partner['description']) ? $partner['description'] : ''; ?>
        <textarea class="form-control <?= $class; ?>" id="description" name="partner[description]" rows="8"
        ><?= filter_tags($value); ?></textarea>
          <?php if (isset($errors['description'])): ?>
            <div class="invalid-feedback">
                <?= $errors['description']; ?>
            </div>
          <?php endif; ?>
    </div>
  </div>

  <button class="btn btn-block btn-outline-primary" type="submit">Add partner</button>
</form>