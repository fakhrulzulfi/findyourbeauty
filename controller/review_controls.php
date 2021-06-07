<?php 
    require_once('../init.php');

    $action = $_GET['action'];

    if( $action == 'add' ) {
        $data = Review::add($_POST);
        if( $data ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ../views/master_review.php');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ../views/master_review.php');
            exit;
        }
    }
    elseif( $action == 'delete' ) {
        // 
    }
    elseif( $action == 'edit' ) {
        // 
    }