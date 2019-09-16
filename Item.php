<?php

    class Item implements JsonSerializable {

        protected $id;
        protected $name;
        protected $price;
        protected $description;
        protected $tags;
        protected $on_sale;
        protected $category;

        function __construct($id, $name, $price, $description, $tags, $on_sale, $category) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
            $this->tags = $tags ?? ['test', 'test'];
            $this->on_sale = $onsale ?? false;
            $this->category = $category ?? "none"
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
                'description' => $this->description,
                'tags' => $this->tags,
                'onSale'
            ];
        }

    }

?>