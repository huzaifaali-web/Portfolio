<?php

class DBconnection
{
    private $hostname;
    private $username;
    private $password;
    private $database;

    public $connection;


    public function __construct()
    {
        $this->hostname = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "beaditdesign";

        $this->connection = new mysqli(
            $this->hostname,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->connection->connect_error) {
            die(
                "Connection failed: " .
                $this->connection->connect_error
            );
        }
    }


    // INSERT USER
    public function insert($data)
    {
        $email = $data["email"] ?? "";
        $password = $data["password"] ?? "";

        $stmt = $this->connection->prepare(
            "INSERT INTO `user` (`email`, `password`)
             VALUES (?, ?)"
        );

        if (!$stmt) {
            return "Prepare Error: " .
                   $this->connection->error;
        }

        $stmt->bind_param(
            "ss",
            $email,
            $password
        );

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        }

        $error = $stmt->error;

        $stmt->close();

        return "Insert Error: " . $error;
    }


    // UPDATE
    public function update($sql)
    {
        if ($this->connection->query($sql) === TRUE) {
            return true;
        }

        return "Update Error: " .
               $this->connection->error;
    }


    // DELETE
    public function delete($sql)
    {
        if ($this->connection->query($sql) === TRUE) {
            return true;
        }

        return "Delete Error: " .
               $this->connection->error;
    }


    // FETCH
    public function fetch($sql)
    {
        $result = $this->connection->query($sql);

        if ($result === false) {
            die(
                "Query Error: " .
                $this->connection->error
            );
        }

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}

?>