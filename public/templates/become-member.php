<div class="container-fluid">
  <div class="col-11 p-3 p-md-5 mx-auto">
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

<div class="row bg-light" id="form">
  <div class="col-10 p-3 p-md-5 mx-auto">
    <h2 class="text-center mb-5">Fill the form below to submit the membership request</h2>
    <form method="post" action="become-member.php#form">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Your name <sup>*</sup></label>
            <?php $class = isset($errors['name']) ? 'is-invalid' : '';
            $value = isset($membership_request['name']) ? $membership_request['name'] : ''; ?>
          <input type="text" class="form-control <?= $class; ?>" name="membership_request[name]" id="name"
                 value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['name'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['name']; ?>
              </div>
            <?php endif; ?>
        </div>

        <div class="form-group col-md-6">
          <label for="email">Your email address <sup>*</sup></label>
            <?php $class = isset($errors['email']) ? 'is-invalid' : '';
            $value = isset($membership_request['email']) ? $membership_request['email'] : ''; ?>
          <input type="email" class="form-control <?= $class; ?>" name="membership_request[email]" id="email"
                 placeholder="name@example.com" value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['email'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['email']; ?>
              </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group">
          <?php $class = isset($errors['company_name']) ? 'is-invalid' : '';
          $value = isset($membership_request['company_name']) ? $membership_request['company_name'] : ''; ?>
        <label for="company_name">Full name of the company <sup>*</sup></label>
        <input type="text" class="form-control <?= $class; ?>" id="company_name" name="membership_request[company_name]"
               value="<?= filter_tags($value); ?>">
          <?php if (isset($errors['company_name'])): ?>
            <div class="invalid-feedback">
                <?= $errors['company_name']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
            <?php $class = isset($errors['trade_number']) ? 'is-invalid' : '';
            $value = isset($membership_request['trade_number']) ? $membership_request['trade_number'] : ''; ?>
          <label for="trade_number">Trade register number <sup>*</sup></label>
          <input type="text" class="form-control <?= $class; ?>" id="trade_number"
                 name="membership_request[trade_number]" value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['trade_number'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['trade_number']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <?php $class = isset($errors['business_ID']) ? 'is-invalid' : '';
            $value = isset($membership_request['business_ID']) ? $membership_request['business_ID'] : ''; ?>
          <label for="business_ID">Y-tunnus (Business ID) <sup>*</sup></label>
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
          <?php $class = isset($errors['official_address']) ? 'is-invalid' : '';
          $value = isset($membership_request['official_address']) ? $membership_request['official_address'] : ''; ?>
        <label for="official_address">Official address <sup>*</sup></label>
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
          <?php $class = isset($errors['postal_address']) ? 'is-invalid' : '';
          $value = isset($membership_request['postal_address']) ? $membership_request['postal_address'] : ''; ?>
        <label for="postal_address">Postal address <sup>*</sup></label>
        <input type="text" class="form-control <?= $class; ?>" id="postal_address"
               name="membership_request[postal_address]" value="<?= filter_tags($value); ?>"
               placeholder="438 Dark Spurt, San Francisco, CA 94528, US">
          <?php if (isset($errors['postal_address'])): ?>
            <div class="invalid-feedback">
                <?= $errors['postal_address']; ?>
            </div>
          <?php endif; ?>
      </div>

      <div class="form-row" id="form">
        <div class="form-group col-md-2">
            <?php $class = isset($errors['phone']) ? 'is-invalid' : '';
            $value = isset($membership_request['phone']) ? $membership_request['phone'] : ''; ?>
          <label for="phone">Phone number <sup>*</sup></label>
          <input type="text" class="form-control <?= $class; ?>" id="phone" placeholder="+38 000 000 00 00"
                 name="membership_request[phone]" value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['phone'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['phone']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-2">
            <?php $class = isset($errors['fax']) ? 'is-invalid' : '';
            $value = isset($membership_request['fax']) ? $membership_request['fax'] : ''; ?>
          <label for="fax">Fax <sup>*</sup></label>
          <input type="text" class="form-control <?= $class; ?>" id="fax" name="membership_request[fax]"
                 value="<?= filter_tags($value); ?>" placeholder="Fax">
            <?php if (isset($errors['fax'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['fax']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-2">
            <?php $class = isset($errors['website']) ? 'is-invalid' : '';
            $value = isset($membership_request['website']) ? $membership_request['website'] : ''; ?>
          <label for="website">Website <sup>*</sup></label>
          <input type="text" class="form-control <?= $class; ?>" id="website" name="membership_request[website]"
                 value="<?= filter_tags($value); ?>">
            <?php if (isset($errors['website'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['website']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <?php $class = isset($errors['company_email']) ? 'is-invalid' : '';
            $value = isset($membership_request['company_email']) ? $membership_request['company_email'] : ''; ?>
          <label for="company_email">Email <sup>*</sup></label>
          <input type="email" class="form-control <?= $class; ?>" id="company_email"
                 name="membership_request[company_email]"
                 value="<?= filter_tags($value); ?>"
                 placeholder="For participation in general assemblies and communication with ASP">
            <?php if (isset($errors['company_email'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['company_email']; ?>
              </div>
            <?php endif; ?>
        </div>
      </div>

      <div class="form-group">
          <?php $class = isset($errors['banking']) ? 'is-invalid' : '';
          $value = isset($membership_request['banking']) ? $membership_request['banking'] : ''; ?>
        <label for="banking">Banking details <sup>*</sup></label>
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
            <?php $class = isset($errors['signors']) ? 'is-invalid' : '';
            $value = isset($membership_request['signors']) ? $membership_request['signors'] : ''; ?>
          <label for="signors">Names of the authorized signors <sup>*</sup></label>
          <textarea class="form-control <?= $class; ?>" id="signors"
                    name="membership_request[signors]"><?= filter_tags($value); ?></textarea>
            <?php if (isset($errors['signors'])): ?>
              <div class="invalid-feedback">
                  <?= $errors['signors']; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <?php $class = isset($errors['contact_person']) ? 'is-invalid' : '';
            $value = isset($membership_request['contact_person']) ? $membership_request['contact_person'] : ''; ?>
          <label for="contact_person">Name of the contact person <sup>*</sup></label>
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
          <?php $class = isset($errors['description']) ? 'is-invalid' : '';
          $value = isset($membership_request['description']) ? $membership_request['description'] : ''; ?>
        <label for="description">Branch of industry and product description <sup>*</sup></label>
        <textarea class="form-control <?= $class; ?>" id="description"
                  name="membership_request[description]"><?= filter_tags($value); ?></textarea>
          <?php if (isset($errors['description'])): ?>
            <div class="invalid-feedback">
                <?= $errors['description']; ?>
            </div>
          <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-block btn-outline-primary">Submit</button>
        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success mt-3" role="alert">
              <?= $_SESSION['success'];
              unset($_SESSION['success']); ?>
          </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['errors'])): ?>
          <div class="alert alert-danger mt-3" role="alert">
              <?= $_SESSION['errors'];
              unset($_SESSION['errors']); ?>
          </div>
        <?php endif; ?>
    </form>
  </div>
</div>
</div>