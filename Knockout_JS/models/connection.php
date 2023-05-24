<?php
class database
{
    public $que;
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'nhanvien';
    protected $result = array();
    protected $mysqli = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    public function fetch($sql){
        $result = mysqli_query($this->mysqli, $sql);
        $arr = array();
        while($rows = mysqli_fetch_object($result))
            $arr[] = $rows;
        return $arr;
    }

    public function fetch_assoc($sql)
    {
        $result = mysqli_query($this->mysqli, $sql);
        $arr = array();
        while ($rows = mysqli_fetch_assoc($result))
            array_push($arr, $rows);
        return $arr;
    }

    public function fetch_one($sql){
        global $con;
        $result = mysqli_query($con,$sql);
        $rows = mysqli_fetch_object($result);
        return $rows;
    }

    public function execute($sql){
        global $con;
        mysqli_query($this->mysqli,$sql);
    }

    public function count($sql){
        global $con;
        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);
    }
    public function get_insert_id($id_name,$name){
        global $con;
        $result = mysqli_query($con,"select $id_name from $name order by $id_name desc limit 0,1");
        $rows = mysqli_fetch_object($result);
        return $rows;
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}
