<?php

    class UserHelper extends DatabaseHelperTEST {

            private $instance_ref = null ;

            public static function getInstance() {
                $instance_ref = parent::getInstance();
                return $instance_ref;
            }

            
            public function testThing(){
            
                var_dump($instance_ref);
            }
    }

?>