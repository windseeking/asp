<div class="container-fluid">
  <div class="row">
    <div class="col-12 p-5">
      <p>
        <span style="font-size: 1em; color: Dodgerblue;">
          <i class="fas fa-user-tie"></i>
        </span>
        Welcome, <b><?=$user['name'];?></b>
      </p>

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news"
             aria-selected="true">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members"
             aria-selected="false">Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="partners-tab" data-toggle="tab" href="#partners" role="tab" aria-controls="partners"
             aria-selected="false">Partners</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account"
             aria-selected="false">My account</a>
        </li>
      </ul>

      <div class="tab-content py-3 col-6 mx-auto" id="myTabContent">
        <div class="tab-pane fade show active" id="news" role="tabpanel"
             aria-labelledby="news-tab"><?=$content;?></div>
        <div class="tab-pane fade" id="members" role="tabpanel"
             aria-labelledby="members-tab"><?= $content; ?></div>
        <div class="tab-pane fade" id="partners" role="tabpanel"
             aria-labelledby="partners-tab"><?= $content; ?></div>
        <div class="tab-pane fade" id="account" role="tabpanel"
             aria-labelledby="account-tab"><?= $content; ?></div>
      </div>

    </div>
  </div>
</div>
