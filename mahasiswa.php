<?php

    require_once "core/init.php";

    if(!Session::exists('username'))
    {
        header("location: login.php");
    }

    $db = Database::getInstance();
    $pagination = new Pagination();


    require_once "templates/header.php";
    
    @$page = $_GET['page'];

    $mahasiswa = $db->tampil("select * from mhs");
    $query = $pagination->paginate($mahasiswa, 5);
    $result = $pagination->fetchResult();
?>


<div class="container mt-5"><br>
        
    <div class="row">
        <div class="col-lg-6">
            <?php
            
                    Flasher::getFlash();

            ?>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="tambah.php" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-12">
            <form action="mahasiswa.php" method="post">
                <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="search">
                <div class="input-group-append">
                    <input class="btn btn-secondary" type="submit" name="cari" >
                </div>
                </div>
            </form>
        </div>
    </div>


    <?php
    

        if( Input::get('cari') ) {
            $result = $db->search(Input::get('keyword'));
        }
    
    ?>


    <div class="row">
        <div class="col-lg-12">
            <h3>Daftar Mahasiswa</h3>

            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Asal Sekolah</th>
                    <th style="text-align: center;">Action</th>
                </tr>

                <?php

                    $start = $pagination->Start();
                    $no = 1;
                    $no = $start + 1;
                    foreach ($result as $data) :

                ?>

                <tr>
                    <td style="text-align: center;"><?=$no++;?></td>
                    <td><?=$data['nama'];?></td>
                    <td><?=$data['alamat'];?></td>
                    <td><?=$data['no_telp'];?></td>
                    <td><?=$data['asal_sekolah'];?></td>
                    <td style="text-align: center;">
                        <a href="update.php?id_mhs=<?=$data['id_mhs']?>" class="btn btn-success btn-sm">Update</a>    
                        <a href="delete.php?id_mhs=<?=$data['id_mhs']?>" class="btn btn-danger btn-sm">Delete</a>    
                        <a href="detail.php?id_mhs=<?=$data['id_mhs']?>" class="btn btn-primary btn-sm">Detail</a>    
                    </td>
                </tr>

                <?php
                
                    endforeach;
                
                ?>

            </table>

            <?php            
                $total_values = $pagination->Total_values();            
            ?>
                
            <i>Showing <?php echo $start + 1 . ' to ' . --$no . ' from ' . $total_values ?> </i>

            <nav aria-label="..." style="float: right;">
                <ul class="pagination mt-3">

                <?php
                
                    if($page > 1) {
                        $link = $page - 1;
                        echo    "
                                    <li class='page-item'>
                                        <a class='page-link' href='?page=$link'>Previous</a>
                                    </li>

                                ";
                    }else{

                        echo    "
                                    <li class='page-item disabled'>
                                        <a class='page-link' href=''>Previous</a>
                                    </li>

                                ";
                    }
                        
                
                    foreach ($query as $num) {
                        if($num != $page) {
                            echo "<li class='page-item '><a class='page-link' href='?page=$num'>$num</a></li>";
                        }else{
                            echo "<li class='page-item active'><a class='page-link' href='?page=$num'>$num</a></li>";
                        }

                    }

                    $counts = $pagination->Counts();

                    if($page < $counts) {
                        $link = $page + 1;

                        echo    "
                                    <li class='page-item'>
                                        <a class='page-link' href='?page=$link'>Next</a>
                                    </li>

                                ";
                    }else{

                        echo    "
                                    <li class='page-item disabled'>
                                        <a class='page-link' href=''>Next</a>
                                    </li>

                                ";
                    }
                    
                ?>


                </ul>
            </nav>

        </div>
    </div>


</div>


<?php 

    require_once "templates/footer.php";

?>