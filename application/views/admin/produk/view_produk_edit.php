<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <?php if ($this->session->username == 'staff') { ?>
              <h3 class="card-title">Edit Produk</h3>
                        <?php } else { ?>
            <h3 class="card-title">Edit Approve Produk</h3>
                <?php } ?>

            </div>

            <div class="card-body">
              <form action="<?= base_url('admin/edit_produk') ?>" method="post" enctype="multipart/form-data">

                <input type='hidden' name='id' value='<?= $rows['id_produk'] ?>'>

                <?php if ($this->session->username == 'manager') { ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Setujui Produk</label>
                  <div class="col-sm-6 mt-2">
                    <input type="radio" name="status_produk" value="1" <?php if($rows['status_produk']=='1') echo 'checked'?>><label class="ml-1">Setujui Produk</label>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status_produk" value="0" <?php if($rows['status_produk']=='0') echo 'checked'?>><label class="ml-1">Batal Setujui Produk</label>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-6">
                    <select name='a' class='form-control' required>
                      <option value='' selected>- Pilih Kategori Produk -</option>
                      <?php
                      foreach ($record as $row) {
                        if ($rows['id_kategori_produk'] == $row['id_kategori_produk']) {
                          echo "<option value='$row[id_kategori_produk]' selected>$row[nama_kategori]</option>";
                        } else {
                          echo "<option value='$row[id_kategori_produk]'>$row[nama_kategori]</option>";
                        }
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Nama Produk</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='b' value='<?= $rows['nama_produk'] ?>' required></td>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='c' value='<?= $rows['satuan'] ?>' required>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Berat</label>
                  <div class="col-sm-6"><input type='text' class='form-control' name='berat' value='<?= $rows['berat'] ?>' required>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Harga Konsumen</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='f' value='<?= $rows['harga_konsumen'] ?>' required>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Diskon</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='diskon' value='<?= $rows['diskon'] ?>'>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='stok' value='<?= $rows['stok'] ?>' required>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea id="summernote" rows="5" class='form-control' name='ff' required><?= $rows['keterangan'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row" style="display: none;">
                  <label class="col-sm-2 col-form-label">Ganti Gambar</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLangHTML" name="g">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih gambar...</label>
                    </div>
                  </div>
                </div>

                <?php
                if ($rows['gambar'] != '') { ?>
                  <div class="form-group row" style="display: none;">
                    <label class="col-sm-2 col-form-label">Gambar Saat Ini</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/produk/') . $rows['gambar'] ?>" alt="" style="height: 150px">
                    </div>
                  </div>
                <?php } ?>

                <?php } else { ?>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-6">
                    <select name='a' class='form-control' required>
                      <option value='' selected>- Pilih Kategori Produk -</option>
                      <?php
                      foreach ($record as $row) {
                        if ($rows['id_kategori_produk'] == $row['id_kategori_produk']) {
                          echo "<option value='$row[id_kategori_produk]' selected>$row[nama_kategori]</option>";
                        } else {
                          echo "<option value='$row[id_kategori_produk]'>$row[nama_kategori]</option>";
                        }
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Produk</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='b' value='<?= $rows['nama_produk'] ?>' required></td>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-6">
                    <input type='text' class='form-control' name='c' value='<?= $rows['satuan'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Berat</label>
                  <div class="col-sm-6"><input type='text' class='form-control' name='berat' value='<?= $rows['berat'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Harga Konsumen</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='f' value='<?= $rows['harga_konsumen'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Diskon</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='diskon' value='<?= $rows['diskon'] ?>'>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Stok</label>
                  <div class="col-sm-6">
                    <input type='number' class='form-control' name='stok' value='<?= $rows['stok'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea id="summernote" rows="5" class='form-control' name='ff' required><?= $rows['keterangan'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Ganti Gambar</label>
                  <div class="col-sm-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLangHTML" name="g">
                      <label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih gambar...</label>
                    </div>
                  </div>
                </div>

                <?php
                if ($rows['gambar'] != '') { ?>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gambar Saat Ini</label>
                    <div class="col-sm-6">
                      <img src="<?= base_url('assets/images/produk/') . $rows['gambar'] ?>" alt="" style="height: 150px">
                    </div>
                  </div>
                <?php } ?>

                <?php } ?>
                        </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/produk') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                  </div>
                </div>
                

              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>