<?php

    class Cookie {

        public static function setCookie($name, $value, $expire)
        {
            return setcookie($name, $value, $expire);
        }

    }
