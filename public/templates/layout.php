<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= $page_desc; ?>">
  <meta name="author" content="">

  <title><?= $title; ?> | ASP</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for templates -->
  <link href="../css/scrolling-nav.css" rel="stylesheet">
  <link href="../css/round-about.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">

  <!--  Font Awesome icons-->
  <script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"
          integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1"
          crossorigin="anonymous"></script>
</head>

<body id="page-top">

<!--Показывается на экранах 768px и больше-->
<div class="xs-hide sm-hide">
  <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg nav nav-pills">
    <a class="navbar-brand" href="../index">
      <img src="../img/logo-r.png" width="30" class="d-inline-block align-top" alt="">
      Suomi Partnership
    </a>

      <?php if (!empty($menu)): ?>
          <?php foreach ($menu as $value): ?>
          <a class="nav-item nav-link <?php echo ($title == $value['title']) ? 'active' : ''; ?>"
             href="<?= $value['link']; ?>"><?= $value['title']; ?></a>
          <?php endforeach; ?>
      <?php endif; ?>

      <?php if (isset($navbar)): ?>
        <div class="navbar-expand container-fluid justify-content-end">
            <?= $navbar; ?>
        </div>
      <?php endif; ?>
  </nav>
</div>


<!--Показывается на экранах от 0 до 767px-->
<div class="pos-f-t md-hide md-hide lg-hide xl-hide">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
        <?php foreach ($menu as $value): ?>
          <a class="nav-item nav-link <?php echo ($title == $value['title']) ? 'active' : ''; ?>"
             href="<?= $value['link']; ?>"><?= $value['title']; ?></a>
        <?php endforeach; ?>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark align-">
      <?php if (isset($navbar)): ; ?>
        <div class="navbar-expand">
            <?= $navbar; ?>
        </div>
      <?php endif; ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>

<main><?= $content; ?></main>

<footer class="px-3 py-4 bg-dark">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a href="/index#contact" class="btn btn-outline-primary">Contact us</a>
        <a href="/become-member" class="btn btn-outline-success">Become a member</a>
      </div>

        <?php if (isset($_SESSION['user'])): ?>
          <div class="col text-right">
                  <span style="font-size: 1em; color: Dodgerblue;">
                    <i class="fas fa-user-tie mr-1"></i>
                  </span>
            <a class="text-light" href="admin"><?= $_SESSION['user']['username']; ?></a>
          </div>
        <?php endif; ?>
    </div>

    <div class="row">
      <div class="col-12 col-lg-6 text-center text-lg-left">
        <p class="mt-3 text-muted">Copyright &copy; 2016 – 2019 Suomi Partnership Association. All rights
          reserved.</p>
      </div>

      <div class="col">
        <nav class="nav flex-column">
          <p class="text-muted">About ASP</p>
          <a class="nav-link" href="/documents">Documents</a>
          <a class="nav-link" href="/partners">Partners</a>
          <a class="nav-link" href="/members">Members</a>
          <a class="nav-link" href="index#team">Team</a>
        </nav>
      </div>

      <div class="col">
        <nav class="nav flex-column">
          <p class="text-muted">Activities</p>
          <a class="nav-link" href="/activities/#reliability">Reliability verification</a>
          <a class="nav-link" href="/activities/#networking">Networking</a>
          <a class="nav-link" href="/activities/#lobbying">Lobbying</a>
          <a class="nav-link" href="/activities/#support">Support for projects</a>
          <a class="nav-link" href="/activities/#promotion">Promotion</a>
        </nav>
      </div>

      <div class="col">
        <nav class="nav flex-column">
          <p class="text-muted" href="#">Info</p>
          <a class="nav-link" href="#">ASP news</a>
          <a class="nav-link" href="#">Members' news</a>
          <a class="nav-link" href="#">Finnish-Ukrainian news</a>
          <a class="nav-link" href="#">Useful links</a>
        </nav>
          <?php if (!isset($_SESSION['user'])): ?>
            <a class="text-muted" href="/login">Log in</a>
          <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for scrolling navigation -->
<script src="../js/scrolling-nav.js"></script>

<!--My script-->
<script src="../js/script.js"></script>
</body>
</html>
