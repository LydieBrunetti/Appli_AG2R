<?php

class Event
{
    private $name;
    private $location;
    private $start_date;
    private $participants;

    public function __construct($name,$location,$start_date,$participants)
    {
        $this->name = $name;
        $this->location = $location;
        $this->start_date = $start_date;
        $this->participants = $participants;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getParticipants()
    {
        return $this->participants;
    }

    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }
}
