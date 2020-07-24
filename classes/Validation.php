<?php

    class Validation {

        private $_passed = false,
                $_error = [];

        public function check($items = [])
        {
            foreach ($items as $item => $rules) {
                foreach ($rules as $rule => $rule_value) {
                    switch ($rule) {
                        case 'required' :
                            if( trim(Input::get($item)) == false && $rule_value = true ) {
                                $this->addError("$item harus diisi");
                            }
                            break;
                        case 'min' :
                            if( strlen(Input::get($item)) < $rule_value ) {
                                $this->addError("$item minimal $rule_value karakter");
                            }
                            break;
                        case 'max' :
                            if( strlen(Input::get($item)) > $rule_value ) {
                                $this->addError("$item Maximal $rule_value karakter");
                            }
                            break;
                            
                    }
                }
            }


            if(empty($this->error())) {
                $this->_passed = true;
            }

            return $this;

        }

        public function addError($error)
        {
            return $this->_error[] = $error;
        }

        public function error()
        {
            return $this->_error;
        }

        public function passed()
        {
            return $this->_passed;
        }

    }
