<?php
class Work extends Person
{
    protected $idWork;
    protected $idWorker;
    protected $hour;
    protected $month;
    protected $year;
    public function setIDWork($idwork)
    {
        $this->idWork = $idwork;
    }
    public function getIDWork()
    {
        return $this->idWork;
    }
    public function setIDWorker($idworker)
    {
        $this->idWorker = $idworker;
    }
    public function getIDWorker()
    {
        return $this->idWorker;
    }
    public function setHour($hour)
    {
        $this->hour = $hour;
    }
    public function getHour()
    {
        return $this->hour;
    }
    public function setMonth($month)
    {
        $this->month = $month;
    }
    public function getmonth()
    {
        return $this->month;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }
    public function getYear()
    {
        return $this->year;
    }
}
