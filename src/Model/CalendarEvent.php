<?php

namespace Calendar\Model;

/** 
 * @Entity
 * @InheritanceType("JOINED")
 *  */
abstract class CalendarEvent
{
    /*
     * @var $id int Uniquely identifies the given event
     */
    /** @Id @Column(type="integer") @GeneratedValue*/
    protected $id;
    
    /*
     * @var $title string The text on an event's element
     */
    /** @Column(type="string") */
    protected $title;
            
    /*
     * @var $allDay boolean Event occurs at a specific time-of-day or it is an 
     *                      all day event
     */
    /** @Column(type="boolean", name="all_day", nullable=true)) */
    protected $allDay;
    
    /*
     * @var $start date/time (ISO 8601) The date/time an event begins
     */
    /** @Column(type="datetime", name="start_date") */
    protected $start;
    
    /*
     * @var $end date/time (ISO 8601) The date/time an event ends 
     */
    /** @Column(type="datetime", name="end_date") */
    protected $end;
    
    /*
     * @var $url string URL that will be visited when this event is clicked by the user
     */
    /** @Column(type="string", nullable=true) */
    protected $url;
    
    /*
     * @var $className string  A CSS class atached to the element
     */
    /** @Column(type="string", name="class_name", nullable=true) */
    protected $className;
    
    /*
     * @var $editable boolean  Determines if the events can be dragged and resized
     */
    /** @Column(type="boolean", nullable=true) */
    protected $editable;
    
    /*
     * @var $startEditable boolean Allow events' start times to be editable through dragging
     */
    /** @Column(type="boolean", name="start_editable", nullable=true) */
    protected $startEditable;
    
    /*
     * @var $durationEditable boolean Allow events' durations to be editable through resizing
     */
    /** @Column(type="boolean", name="duration_editable", nullable=true) */
    protected $durationEditable;
    
    /*
     * @var $rendering string  Render and event in the background
     */
    /** @Column(type="string", nullable=true) */
    protected $rendering;
    
    /*
     * @var $overlap boolean Determines if events on the calendar, when dragged 
     *                       and resized, are allowed to overlap each other
     */
    /** @Column(type="boolean", nullable=true) */
    protected $overlap;
    
    /*
     * @var $constraint string Limits event dragging and resizing to certain windows of time
     */
    /** @Column(type="string", nullable=true, name="constraint_limit") */
    protected $constraint;
     
    /*
     * @var $color string  Sets the background and border colors
     */
    /** @Column(type="string", nullable=true) */
    protected $color;
    
    /*
     * @var $backgroundColor string  Sets the background color 
     */
    /** @Column(type="string", name="background_color", nullable=true) */
    protected $backgroundColor;
    
    /*
     * @var $borderColor string  Sets the border color
     */
    /** @Column(type="string", name="border_color", nullable=true) */
    protected $borderColor;
    
    /*
     * @var $textColor string  Sets the text color
     */
    /** @Column(type="string", name="text_color", nullable=true) */
    protected $textColor;
    
    function __construct()
    {
        
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAllDay()
    {
        return $this->allDay;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function getEditable()
    {
        return $this->editable;
    }

    public function getStartEditable()
    {
        return $this->startEditable;
    }

    public function getDurationEditable()
    {
        return $this->durationEditable;
    }

    public function getRendering()
    {
        return $this->rendering;
    }

    public function getOverlap()
    {
        return $this->overlap;
    }

    public function getConstraint()
    {
        return $this->constraint;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    public function getBorderColor()
    {
        return $this->borderColor;
    }

    public function getTextColor()
    {
        return $this->textColor;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function setEditable($editable)
    {
        $this->editable = $editable;
    }

    public function setStartEditable($startEditable)
    {
        $this->startEditable = $startEditable;
    }

    public function setDurationEditable($durationEditable)
    {
        $this->durationEditable = $durationEditable;
    }

    public function setRendering($rendering)
    {
        $this->rendering = $rendering;
    }

    public function setOverlap($overlap)
    {
        $this->overlap = $overlap;
    }

    public function setConstraint($constraint)
    {
        $this->constraint = $constraint;
    }

    public function setSource($source)
    {
        $this->source = $source;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;
    }

    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
    }

}