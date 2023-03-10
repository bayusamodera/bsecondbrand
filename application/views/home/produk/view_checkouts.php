<form action='' method='POST'>
    <div class="row">
        <?php
        $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-(b.diskon*a.jumlah)) as total, sum(b.berat*a.jumlah) as total_berat FROM `tb_toko_penjualantemp` a JOIN tb_toko_produk b ON a.id_produk=b.id_produk where a.session='" . $this->session->idp . "'")->row_array();
        $iden = $this->model_app->view_where('tb_web_identitas', array('id_identitas' => '1'))->row_array();
  
        ?>
        <div class="col-md-4">
            <div class="card w-100 shadow mb-2 bg-white rounded">
                <div class="card-body">
                    <h6 class="float-left">Data Pemesan</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <small>Nama</small><br>
                                <input type="text" name='nama_pem' class="form-control" value="<?= $rows['nama_lengkap'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small>Nomor telepon</small><br>
                                <input type="text" name='telp_pem' class="form-control" value="<?= $rows['no_telp'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="display:none;">
                                <small>Kota</small><br>


                                <select name="kota_pem" id='kota_pem' class='form-control select2'>
                                    <option value="Pilih kota"></option>
                                    <?php $qkota = $this->db->get('tb_kota');
                                    foreach ($qkota->result_array() as $kota) {
                                        if ($kota['kota_id'] == $rows['kota_id']) {
                                    ?>
                                            <option value="<?= $kota['kota_id'] ?>" selected><?= $kota['nama_kota'] ?></option>

                                        <?php } else { ?>
                                            <option value="<?= $kota['kota_id'] ?>"><?= $kota['nama_kota'] ?></option>
                                    <?php }
                                    } ?>
                                </select>

                            </td>

                            <td>
                                <small>Lokasi Toko</small><br>
                                    <?= $iden['alamat']; ?>
                                    <a href="https://goo.gl/maps/tbUmZrfP4MDpNgQk6" class="btn btn-sm btn-primary mt-3" target="_blank">Lihat Maps</a> 
                                </input>
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card w-100 shadow mb-2 bg-white rounded">
                <div class="card-body">
                    <h6>Detail Belanja</h6>
                    <table class="table table-borderless" style="width: 100%">
                        <?php
                        $no = 1;
                        $total_diskon = 0;
                        foreach ($record->result_array() as $row) {
                            $sub_total = (($row['harga_jual'] - $row['diskon']) * $row['jumlah']);
                            if ($row['diskon'] != '0') {
                                $diskon = "<del style='color:red'>" . rupiah($row['harga_jual']) . "</del>";
                            } else {
                                $diskon = "";
                            }
                            $diskon_total = $diskon_total + $row['diskon'] * $row['jumlah'];
                        ?>

                            <tr>
                                <td style="width: 5%"><?= $no++ ?></td>
                                <td style="width: 55%">
                                    <a href="<?= base_url('produk/detail/') . $row['produk_seo']; ?>"> <?= $row['nama_produk']; ?></a>
                                    &times;
                                    <?= $row['jumlah']; ?>
                                </td>
                                <td style="width: 35%">
                                    Rp <span class="float-right"><?= rupiah($sub_total) ?></span>
                                </td>
                                <td style="width: 5%">
                                    <a href="<?= base_url() . "keranjang/delete2/" . encrypt_url($row['id_penjualan_detail']);  ?>">
                                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                            <svg width="10px" height="10px">
                                                <use xlink:href="<?= base_url('assets/template/tema/') ?>images/sprite.svg#cross-10"></use>
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>
                    </table>

                    <input type="hidden" name="total" id="total" value="<?= $total['total']; ?>" />
                    <input type="hidden" name="ongkir" id="ongkir" value="0" />
                    <input type="hidden" name="berat" value="<?= $total['total_berat']; ?>" />
                    <input type="hidden" name="diskonnilai" id="diskonnilai" value="<?= $diskon_total; ?>" />

                                        <div class="row">
                        <div class="col-3">
                            <h6>Sistem :</h6>
                        </div>
                        <div class="col-9">
                        <select name="kurir" id="" class="kurir form-control w-100" style="visibility:hidden">
                                <option value="cod" id="cod" onclick="show2();">Datang ke Toko</option>
                        </select>
                        <input type="radio" name="service" class="service" data-id="1" value="Bayar di Toko" onclick="show2();" /> &nbsp; Ambil di Toko <br>
                            <small class="text-danger pr-3">
                                Pengambilan dilakukan di toko kami pada jam kerja dibawah ini.<br>
                                <table class="table table-sm table-borderless">

                                    <tr>
                                        <th>Hari</th>
                                        <td>: Senen - Sabtu</td>
                                    </tr>
                                    <tr>
                                        <th>Waktu</th>
                                        <td>: Pukul 09.00 - 16.00 Wib</td>
                                    </tr>
                                </table>

                            </small>

                            <input type="hidden" name="tarif" id="tarif1" value="0" />
                        </div>
                    </div>

                    <div class="row mt-2" id="kuririnfo" style="display: none">
                        <div class="col-3"></div>
                        <div class="col-9 pt-2" id="kurirserviceinfo">

                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="col-md-3">
            <div class="card w-100 shadow mb-2 bg-white rounded">
                <div class="card-body">
                    <h6>Ringkasan Belanja</h6>
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <small>Total Harga</small><br>
                                <strong>Rp <?= rupiah($total['total']) ?></strong>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <small>Biaya Kirim</small><br>
                                <strong id="kirim"></strong>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small>Total Bayar</small><br>
                                <strong id="totalbayar"></strong>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <button type='submit' name='submit' id='oksimpan' class='btn btn-success btn-block btn-sm' style='display:none'>
                                    Bayar
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    $(document).ready(function() {

        $(".kurir").each(function(o_index, o_val) {
            $(this).on("change", function() {
                checkouts();
            });
        });

        $("#kota_pem").each(function(o_index, o_val) {
            $(this).on("change", function() {
                change_city();
            });
        });

        $("#diskon").html(toDuit(0));
        hitung();

    });

    function checkouts() {
        var kurir = $('.kurir').val();
        var berat = "<?php echo $total['total_berat']; ?>";
        var kota = document.getElementById("kota_pem").value;
        $.ajax({
                method: "get",
                dataType: "html",
                url: site_url + 'produk/kurirdata',
                data: "kurir=" + kurir + "&berat=" + berat + "&kota=" + kota,
                beforeSend: function() {
                    $("#oksimpan").hide();
                }
            })
            .done(function(x) {
                $("#kurirserviceinfo").html(x);
                $("#kuririnfo").show();

            })
            .fail(function() {
                $("#kurirserviceinfo").html("");
                $("#kuririnfo").hide();
            });
    }

    function change_city() {
        var kurir = $('.kurir').val();
        var berat = "<?php echo $total['total_berat']; ?>";
        var kota = document.getElementById("kota_pem").value;
        $.ajax({
                method: "get",
                dataType: "html",
                url: site_url + 'produk/kurirdata',
                data: "kurir=" + kurir + "&berat=" + berat + "&kota=" + kota,
                beforeSend: function() {
                    $("#oksimpan").hide();
                }
            })
            .done(function(x) {
                $("#kurirserviceinfo").html(x);

            })
            .fail(function() {
                $("#kurirserviceinfo").html("");
            });
    }

    function show2() {
        $("#oksimpan").show();
    }

    function hitung() {
        var diskon = $('#diskonnilai').val();
        var total = $('#total').val();
        var ongkir = $("#ongkir").val();
        var bayar = (parseFloat(total) + parseFloat(ongkir));
        var ongkir2 = parseFloat(ongkir);
        $("#kirim").html(toDuit(ongkir2));
        $("#totalbayar").html(toDuit(bayar));
    }
</script>