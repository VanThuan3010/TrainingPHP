<?php
class controller_detail_statis extends controller
{
	public function __construct()
	{
		parent::__construct();
		$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
		$list_works = $this->model->fetch("select * from work where id_worker = $id_worker");
		$arr_work = array();
		foreach ($list_works as $works){
		$work = new Work();
		$work->setIDWork($works->id_work);
		$work->setIDWorker($works->id_worker);
		$work->setHour($works->hour);
		$work->setMonth($works->month);
		$work->setYear($works->year);
		array_push($arr_work, $work);
		}
		include_once "view/view_detail_statis.php";
	}
}
new controller_detail_statis();
