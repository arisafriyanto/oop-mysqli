<?php

    class Mahasiswa {

        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }

        public function insert_mhs($fields = [])
        {
            if( $this->db->insert('mhs', $fields) ) return true;
            else return false;
        }

        public function update_mhs($nama, $alamat, $no_telp, $asal_sekolah, $id)
        {
            if( $this->db->update('mhs', $nama, $alamat, $no_telp, $asal_sekolah, $id) ) return true;
            else return false;
        }

        public function hapus_mhs($id_mhs)
        {
            if( $this->db->hapus('mhs', 'id_mhs', $id_mhs) ) return true;
            else return false;
        }

    }
