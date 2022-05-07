<?php

    class pwdResetModel extends Model {
        /**
        * Default constructor of the aboutUsModel class
        */
        public function __construct()
        {
            parent::__construct();
        }

        /**
        * Get a column by email
        */
        public function getToken($email) {
            $this->query("SELECT * FROM pwdReset WHERE email = :email");
            $this->bind(":email", $email);

            return $this->getSingle();
        }

        /**
         * Gets the latest token created in the table
         */
        public function getLatestToken() {
            $this->query("SELECT * from pwdReset ORDER BY expire DESC LIMIT 1");

            return $this->getSingle();
        }

        /**
         * Insert a token column in the table
         */
        public function insertToken($data) {
            $this->query("INSERT INTO pwdReset (email, token, expire) VALUES (:email, :token, :expire)");
            $this->bind(":email", $data["email"]);
            $this->bind(":token", $data["token"]);
            $this->bind(":expire", $data["expire"]);

            return $this->execute();
        }

        public function clearTable() {
            $this->query("TRUNCATE TABLE pwdReset");

            return $this->execute();
        }
    }

?>