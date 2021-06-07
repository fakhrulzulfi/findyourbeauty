<?php 
    require_once('../init.php');

    $action = $_GET["action"];

    // ADD
    if( $action == "add") {
        $dataFromUser = $_POST;
        $dataFromUser["role"] = 'user';

        $email = $dataFromUser["email"];
        $checkUser = User::getUserFromIdentifier($email);

        if( !$checkUser ) {
        	Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header("Location:../views/view_user.php");
        }

        $user = User::add($dataFromUser);

        if( !$user ) {
        	Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header("Location:../views/view_user.php");
        }

		Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        header("Location:../views/view_user.php");
        die;
    }

    // DELETE
    else if ( $action == "delete" ) {
        $id = $_GET["id"];
        $user_check = User::get($id)[0];
       
        if( !count($user_check) > 0 ) {
        	Flasher::setFlash('gagal', 'dihapus', 'danger');
            header("Location:../views/view_user.php");
            die;
        }

        $user = new User($user_check['email']);
        $user->delete();
        Flasher::setFlash('berhasil', 'dihapus', 'success');
        header("Location:../views/view_user.php"); 
    } 

    // EDIT
    else if ( $action == "edit" ) {
        
        $data = $_POST;

        $user_check = User::get($data["id"])[0];
        
        if( !count($user_check) > 0 ) {
        	Flasher::setFlash('gagal', 'diubah', 'danger');
            header("Location:../views/view_user.php");
            die;
        }

        $result = new User($user_check['email']);

        $result->edit($data);

		Flasher::setFlash('berhasil', 'diubah', 'success');
        header("Location:../views/view_user.php"); 
    }

    else {
        return "404 Not Found";
    }