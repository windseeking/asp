<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 mx-auto py-5">

        <h1>Account confirmation</h1>

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

      </div>
    </div>
  </div>
</section>
