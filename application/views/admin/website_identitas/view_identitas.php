<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Identitas Website</h3><br>
            </div>

            <div class="card-body">


              <form action="<?= base_url('admin/website') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Website</label>
                    <div class="col-sm-10">
                      <input type='text' class='form-control' name='nama' value="<?= $record['nama_website'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                      <input type='email' class='form-control' name='email' value="<?= $record['email'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Rekening</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='rek' value="<?= $record['rekening'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-6">
                      <input type='text' class='form-control' name='telp' value="<?= $record['no_telp'] ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kota Toko</label>
                    <div class="col-sm-6">
                      <select class='form-control select2' name='kota' required>
                        <option value=''>- Pilih -</option>
                        <?php
                        $kota = $this->model_app->view('tb_kota');
                        foreach ($kota->result_array() as $rows) {
                          if ($record['kota_id'] == $rows['kota_id']) {
                            echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
                          } else {
                            echo "<option value='$rows[kota_id]?>'>$rows[nama_kota]</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class='form-control' name='alamat' rows="3"><?= $record['alamat'] ?></textarea>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <button type='submit' name='submit' class='btn btn-primary btn-sm'>Simpan</button>
                    </div>
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