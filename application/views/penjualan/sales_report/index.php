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
            <li class="breadcrumb-item active">
                <strong>Sales Report</strong>
            </li>
        </ol>
    </div>
</div>
<div class=" wrapper wrapper-content animated fadeInRight">

    <?php echo validation_errors('<div class="alert alert-danger shadow" role="alert"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>') ?>

    <div class="row ">
        <div class="col-lg-12">
            <form class="form-horizontalcenter" method="POST">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-outline btn-primary" href="<?= base_url('sales_report/browse') ?>">Browse</a>
                    </div>
                    <div class="ibox-content shadow">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-2 col-form-label"> sales Channel</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="id_channel">
                                            <option value="">Pilih Sales channel....</option>
                                            <?php foreach ($channel as $tampil) { ?>
                                                <option value="<?php echo $tampil->id_channel; ?>"><?php echo $tampil->nama_channel; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"> sales</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="id_sales">
                                            <option value="">Pilih Sales....</option>
                                            <?php foreach ($sales as $tampil) { ?>
                                                <option value="<?php echo $tampil->id_sales; ?>"><?php echo $tampil->nama_sales; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"> Customer</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="id_customer" id="customer">
                                            <option value="">Pilih Customer....</option>
                                            <?php foreach ($customer as $tampil) { ?>
                                                <option alamat="<?= $tampil->alamat_customer; ?>" value="<?php echo $tampil->id_customer; ?>"><?php echo $tampil->nama_customer; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat Customer</label>
                                    <div class="col-md-6"><input type="text" name="alamat_customer" id="alamat_cust" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row" id="tanggal"><label class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-md-6">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tanggal_so" value="<?php echo date('d-m-Y'); ?>" class="form-control" readonly=autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
   
                                <div class="form-group row"><label class="col-sm-2 col-form-label">NO.INVOICE</label>
                                    <div class="col-md-6"><input type="text" name="invoice" id="_invoice" class="form-control" autocomplete="off" placeholder="Contoh: 023950">
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Faktur Pajak</label>
                                    <div class="col-md-6"><input type="text" name="faktur_pajak" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">NO.PO</label>
                                    <div class="col-md-6"><input type="text" name="no_purchase" class="form-control" autocomplete="off" autofocus></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Surat Jalan</label>
                                    <div class="col-md-6"><input type="text" name="surat_jalan" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label">Type PPN</label>
                                    <div class="col-md-6">
                                        <select class="form-control select2" name="type_ppn" id="type_ppn">
                                            <option value="E">PPN EXCLUDE</option>
                                            <option value="I">PPN INCLUDE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>KODE</th>
                                        <th colspan="3">NAMA BARANG</th>
                                        <th>QTY</th>
                                        <th>HARGA/UNIT</th>
                                        <th>DISC(%)</th>
                                        <th>TOTAL</th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td style="width:200px;">
                                        <div class="input-group"><input type="hidden" class="form-control" name="so" id="_so" readonly>
                                            <div class="input-group"><input type="text" class="form-control" name="kode_inventori" id="_kodeinventori" readonly>
                                                <span class="input-group-append">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:250px;">
                                        <div class="col-md-12"><input type="text" name="type_inventori" id="_typeinventori" class="form-control" readonly></div>
                                    </td>
                                    <td style="width:250px;">
                                        <div class="col-md-12"><input type="text" name="brand_inventori" id="_brandinventori" class="form-control" readonly></div>
                                    </td>
                                    <td style="width:250px;">
                                        <div class="col-md-12"><input type="text" name="pola_inventori" id="_polainventori" class="form-control" readonly></div>
                                    </td>
                                    <td style="width:150px;">
                                        <div class="col-md-12"><input type="number" name="jumlah" id="_jumlah" class="form-control _hitung" autocomplete="off"></div>
                                    </td>
                                    <td style="width:250px;">
                                        <div class="col-md-12"><input type="text" name="harga_jual" id="_hargajual" class="form-control _hitung " autocomplete="off"></div>
                                    </td>
                                    <td style="width:150px;">
                                        <div class="col-md-12"><input type="number" name="discount" id="_discount" class="form-control _hitung" autocomplete="off"></div>
                                    </td>
                                    <td style="width:300px;">
                                        <div class="col-md-12"><input type="text" name="total" id="_total" class="form-control _hitung" disabled></div>
                                    </td>
                                    <td align="center" style="width:50px;">
                                        <button type="button" id="tambah_data" class="btn btn-outline btn-primary"><span class="fa fa-plus"></span> </button>
                                    </td>
                                </tr>
                            </table>
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
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>


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
                                        <span class="input-group-addon">Rp</span><input type="text" name="sub_total" id="subtotal" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">Discount Global (%)</label>
                                    <div class="col-md-2"><input type="text" name="disc_global" id="diskg" class="form-control makeHitung"></div>
                                    <div class="input-group col-md-4">
                                        <span class="input-group-addon">Rp</span><input type="text" name="disc_nilai" id="discount_nilai" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">DPP</label>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Rp</span><input type="text" name="dpp" id="dpp" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">PPN</label>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Rp</span><input type="text" name="ppn" id="ppn" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row"><label class="col-sm-3 col-form-label">Grand Total</label>
                                    <div class="input-group col-md-6">
                                        <span class="input-group-addon">Rp</span><input type="text" name="grand_total" id="grand" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <button type="submit" class="btn btn-block dim btn btn-outline btn-primary btn-lg">TAMBAH DATA </button>
                        <div class="hr-line-dashed"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-1 col-form-label">By</label>
                                    <div class="col-md-6"><input type="text" name="create_at" class="form-control" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row"><label class="col-sm-1 col-form-label">Last</label>
                                    <div class="col-md-6"><input type="text" name="last_so" class="form-control" autocomplete="off" readonly></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ====================================================DATA TAMPIL PRODUK=============================================================================== -->
<!-- ====================================================DATA MODAL PRODUK=============================================================================== -->
<div class="modal fade shadow-lg" id="addData" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <!-- isi tabel -->
                    <table class="table table-striped table-bordered table-hover text-center dataTables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Pola</th>
                                <th>Harga</th>
                                <th>
                                    <i class="fa fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $no = 0; foreach($inventori as $inv) : $no++ ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $inv->kode_inventori; ?></td>
                                <td><?= $inv->type_inventori; ?></td>
                                <td><?= $inv->nama_brand; ?></td>
                                <td><?= $inv->pola_inventori; ?></td>
                                <td><?= number_format($inv->harga_jual); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <span class="btn btn-primary btn-outline btn-xs _pilihBarang" id="_pilihBarang" kode="<?= $inv->kode_inventori; ?>" type="<?= $inv->type_inventori; ?>" brand="<?= $inv->nama_brand; ?>" pola="<?= $inv->pola_inventori; ?>" harga="<?= $inv->harga_jual; ?>"><i class="fa fa-plus"></i></span>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-outline" data-dismiss="modal">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script><script>
   
    $(document).ready(function() {
        $("#customer").on("change", function() {
            var alamat = $("#customer option:selected").attr("alamat");
            $("#alamat_cust").val(alamat);
    });
    

    $(document).ready(function() {
        $(document).on('click', '#_pilihBarang', function() {
            $('#_kodeinventori').val($(this).attr('kode'));
            $('#_typeinventori').val($(this).attr('type'));
            $('#_brandinventori').val($(this).attr('brand'));
            $('#_polainventori').val($(this).attr('pola'));
            $('#_hargajual').val($(this).attr('harga'));
            $('.modal-backdrop, #addData').modal('hide');
        });
    });

  $('._hitung').change(function() {
            harga_jual = $("#_hargajual").val();
            jumlah     = $("#_jumlah").val();
            disc       = $("#_discount").val();

            total = jumlah * harga_jual;

            disc  = (total * disc) / 100;
            disc  = Math.round(disc);
            total = total - disc;

            $("#_total").val(total);

        });

    });

     $(function() {

        var nom = 1;
        $('#tambah_data').click(function() {

            var invoice = $('#_invoice').val();
            var kode = $('#_kodeinventori').val();
            var type = $('#_typeinventori').val();
            var brand = $('#_brandinventori').val();
            var pola = $('#_polainventori').val();
            var jumlah = $('#_jumlah').val();
            var harga_jual = $('#_hargajual').val();
            var discount = $('#_discount').val();
            var total = $('#_total').val();
            var button = "<div style='width:80px;'><button class='btn-outline btn btn-warning EditBarang btn-xs' id='EditBarang'><i class='fa fa-edit'></i></button>|<button class='btn-outline btn btn-danger HapusBaris btn-xs' id='HapusBaris'><i class='fa fa-times'></i></button></div>";


            if (total === '') {
                total = 0;
            }

            if (jumlah === '') {
                jumlah = 0;
            }

            $('#data_table tbody:last-child').append(
                '<tr>' +
                '<td>' + kode + '</td>' +
                '<td>' + type + '</td>' +
                '<td>' + brand + '</td>' +
                '<td>' + pola + '</td>' +
                '<td>' + jumlah + '</td>' +
                '<td>' + harga_jual + '</td>' +
                '<td>' + discount + '</td>' +
                '<td id="total_' + nom + '" class="_hit">' + total + '</td><input type="hidden" name="item[]" value="'+ invoice +'|' + kode + '|' + type + '|' + brand + '|' + pola + '|' + jumlah + '|' + harga_jual + '|' + discount + '|' + total + '"/>' +
                '<td align="center" style="width:50px;">' + button + '</td>' +
                '</tr>'
            );

    $('.HapusBaris').click(function() { //untuk menghapus baris pada tabel tambah barang
        $(this).closest('tr').remove();
    });

            // menghitung subtotal , dpp,ppn			
        nom = nom + 1;

        makeHitung();
        // menghitung subtotal , dpp,ppn

        // clear input data
        $('#_kodeinventori').val('');
        $('#_typeinventori').val('');
        $('#_brandinventori').val('');
        $('#_polainventori').val('');
        $('#_jumlah').val('');
        $('#_hargajual').val('');
        $('#_discount').val('');
        $('#_total').val('');

        //untuk mengedit baris pada tabel tambah barang     
        $('.EditBarang').click(function() { 
            $('#_kodeinventori').val(kode);
            $('#_typeinventori').val(type);
            $('#_brandinventori').val(brand);
            $('#_polainventori').val(pola);
            $('#_jumlah').val(jumlah);
            $('#_hargajual').val(harga_jual);
            $('#_discount').val(discount);
            $('#_total').val(total);
            $(this).closest('tr').remove();
        });
    });

    $('.makeHitung').change(function() {
        makeHitung();
    })

        // menghitung subtotal , dpp,ppn
        makeHitung = function() {
            _tot = 0;
            for (_i = 1; _i <= 100; _i++) {
                _cek = $('#total_' + _i).attr('class');
                if (_cek != undefined) {
                    _val = parseInt($('#total_' + _i).html());
                    _tot = _tot + _val;
                }
            }


            $('#subtotal').val(to_rupiah(_tot));
            _discG = $("#diskg").val();
            _discGN = (_tot * _discG) / 100;
            _discGN = Math.round(_discGN);
            _total = _tot - _discGN;
            $('#discount_nilai').val(to_rupiah(_discGN));

            _ppn = $('#type_ppn').val();

            if (_ppn === "") {
                ppn = 'N';
                $('#type_ppn').val(_ppn);
            }

            _dpp = 0;
            _ppnN = 0;
            _grd = 0;


            if (_ppn === "I") {

                _ppnN = _total / 11;
                _ppnN = Math.round(_ppnN);
                _dpp = _total;
                _grd = _total;
                _grd = Math.round(_grd);
            }

            if (_ppn === "E") {
                _dpp = _total;
                _ppnN = (_total * 10) / 100;
                _ppnN = Math.round(_ppnN);
                _grd = _total + _ppnN;
                _grd = Math.round(_grd);
            }


            $('#dpp').val(to_rupiah(_dpp));
            $('#ppn').val(to_rupiah(_ppnN));
            $('#grand').val(to_rupiah(_grd));
        }
        // menghitung subtotal , dpp,ppn
    });

    //membuat format uang 
    function to_rupiah(angka) {
        var rev = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2 = '';
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== (rev.length - 1)) {
                rev2 += '.';
            }
        }
        return rev2.split('').reverse().join('');
    }
    //membuat format uang 
</script>

