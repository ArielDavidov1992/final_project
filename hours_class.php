<?php
class hours
{
    protected $Id;
    protected $FullDate;
    protected $StartTime;
    protected $EndTime;


  

   public function getId()
    {
        return $this->Id;
    }
    public function setId($ID)
    {
        $this->Id=$ID;
    }

   public function getDate()
    {
        return $this->FullDate;
    }
    public function setDate($newDate)
    {
        $this->FullDate=$newDate;
    }
    public function getStartTime()
    {
        return $this->StartTime;
    }
    public function setStartTime($newStartTime)
    {
        $this->StartTime=$newStartTime;
    }

    public function getEndTime()
    {
        return $this->EndTime;
    }

    public function setEndTime($newEndTime)
    {
        $this->EndTime=$newEndTime;
    }

    

}

?>