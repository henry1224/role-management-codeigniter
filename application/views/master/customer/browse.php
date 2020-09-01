<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Master</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Customer</strong>
            </li>
            <li class="breadcrumb-item active">
                <strong>Browse</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox shadow">
                <div class="ibox-title"><a class="btn btn-outline btn-danger shadow" href="<?= base_url('customer') ?>">kembali</a></div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-ajax text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Fax</th>
                                    <th>E-mail</th>
                                    <th>Status</th>
                                    <th><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript">

$(".table-ajax").DataTable({
	ordering: false,
	processing: true,
	serverSide: true,
	ajax: {
	  url: "<?php echo base_url('Customer/ambil_data') ?>",
	  type:'POST',
	}
});
</script>