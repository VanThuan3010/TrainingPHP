<?php

/**
 * 
 */
class controller_detail_worker extends controller
{

	public function __construct()
	{
		# code...
		parent::__construct();
		$id_worker = $_GET["id_worker"];
		$workers = $this->model->fetch_one("select * from worker where id_worker= $id_worker");
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
		}
		include_once "view/view_detail_worker.php";
	}
}
new controller_detail_worker();
