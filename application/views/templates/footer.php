<div class="footer">
    <div class="float-right">
        Version <strong>1.0</strong>
    </div>
    <div>
        <strong>Copyright</strong> Henry William Pandeirot &copy; <?= date('Y'); ?>
    </div>
</div>
</div>
</div>

<script src="<?= base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/inspinia.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/pace/pace.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/toastr/toastr.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/select2/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/chosen/chosen.jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-bottom-right',
                showMethod: 'slideDown',
                timeOut: 4000
            };
            <?php if ($this->session->flashdata('add')) { ?>

                toastr.success(' Data <?php echo $title; ?> successfully <strong><?= $this->session->flashdata('add'); ?>');

            <?php } else if ($this->session->flashdata('edit')) { ?>

                toastr.info(' Data <?php echo $title; ?> successfully <strong><?= $this->session->flashdata('edit'); ?>');

            <?php } else if ($this->session->flashdata('delete')) { ?>

                toastr.warning(' Data <?php echo $title; ?> successfully <strong><?= $this->session->flashdata('delete'); ?>');

            <?php } else if ($this->session->flashdata('change')) { ?>

                toastr.info('<strong><?= $this->session->flashdata('change'); ?>');

            <?php } ?>

        }, 1300);

    });

    $(document).ready(function() {
        $('.dataTables').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: []

        });

    });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        $('.chosen-select').chosen({
            width: "100%"
        });

    })

    //date

    var mem = $('#tanggal .input-group.date').datepicker({
        startView: 1,
        // startDate: '-1d', // jika mau ke tanggal sebelumnya dibuat minus , jika tidak ,jangan dibuat minus,jika hanya tanggal ini saja maka cuku isikan "1d"
        endDate: '1d',
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "dd/mm/yyyy"
    });
</script>


</body>

</html>