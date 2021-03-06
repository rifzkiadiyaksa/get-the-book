<main>
  <div class="container">
    <div class="mt-4">
      <?php
            $buku_id = $_GET['buku_id'];
            
            $query_buku = mysqli_query($con, "SELECT * FROM buku WHERE buku_id='$buku_id' AND status='on'");
            $row = mysqli_fetch_assoc($query_buku);
            ?>
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 mb-3 col">
          <img class="card-img-top card card-shadow" src="<?= BASE_URL ?>assets/img/buku/<?= $row['gambar'] ?>"
            alt="Card image cap">
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8">
          <div class="card card-shadow">
            <div class="card-body">
              <h4 class="card-title"><?= $row['nama_buku'] ?></h4>
              <h5 class="card-title text-secondary"><?= $row['penulis'] ?></h5>
              <hr>
              <h3 class="card-title text-danger"><?= rupiah($row['harga']) ?></h3>
            </div>
          </div>
          <div class="card card-shadow mt-4">
            <div class="card-body">
              <h5 class="card-title text-secondary">Deskripsi</h5>
              <hr>
              <p class="card-text"><?= $row['deskripsi'] ?></p>
            </div>
          </div>
          <div class="mt-4">
            <div class="row">
              <div class="col">
                <a href="<?= BASE_URL ?>index.php" class="btn btn-outline-primary mr-3 card-shadow"
                  style="border-radius: 30px; padding: 10px; width: 100%;">
                  <i class="fas fa-chevron-left"></i> Kembali
                </a>
              </div>
              <div class="col">
                <a href="<?= BASE_URL ?>tambah_keranjang.php?buku_id=<?= $row['buku_id']?>"
                  class="btn btn-primary col card-shadow" style="border-radius: 30px; padding: 10px; width: 100%;">
                  <img src="<?= BASE_URL . 'assets/img/icons8-shopping-basket-60.png' ?>" width="20"> Keranjang
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->

<?php
require_once("footer.php");
?>