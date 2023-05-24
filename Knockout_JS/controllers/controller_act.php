<?php

class controller_act extends database
{

    public function __construct()
    {
        parent::__construct();
        $act = isset($_GET["act"]) ? $_GET["act"] : "";
        switch ($act) {
            case 'add': {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST["name"];
                        $age = $_POST["age"];
                        $job = $_POST["job"];
                        $this->execute("insert into nhan_vien(name,age,job) values ('$name',$age,'$job')");
                        header("location:index.php");
                    }
                    break;
                }
            case 'del': {
                $id = $_GET['id'];
                $this->execute("delete from nhan_vien where id = $id");
                header("location:index.php");
                break;
                }
        }
        $list_nv = $this->fetch("select * from nhan_vien");
        $list_nv2 = $this->fetch_assoc("select * from nhan_vien");
        $arr_nv = array();
        foreach ($list_nv as $nv) {
            $nvien = new NhanVien();
            $nvien->setId($nv->id);
            $nvien->setName($nv->name);
            $nvien->setAge($nv->age);
            $nvien->setJob($nv->job);
            array_push($arr_nv, $nvien);
        }
        include_once 'views/main.php';
    }
}
new controller_act();
