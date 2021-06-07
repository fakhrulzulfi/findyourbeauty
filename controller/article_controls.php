<?php 
    require_once('../init.php');

    $user_id = $_SESSION["id"];
    $action = $_GET["action"];

    // ADD
    if( $action == "add") {

        $data_post = $_POST;
        $data_image = $_FILES;

        $image = verifyImageArticle($data_image["image"]);

        if( $image == false ) {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ../views/view_article.php');    
            die;
        }

        $post = new Article($data_post['title'], 
                            $data_post['content'], 
                            $image,
                            $data_post['tag'], 
                            $user_id);

        $post->add();
        $post->addTag($post->getArticleId());
        
        Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        header('Location: ../views/view_article.php');
    }

    // DELETE
    else if ( $action == "delete" ) {
        $id_article = $_GET['id_artc'];

        $article = Article::delete($id_article);

		Flasher::setFlash('berhasil', 'dihapus', 'success');
        header('Location: ../views/view_article.php');
        exit;
    } 

    // EDIT
    else if ( $action == "edit" ) {
        $data = $_POST;
        
        $getArticle = Article::get($data["id"]);
        $getTagArticle = Article::getTag($getArticle[0]["article"]["id"]);
        
        $article = new Article(
                            $getArticle[0]["article"]["title"],
                            $getArticle[0]["article"]["content"],
                            $getArticle[0]["article"]["image"],
                            join(" ", $getTagArticle),
                            $getArticle[0]["article"]["user_id"] );
        $getArticleId = $article->getArticleId();

        // VERIFY IMAGE
        $oldImage = $data["keepImage"];

        $newImage = $_FILES["image-edit"];

        if( $newImage["error"] == 4 ) {
            $image = $oldImage;
        } else {
            $image = verifyImageArticle($newImage);
        }

        $data["image"] = $image;

        $articleEdit = $article->edit($data, $getArticleId);
        
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header("Location: ../views/view_article.php");
    }

    else {
        return "404 Not Found";
    }