<div class="shadow row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inventori</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('welcome'); ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Master</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Inventori</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <!-- notification -->
            <?php if ($this->session->flashdata('flash') == TRUE) : ?>
                <strong><?= $this->session->flashdata('flash'); ?></strong>
            <?php endif; ?>

            <!-- end notification -->
            <div class="ibox shadow">
                <div class="ibox-title"><a class="btn btn-outline btn-primary" href="<?= base_url('inventori/index') ?>">Kembali</a></div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-ajax text-center">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th>Kode</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Pola</th>
                                    <th>Segment</th>
                                    <th>
                                        <i class="fa fa-cogs"></i>
                                    </th>
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
	processing: true,
	serverSide: true,
    // order: [],
	ajax: {
	  url: "<?php echo base_url('Inventori/ambil_data') ?>",
	  type:'POST',
	}
});
</script>