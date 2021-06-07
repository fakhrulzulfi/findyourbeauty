<?php 
    require_once '../init.php';

    $action = $_GET["action"];

    if( $action == "add" ) {
        $product = $_POST;
        $product_image = $_FILES;

        $product_image_verif = verifyImageProduct($product_image["image"]);

        $data_product = new Product($product["name"], $product_image_verif, $product["price"]);
        $data_add = $data_product->add($product);
        
        if( $data_add == false ) {
            
            Flasher::setFlash('gagal', 'ditambah', 'danger');
            header("Location: ../views/master_product.php");
            die;
        }

        Flasher::setFlash('berhasil', 'ditambah', 'success');
        header("Location: ../views/master_product.php");
        die;
    } 
    