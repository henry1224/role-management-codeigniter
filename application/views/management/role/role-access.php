<div class="row wrapper border-bottom white-bg page-heading shadow">
    <div class="col-sm-4">
        <h2>Home</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Utility</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Role Management</strong>
            </li>
            <li class="breadcrumb-item active">
                <strong><u><?= $role['role'] ?></u></strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox shadow">
                <div class="ibox-title"><a class="btn btn-outline btn-danger shadow" href="<?= base_url('role') ?>">Kembali</a></div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr align="center">
                                    <th>#.</th>
                                    <th>Menu</th>
                                    <th>Access</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 0;
                                foreach ($menu as $tampil) : $no++ ?>
                                    <tr align="center">
                                        <td><?= $no; ?></td>
                                        <td><?= $tampil['title']; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $tampil['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $tampil['id'] ?>">
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('role/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('role/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>