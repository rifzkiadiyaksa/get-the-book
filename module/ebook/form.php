<?php
$ebook_id = isset($_GET['ebook_id']) ? $_GET['ebook_id'] : false;
$nama_ebook = "";
$penulis = "";
$kategori_id = "";
$deskripsi = "";
$harga = "";
$status = "";
$gambar = "";
$keterangan_gambar = "";
$button = "Tambah";

if ($ebook_id) {
  $query_ebook = mysqli_query($con, "SELECT * FROM ebook WHERE ebook_id='$ebook_id'");
  $row = mysqli_fetch_assoc($query_ebook);

  $nama_ebook  = $row['nama_ebook'];
  $penulis     = $row['penulis'];
  $kategori_id = $row['kategori_id'];
  $deskripsi   = $row['deskripsi'];
  $gambar      = $row['gambar'];
  $harga       = $row['harga'];
  $status      = $row['status'];
  $button      = "Update";

  $keterangan_gambar = "( Ganti gambar jika diperlukan )";
  $gambar = "<img src='" . BASE_URL . "assets/img/ebook/$gambar' class='img-size'>";
}
?>
<div class="mt-3 mb-3">
  <h2><i class="fas fa-box"></i> Data E-Book</h2>
</div>
<div class="card">
  <div class="card-header bg-dark text-white">
    <h5>
      <?= $button ?> Data
    </h5>
  </div>
  <script src="<?= BASE_URL . 'assets/js/ckeditor/ckeditor.js' ?>"></script>
  <div class="card-body">
    <!-- Untuk Mengupload Data Ke Web Server   -->
    <form action="<?= BASE_URL . "module/ebook/action.php?ebook_id=$ebook_id" ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" id="" class="form-control">
          <?php
          $query = mysqli_query($con, "SELECT kategori_id, kategori FROM kategori WHERE status = 'on' ORDER BY kategori ASC");
          while ($row = mysqli_fetch_assoc($query)) {

            if ($kategori_id == $row['kategori_id']) {
              echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
            } else {
              echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Nama E-Book</label>
        <input type="text" name="nama_ebook" class="form-control" value="<?= $nama_ebook ?>">
      </div>
      <div class="form-group">
        <label>Nama Penulis</label>
        <input type="text" name="penulis" class="form-control" value="<?= $penulis ?>">
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control textarea ckeditor" id="ckedtor"><?= $deskripsi ?></textarea>
      </div>
      <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control" value="<?= $harga ?>">
      </div>
      <div class="form-group">
        <label>Gambar Produk <?= $keterangan_gambar ?></label>
        <input type="file" name="file" class="form-control-file"> <?= $gambar ?>
      </div>
      <div class="form-group">
        <label>Status</label>
        <div class="form-ceck">

          <input type="radio" name="status" value="on" <?php if ($status == "on")  echo "checked='true'" ?>> On
          <input type="radio" name="status" value="off" <?php if ($status == "off") echo "checked='true'" ?>> Off
        </div>
      </div>
      <div class="form-group">
        <input type="submit" value="<?= $button ?>" name="button" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>