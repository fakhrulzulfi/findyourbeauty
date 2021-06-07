<?php 
    require_once('../init.php');

    if( $_SESSION['r'] != 'admin' ) {
      header("Location: view_article.php");
    }

    $users = User::get();

    require_once 'templates/header.php';
?>

        <div class="container">
                <!-- FLASHER -->
                <div class="row">
                    <?php Flasher::flash(); ?>
                </div>
            <div class="row align-items-center">                
                <div class="col-10 mx-auto mt-3">
                    <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="ml-3">Daftar Pengguna</h3>
                            <button type="button" class="btn btn-primary ml-auto mr-3" data-toggle="modal" data-target="#tambahUser">TAMBAH</button>
                        </div>
                    </div>

                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>ROLE</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $usr) : ?>
                                <tr>
                                    <td><?= $usr["id"]; ?></td>
                                    <td><?= $usr["name"]; ?></td>
                                    <td><?= $usr["username"]; ?></td>
                                    <td><?= $usr["email"]; ?></td>
                                    <td><?= $usr["role"]; ?></td>
                                    <td><?= $usr["gender"]; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUser<?= $usr["id"]; ?>">EDIT</button>
                                        <a href="../controller/user_controls.php?action=delete&id=<?= $usr["id"]; ?>" class="btn btn-danger btn-sm" role="button">HAPUS</a>  
                                    </td>
                                </tr>


                                <!-- Modal -->
                                <div class="modal fade" id="editUser<?= $usr['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <!-- CONTENT -->
                                        <div class="modal-content">
                                            <!-- HEADER -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <!-- BODY -->
                                            <div class="modal-body">
                                                <form action="../controller/user_controls.php?action=edit" method="POST">
                                                    <input type="hidden" name="id" value="<?= $usr["id"]; ?>">
                                                    <input type="hidden" name="password" value="<?= $usr["password"]; ?>">
                                                    <input type="hidden" name="role" value="<?= $usr["role"]; ?>">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="<?= $usr["name"]; ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" value="<?= $usr["username"]; ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="<?= $usr["email"]; ?>" required>
                                                        </div>    <form action="../controller/user_controls.php?action=edit" method="POST">

                                                        <div class="col-md-6">
                                                            <label for="gender" class="form-label">Jenis Kelamin</label>
                                                            <select class="custom-select" id="gender" name="gender" aria-label="Default select example">
                                                                <option selected><?= $usr["gender"]; ?></option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div> <br>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach;?>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>

                

                <!-- Modal -->
                <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
                    <div class="modal-dialog">

                        <!-- CONTENT -->
                        <div class="modal-content">
                            <!-- HEADER -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahUserLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- BODY -->
                            <div class="modal-body">
                            <form action="../controller/user_controls.php?action=add" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama..." required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username..." required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="gender" name="gender" aria-label="Default select example">
                                            <option selected>-</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password..." required>
                                </div>

                                <div class="mb-3">
                                    <label for="passwordConfirm" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Masukkan Password Kembali..." required>
                                </div>
                                
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>        
        </div>

<?php require_once 'templates/footer.php'; ?>