<?php 

    define("DB_NAME", "vluuks_db");
    define("TABLE_NAME", "test_table");

    require_once("DatabaseCredentials.php");
    require_once("../Classes/User.php");


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
            Returns all data from the items table. 
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


        /*
            Inserts a new item into the table. 
        */
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
            // TODO
        }

        /*
            Adds a user to the database. 
            TODO add preparation verification?
        */
        public function addUser($username, $password) {

            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
    
            $stmt->close();
            $this->mysqli->close();

        }

        /*
            Checks whether this combination represents a valid user.
            TODO add preparation verification?
        */
        public function verifyUser($username, $password) {

            $sql = "SELECT id, username, password FROM users WHERE username = ?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();

            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1) {
                echo "Account exists - proceed to login";

                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                
                if(mysqli_stmt_fetch($stmt)) {
                    if(password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            echo "password match";
                            $user = new User($id, $username);
                            return $user;
                    }
                    else {
                        echo "This account or account/password combination does not exist.";
                        return; // explicitly returning null is not needed? but perhaps safer?
                    }
                }
            }
            else {
                echo "This account or account/password combination does not exist.";
            }
    
            $stmt->close();

        }

    }


?>