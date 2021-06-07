<?php 
    require_once "../init.php";


    $category = Category::get();
    $brand = Brand::get();

    require_once 'templates/header.php';
?>

    <div class="info-data" data-infodata="<?php echo $message; unset($_SESSION["message"]); ?>"></div>
    <div class="container mx-auto">
            <div class="header">
                <h2 class="text-center m-3">UPLOAD NEW PRODUCT</h1>
            </div>

        <form action="../controller/product_controls.php?action=add" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="col">
                        <center>
                            <img src="../assets/images/image-default.jpg" width="300px" height="400px" style="object-fit:cover;" onerror="this.style.opacity='0'">
                        <input class="form-control" id="image" type="file" name="image">
                        </center>
                    </div>
                </div>

                <div class="col-md-4">
                    <br>

                    <div class="col">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="category">Kategori</label>
                                    <select class="btn btn-outline-dark" name="category" id="category">
                                        <option selected disabled hidden>- Pilih Kategori -</option>
                                        <?php for($i = 0; $i < count($category); $i++) : ?>
                                            <option class="btn btn-light" value="<?= $category[$i]["id"]; ?>"><?= $category[$i]["name"]; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="brand">Brand</label>
                                    <select class="btn btn-outline-dark" name="brand" id="brand">
                                        <option selected disabled hidden>- Pilih Brand -</option>
                                        <?php for($i = 0; $i < count($brand); $i++) : ?>
                                            <option class="btn btn-light" value="<?= $brand[$i]["id"]; ?>"><?= $brand[$i]["name"]; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Nama Produk</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Moisturizing Cream" />
                    </div>

                    <!-- Price input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="price">Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" id="price" name="price" placeholder="20000">
                        </div>
                    </div>

                </div>

            </div>
            <!-- Submit button -->
            <div class="row m-5">
                <div class="mx-auto">
                <button type="reset" class="btn btn-danger">RESET</button>        
                <button type="submit" class="btn btn-primary">ADD</button>        
                </div>
            </div>
                
        </form>
    </div>

<?php require_once 'templates/footer.php'; ?>

