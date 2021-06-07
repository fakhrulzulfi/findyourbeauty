<?php 
    require_once '../init.php';

    $brands = Brand::get();
?>

<?php require_once 'templates/header.php'; ?>

    <div class="container mt-4">
        <h1 class="text-center">brands</h1>
        <div class="card">
            <div class="row mx-auto">
                <?php for($i = 0; $i<count($brands); $i++) : ?>
                    <div class="col-md-2 m-3 border rounded-right">
                        <a href="brand_detail.php?id_brand=<?= $brands[$i]['id']; ?>" style="text-decoration:none;">
                            <p class="text-center m-2"><?= $brands[$i]['name']; ?></p>
                            <!-- <img src="https://mdbootstrap.com/img/new/standard/nature/181.jpg" class="rounded" width="auto" height="130">  -->
                        </a>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

<?php require_once 'templates/footer.php'; ?>