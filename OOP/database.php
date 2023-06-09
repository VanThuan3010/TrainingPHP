<?php
class database
{
    public $que;
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'qlns';
    protected $result = array();
    protected $mysqli = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function checkid($table, $id)
    {

        $sql = "SELECT * FROM $table  WHERE ID = $id";

        return mysqli_query($this->mysqli, $sql);
    }
    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->mysqli->query($sql);
    }

    public function update($table, $para = array(), $id)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $id";

        $result = $this->mysqli->query($sql);
    }
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE $id";
        $result = $this->mysqli->query($sql);
    } 

    public $sql;

    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function select2($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        return mysqli_query($this->mysqli, $sql);
    }

    public function pagination($table, $rows = "*", $where = null, $start = 0, $num = 2)
    {
        $sql = "SELECT $rows FROM $table WHERE $where LIMIT $start, $num";
        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function pagination2($table, $rows = "*", $where = null, $start = 0, $num = 2)
    {
        $sql = "SELECT $rows FROM $table WHERE $where LIMIT $start, $num";
        return mysqli_query($this->mysqli, $sql);
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
