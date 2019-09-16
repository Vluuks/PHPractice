<?php

    class Item implements JsonSerializable {

        protected $id;
        protected $name;
        protected $price;
        protected $inventory;

        protected $description;
        protected $tags;
        protected $on_sale;
        protected $category;

        function __construct($id, $name, $inventory, $price, $description, $tags, $on_sale, $category) {
            $this->id = $id;
            $this->name = $name;
            $this->inventory = $inventory;
            $this->price = $price;

            $this->description = $description;
            $this->tags = $tags;
            $this->on_sale = $onsale ?? false;
            $this->category = $category ?? "none";
        }

        function &__get($name) {
            return $this->$name;
        }

        public function getStringifiedTags() {
            $string = json_encode($this->tags);
            return $string;
        }

        private function getPriceEuros() {
            return "€" . $this->price;
        }

        public function jsonSerialize() {

            // echo $this->getStringifiedTags();

            return [
                'id' => $this->id,
                'inventory' => $this->inventory,
                'name' => $this->name,
                'price' => $this->price,
                'description' => $this->description,
                'tags' => $this->getStringifiedTags(),
                'onSale' => $this->on_sale,
                'category' => $this->category
            ];
        }

    }

?>