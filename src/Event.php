<?php

namespace Calendar;

class Event
{
    /*
     * @var $id int
     */
    protected $id;
    
    /*
     * @var $title string
     */
    protected $title;
            
    /*
     * @var $allDay boolean
     */
    protected $allDay;
    
    /*
     * @var $start date/time (ISO 8601)
     */
    protected $start;
    
    /*
     * @var $end date/time (ISO 8601)
     */
    protected $end;
    
    # After this all are optinal
    
    /*
     * @var $url string
     */
    protected $url;
    
    /*
     * @var $className string  A CSS class atached to the element
     */
    protected $className;
    
    /*
     * @var $editable boolean
     */
    protected $editable;
    
    /*
     * @var $startEditable boolean
     */
    protected $startEditable;
    
    /*
     * @var $durationEditable boolean
     */
    protected $durationEditable;
    
    /*
     * @var $rendering string
     */
    protected $rendering;
    
    /*
     * @var $overlap boolean
     */
    protected $overlap;
    
    /*
     * @var $constraint string
     */
    protected $constraint;
            
    /*
     * @var $source string
     */
    protected $source;
    
    /*
     * @var $color string
     */
    protected $color;
    
    /*
     * @var $backgroundColor string
     */
    protected $backgroundColor;
    
    /*
     * @var $borderColor string
     */
    protected $borderColor;
    
    /*
     * @var $textColor string
     */
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