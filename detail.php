<?php

    require_once "core/init.php";

    $id_mhs = $_GET['id_mhs'];
    
    if(!Session::exists('username')) {
        header("location: login.php");
    }
    
    $db = Database::getInstance();
    $data = $db->tampil_by_id('mhs', 'id_mhs', $id_mhs);

    require_once "templates/header.php";
    
    ?>
<div class="container mt-5"><br>
    <div class="row">
        <div class="col-6">
            <h3>Detail Mahasiswa</h3>
                <div class="card" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= ucwords($data['nama'])?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= ucwords($data['no_telp'])?></h6>
                    <p class="card-text"><?= ucwords($data['alamat'])?></p>
                    <p class="card-text"><?= ucwords($data['asal_sekolah'])?></p>
                    <a href="mahasiswa.php" class="btn btn-outline-warning" style="float: right;">Back</a>
                </div>
                </div>
        </div>
    </div>
</div>
<?php
                    
    require_once "templates/footer.php";

?>