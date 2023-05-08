<?php

/**
 * 
 */
class controller_statis extends controller
{
	public function __construct()
	{
		parent::__construct();

		// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 	$arr_worker = array();
		// 	$month = $_POST["month"];
		// 	if ($month  == '') {
		// 		$month = 0;
		// 	}

		// 	$year = $_POST["year"];
		// 	if ($year  == '') {
		// 		$year = 0;
		// 	}
		// 	$sort = $_POST["sort"];
		// }
		if(isset($_POST["statis"])) {
			$record_per_page = 3;
			$page = isset($_GET["page"]) ? $_GET["page"] : "1";
			$total_record = $this->model->count("select id_worker from worker");
			$from = ($page - 1) * $record_per_page;
			$number_page = ceil($total_record / $record_per_page);

			$arr_worker = array();
			$month = $_POST["month"];
			if ($month  == '') {
				$month = 0;
			}

			$year = $_POST["year"];
			if ($year  == '') {
				$year = 0;
			}

			$sort = $_POST["sort"];
			if ($_POST['sort'] == 2) {
				$list_worker = $this->model->fetch("select * from worker ORDER BY worker.date_of_birth DESC LIMIT $from, $record_per_page");
			} else $list_worker = $this->model->fetch("select * from worker ORDER BY worker.name_worker DESC LIMIT $from, $record_per_page");

			foreach ($list_worker as $workers) {
				if ($workers->id_type_worker == 1) {
					$worker = new Developer();
					$worker->setName($workers->name_worker);
					$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
					$worker->setTypeWorker($type_worker->name_type_worker);
					$worker->setId($workers->id_worker);
					$worker->setBasicPay($workers->base_salary);
					$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
					$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
					$worker->setNoun($noun->coefficient);
					$worker->setLevel($level->name_level);
					$hour_do = $this->model->fetch_one("SELECT sum(work.hour) as numberhour from work WHERE work.month = $month && work.year = $year && work.id_worker =$workers->id_worker");
					$worker->setHourDo($hour_do->numberhour);
					array_push($arr_worker, $worker);
				}
				if ($workers->id_type_worker == 2) {
					$worker = new ManagerProduct();
					$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
					$worker->setName($workers->name_worker);
					$worker->setLevel($level->name_level);
					$worker->setId($workers->id_worker);
					$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
					$worker->setNoun($noun->coefficient);
					$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
					$worker->setTypeWorker($type_worker->name_type_worker);
					$worker->setBasicPay($workers->base_salary);
					$hour_do = $this->model->fetch_one("SELECT sum(work.hour) as numberhour from work WHERE work.month = $month && work.year = $year && work.id_worker =$workers->id_worker");
					$worker->setHourDo($hour_do->numberhour);
					array_push($arr_worker, $worker);
				}
			}
		}
		if (isset($_GET["page"])) {
			$record_per_page = 3;
			$page = $_GET["page"];
			$total_record = $this->model->count("select id_worker from worker");
			$from = ($page - 1) * $record_per_page;
			$number_page = ceil($total_record / $record_per_page);

			$arr_worker = array();
			$month = $_GET["month"];
			if ($month  == '') {
				$month = 0;
			}

			$year = $_GET["year"];
			if ($year  == '') {
				$year = 0;
			}
			$sort = $_GET["sort"];
			if ($_GET["sort"] == 2) {
				$list_worker = $this->model->fetch("select * from worker ORDER BY worker.date_of_birth DESC LIMIT $from, $record_per_page");
			} else $list_worker = $this->model->fetch("select * from worker ORDER BY worker.name_worker DESC LIMIT $from, $record_per_page");

			foreach ($list_worker as $workers) {
				if ($workers->id_type_worker == 1) {
					$worker = new Developer();
					$worker->setName($workers->name_worker);
					$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
					$worker->setTypeWorker($type_worker->name_type_worker);
					$worker->setId($workers->id_worker);
					$worker->setBasicPay($workers->base_salary);
					$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
					$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
					$worker->setNoun($noun->coefficient);
					$worker->setLevel($level->name_level);
					$hour_do = $this->model->fetch_one("SELECT sum(work.hour) as numberhour from work WHERE work.month = $month && work.year = $year && work.id_worker =$workers->id_worker");
					$worker->setHourDo($hour_do->numberhour);
					array_push($arr_worker, $worker);
				}
				if ($workers->id_type_worker == 2) {
					$worker = new ManagerProduct();
					$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
					$worker->setName($workers->name_worker);
					$worker->setLevel($level->name_level);
					$worker->setId($workers->id_worker);
					$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
					$worker->setNoun($noun->coefficient);
					$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
					$worker->setTypeWorker($type_worker->name_type_worker);
					$worker->setBasicPay($workers->base_salary);
					$hour_do = $this->model->fetch_one("SELECT sum(work.hour) as numberhour from work WHERE work.month = $month && work.year = $year && work.id_worker =$workers->id_worker");
					$worker->setHourDo($hour_do->numberhour);
					array_push($arr_worker, $worker);
				}
			}
		}

			
		include_once "view/view_statis.php";
	}
}
new controller_statis();
