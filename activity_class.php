<?php
class activities
{
    protected $Id;
    protected $DateActivity;
    protected $Class;
    protected $PlaceOfActivity;
    protected $TopicActivity;
    protected $NumberOfStudents;
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
        return $this->DateActivity;
    }
    public function setFirstName($newDate)
    {
        $this->DateActivity=$newDate;
    }

    public function getClass()
    {
        return $this->Class;
    }
    public function setClass($newClass)
    {
        $this->Class=$newClass;
    }

    public function getPlaceOfActivity()
    {
        return $this->PlaceOfActivity;
    }
    public function setPlaceOfActivity($newPlaceOfActivity)
    {
        $this->PlaceOfActivity=$newPlaceOfActivity;
    }

    public function getTopicActivity()
    {
        return $this->TopicActivity;
    }
    public function setTopicActivity($newTopicActivity)
    {
        $this->TopicActivity=$newTopicActivity;
    }
    public function getNumberOfStudents(){
        return $this->NumberOfStudents;
    }

    public function setNumberOfStudents($newNumberOfStudents)
    {
        $this->NumberOfStudents=$newNumberOfStudents;
    }

    public function getStartTime(){
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