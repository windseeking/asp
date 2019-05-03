<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 mx-auto py-5">
        <h1>Forgot password</h1>

        <form method="post">
          <?php $disabled = isset($_SESSION['success']) ? 'disabled' : ''; ?>
          <fieldset <?= $disabled; ?>>
            <div class="form-row">
              <div class="form-group col-12">
                <label for="email">Email</label>
                  <?php $class = isset($errors['email']) ? 'is-invalid' : '';
                  $value = isset($form['email']) ? $form['email'] : ''; ?>
                <input type="email" name="email" class="form-control <?= $class; ?>" id="email" placeholder="Email">

                  <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['email']; ?>
                    </div>
                  <?php endif; ?>

                  <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success mt-3 " role="alert">
                        <?= $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <button class="btn btn-success btn-block" type="submit">Reset password</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</section>
