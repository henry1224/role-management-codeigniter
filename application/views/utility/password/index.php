<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Password</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Management Password</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <?php if ($this->session->flashdata('password') == TRUE) : ?>
                <strong><?= $this->session->flashdata('password'); ?></strong>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger shadow" role="alert"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>') ?>

            <div class="ibox shadow">
                <div class="ibox-title">
                    <h5>Data Pengguna</small></h5>
                </div>
                <div class="ibox-content">
                    <div class="container" id="pwd-containter1">
                        <form class="form-horizontalcenter" method="POST" action="">

                            <div class="form-group row"><label class="col-sm-2 col-form-label"></label>
                                <div class="col-md-6 input-group"><input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>" class="form-control" autocomplete="off"></div>
                            </div>

                            <div class="form-group row"><label class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-md-6 input-group"><input type="password" name="current_password" id="current_password" class="form-control" autocomplete="off"></div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-md-6 input-group"><input type="password" name="new_password1" id="new_password1" class="form-control" autocomplete="off"></div>
                            </div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Repeat Password</label>
                                <div class="col-md-6 input-group"><input type="password" name="new_password2" id="new_password2" class="form-control" autocomplete="off"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <button type="submit" class="btn btn-primary btn-outline shadow">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>