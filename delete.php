<?php

    require_once "core/init.php";
    $db = Database::getInstance();

    $id_mhs = $_GET['id_mhs'];

    if(isset($_GET['id_mhs'])) {
        Flasher::setFlash('Delete mahasiswa', 'berhasil', 'danger');
        $mhs->hapus_mhs($id_mhs);
        header("location: mahasiswa.php");
    }
