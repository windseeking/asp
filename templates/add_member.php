<form method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="name">Name<sup> *</sup></label>
        <?php $class = isset($errors['name']) ? 'is-invalid' : '';
        $value = isset($member['name']) ? $member['name'] : ''; ?>
      <input type="text" class="form-control <?= $class; ?>" id="name" name="member[name]" placeholder="Full name of this company"
             value="<?= filter_tags($value); ?>">
        <?php if (isset($errors['name'])): ?>
          <div class="invalid-feedback">
              <?= $errors['name']; ?>
          </div>
        <?php endif; ?>
    </div>

    <div class="col-md-6 mb-3">
      <label for="activities">Activities<sup> *</sup></label>
        <?php $class = isset($errors['activities']) ? 'is-invalid' : '';
        $value = isset($member['activities']) ? $member['activities'] : ''; ?>
      <input type="text" class="form-control <?= $class; ?>" id="activities" name="member[activities]" placeholder="Activities of this company"
             value="<?= filter_tags($value); ?>">
        <?php if (isset($errors['activities'])): ?>
          <div class="invalid-feedback">
              <?= $errors['activities']; ?>
          </div>
        <?php endif; ?>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="phone">Phone</label>
        <?php $class = isset($errors['phone']) ? 'is-invalid' : '';
        $value = isset($member['phone']) ? $member['phone'] : ''; ?>
      <input type="text" class="form-control <?= $class; ?>" id="phone" name="member[phone]" placeholder="+38 000 000 00 00"
             value="<?= filter_tags($value); ?>">
        <?php if (isset($errors['phone'])): ?>
          <div class="invalid-feedback">
              <?= $errors['phone']; ?>
          </div>
        <?php endif; ?>
    </div>

    <div class="col-md-3 mb-3">
      <label for="email">Email</label>
        <?php $class = isset($errors['email']) ? 'is-invalid' : '';
        $value = isset($member['email']) ? $member['email'] : ''; ?>
      <input type="email" class="form-control <?= $class; ?>" id="email" name="member[email]" placeholder="Email"
             value="<?= filter_tags($value); ?>">
        <?php if (isset($errors['email'])): ?>
          <div class="invalid-feedback">
              <?= $errors['email']; ?>
          </div>
        <?php endif; ?>
    </div>

    <div class="col-md-6 mb-3">
      <label for="address">Address
        <span style="font-size: 1em; color: Dodgerblue;" title="House N, street, district, city, index, country">
          <i class="far fa-question-circle ml-1"></i>
        </span>
      </label>
          <?php $class = isset($errors['address']) ? 'is-invalid' : '';
          $value = isset($member['address']) ? $member['address'] : ''; ?>
        <input type="text" class="form-control <?= $class; ?>" id="address" name="member[address]"
               placeholder="438 Dark Spurt, San Francisco, CA 94528, US"
               value="<?= filter_tags($value); ?>">
          <?php if (isset($errors['address'])): ?>
            <div class="invalid-feedback">
                <?= $errors['address']; ?>
            </div>
          <?php endif; ?>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <p class="mb-2">Image</p>
      <div class="custom-file">
        <?php $class = isset($errors['image_path']) ? 'is-invalid' : ''; ?>
        <input type="file" class="custom-file-input <?= $class; ?>" id="image_path" name="image_path">
          <?php if (isset($errors['image_path'])): ?>
            <div class="invalid-feedback">
                <?= $errors['image_path']; ?>
            </div>
          <?php endif; ?>
        <label class="custom-file-label" for="image_path">Choose image</label>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <label for="website">Website</label>
      <input type="text" class="form-control" id="website" name="member[website]" placeholder="https://site.com"
             value="<?= filter_tags($value); ?>">
        <?php if (isset($errors['website'])): ?>
          <div class="invalid-feedback">
              <?= $errors['website']; ?>
          </div>
        <?php endif; ?>
    </div>
  </div>

  <button class="btn btn-block btn-outline-primary" type="submit">Add member</button>
</form>