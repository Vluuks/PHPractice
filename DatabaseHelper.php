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
          
            //output data in HTML table 
            echo "<table>\n"; 
            while ($row = $result->fetch_assoc()) {     
                echo "  <tr>\n";
                echo "    <td>" . $row['id'] . "</td>\n";
                echo "    <td>" . $row['name'] . "</td>\n";
                echo "    <td>" . $row['price'] . "</td>\n";
                echo "  </tr>\n"; 
            }
            echo "</table>"; 
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