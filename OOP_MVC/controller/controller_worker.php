<?php

class controller_worker extends controller
{

	public function __construct()
	{
		# code...
		parent::__construct();
		$act = isset($_GET["act"]) ? $_GET["act"] : "";
		switch ($act) {
			case 'delete':
				$id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;

				$this->model->execute("delete from worker where id_worker = $id_worker");
				$this->model->execute("delete from work where id_worker = $id_worker");
				header("location:index.php?controller=worker");
				break;
		}
		$record_per_page = 3;
		$page = isset($_GET["page"]) ? $_GET["page"] : "1";
		$total_record = $this->model->count("select id_worker from worker");
		$from = ($page - 1) * $record_per_page;
		$number_page = ceil($total_record / $record_per_page);
		$list_worker = $this->model->fetch("select * from worker limit $from,$record_per_page");
		$arr_worker = array();
		foreach ($list_worker as $workers) {
			if ($workers->id_type_worker == 1) {
				$worker = new Developer();
				$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
				$worker->setTypeWorker($type_worker->name_type_worker);
				$worker->setId($workers->id_worker);
				$worker->setName($workers->name_worker);
				$worker->setAge($workers->age_worker);
				$worker->setAddress($workers->address);
				$worker->setBirthDay($workers->date_of_birth);
				$worker->setYearExp($workers->number_year_exp);
				$worker->setBasicPay($workers->base_salary);
				$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
				$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
				$worker->setNoun($noun->coefficient);
				$worker->setLevel($level->name_level);
				$list_lang = $this->model->fetch("select * from language_worker inner join language on language.id_language = language_worker.id_language inner join worker on worker.id_worker = language_worker.id_worker where worker.id_worker = $workers->id_worker");
				$arr_lang = array();
				foreach ($list_lang as $languages) {
					$language = new LanguageCode();
					$language->setName($languages->name);
					array_push($arr_lang, $language);
				}
				$worker->setLanguageCode($arr_lang);
				array_push($arr_worker, $worker);
			}
			if ($workers->id_type_worker == 2) {
				$worker = new ManagerProduct();
				$level = $this->model->fetch_one("select * from level where id_level=$workers->id_level");
				$worker->setLevel($level->name_level);
				$worker->setId($workers->id_worker);
				$noun = $this->model->fetch_one("select * from coefficient where id_level=$level->id_level");
				$worker->setNoun($noun->coefficient);
				$type_worker = $this->model->fetch_one("select * from type_worker where id_type_worker = $workers->id_type_worker");
				$worker->setTypeWorker($type_worker->name_type_worker);
				$worker->setName($workers->name_worker);
				$worker->setAge($workers->age_worker);
				$worker->setAddress($workers->address);
				$worker->setBirthDay($workers->date_of_birth);
				$worker->setYearExp($workers->number_year_exp);
				$worker->setBasicPay($workers->base_salary);
				array_push($arr_worker, $worker);
			}
		}

		include_once "view/view_worker.php";
	}
}
new controller_worker();
