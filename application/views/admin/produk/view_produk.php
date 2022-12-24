<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semua Produk</h3>
              <?php if ($this->session->username == 'staff') { ?>
              <a class='float-right btn btn-primary btn-sm' href='<?= base_url('admin/tambah_produk'); ?>'>Tambah Produk</a>
              <?php } ?>
            </div>

            <div class="card-body">
              <table id="table1" class="table table-sm table-borderless" style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 25%">Nama Produk</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <?php if ($this->session->username == 'manager') { ?>
                    <th>Status</th>  
                    <?php } ?>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($record as $row) { ?>
                    <tr>
                      <td><?= $no ?></td>
                              <td><?= $row['nama_produk'] ?></td>
                              <td>Rp <?= rupiah($row['harga_konsumen']) ?></td>
                              <td>Rp <?= rupiah($row['diskon'])  ?></td>
                              <td><?= $row['stok'] ?>&nbsp;pcs</td>
                              <?php if ($this->session->username == 'manager') { ?>
                              <td>
                                  <?= $row['status_produk'] ?>
                              </td>
                              <?php } ?>
                             
                              <td>
                                <?php if ($this->session->username == 'manager') { ?>
                                <a class='btn btn-success btn-xs' title='Ubah' href='<?= base_url('admin/edit_produk/') . $row['id_produk'] ?>'><i class='fas fa-edit fa-fw'></i></a>

                                <?php } else { ?>
                                <a class='btn btn-success btn-xs' title='Ubah' href='<?= base_url('admin/edit_produk/') . $row['id_produk'] ?>'><i class='fas fa-edit fa-fw'></i></a>
                                <button class='btn btn-danger btn-xs' title='Hapus' data-id='<?= $row['id_kategori_produk'] ?>' onclick="confirmation(event)"><i class='fas fa-times fa-fw'></i></button>
                          
                                <?php } ?>
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


<script>
  function confirmation(ev) {
    ev.preventDefault();
    var data_id = ev.currentTarget.getAttribute('data-id');
    var currentLocation = window.location;
    Swal.fire({
      title: 'Konfirmasi Hapus Data',
      text: "Apakah Anda ingin menghapus data ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: site_url + 'admin/delete_kategori_produk/' + data_id,
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            Swal.fire({
              title: 'Dihapus!',
              text: 'Data berhasil dihapus',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              location.reload();
            })
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
              title: 'Gagal!',
              text: 'Terdapat produk yang menggunakan kategori ini',
              icon: 'error',
              showConfirmButton: false,
              timer: 2000
            })
          },
        });
      }
    })
  }
</script>