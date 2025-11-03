<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Buat USER disini</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?= site_url('login/simpanuser') ?>" method="post">

        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="inputEmail3" placeholder="nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="inputEmail3" placeholder="usernya" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" required>
                </div>
            </div>
            <!-- <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Sign in</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>