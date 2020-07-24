<?php

    class Database {

        private static $INSTANCE = null;
        private $mysqli,
                $HOST = 'localhost',
                $USER = 'root',
                $PASS = '',
                $DBNAME = 'app';

        public function __construct()
        {
            $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
            if($this->mysqli->connect_errno) {
                echo "Connected Failed ". $this->mysqli->connect_error;
            }
        }

        /* 
        
            Singleton Pattern, Menguji Koneksi Agar Tidak Double
        
        */

        public static function getInstance()
        {
            if(!isset(self::$INSTANCE)) {
                self::$INSTANCE = new Database;
            }

            return self::$INSTANCE;
        }

        public function insert($table, $fields)
        {
            // 'username' => Input::get('username')

            $column = implode(", ", array_keys($fields));
            
            $valueArrays = [];
            $i = 0;
            foreach ($fields as $key => $values) {
                if( is_int($values) ) {
                    $valueArrays[$i] = $this->escape($values);
                }else if( is_string($values) ) {
                    $valueArrays[$i] = "'" . $this->escape($values) . "'";
                }
                
                $i++;
            }

            $values = implode(", ", $valueArrays);


            $query = "insert into $table ($column) values ($values)";

            $this->run_query($query, "Masukkan Data Yang Benar...!!");

        }

        public function get_info($table, $column, $value)
        {

            if(!is_int($value)) {
                $value = "'" .$this->escape($value). "'";
            }

            $query = "select * from $table where $column = $value";
            $result = $this->mysqli->query($query);
            while ($row = $result->fetch_assoc()) return $row;

        }

        public function run_query($query, $msg)
        {
            if( $this->mysqli->query($query) ) return true;
            else die($msg);

        }

        public function escape($name)
        {
            return $this->mysqli->real_escape_string($name);
        }

        public function tampil($query)
        {   $rows = [];
            $result = $this->mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }

        public function tampil_by_id($table, $nama, $nama_value)
        {
            
            $result = $this->mysqli->query("select * from $table where $nama = '$nama_value'");
            while ($row = $result->fetch_assoc()) return $row;
        }

        public function update($table, $nama, $alamat, $no_telp, $asal_sekolah, $id)
        {

            $query = "update $table set nama='$nama', alamat='$alamat', no_telp='$no_telp', asal_sekolah='$asal_sekolah' where id_mhs = ".$id;

            $this->run_query($query, "Update Gagal");

        }

        public function hapus($table, $id_mhs, $value_id_mhs)
        {
            $query = "delete from $table where $id_mhs = $value_id_mhs";

            $this->run_query($query, "Hapus Gagal");
        }

        public function search($keyword)
        {
            $query = "select * from mhs where nama like '%$keyword%' or alamat like '%$keyword%' or no_telp like '%$keyword%' or asal_sekolah like '%$keyword%'";

            return $this->tampil($query);
        }

        public function query_session($query)
        {
            $result = $this->mysqli->query($query);
            while ($row = $result->fetch_assoc()) return $row;
        }

    }
