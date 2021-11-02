<?php 
    require_once '../init.php';

    if( isset( $_GET['id'] ) ) {
        $reviews = Review::get($_GET['id']);
    } else {
        $reviews = Review::get();
    }

    require_once 'templates/header.php';
?>

        <!-- content -->
        <div class="row mt-3">
            <div class="col-md-6">
                <a href="review_input.php" class="btn btn-outline-primary">Add Review</a>
            </div>
        </div>
        <div class="row">
            <?php Flasher::flashLogin(); ?>
        </div>
        <p class="mt-3" style="font-weight:bold">NEWEST REVIEWS</p>

        <?php foreach( $reviews as $review  ) : ?>
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body text">
                                <figure class="figure">
                                    <img src="../uploads/image_product/<?= $review['image']; ?>" class="figure-img img-fluid" alt="..." style="width:160px; height:auto;">
                                    <figcaption class="figure-caption">
                                        <?php 
                                            $rating = Brand::getAverageRating($review['product_id']); 

                                            for($i=0; $i < 5; $i++) {
                                                if( $i < round($rating[0]) ) {
                                                    echo '<span class="fa fa-star checked"></span>';
                                                } else {
                                                    echo '<span class="fa fa-star"></span>';
                                                }
                                            }

                                            if( empty($rating) ) {
                                                echo " (0)";
                                            } else {
                                                echo ' ('.number_format($rating[0], 1, '.', '').')';
                                            }             
                                        ?>
                                    </figcaption>
                                </figure>
                                <h4 class="card-title m-0">
                                    <a href="#" class="text-dark btn">
                                        <?= $review['brand_name']; ?>
                                    </a>
                                </h5>
                                <h6 class="card-text m-0">
                                    <a href="../views/master_review.php?id=<?= $review['product_id']; ?>" class="text-dark btn">
                                        <?= $review['product_name']; ?>
                                    </a>
                                </h6>
                                <p style="color:grey;"><?= $review['category_name']; ?></p>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="row no-gutters">
                            <div class="col-sm-1" >
                                <img class="img-fluid rounded-circle" alt="Profile Picture" src="profile.png" style="width:55px; height:auto;" >
                            </div>
                            <div class="col-sm-5">
                                <h6 class="card-title">
                                    <b><?= $review['user_name']; ?></b>
                                    <br>
                                    <p class="mt-1">direview pada <?= date("d F Y", strtotime($review['created_at'])); ?></p>
                                </h5>
                                <hr>
                                <p>
                                    tipe kulit wajah : <?= $review['skin']; ?>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <?php if( ( isset($_SESSION['r']) && $_SESSION['r'] == 'admin') || ( isset($_SESSION['username']) && $_SESSION['username'] == $review['user_name']) ) : ?>
                                    <!-- three dots -->
                                    <div class="dropdown pull-right">
                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                        </ul>
                                    </div>
                                    <!-- /three dots -->
                                <?php endif; ?>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- star -->
                                    <figcaption class="figure-caption">
                                        <?php for( $i = 0; $i < 5; $i++ ) : ?>
                                            <?php if( $i < $review['rating']) : ?>
                                                <span class="fa fa-star checked"></span>
                                            <?php else : ?>
                                                <span class="fa fa-star"></span>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                        &ensp; &#124; &ensp; 
                                        
                                        <?= $review['user_name']; ?> <?= $review['rating'] >= 3 ? '<span class="badge badge-success">recommended</span> this product &#128522' : '<span class="badge badge-danger">not recommended</span> this product &#128543'; ?> 
                                    </figcaption>
                                </div>
                            </div>
                            
                            <div class="row mt-4" >
                                <div class="col-md-12">
                                    <p>Review :</p>
                                    <p class="ml-5"><?= $review['text']; ?></p>
                                </div>
                            </div>
                        
                        <div class="mt-5" style="background-color:pink;">
                                <p>Waktu penggunaan : <?= $review['usage_periode']; ?></p>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
        <?php endforeach; ?>
        <!-- content -->
    </div>

<?php require_once 'templates/footer.php'; ?>