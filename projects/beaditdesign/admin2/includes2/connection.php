 <?php

class DBconnection
{
    private $hostname;
    private $username;
    private $password;
    private $database;

    public $connection;

    function __construct()
    {
        $this->hostname = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'beaditdesign';

        $con = new mysqli(
            $this->hostname,
            $this->username,
            $this->password,
            $this->database
        );

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $this->connection = $con;
    }

    public function insert($data, $table)
    {
        $columns = array_keys($data);

        $columnList = "`" . implode("`,`", $columns) . "`";

        $values = array_values($data);

        $placeholders = implode(",", array_fill(0, count($values), "?"));

        $sql = "INSERT INTO `$table` ($columnList) VALUES ($placeholders)";

        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            die("SQL Prepare Error: " . $this->connection->error);
        }

        $types = "";

        foreach ($values as $value) {
            $types .= "s";
        }

        $stmt->bind_param($types, ...$values);

        if ($stmt->execute()) {
            return '1';
        } else {
            die("SQL Execute Error: " . $stmt->error);
        }
    }

    public function update($sql)
    {
        if ($this->connection->query($sql) === TRUE) {
            return 'Record Update Successfully';
        } else {
            return 'Record Not Updated';
        }
    }

    public function delete($sql)
    {
        if ($this->connection->query($sql) === TRUE) {
            return 'Record Deleted Successfully';
        } else {
            return 'Record Not Delete';
        }
    }

    public function fetch($sql)
    {
        $result = $this->connection->query($sql);

        $data = array();

        if ($result && $result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

        }

        return $data;
    }
}

?>