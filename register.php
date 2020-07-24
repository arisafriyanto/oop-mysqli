<?php

    require_once "core/init.php";

    if(Session::exists('username'))
    {
        header("location: home.php");
    }

    $errors = [];

//    Flasher::setFlash("Berhasil ", "Ditambahkan", "primary");
        // Validation

        if( Input::get('register') ) {

            // 1. memanggil object validation

            $validation = new Validation();

            // 2. menggunakan methode check

            $validation = $validation->check([
                'username' => [
                                'required' => true,
                                'min' => 3,
                                'max' => 50
                              ],
                'password' => [
                                'required' => true,
                                'min' => 5
                              ]
            ]);

            // 3. lolos validasi

            if( $validation->passed() ) {

                if( $user->cek_name_register(Input::get('username')) ) {

                    $user->register_user([
                        'username' => Input::get('username'),
                        'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
                        ]);

                        // $_SESSION['username'] = $username;
                        Flasher::setFlash('Register', 'Berhasil...Silahkan Login', 'primary');
                        header("location: login.php");


                }else{
                    $errors[] = ' username sudah terdaftar';
                }

            }else{
                $errors = $validation->error();
            }




        }

    require_once "templates/header.php";

?>

<div class="container mt-5"><br>

    <div class="row">
        <div class="col-lg-6">
            
            <?php
            
                if(!empty($errors)) {
                    foreach ($errors as $error) {

                        Flasher::setFlash('Register gagal ', $error, 'danger');
                        Flasher::getFlash();
                    
                    }

                }
                
            ?>

        </div>
    </div>

    <h2 class="mb-5 ml-3">Register</h2>

    <form action="register.php" method="post">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <input type="submit" name="register" value="Daftar Sekarang" class="btn btn-primary">
            <a href="login.php" class="btn btn-success">Login</a>

        </div>

    </form>

</div>

<?php 

    require_once "templates/footer.php";

?>