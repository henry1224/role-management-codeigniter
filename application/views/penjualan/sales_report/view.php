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
                <strong>View</strong>
            </li>
        </ol>
    </div>
</div>
<div class=" wrapper wrapper-content animated fadeInRight">
    <div class="row ">
        <div class="col-lg-12">
            <form class="form-horizontalcenter" method="POST">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-outline btn-danger" href="<?= base_url('sales_report/browse') ?>">Kembali</a>
                    </div>
                    <div class="ibox-content shadow">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-2 col-form-label"> sales Channel</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" disabled>
                                            <option value="">Pilih Sales channel....</option>
                                            <?php foreach ($channel as $tampil) { ?>
                                                <option value="<?php echo $tampil->id_channel; ?>" <?= $tampil->id_channel == $report->id_channel ? "selected" : null ?>><?php echo $tampil->nama_channel; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"> sales</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" disabled>
                                            <option value="">Pilih Sales....</option>
                                            <?php foreach ($sales as $tampil) { ?>
                                                <option value="<?php echo $tampil->id_sales; ?>" <?= $tampil->id_sales == $report->id_sales ? "selected" : null ?>><?php echo $tampil->nama_sales; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"> Customer</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="id_customer" id="customer" disabled>
                                            <option value="">Pilih Customer....</option>
                                            <?php foreach ($customer as $tampil) { ?>
                                                <option value="<?php echo $tampil->id_customer; ?>" <?= $tampil->id_customer == $report->id_customer ? "selected" : null ?>><?php echo $tampil->nama_customer; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat Customer</label>
                                    <div class="col-md-6"><input type="text" name="alamat_customer" value="<?= $report->alamat_customer; ?>" class="form-control" disabled></div>
                                </div>
                                <div class="form-group row" id="tanggal"><label class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-md-6">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tanggal_so" value="<?php echo date('d-m-Y', strtotime($report->tanggal_so)); ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group row"><label class="col-sm-2 col-form-label">NO.INVOICE</label>
                                    <div class="col-md-6"><input type="text" value="<?= $report->invoice; ?>" class="form-control" disabled></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Faktur Pajak</label>
                                    <div class="col-md-6"><input type="text" value="<?= $report->faktur_pajak; ?>" class="form-control" disabled></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">NO.PO</label>
                                    <div class="col-md-6"><input type="text" value="<?= $report->no_purchase; ?>" class="form-control" disabled></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Surat Jalan</label>
                                    <div class="col-md-6"><input type="text" value="<?= $report->surat_jalan; ?>" class="form-control" disabled></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Type PPN</label>
                                    <div class="col-md-6"><input class="form-control" id="type_ppn" value="<?php if($report->type_ppn == 'I'){echo 'PPN INCLUDE';}else{ echo 'PPN EXCLUDE'; }?>" disabled></input></div>
                                </div>
                            </div>
                        </div>

                        <div class="ibox-content">
                            <table class="table table-bordered text-center" id="data_table">
                                <thead>
                                    <tr>
                                        <th>KODE</th>
                                        <th colspan="3">NAMA BARANG</th>
                                        <th>QTY</th>
                                        <th>HARGA/UNIT</th>
                                        <th>DISC(%)</th>
                                        <th>TOTAL</th>
                                    </tr>   
                                </thead>
                                <tbody>
                                <?php
                                    $kode = $report->invoice;
                                    $query = $this->db->query("SELECT * FROM sales_report_detail WHERE invoice='$kode' ");
                                    foreach($query->result() as $tmp) :
                                ?>
                                    <tr>
                                        <td><?= $tmp->kode; ?></td>
                                        <td><?= $tmp->type_inventori; ?></td>
                                        <td><?= $tmp->brand_inventori; ?></td>
                                        <td><?= $tmp->pola_inventori; ?></td>
                                        <td><?= $tmp->jumlah; ?></td>
                                        <td><?= number_format($tmp->harga_jual, 0, ',', '.'); ?></td>
                                        <td><?= $tmp->discount; ?></td>
                                        <td><?= number_format($tmp->total, 0, ',', '.'); ?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <textarea type="text" name="keterangan" class="form-control"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-3 col-form-label">Sub Total</label>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Rp</span><input type="text" name="subtotal" id="subtotal" value="<?= number_format($report->sub_total, 0, ',', '.'); ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">Discount Global (%)</label>
                                    <div class="col-md-2"><input type="text" name="disc_global" id="diskg" value="<?= $report->disc_global?>" class="form-control makeHitung" disabled></div>
                                    <div class="input-group col-md-4">
                                        <span class="input-group-addon">Rp</span><input type="text" name="disc_nilai" id="discount_nilai" value="<?= number_format($report->disc_nilai, 0, ',', '.') ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">DPP</label>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Rp</span><input type="text" name="dpp" id="dpp" value="<?= number_format($report->dpp, 0, ',', '.') ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">PPN</label>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Rp</span><input type="text" name="ppn" id="ppn" value="<?= number_format($report->ppn, 0, ',', '.') ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">Grand Total</label>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Rp</span><input type="text" name="grand_total" id="grand" value="<?= number_format($report->grand_total, 0, ',', '.') ?>" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>=
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-1 col-form-label">By</label>
                                    <div class="col-md-6"><input type="text" name="by_so" value="<?= $report->create_at; ?>" class="form-control" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-1 col-form-label">Last</label>
                                    <div class="col-md-6"><input type="text" name="last_so" value="<?= $report->create_date ?>" class="form-control" autocomplete="off" readonly></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
