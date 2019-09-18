<?php

    class User {

        protected $id;
        protected $username;

        function __construct($id, $username) {
            $this->id = $id;
            $this->username = $username;
        }

        function &__get($name) {
            return $this->$name;
        }

    }

?>