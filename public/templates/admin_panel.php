<div class="container-fluid">
    <div class="row p-3">
        <div class="col-12 rounded border border-success justify-content-end">
            <span>You entered as </span>
            <div class="badge badge-primary">
                <a class="text-white" href="/hello.php"><?=$_SESSION['user']['username']?></a>
            </div>
            <a class="btn btn-sm btn-outline-danger" href="/logout.php">Log out</a>
        </div>
    </div>
</div>