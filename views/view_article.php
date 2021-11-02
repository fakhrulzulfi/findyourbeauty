<?php 
    require_once('../init.php');

    $article = Article::get();

    require_once 'templates/header.php';
?>

    <div class="container">
        <!-- ARTICLE -->
            <div class="row">
                <div class="col-md-8 mx-auto mt-3 mb-3">
                    <!-- FLASHER -->
                    <div class="row mx-auto">
                        <?php Flasher::flash(); ?>
                    </div>

                    <!-- Button trigger modal -->
                    <?php if( isset($_SESSION["r"]) && $_SESSION["r"] == "admin" ) :?>
                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Buat Artikel</button>
                    <?php endif; ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                            <!-- CONTENT -->
                            <div class="modal-content">
                                <!-- HEADER -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- BODY -->
                                <div class="modal-body">
                                    <form action="../controller/article_controls.php?action=add" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" name="title" class="form-control" id="title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="content">Konten</label>
                                            <textarea class="form-control" name="content" id="content" rows="4" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="tag">Tag</label>
                                            <input type="text" class="form-control" name="tag" id="tag" placeholder="#tags #tags-two">
                                        </div>
                                        <br>
                                        
                                        
                                        <div class="custom-file">
                                            <input type="file" name="image" id="images" class="custom-file-input">
                                            <label for="images" class="custom-file-label">Choose file</label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-primary">Posting</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mx-auto">
                    <?php for( $i = 0; $i < count($article); $i++ ) :?>
                    <?php $data = $article[$i]; ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-11">
                                    <!-- JUDUL -->
                                    <h1 class="card-title"><?= $data['article']['title']; ?></h1>
                                </div>
                                
                                <div class="col-md-1">
                                    <!-- ICONS THREE DOTS -->
                                    <?php if( isset($_SESSION['r']) && $_SESSION['r'] == 'admin' ) : ?>
                                        <div class="dropdown">
                                            <a class="btn btn-sm" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float:right;">
                                                <i class="fa fa-ellipsis-h fa-lg"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="../controller/article_controls.php?action=delete&id_artc=<?= $data['article']['id']; ?>">Hapus</a>
                                                <button class="dropdown-item" data-toggle="modal" data-target="#myModal<?= $data['article']['id']; ?>">Edit</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- FOTO PROFIL -->
                            <img class="img-fluid" src="../assets/images/profile.png" alt="user_profile" style="padding-right:10px;">
                            <small style="color:grey">
                                <a href="#view_profile.php" class="text-info" style="text-decoration:none;">
                                    <?=$data['article']['name'];?>
                                </a> 
                                <?=$data['article']['created_at'];?>
                            </small>
                            <hr>
                            <img src="../uploads/image_article/<?= $data['article']['image']; ?>" class="img-fluid mx-auto d-block" alt="<image article>">
                            <div class="row mb-3">
                                <div class="container">
                                    <small class="mt-3">
                                        tags : 
                                        <?php 
                                            for( $j=0; $j < count($data['tag']); $j++ ) {
                                                echo "<a href='#?search={$data['tag'][$j]}' style='text-decoration:none;'>"; 
                                                echo $data['tag'][$j];
                                                echo "</a>";
                                                echo " ";
                                            }
                                        ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- <p class="card-text text text-truncate ml-3" style="max-width:30rem;"><?= $data['article']['content']; ?></p> -->

                                <p class="card-text text-wrapper ml-3" style="width:39rem;"><?= $data['article']['content']; ?></p>
                                <!-- <a href="">readmore</a> -->
                            </div>
                            
                        </div>
                    </div> <br>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?= $data['article']['id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="container">
                                <!-- CONTENT -->
                                <div class="modal-content">
                                    <!-- HEADER -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Article</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- BODY -->
                                    <div class="modal-body">
                                        <form action="../controller/article_controls.php?action=edit" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $data['article']['id']; ?>">
                                            <input type="hidden" name="id_user" value="<?= $data['article']['user_id'] ?>">
                                            <input type="hidden" name="keepImage" value="<?= $data['article']['image']; ?>">

                                            <div class="form-group">
                                                <label for="title">Judul</label>
                                                <input type="text" name="title" class="form-control" id="title" value="<?= $data['article']['title']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="content">Konten</label>
                                                <textarea class="form-control" name="content" id="content" rows="4" required><?= $data['article']['content'];?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="image-edit" class="custom-file-label">Choose file</label>
                                                <img id="image-priview" src="../uploads/<?= $data['article']['image']; ?>" alt="<?= $data['article']['title']; ?>" height="100" />
                                                <input type="file" name="image-edit" id="image-edit" class="custom-file-input">
                                            </div>

                                            <div class="form-group">
                                                <label for="tag">Tag</label>
                                                <input type="text" class="form-control" name="tag" id="tag" value="<?php for( $j=0; $j < count($data['tag']); $j++ ) { echo $data['tag'][$j]; echo " "; }?>">
                                            </div>
                                            

                                            <div class="form-group">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php endfor; ?>
                </div>
            </div>
    </div>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-priview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image-edit").change(function(){
            readURL(this);
        });
    </script>

<?php require_once 'templates/footer.php'; ?>