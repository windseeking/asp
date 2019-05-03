<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 mx-auto py-5">

        <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger" role="alert">
          <?= $_SESSION['errors']; unset($_SESSION['errors']); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['logout'])): ?>
        <div class="alert alert-info" role="alert">
            <?= $_SESSION['logout']; unset($_SESSION['logout']); ?>
        </div>
        <?php endif; ?>

        <h1>Log in</h1>

        <form method="post">
          <div class="form-row">
            <div class="form-group col-12">
              <label for="email">Email</label>
              <?php $class = isset($errors['email']) ? 'is-invalid' : ''; $value = isset($form['email']) ? $form['email'] : ''; ?>
              <input type="email" name="email" class="form-control <?=$class;?>" id="email" placeholder="Email">

              <?php if(isset($errors['email'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['email'];?>
                </div>
              <?php endif; ?>
            </div>

            <div class="form-group col-12">
              <label for="password">Password</label>
              <?php $class = isset($errors['password']) ? 'is-invalid' : ''; ?>
              <input type="password" name="password" class="form-control <?=$class;?>" id="password" placeholder="Password">

              <?php if(isset($errors['password'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['password'];?>
                </div>
              <?php endif; ?>

              <p class="text-right small"><a href="forgot-password.php" class="text-muted">Forgot a password</a></p>
            </div>
          </div>
          <button class="btn btn-success btn-block" type="submit">Sign in</button>
        </form>
        <p class="text-center mt-3"><a href="register.php">Don't have an account? Click here to create</a></p>
      </div>
    </div>
  </div>
</section>
