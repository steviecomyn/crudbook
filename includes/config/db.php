<?php

// Database class, to handle all database interactions.
class Database
    {
    //=================================================================================================
    // PROPERTIES
    //=================================================================================================

        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $charset;

    //=================================================================================================
    // METHODS
    //=================================================================================================
        
        // Creates a PDO connection with given properties, and returns it.
        public function connect()
            {
                $this->servername      =       'localhost';
                $this->username        =       'crudbookUser';
                $this->password        =       'securePasswordlol';
                $this->dbname          =       'crudbook';
                $this->charset         =       'utf8mb4';

                try
                    {
                        $dsn = 'mysql:host='.$this->servername.';dbname='.$this->dbname.';charset='.$this->charset;
                        
                        $options = [
                            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_EMULATE_PREPARES   => false,
                        ];

                        $pdo = new PDO($dsn, $this->username, $this->password, $options);

                    }
                catch (PDOException $e)
                    {
                        echo 'Database connection failed:'.$e->getMessage();
                    }

                return $pdo;
            }

        public function query()
            {
                
            }

    }
?>