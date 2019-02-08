<div class="container-fluid">
  <div class="col-10 p-5 mx-auto">
    <h1 class="display-4 text-center">Advantages of being member of the Association</h1>
    <div class="row mt-5">
      <div class="col-12 col-sm-4 text-center">
        <img class="rounded-circle img-fluid d-block mx-auto" style="width: 150px" src="/img/icon-partnership.svg"
             alt="">
        <h3 class="mt-3">Strong partnership<br>
          <small>We know how conventions are important</small>
        </h3>
      </div>

      <div class="col-12 col-sm-4 text-center">
        <img class="rounded-circle img-fluid d-block mx-auto" style="width: 150px" src="/img/icon-safety.svg" alt="">
        <h3 class="mt-3">Safety guarantee<br>
          <small>We carefully sort out partners you work with</small>
        </h3>
      </div>

      <div class="col-12 col-sm-4 text-center">
        <img class="rounded-circle img-fluid d-block mx-auto" style="width: 150px"
             src="/img/icon-business-development.svg" alt="">
        <h3 class="mt-3">Business development<br>
          <small>Your business develops by diplomacy and networking</small>
        </h3>
      </div>
    </div>
  </div>
</div>

<div class="row bg-light">
  <div class="col-10 p-5 mx-auto">
    <h2 class="text-center mb-3">Fill the form below to submit the membership request</h2>
    <form method="post" action="/functions/send.php">
      <div class="form-group">
          <?php $class = isset($membership_request['name']) ? 'is-invalid' : '';
          $value = isset($membership_request['name']) ? $membership_request['name'] : ''; ?>
        <label for="name">Full name of the company</label>
        <input type="text" class="form-control <?= $class; ?>" id="name" name="membership_request[name]"
               value="<?= filter_tags($value); ?>">
          <?php if (isset($errors['name'])): ?>
            <div class="invalid-feedback">
                <?= $errors['name']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
            <?php $class = isset($membership_request['trade_number']) ? 'is-invalid' : '';
            $value = isset($membership_request['trade_number']) ? $membership_request['trade_number'] : ''; ?>
          <label for="trade_number">Trade register number</label>
          <input type="text" class="form-control <?= $class; ?>" id="trade_number"
                 name="membership_request[trade_number]" value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['trade_number'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['trade_number']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <?php $class = isset($membership_request['business_ID']) ? 'is-invalid' : '';
            $value = isset($membership_request['business_ID']) ? $membership_request['business_ID'] : ''; ?>
          <label for="business_ID">Y-tunnus (Business ID)</label>
          <input type="text" class="form-control <?= $class; ?>" id="business_ID" name="membership_request[business_ID]"
                 value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['business_ID'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['business_ID']; ?>
              </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group">
          <?php $class = isset($membership_request['official_address']) ? 'is-invalid' : '';
          $value = isset($membership_request['official_address']) ? $membership_request['official_address'] : ''; ?>
        <label for="official_address">Official address</label>
        <input type="text" class="form-control <?= $class; ?>" id="official_address"
               name="membership_request[official_address]" value="<?= filter_tags($value); ?>"
               placeholder="438 Dark Spurt, San Francisco, CA 94528, US">
          <?php if (isset($errors['official_address'])): ?>
            <div class="invalid-feedback">
                <?= $errors['official_address']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-group">
          <?php $class = isset($membership_request['postal_address']) ? 'is-invalid' : '';
          $value = isset($membership_request['postal_address']) ? $membership_request['postal_address'] : ''; ?>
        <label for="postal_address">Postal address</label>
        <input type="text" class="form-control <?= $class; ?>" id="postal_address"
               name="membership_request[postal_address]" value="<?= filter_tags($value); ?>"
               placeholder="438 Dark Spurt, San Francisco, CA 94528, US">
          <?php if (isset($errors['postal_address'])): ?>
            <div class="invalid-feedback">
                <?= $errors['postal_address']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-row">
        <div class="form-group col-md-2">
            <?php $class = isset($membership_request['phone']) ? 'is-invalid' : '';
            $value = isset($membership_request['phone']) ? $membership_request['phone'] : ''; ?>
          <label for="phone">Phone number</label>
          <input type="text" class="form-control <?= $class; ?>" id="phone" placeholder="+38 000 000 00 00"
                 name="membership_request[phone]" value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['phone'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['phone']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-2">
            <?php $class = isset($membership_request['fax']) ? 'is-invalid' : '';
            $value = isset($membership_request['fax']) ? $membership_request['fax'] : ''; ?>
          <label for="fax">Fax</label>
          <input type="text" class="form-control <?= $class; ?>" id="fax" name="membership_request[fax]"
                 value="<?= filter_tags($value); ?>" placeholder="Fax">
            <?php if (isset($errors['fax'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['fax']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-2">
            <?php $class = isset($membership_request['website']) ? 'is-invalid' : '';
            $value = isset($membership_request['website']) ? $membership_request['website'] : ''; ?>
          <label for="website">Website</label>
          <input type="email" class="form-control <?= $class; ?>" id="website" name="website"
                 value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['website'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['website']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <?php $class = isset($membership_request['email']) ? 'is-invalid' : '';
            $value = isset($membership_request['email']) ? $membership_request['email'] : ''; ?>
          <label for="email">Email</label>
          <input type="email" class="form-control <?= $class; ?>" id="email" name="membership_request[email]"
                 value="<?= filter_tags($value); ?>"
                 placeholder="For participation in general assemblies and communication with ASP">
            <?php if (isset($errors['email'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['email']; ?>
              </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group">
          <?php $class = isset($membership_request['banking']) ? 'is-invalid' : '';
          $value = isset($membership_request['banking']) ? $membership_request['banking'] : ''; ?>
        <label for="banking">Banking details</label>
        <textarea class="form-control <?= $class; ?>" id="banking"
                  name="membership_request[banking]"><?= filter_tags($value); ?></textarea>
          <?php if (isset($errors['banking'])): ?>
            <div class="invalid-feedback">
                <?= $errors['banking']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
            <?php $class = isset($membership_request['signors']) ? 'is-invalid' : '';
            $value = isset($membership_request['signors']) ? $membership_request['signors'] : ''; ?>
          <label for="signors">Names of the authorized signors</label>
          <textarea class="form-control <?= $class; ?>" id="signors"
                    name="membership_request[signors]"><?= filter_tags($value); ?></textarea>
            <?php if (isset($errors['signors'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['signors']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <?php $class = isset($membership_request['contact_person']) ? 'is-invalid' : '';
            $value = isset($membership_request['contact_person']) ? $membership_request['contact_person'] : ''; ?>
          <label for="contact_person">Name of the contact person</label>
          <textarea class="form-control <?= $class; ?>" id="contact_person" name="membership_request[contact_person]"
                    placeholder="Name of the contact person to communicate with ASP and to represent the member in the general assembly of the ASP"><?= filter_tags($value); ?></textarea>
            <?php if (isset($errors['contact_person'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['contact_person']; ?>
              </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group">
          <?php $class = isset($membership_request['description']) ? 'is-invalid' : '';
          $value = isset($membership_request['description']) ? $membership_request['description'] : ''; ?>
        <label for="description">Branch of industry and product description</label>
        <textarea class="form-control <?= $class; ?>" id="description"
                  name="membership_request[description]"><?= filter_tags($value); ?></textarea>
          <?php if (isset($errors['description'])): ?>
            <div class="invalid-feedback">
                <?= $errors['description']; ?>
            </div>
          <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-block btn-outline-primary">Submit</button>
    </form>
  </div>
</div>
</div>