<?php

    class User {

        private $db;

        public function __construct()
        {
            $this->db = Database::getInstance();
        }

        public function register_user($fields = [])
        {
            if( $this->db->insert('users', $fields) ) return true;
            else return false;
        }

        public function login_user($username, $password)
        {

            $data = $this->db->get_info('users', 'username', $username);
            if( @password_verify($password, $data['password']) ) return true;
            else return false;

        }

        public function cek_name($username)
        {
            $data = $this->db->get_info('users', 'username', $username);
            if(@$username = $data['username']) return true;
            else return false;
        }

        public function cek_name_register($username)
        {
            $data = $this->db->get_info('users', 'username', $username);
            if(@$username = $data['username']) return false;
            else return true;

        }

    }
