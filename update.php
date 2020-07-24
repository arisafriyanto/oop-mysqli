<?php

    require_once "core/init.php";



    $errors = [];

    // 1. instance class validation

    $validation = new Validation;

    // 2. memanggil methode check

    $validation = $validation->check([
        'nama' => [
                    'required' => true,
                    'min' => 3,
                    'max' => 50
                  ],
        'alamat' => [
                    'required' => true,
                    'min' => 6,
                    'max' => 200
                  ],
        'no_telp' => [
                    'required' => true,
                    'min' => 11,
                    'max' => 13
                  ],
        'asal_sekolah' => [
                    'required' => true,
                    'min' => 6,
                    'max' => 50
                  ]
    ]);

    // 3. lolos pengujian

    if( Input::get('update_mahasiswa') ) {

        if($validation->passed()) {


                $mhs->update_mhs( ucwords(Input::get('nama')), ucwords(Input::get('alamat')), ucwords(Input::get('no_telp')), ucwords(Input::get('asal_sekolah')), ucwords(Input::get('id_mhs')) );
                Flasher::setFlash('Update mahasiswa', 'berhasil', 'primary');
                header("location: mahasiswa.php");

        }else{

            $errors = $validation->error();

        }

    }

    $id = Input::get('id_mhs');

    $db = Database::getInstance();
    $data_mhs = $db->tampil_by_id('mhs', 'id_mhs', $id);

    require_once "templates/header.php";

?>

<div class="container mt-5"><br>

    <div class="row">
        <div class="col-lg-6">
            <?php
            
                foreach ($errors as $error) {
                    Flasher::setFlash('Gagal', $error, 'danger');
                    Flasher::getFlash();
                }

            ?>
        </div>
    </div>

    <h2 class="mb-4 ml-3">Update Mahasiswa</h2>

    <form action="update.php?id_mhs=<?=$data_mhs['id_mhs']?>" method="post">
        <input type="hidden" name="id_mhs" value="<?=$data_mhs['id_mhs']?>">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?=$data_mhs['nama']?>">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Greenthink" id="" class="form-control"><?=$data_mhs['alamat']?></textarea>
            </div>

            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?=$data_mhs['no_telp']?>">
            </div>

            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?=$data_mhs['asal_sekolah']?>">
            </div>
            
            <input type="submit" name="update_mahasiswa" value="Update Mahasiswa" class="btn btn-primary">
            <a href="mahasiswa.php" class="btn btn-danger">Back</a>

        </div>

    </form>

</div>

<?php 

    require_once "templates/footer.php";

?>