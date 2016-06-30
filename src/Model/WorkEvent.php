<?php

namespace Calendar\Model;

/** @Entity */ 
class WorkEvent extends CalendarEvent
{
    /** @Id @Column(type="integer") @GeneratedValue*/
    protected $id;
    /** @Column(type="string", nullable=true) */
    private $description;
    /** @Column(type="string", nullable=true) */
    private $location;
    
    function __construct()
    {
        $this->setColor("red");
    }
    
    public function getDescription()
    {
        return $this->description;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }


    
   

}