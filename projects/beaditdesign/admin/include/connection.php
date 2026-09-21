<?php

class DBconnection
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "beaditdesign";

    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli(
            $this->hostname,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->connection->connect_error) {
            die(
                "Database Connection Failed: " .
                $this->connection->connect_error
            );
        }

        $this->connection->set_charset("utf8mb4");
    }

    public function insert($data, $table)
    {
        if (empty($data)) {
            return false;
        }

        $columns = array_keys($data);
        $values = array_values($data);

        $columnList =
            "`" . implode("`,`", $columns) . "`";

        $placeholders =
            implode(",", array_fill(0, count($values), "?"));

        $sql =
            "INSERT INTO `$table`
             ($columnList)
             VALUES ($placeholders)";

        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            die(
                "Prepare Error: " .
                $this->connection->error
            );
        }

        $types = str_repeat("s", count($values));

        $stmt->bind_param($types, ...$values);

        if ($stmt->execute()) {
            $id = $stmt->insert_id;
            $stmt->close();

            return $id > 0 ? $id : true;
        }

        die("Insert Error: " . $stmt->error);
    }

    public function fetch($sql)
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            die(
                "Fetch Error: " .
                $this->connection->error
            );
        }

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            die(
                "Query Error: " .
                $this->connection->error
            );
        }

        return $result;
    }

    public function update($sql)
    {
        return $this->connection->query($sql);
    }

    public function delete($sql)
    {
        return $this->connection->query($sql);
    }

    public function escape($value)
    {
        return $this->connection->real_escape_string($value);
    }
}

?>