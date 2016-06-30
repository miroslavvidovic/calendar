<?php

namespace Calendar\Model;

/** @Entity */ 
class DentistEvent extends CalendarEvent
{
    /** @Id @Column(type="integer") @GeneratedValue*/
    protected $id;
    /** @Column(type="string", nullable=true) */
    private $info;
            
    function __construct()
    {
        $this->setColor("green");
    }
    
    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

}