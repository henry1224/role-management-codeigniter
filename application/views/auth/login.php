<div class="middle-box text-center  animated fadeInDown">
  <div>
    <h1 class="logo-name"></h1>
    <img alt="image" class="rounded-circle shadow" width="200" src="<?= base_url('assets/img/profile/marz.png') ?>" />
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12 mt-auto">
      <div class="ibox-content shadow">
        <form class="m-t" role="form" action="<?= base_url('auth'); ?>" method="POST">
          <?php if ($this->session->flashdata('message') == TRUE) : ?>
            <strong><?= $this->session->flashdata('message'); ?></strong>
          <?php endif; ?>
          <?php echo validation_errors('<strong><div class="alert alert-danger shadow" role="alert">', '</div></strong>') ?>
          <div class="form-group">
            <input type="username" class="form-control shadow" name="username" id="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control shadow" name="password" id="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary btn btn-outline block full-width m-b shadow">Login</button>
      </div>
    </div>
  </div>
  <hr />
  <div class="row">
    <div class="col-md-12 text-right">
      <small>© <?= date('Y') ?></small>
    </div>
  </div>
</div>