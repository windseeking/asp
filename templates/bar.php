<div class="row align-items-center mb-3">
    <div class="col-12 col-md-3 mr-md-auto p-0">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['errors'];
                unset($_SESSION['errors']); ?>
            </div>
        <?php endif; ?>
    </div>

<!--    --><?php //if ($page_title = 'News'): ?>
<!--      <div class="col-12 col-md-3 ml-md-auto">-->
<!--        <form method="get" class="form-inline justify-content-end">-->
<!--          <select class="custom-select my-1 mr-sm-2 mr-xs-auto" id="sort" name="sort">-->
<!--            <option value="0">Sort</option>-->
<!--            <option value="asc">New on top</option>-->
<!--            <option value="desc">Old on top</option>-->
<!--          </select>-->
<!---->
<!--          <button type="submit" class="btn btn-outline-success">Sort</button>-->
<!--        </form>-->
<!--      </div>-->
<!--    --><?php //endif; ?>

    <?php if (isset($cats)): ?>
    <div class="col-12 col-md-3 ml-md-auto">
        <form method="get" class="form-inline justify-content-end">
            <select class="custom-select my-1 mr-sm-2 mr-xs-auto" id="cat" name="cat">
                <option value="0">Category</option>
                <option value="asp">Association's news</option>
                <option value="members">Members' news</option>
                <option value="finnish-ukrainian">Finnish-Ukrainian</option>
            </select>

            <button type="submit" class="btn btn-outline-success">Apply</button>
        </form>
    </div>
  <?php endif; ?>

    <div class="col-12 col-md-3">
        <form method="get" class="form-inline justify-content-end">
            <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success ml-2 xs-hide sm-hide md-hide" type="submit">Search</button>
        </form>
    </div>
</div>
