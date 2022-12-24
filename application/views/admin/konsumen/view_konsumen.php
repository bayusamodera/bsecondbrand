<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Konsumen</h3>
            </div>

            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless" style="width: 100%">
                <thead>
                  <tr style="text-align: center">
                    <th style="width: 5%">No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Status</th>
                    <th>Waktu Daftar</th>
                    <th style="width: 15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) { ?>
                    <tr style='text-align: center'>
                              <td><?= $no ?></td>
                              <td><?= $row['nama_lengkap'] ?></td>
                              <td><?= $row['email'] ?></td>
                              <td><?= $row['no_telp'] ?></td>
                              <td><?= $row['aktif'] ?></td>
                              <td><?=  tgl_indo($row['tgl_daftar']) ?></td>
                              <td>
                                <a class='btn btn-info btn-xs' title='Detail' href='<?= base_url("admin/detail_konsumen/") . $row["id_pengguna"] ?>'><i class='fas fa-search fa-fw'></i> Detail</a>
                                <a class='btn btn-success btn-xs' title='Ubah' href='<?= base_url("admin/edit_konsumen/") . $row["id_pengguna"] ?>'><i class='fas fa-edit fa-fw'></i></a>
                                <button class='btn btn-danger btn-xs' title='Hapus' data-id='<?= $row['id_pengguna'] ?>' onclick="confirmation(event)"><i class='fas fa-times fa-fw'></i></button>
                              </td>
                          </tr>
                          <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>