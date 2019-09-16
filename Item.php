<?php

    class Item {

        protected $id;
        protected $name;
        protected $price;
        protected $description;

        // function __construct($id, $name, $price, $description) {
        //     // echo "call constructor";
        //     $this->id = $id;
        //     $this->name = $name;
        //     $this->price = $price;
        //     $this->description = $description;
        // }

        function __construct($name, $price, $description) {
            // echo "call constructor";
            // $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
        }

        function &__get($name) {
            // echo "asking property";
            return $this->$name;
        }
    }

?>