<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 mx-auto py-5">

        <h1>Reset password</h1>

          <?php if (isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['errors'];
                unset($_SESSION['errors']); ?>
            </div>
          <?php endif; ?>

          <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
          <?php endif; ?>

        <form method="post">
            <?php $disabled = isset($_SESSION['success']) ? 'disabled' : ''; ?>
          <fieldset <?= $disabled; ?>>
            <div class="form-row">
              <div class="form-group col-12">
                <label for="code">Code from email</label>
                  <?php
                  $class = isset($errors['code']) ? 'is-invalid' : '';
                  $value = isset($form['code']) ? $form['code'] : '';
                  ?>
                <input type="number" name="form[code]" class="form-control form-control-lg <?= $class; ?>"
                       value="<?= $value; ?>" id="code">

                  <?php if (isset($errors['code'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['code']; ?>
                    </div>
                  <?php endif; ?>

                <label for="password">Password</label>
                  <?php
                  $class = isset($errors['password']) ? 'is-invalid' : '';
                  $value = isset($form['password']) ? $form['password'] : '';
                  ?>
                <input type="password" name="form[password]" class="form-control <?= $class; ?>"
                       value="<?= $value; ?>" id="password" placeholder="Password">

                  <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['password']; ?>
                    </div>
                  <?php endif; ?>

                <label for="confirm_password">Confirm password</label>
                  <?php
                  $class = isset($errors['confirm_password']) ? 'is-invalid' : '';
                  $value = isset($form['confirm_password']) ? $form['confirm_password'] : '';
                  ?>
                <input type="password" name="form[confirm_password]" class="form-control <?= $class; ?>"
                       value="<?= $value; ?>" id="confirm_password"
                       placeholder="Confirm password">

                  <?php if (isset($errors['confirm_password'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['confirm_password']; ?>
                    </div>
                  <?php endif; ?>

              </div>
            </div>

            <button class="btn btn-success btn-block" type="submit">Set new password</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</section>
