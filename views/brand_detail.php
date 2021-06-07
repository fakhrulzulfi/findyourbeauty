
<?php 
    require_once '../init.php';

    $id_brand = $_GET['id_brand'];
    $brand = Brand::get($id_brand);
    $products = Brand::getProductByBrand($id_brand); 
?>

    <?php require_once 'templates/header.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 mx-auto">
                <div class="row">
                    <div class="col-md-6 mt-4 text-center mx-auto">
                        <h3 class="ml-2"><?= $brand[0]['name']; ?></h3>
                        <p class="ml-3"><?= count($products) ?> Product</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="row m-5">

            <?php for( $i=0; $i<count($products); $i++ ) : ?>
            <div class="col-lg-4">
                <a href="master_review.php?id=<?= $products[$i]['id']; ?>" class="text-reset" style="text-decoration:none;">
                    <div class="card">
                        <!-- image -->
                        <img
                            src="../uploads/image_product/<?= $products[$i]['image']; ?>"
                            class="card-img-top"
                            alt="image product">
                        
                        <!-- rating -->
                        <figcaption class="figure-caption mt-3 mx-auto">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php 
                                $rating = Brand::getAverageRating($products[$i]['id'])[0]; 
                                if( empty($rating) ) {
                                    echo "(0)";
                                } else {
                                    echo '('.number_format($rating, 1, '.', '').')';
                                }             
                            ?>
                        </figcaption>

                        <div class="card-body text-center">
                            <!-- nama produk -->
                            <h5 class="card-title"><?= $products[$i]['name']; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php endfor; ?>
        </div>
    </div>









<?php require_once 'templates/footer.php'; ?>
