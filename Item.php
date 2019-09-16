<?php

    class Item implements JsonSerializable {

        protected $id;
        protected $name;
        protected $price;
        protected $description;

        function __construct($id, $name, $price, $description) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
        }

        function &__get($name) {
            return $this->$name;
        }

        private function getPriceEuros() {
            return "€" . $this->price;
        }

        public function jsonSerialize() {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'price' => $this->getPriceEuros(),
                'description' => $this->description
            ];
        }

    }

?>