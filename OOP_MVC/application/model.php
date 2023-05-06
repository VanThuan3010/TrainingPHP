<?php 
	class model{

	public function fetch($sql){
        global $con;
        $result = mysqli_query($con,$sql);
        $arr = array();
        while($rows = mysqli_fetch_object($result))
            $arr[] = $rows;
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
        mysqli_query($con,$sql);
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
	}
