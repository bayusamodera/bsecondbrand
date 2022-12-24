<div class="content-wrapper mt-3">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ubah Konsumen</h3>
            </div>

            <form action="<?= base_url('admin/edit_konsumen') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="card-body">

                <input type='hidden' value='<?= $this->uri->segment(3) ?>' name='id'>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-6">
                    <input class='form-control' name='aa' type='text' value='<?= $row['username'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-6">
                    <input class='form-control' type='password' name='a'>
                    <small style='color:red'><i>Kosongkan saja jIka tidak ubah.</i></small>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-6">
                    <input class='required form-control' type='text' name='b' value='<?= $row['nama_lengkap'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-6">
                    <input class='required email form-control' type='email' name='c' value='<?= $row['email'] ?>' required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-6">
                    <?php if ($row['jenis_kelamin'] == 'Laki-laki') {
                      echo "<input type='radio' value='Laki-laki' name='d' checked> Laki-laki <input type='radio' value='Perempuan' name='d'> Perempuan ";
                    } else {
                      echo "<input type='radio' value='Laki-laki' name='d'> Laki-laki <input type='radio' value='Perempuan' name='d' checked> Perempuan ";
                    } ?>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Status Aktivasi</label>
                  <div class="col-sm-6">
                    <?php if ($row['aktif'] == '1') {
                      echo "<input type='radio' value='1' name='aktif' checked> aktif <input type='radio' value='0' name='aktif'> belum aktif ";
                    } else {
                      echo "<input type='radio' value='1' name='aktif'> aktif <input type='radio' value='0' name='aktif' checked> belum aktif ";
                    } ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">No. Telp</label>
                  <div class="col-sm-6">
                    <input class='form-control' type='number' name='l' value='<?= $row['no_telp'] ?>' maxlength="13" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type='submit' name='submit' class='btn btn-primary btn-sm'>Perbarui</button>
                    <a href='<?= base_url('admin/konsumen') ?>'><button type='button' class='btn btn-secondary btn-sm ml-1'>Batal</button></a>
                  </div>
                </div>


              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>