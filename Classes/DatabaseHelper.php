<?php 

    define("DB_NAME", "vluuks_db");
    define("TABLE_NAME", "test_table");

    require("DatabaseCredentials.php");


    class DatabaseHelper {

        private static $instance = null;
        private $mysqli = null;

        private final function __clone() {}
        private final function __wakeup() {}

        private final function __construct() {
            $this->mysqli = new mysqli('localhost', USERNAME, PASSWORD, DB_NAME);

            if ($this->mysqli->connect_errno) {
                echo "Error: Failed to make a MySQL connection, here is why: \n";
                echo "Errno: " . $mysqli->connect_errno . "\n";
                echo "Error: " . $mysqli->connect_error . "\n";
                exit;
            }

        }

        public final static function getInstance() {
            
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
                                unserialize($row['tags']),
                                $row['onsale'],
                                $row['category'],
                                $row['image']
                            );

                array_push($item_array, $item);

            }

            echo json_encode($item_array);
        
        }


        public function insert($item) {

            $query = $this->mysqli->prepare("INSERT INTO " . TABLE_NAME . " (name, inventory, price, description, tags, onsale, category, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            
            if (!$query) {
                echo "Prepare failed: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            }

            $tags_stringified = serialize($item->tags);

            $query->bind_param("siississ", 
                                    $item->name, 
                                    $item->inventory, 
                                    $item->price, 
                                    $item->description,
                                    $tags_stringified,
                                    $item->on_sale,
                                    $item->category,
                                    $item->image   
                                );
            $query->execute();

            $query->close();
            $this->mysqli->close();

        }


        public function checkNameAvailability($username) {

        }

        public function addUser($username, $password) {

            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
    
            $stmt->close();
            $this->mysqli->close();

        }

    }


?>