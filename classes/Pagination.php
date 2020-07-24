<?php

    class Pagination {

        private $data;
        public $counts;
        public $start;
        public $total_values;

        public function paginate($values, $perpage)
        {
            $this->total_values = count($values);

            if(isset($_GET['page'])) {
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $this->start = ($page - 1) * $perpage;

            $this->counts = ceil($this->total_values / $perpage);
            
            $this->data = array_slice($values, $this->start, $perpage);

            for ($x=1; $x <=$this->counts ; $x++) { 
                $numbers[] = $x;
            }

            return $numbers;

        }

        public function fetchResult()
        {
            $fetchResult = $this->data;
            return $fetchResult;
        }

        public function Counts()
        {
            $counts = $this->counts;
            return $counts;
        }

        public function Start()
        {
            $start = $this->start;
            return $start;
        }

        public function Total_values()
        {
            $total_values = $this->total_values;
            return $total_values;
        }

    }