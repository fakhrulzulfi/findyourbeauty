<?php 
    require_once '../init.php';

    if( !isset($_SESSION['username']) && !isset($_SESSION['email']) ) {
        Flasher::setFlash('kamu harus login dulu!', '', 'danger');
        header('Location: master_review.php');
        exit;
    }
    require_once 'templates/header.php';

    $products = Product::get();
?>

<div class="container mt-2"> 
    <h2 class="text-center mt-3">Review Produk</h2>
    <form action="../controller/review_controls.php?action=add" method="POST">
        <div class="row">
            <div class="col-md-7 mx-auto mb-5">
                <input type="hidden" value="<?= $_SESSION['id']; ?>" name="id_user">
                <label for="nama_produk">Produk</label>
                <select title="Select your product" class="custom-select" id="nama_produk" name="select_product" required>
                    <option disabled selected>- Pilih Produk -</option>
                    <?php foreach( $products as $product ) : ?>
                        <option value="<?= $product['product']['product_id']; ?>"><?= $product['product']['product_name']; ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="form-group mt-3">
                    <label for="rating">Rating yang anda berikan...</label>
                    <input type="number" min="1" max="5" name="rating" id="rating" class="form-control" placeholder="1-5" required>
                </div>

                <div class="form-group mt-3">
                    <label for="usage_periode">Berapa lama kamu menggunakan produk tersebut?</label>
                    <select name="usage_periode" id="usage_periode" class="custom-select">
                        <option disabled selected>- Pilih Jangka Waktu -</option>
                        <option value="Baru pertama kali">Baru pertama kali</option>
                        <option value="Kurang dari 1 minggu">Kurang dari 1 minggu</option>
                        <option value="1 - 3 Bulan">1 - 3 Bulan</option>
                        <option value="3 - 6 Bulan">3 - 6 Bulan</option>
                        <option value="Lebih dari 1 tahun">Lebih dari 1 tahun</option>
                    </select>
                </div>
                
                <div class="form-group mt-3">
                    <label for="skin">Jenis kulit wajah anda?</label>
                    <input type="text" name="skin" id="skin" class="form-control" placeholder="sawo matang" required>
                </div>

                <div class="form-group mt-3">
                    <label for="text_review">Tulis review anda</label><br>
                    <textarea name="text_review" id="text_review" cols="55" rows="10" placeholder="Masukkan review anda..." required></textarea>
                </div>

                <button type="submit" class="btn btn-outline-info">Kirim</button>
                <button type="reset" class="btn btn-outline-danger">Reset</button>
            </div>
        </div>
    </form>
</div>


<?php require_once 'templates/footer.php'; ?>
