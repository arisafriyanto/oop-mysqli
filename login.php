<?php

    require_once "core/init.php";

    $db = Database::getInstance();

    if(Session::exists('username'))
    {
        header("location: home.php");
        exit;
    }


    $errors = [];

//    Flasher::setFlash("Berhasil ", "Ditambahkan", "primary");
        // Validation

        if( Input::get('login') ) {

            // 1. memanggil object validation

            $validation = new Validation();

            // 2. menggunakan methode check

            $validation = $validation->check([
                'username' => [
                                'required' => true
                              ],
                'password' => [
                                'required' => true
                              ]
            ]);

            // 3. lolos validasi

            if( $validation->passed() ) {

                if( $user->cek_name(Input::get('username')) ) {

                    if( $user->login_user(Input::get('username'), Input::get('password')) ) {
                    
                        // $_SESSION['username'] = $username;
                        Session::set('username', Input::get('username'));
                    
                        header("location: home.php");
                        exit;


                    }else{
                        $errors[] = ' password yang anda masukkan salah..!!';
                    }

                }else{
                    $errors[] = ' username belum terdaftar';
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

                Flasher::getFlash();
            
                if(!empty($errors)) {
                    foreach ($errors as $error) {

                        Flasher::setFlash('Login gagal ', $error, 'danger');
                        Flasher::getFlash();
                    
                    }

                }
                
            ?>

        </div>
    </div>


    <h2 class="mb-5 ml-3">Login</h2>

    <form action="login.php" method="post">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <input type="submit" name="login" value="Login" class="btn btn-success">
            <a href="register.php" class="btn btn-primary">Daftar Sekarang</a>

        </div>

    </form>

</div>

<?php 

    require_once "templates/footer.php";

?>