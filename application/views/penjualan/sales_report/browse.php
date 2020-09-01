<div class="shadow row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sales Report</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('welcome'); ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Penjualan</a>
            </li>
            <li class="breadcrumb-item">
                <a>Sales Report</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Browse</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <!-- notification -->
            <?php if ($this->session->flashdata('flash') == TRUE) : ?>
                <div class="alert alert-success shadow" role="alert shadow">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Data <?php echo $title; ?> Berhasil Di <strong><?= $this->session->flashdata('flash'); ?></strong>
                </div>
            <?php endif; ?>
            <!-- end notification -->
            <div class="ibox shadow">
                <div class="ibox-title"><a class="btn btn-outline btn-danger" href="<?= base_url('sales_report') ?>">Kembali</a></div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-ajax table-center text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No.Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Channel</th>
                                    <th>Customer</th>
                                    <th>Sales</th>
                                    <th>CSO</th>
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
	processing: true,
	serverSide: true,
    // order: [],
	ajax: {
	  url: "<?php echo base_url('Sales_report/getAll') ?>",
	  type:'POST',
	}
});
</script>