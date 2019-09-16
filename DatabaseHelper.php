<?php 

    define("DB_NAME", "vluuks_db");
    define("TABLE_NAME", "test_table");

    require("DatabaseCredentials.php");


    class DatabaseHelper {

        private static $instance = null;
        private $mysqli = null;

        private function __construct() {
            $this->mysqli = new mysqli('localhost', USERNAME, PASSWORD, DB_NAME);

            if ($this->mysqli->connect_errno) {
                echo "Error: Failed to make a MySQL connection, here is why: \n";
                echo "Errno: " . $mysqli->connect_errno . "\n";
                echo "Error: " . $mysqli->connect_error . "\n";
                exit;
            }

        }

        public static function getInstance() {
            
            if(self::$instance == null) {
                self::$instance = new DatabaseHelper();
            }

            return self::$instance;
        }


        /* 
            Returns all data from the table. 
        */
        public function selectAll() {

            $sql = 'SELECT * FROM ' . TABLE_NAME;

            // run the query 
            if (!$result = $this->mysqli->query($sql)) {
              // Handle error
              echo "Sorry, this website is experiencing problems.";
              echo "Error: Query failed to execute, here is why: \n";
              echo "Query: " . $sql . "\n";
              echo "Errno: " . $mysqli->errno . "\n";
              echo "Error: " . $mysqli->error . "\n";
              exit;
            }
          
            // If zero rows....
            if ($result->num_rows === 0) {
                echo "This query resulted in no matches returned. Please try again.";
                exit;
            }
          
            $item_array = [];
            while ($row = $result->fetch_assoc()) {    

                
                $item = new Item($row['id'], 
                                $row['name'], 
                                $row['inventory'], 
                                $row['price'], 
                                $row['description'],
                                $row['tags'],
                                $row['onsale'],
                                $row['category']
                            );
                array_push($item_array, $item);
                
            }

            echo json_encode($item_array);
        
        }


        public function insert($item) {

            $query = $this->mysqli->prepare("INSERT INTO " . TABLE_NAME . " (name, price, description) VALUES (?, ?, ?)");
            
            if (!$query) {
                echo "Prepare failed: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            }

            $query->bind_param("sis", $item->name, $item->price, $item->description);
            $query->execute();
        }



    }


?>