<div class="row">

  <div class="col-md-7 mx-auto">





    <div class="mb-3 text-center">

      <h5 class="mb-5">Transaksi Berhasil</h5>

      No Invoice anda : <b><?= $orders; ?></b><br>

      Total belanja anda <b class="text-danger">Rp <?= $total_bayar; ?></b><br>

      <a class="btn btn-sm btn-success mt-3 mb-2" href="<?= base_url(); ?>members/riwayat_belanja"><span class="glyphicon glyphicon-print"></span> Lihat Pesanan</a>

      <br>

    </div>



    <div class="mb-3">

      <p class="text-justify">

        Silahkan mentransferkan uang dengan total <b>Rp <?= $total_bayar; ?></b> ke bank di bawah ini : <br>

      </p>

    </div>



    <div class="col-md-10 mx-auto text-left">

      <table class='table table-borderless table-sm'>

        <thead>

          <tr>

            <th width="20px">No</th>

            <th>Nama Bank</th>

            <th>No Rekening</th>

            <th>Atas Nama</th>

          </tr>

        </thead>

        <tbody>

          <?php

          $no = 1;

          $rekening = $this->model_app->view('tb_toko_rekening');

          foreach ($rekening->result_array() as $row) {

            echo "<tr>

                <td>$no</td>

                <td>$row[nama_bank]</td>

                <td>$row[no_rekening]</td>

                <td>$row[pemilik_rekening]</td>

            </tr>";

            $no++;

          }

          ?>

        </tbody>

      </table>

    </div>



    <hr>

    <p class="mt-2 mb-2">

      Setelah melakukan Pembayaran, silahkan konfirmasi pembayaran anda <a href='<?= base_url(); ?>konfirmasi'><strong>disini</strong></a>.

    </p>

  </div>

</div>

<div class="border-top mt-2 mb-5"></div>