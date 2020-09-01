<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Utility</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>User Management</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a class="btn btn-outline btn-primary shadow" href="" data-toggle="modal" data-target="#addData">Tambah Data</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <?php foreach ($users as $tampil) : ?>

            <div class="col-lg-4 ">
                <div class="contact-box shadow">
                    <a class="row" href="#modalEdit<?= $tampil['id_user'] ?>" data-toggle="modal">
                        <div class="col-4">
                            <div class="text-center">
                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="<?= base_url('assets/img/profile/') . $tampil['image']; ?>">
                            </div>
                        </div>
                        <div class="col-8">

                            <h3><strong><?= $tampil['name'] ?></strong></h3>
                            <ul class="list-unstyled m-t-md">
                                <li>
                                    <span class="fa fa-user m-r-xs"></span>
                                    <label>Name :</label>
                                    <?= $tampil['name'] ?>
                                </li>
                                <li>
                                    <span class="fa fa-user-o m-r-xs"></span>
                                    <label>Username :</label>
                                    <?= $tampil['username'] ?>
                                </li>
                                <li>
                                    <span class="fa fa-envelope m-r-xs"></span>
                                    <label>Email : </label>
                                    <?= $tampil['email'] ?>
                                </li>
                                <li>
                                    <span class="fa fa-share-alt m-r-xs"></span>
                                    <label>Role : </label>
                                    <?= $tampil['role'] ?>
                                </li>
                                <li>
                                    <?php
                                    switch ($tampil['is_active']) {

                                        case 1:
                                            echo '<span class="label label-primary shadow">Active</span>';
                                            break;

                                        default:
                                            echo '<span class="label label-danger shadow">Non - Active</span>';
                                            break;
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- ==================================  MODAL TAMBAH  ========================================= -->
<div id="addData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data User Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form class="form-horizontal" method="POST" action="<?php echo base_url('user') ?>">
                <div class="modal-body">

                    <div class="form-group row"><label class="col-sm-2 col-form-label">Name </label>
                        <div class="col-sm-9"><input type="text" name="name" class="form-control" placeholder="Enter name..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Username </label>
                        <div class="col-sm-9"><input type="text" name="username" class="form-control" placeholder="Enter username..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Email </label>
                        <div class="col-sm-9"><input type="email" name="email" class="form-control" placeholder="Enter email..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Image </label>
                        <div class="col-sm-9"><input type="text" name="image" class="form-control" value="default.jpg" autocomplete="off" autofocus disabled></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Password </label>
                        <div class="col-sm-9"><input type="password" name="password" class="form-control" placeholder="Enter password..." autocomplete="off" autofocus></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Role Access</label>
                        <div class="col-md-9">
                            <select class="form-control chosen-select" name="role_id">
                                <option value="">Select role access....</option>
                                <?php foreach ($role as $tampil) { ?>
                                    <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['role']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Is Active ? </label>
                        <div class="col-md-4">
                            <select class="form-control" name="is_active">
                                <option value="1">Active</option>
                                <option value="0">Non - active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Date Create </label>
                        <div class="col-sm-4"><input type="text" name="date_created" value="<?php echo date('d-m-Y H:i:s ') ?>" class="form-control" autocomplete="off" autofocus readonly></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-outline">Tambah Data</button>
                    <button class="btn btn-secondary btn-outline" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ==================================  MODAL EDIT  ========================================= -->
<?php foreach ($users as $tampil) : ?>
    <div id="modalEdit<?php echo $tampil['id_user'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User Management</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <form class="form-horizontal" method="post" action="<?php echo base_url('user/Edit') ?>">
                    <div class="modal-body">
                        <input name="id_user" type="hidden" value="<?php echo $tampil['id_user']; ?>">


                        <div class="form-group row"><label class="col-sm-2 col-form-label">Name </label>
                            <div class="col-sm-9"><input type="text" name="name" class="form-control" value="<?= $tampil['name']; ?>" placeholder="Enter name..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Username </label>
                            <div class="col-sm-9"><input type="text" name="username" class="form-control" value="<?= $tampil['username']; ?>" placeholder="Enter username..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Email </label>
                            <div class="col-sm-9"><input type="email" name="email" class="form-control" value="<?= $tampil['email']; ?>" placeholder="Enter email..." autocomplete="off" autofocus></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label"> Role Access</label>
                            <div class="col-md-9">
                                <select class="form-control  chosen-select" name="role_id">
                                    <option value="">Select role access....</option>
                                    <?php foreach ($role as $r) { ?>
                                        <option value="<?php echo $r['id']; ?>" <?= $r['id'] == $tampil['id'] ? "selected" : null ?>><?php echo $r['role']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Is Active ? </label>
                            <div class="col-md-4">
                                <select class="form-control chosen-select" name="is_active">
                                    <option <?php if ($tampil['is_active'] == '0') {
                                                echo "selected";
                                            } ?> value="0">Non - active</option>
                                    <option <?php if ($tampil['is_active'] == '1') {
                                                echo "selected";
                                            } ?> value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Date Create </label>
                            <div class="col-sm-4"><input type="text" name="date_created" value="<?= $tampil['date_created']; ?>" class="form-control" autocomplete="off" autofocus disabled></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-outline">Edit Data</button>
                        <button class="btn btn-secondary btn-outline" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>