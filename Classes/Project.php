<?php

    class Project implements JsonSerializable {

        protected $id;
        protected $name;
        protected $description;
        protected $tags;
        protected $category;
        protected $image;

        public function __construct($id, $name, $description, $tags, $category) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->tags = $tags;
            $this->category = $category ?? "none";
            $this->image = $image ?? "Images/placeholder.png";

        }

        function &__get($name) {
            return $this->$name;
        }

        public function jsonSerialize() {

            return [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'tags' => $this->tags,
                'category' => $this->category,
                'image' => "Images/" . $this->image
            ];
        }

    }

?>