<?php

class User extends Database 
    {  
    //=================================================================================================
    // PROPERTIES
    //=================================================================================================

        private $user_first_name;
        private $user_last_name;
        private $user_email;
        private $user_password;


    //=================================================================================================
    // METHODS
    //=================================================================================================

        // Get all Users.
        public function getAllUsers() 
            {
                // SQL Statement
                $sql = $this->connect()->query("SELECT * FROM users");

                // Return results.
                return $row = $sql->fetchAll(PDO::FETCH_ASSOC);

            }

        // Check if any user is using this email.
        public function getUserByEmail($user_email)
            {
                $this->user_email = $user_email;

                $sql = $this->connect()->prepare('SELECT * FROM users WHERE user_email=?');

                $sql->execute([$this->user_email]);

                $user = $sql->fetch(PDO::FETCH_ASSOC);

                if ($user)
                    {
                        return $user;
                    }
                else
                    {
                        return false;
                    }
            }

        // Make sure the passwords match on signup page.
        public function checkPassword($user_password, $user_password_confirm)
            {
                if ($user_password == $user_password_confirm)
                    {
                        return true;
                    }
                else
                    {
                        return false;
                    }
            }

        

        // Check if any user is using this email.
        public function checkEmailAvailability($user_email)
            {
                $this->user_email = $user_email;

                $sql = $this->connect()->prepare('SELECT * FROM users WHERE user_email=?');

                $sql->execute([$this->user_email]);

                $user = $sql->fetch();

                if ($user)
                    {
                        return false;
                    }
                else
                    {
                        return true;
                    }
            }

        // Creates a new account in the database.
        public function createUserAccount($user_first_name,$user_last_name,$user_email,$user_password)
            {          
                // Hash the given password.
                $options = ['cost' => 12];
                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, $options);

                $data = array(
                            'user_first_name' => $user_first_name,
                            'user_last_name' => $user_last_name,
                            'user_email' => $user_email,
                            'user_password' => $hashed_password
                            );

                $sql = $this->connect()->prepare('INSERT INTO users (user_first_name, user_last_name, user_email, user_password) VALUES (:user_first_name,:user_last_name,:user_email,:user_password)');

                if ($sql->execute($data))
                    {
                        return true;
                    }
                else
                    {
                        return false;
                    }

            }

            // Checks user's credentials against the database.
            public function loginUser($user_email, $user_password)
                {
                    $this->user_password = $user_password;
                    
                    $sql = $this->connect()->prepare('SELECT * FROM users WHERE user_email=?');

                    $sql->execute([$user_email]);

                    if ($user = $sql->fetch(PDO::FETCH_ASSOC))
                        {
                            var_dump($user);

                            if (password_verify($this->user_password, $user['user_password']))
                                {
                                    return $user;
                                }
                            else
                                {
                                    return false;
                                }
                        }
                    else
                        {
                            return false;
                        }
                }


    }


?>