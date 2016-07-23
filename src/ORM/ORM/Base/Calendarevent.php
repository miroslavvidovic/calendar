<?php

namespace ORM\ORM\Base;

use \DateTime;
use \Exception;
use \PDO;
use ORM\ORM\CalendareventQuery as ChildCalendareventQuery;
use ORM\ORM\Dentistevent as ChildDentistevent;
use ORM\ORM\DentisteventQuery as ChildDentisteventQuery;
use ORM\ORM\Workevent as ChildWorkevent;
use ORM\ORM\WorkeventQuery as ChildWorkeventQuery;
use ORM\ORM\Map\CalendareventTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'CalendarEvent' table.
 *
 *
 *
 * @package    propel.generator.ORM.ORM.Base
 */
abstract class Calendarevent implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\ORM\\ORM\\Map\\CalendareventTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the all_day field.
     *
     * @var        boolean
     */
    protected $all_day;

    /**
     * The value for the start_date field.
     *
     * @var        DateTime
     */
    protected $start_date;

    /**
     * The value for the end_date field.
     *
     * @var        DateTime
     */
    protected $end_date;

    /**
     * The value for the url field.
     *
     * @var        string
     */
    protected $url;

    /**
     * The value for the editable field.
     *
     * @var        boolean
     */
    protected $editable;

    /**
     * The value for the start_editable field.
     *
     * @var        boolean
     */
    protected $start_editable;

    /**
     * The value for the duration_editable field.
     *
     * @var        boolean
     */
    protected $duration_editable;

    /**
     * The value for the rendering field.
     *
     * @var        string
     */
    protected $rendering;

    /**
     * The value for the overlap field.
     *
     * @var        boolean
     */
    protected $overlap;

    /**
     * The value for the constraint_limit field.
     *
     * @var        string
     */
    protected $constraint_limit;

    /**
     * The value for the color field.
     *
     * @var        string
     */
    protected $color;

    /**
     * The value for the class_name field.
     *
     * @var        string
     */
    protected $class_name;

    /**
     * The value for the background_color field.
     *
     * @var        string
     */
    protected $background_color;

    /**
     * The value for the border_color field.
     *
     * @var        string
     */
    protected $border_color;

    /**
     * The value for the text_color field.
     *
     * @var        string
     */
    protected $text_color;

    /**
     * @var        ChildDentistevent one-to-one related ChildDentistevent object
     */
    protected $singleDentistevent;

    /**
     * @var        ChildWorkevent one-to-one related ChildWorkevent object
     */
    protected $singleWorkevent;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of ORM\ORM\Base\Calendarevent object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Calendarevent</code> instance.  If
     * <code>obj</code> is an instance of <code>Calendarevent</code>, delegates to
     * <code>equals(Calendarevent)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Calendarevent The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [all_day] column value.
     *
     * @return boolean
     */
    public function getAllDay()
    {
        return $this->all_day;
    }

    /**
     * Get the [all_day] column value.
     *
     * @return boolean
     */
    public function isAllDay()
    {
        return $this->getAllDay();
    }

    /**
     * Get the [optionally formatted] temporal [start_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getStartDate($format = NULL)
    {
        if ($format === null) {
            return $this->start_date;
        } else {
            return $this->start_date instanceof \DateTimeInterface ? $this->start_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [end_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEndDate($format = NULL)
    {
        if ($format === null) {
            return $this->end_date;
        } else {
            return $this->end_date instanceof \DateTimeInterface ? $this->end_date->format($format) : null;
        }
    }

    /**
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the [editable] column value.
     *
     * @return boolean
     */
    public function getEditable()
    {
        return $this->editable;
    }

    /**
     * Get the [editable] column value.
     *
     * @return boolean
     */
    public function isEditable()
    {
        return $this->getEditable();
    }

    /**
     * Get the [start_editable] column value.
     *
     * @return boolean
     */
    public function getStartEditable()
    {
        return $this->start_editable;
    }

    /**
     * Get the [start_editable] column value.
     *
     * @return boolean
     */
    public function isStartEditable()
    {
        return $this->getStartEditable();
    }

    /**
     * Get the [duration_editable] column value.
     *
     * @return boolean
     */
    public function getDurationEditable()
    {
        return $this->duration_editable;
    }

    /**
     * Get the [duration_editable] column value.
     *
     * @return boolean
     */
    public function isDurationEditable()
    {
        return $this->getDurationEditable();
    }

    /**
     * Get the [rendering] column value.
     *
     * @return string
     */
    public function getRendering()
    {
        return $this->rendering;
    }

    /**
     * Get the [overlap] column value.
     *
     * @return boolean
     */
    public function getOverlap()
    {
        return $this->overlap;
    }

    /**
     * Get the [overlap] column value.
     *
     * @return boolean
     */
    public function isOverlap()
    {
        return $this->getOverlap();
    }

    /**
     * Get the [constraint_limit] column value.
     *
     * @return string
     */
    public function getConstraintLimit()
    {
        return $this->constraint_limit;
    }

    /**
     * Get the [color] column value.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Get the [class_name] column value.
     *
     * @return string
     */
    public function getClassName()
    {
        return $this->class_name;
    }

    /**
     * Get the [background_color] column value.
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->background_color;
    }

    /**
     * Get the [border_color] column value.
     *
     * @return string
     */
    public function getBorderColor()
    {
        return $this->border_color;
    }

    /**
     * Get the [text_color] column value.
     *
     * @return string
     */
    public function getTextColor()
    {
        return $this->text_color;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Sets the value of the [all_day] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setAllDay($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->all_day !== $v) {
            $this->all_day = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_ALL_DAY] = true;
        }

        return $this;
    } // setAllDay()

    /**
     * Sets the value of [start_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setStartDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->start_date !== null || $dt !== null) {
            if ($this->start_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->start_date->format("Y-m-d H:i:s.u")) {
                $this->start_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CalendareventTableMap::COL_START_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setStartDate()

    /**
     * Sets the value of [end_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setEndDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->end_date !== null || $dt !== null) {
            if ($this->end_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->end_date->format("Y-m-d H:i:s.u")) {
                $this->end_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CalendareventTableMap::COL_END_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setEndDate()

    /**
     * Set the value of [url] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_URL] = true;
        }

        return $this;
    } // setUrl()

    /**
     * Sets the value of the [editable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setEditable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->editable !== $v) {
            $this->editable = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_EDITABLE] = true;
        }

        return $this;
    } // setEditable()

    /**
     * Sets the value of the [start_editable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setStartEditable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->start_editable !== $v) {
            $this->start_editable = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_START_EDITABLE] = true;
        }

        return $this;
    } // setStartEditable()

    /**
     * Sets the value of the [duration_editable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setDurationEditable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->duration_editable !== $v) {
            $this->duration_editable = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_DURATION_EDITABLE] = true;
        }

        return $this;
    } // setDurationEditable()

    /**
     * Set the value of [rendering] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setRendering($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rendering !== $v) {
            $this->rendering = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_RENDERING] = true;
        }

        return $this;
    } // setRendering()

    /**
     * Sets the value of the [overlap] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setOverlap($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->overlap !== $v) {
            $this->overlap = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_OVERLAP] = true;
        }

        return $this;
    } // setOverlap()

    /**
     * Set the value of [constraint_limit] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setConstraintLimit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->constraint_limit !== $v) {
            $this->constraint_limit = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_CONSTRAINT_LIMIT] = true;
        }

        return $this;
    } // setConstraintLimit()

    /**
     * Set the value of [color] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setColor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->color !== $v) {
            $this->color = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_COLOR] = true;
        }

        return $this;
    } // setColor()

    /**
     * Set the value of [class_name] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setClassName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->class_name !== $v) {
            $this->class_name = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_CLASS_NAME] = true;
        }

        return $this;
    } // setClassName()

    /**
     * Set the value of [background_color] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setBackgroundColor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->background_color !== $v) {
            $this->background_color = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_BACKGROUND_COLOR] = true;
        }

        return $this;
    } // setBackgroundColor()

    /**
     * Set the value of [border_color] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setBorderColor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->border_color !== $v) {
            $this->border_color = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_BORDER_COLOR] = true;
        }

        return $this;
    } // setBorderColor()

    /**
     * Set the value of [text_color] column.
     *
     * @param string $v new value
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     */
    public function setTextColor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->text_color !== $v) {
            $this->text_color = $v;
            $this->modifiedColumns[CalendareventTableMap::COL_TEXT_COLOR] = true;
        }

        return $this;
    } // setTextColor()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CalendareventTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CalendareventTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CalendareventTableMap::translateFieldName('AllDay', TableMap::TYPE_PHPNAME, $indexType)];
            $this->all_day = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CalendareventTableMap::translateFieldName('StartDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->start_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CalendareventTableMap::translateFieldName('EndDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->end_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CalendareventTableMap::translateFieldName('Url', TableMap::TYPE_PHPNAME, $indexType)];
            $this->url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CalendareventTableMap::translateFieldName('Editable', TableMap::TYPE_PHPNAME, $indexType)];
            $this->editable = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CalendareventTableMap::translateFieldName('StartEditable', TableMap::TYPE_PHPNAME, $indexType)];
            $this->start_editable = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CalendareventTableMap::translateFieldName('DurationEditable', TableMap::TYPE_PHPNAME, $indexType)];
            $this->duration_editable = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CalendareventTableMap::translateFieldName('Rendering', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rendering = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CalendareventTableMap::translateFieldName('Overlap', TableMap::TYPE_PHPNAME, $indexType)];
            $this->overlap = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CalendareventTableMap::translateFieldName('ConstraintLimit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->constraint_limit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CalendareventTableMap::translateFieldName('Color', TableMap::TYPE_PHPNAME, $indexType)];
            $this->color = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CalendareventTableMap::translateFieldName('ClassName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->class_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CalendareventTableMap::translateFieldName('BackgroundColor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->background_color = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CalendareventTableMap::translateFieldName('BorderColor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->border_color = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CalendareventTableMap::translateFieldName('TextColor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->text_color = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = CalendareventTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\ORM\\ORM\\Calendarevent'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CalendareventTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCalendareventQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->singleDentistevent = null;

            $this->singleWorkevent = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Calendarevent::setDeleted()
     * @see Calendarevent::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CalendareventTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCalendareventQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CalendareventTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CalendareventTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->singleDentistevent !== null) {
                if (!$this->singleDentistevent->isDeleted() && ($this->singleDentistevent->isNew() || $this->singleDentistevent->isModified())) {
                    $affectedRows += $this->singleDentistevent->save($con);
                }
            }

            if ($this->singleWorkevent !== null) {
                if (!$this->singleWorkevent->isDeleted() && ($this->singleWorkevent->isNew() || $this->singleWorkevent->isModified())) {
                    $affectedRows += $this->singleWorkevent->save($con);
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CalendareventTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CalendareventTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CalendareventTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_ALL_DAY)) {
            $modifiedColumns[':p' . $index++]  = 'all_day';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_START_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'start_date';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_END_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'end_date';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_URL)) {
            $modifiedColumns[':p' . $index++]  = 'url';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_EDITABLE)) {
            $modifiedColumns[':p' . $index++]  = 'editable';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_START_EDITABLE)) {
            $modifiedColumns[':p' . $index++]  = 'start_editable';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_DURATION_EDITABLE)) {
            $modifiedColumns[':p' . $index++]  = 'duration_editable';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_RENDERING)) {
            $modifiedColumns[':p' . $index++]  = 'rendering';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_OVERLAP)) {
            $modifiedColumns[':p' . $index++]  = 'overlap';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_CONSTRAINT_LIMIT)) {
            $modifiedColumns[':p' . $index++]  = 'constraint_limit';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_COLOR)) {
            $modifiedColumns[':p' . $index++]  = 'color';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_CLASS_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'class_name';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_BACKGROUND_COLOR)) {
            $modifiedColumns[':p' . $index++]  = 'background_color';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_BORDER_COLOR)) {
            $modifiedColumns[':p' . $index++]  = 'border_color';
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_TEXT_COLOR)) {
            $modifiedColumns[':p' . $index++]  = 'text_color';
        }

        $sql = sprintf(
            'INSERT INTO CalendarEvent (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'all_day':
                        $stmt->bindValue($identifier, (int) $this->all_day, PDO::PARAM_INT);
                        break;
                    case 'start_date':
                        $stmt->bindValue($identifier, $this->start_date ? $this->start_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'end_date':
                        $stmt->bindValue($identifier, $this->end_date ? $this->end_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'url':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case 'editable':
                        $stmt->bindValue($identifier, (int) $this->editable, PDO::PARAM_INT);
                        break;
                    case 'start_editable':
                        $stmt->bindValue($identifier, (int) $this->start_editable, PDO::PARAM_INT);
                        break;
                    case 'duration_editable':
                        $stmt->bindValue($identifier, (int) $this->duration_editable, PDO::PARAM_INT);
                        break;
                    case 'rendering':
                        $stmt->bindValue($identifier, $this->rendering, PDO::PARAM_STR);
                        break;
                    case 'overlap':
                        $stmt->bindValue($identifier, (int) $this->overlap, PDO::PARAM_INT);
                        break;
                    case 'constraint_limit':
                        $stmt->bindValue($identifier, $this->constraint_limit, PDO::PARAM_STR);
                        break;
                    case 'color':
                        $stmt->bindValue($identifier, $this->color, PDO::PARAM_STR);
                        break;
                    case 'class_name':
                        $stmt->bindValue($identifier, $this->class_name, PDO::PARAM_STR);
                        break;
                    case 'background_color':
                        $stmt->bindValue($identifier, $this->background_color, PDO::PARAM_STR);
                        break;
                    case 'border_color':
                        $stmt->bindValue($identifier, $this->border_color, PDO::PARAM_STR);
                        break;
                    case 'text_color':
                        $stmt->bindValue($identifier, $this->text_color, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CalendareventTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getTitle();
                break;
            case 2:
                return $this->getAllDay();
                break;
            case 3:
                return $this->getStartDate();
                break;
            case 4:
                return $this->getEndDate();
                break;
            case 5:
                return $this->getUrl();
                break;
            case 6:
                return $this->getEditable();
                break;
            case 7:
                return $this->getStartEditable();
                break;
            case 8:
                return $this->getDurationEditable();
                break;
            case 9:
                return $this->getRendering();
                break;
            case 10:
                return $this->getOverlap();
                break;
            case 11:
                return $this->getConstraintLimit();
                break;
            case 12:
                return $this->getColor();
                break;
            case 13:
                return $this->getClassName();
                break;
            case 14:
                return $this->getBackgroundColor();
                break;
            case 15:
                return $this->getBorderColor();
                break;
            case 16:
                return $this->getTextColor();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Calendarevent'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Calendarevent'][$this->hashCode()] = true;
        $keys = CalendareventTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getAllDay(),
            $keys[3] => $this->getStartDate(),
            $keys[4] => $this->getEndDate(),
            $keys[5] => $this->getUrl(),
            $keys[6] => $this->getEditable(),
            $keys[7] => $this->getStartEditable(),
            $keys[8] => $this->getDurationEditable(),
            $keys[9] => $this->getRendering(),
            $keys[10] => $this->getOverlap(),
            $keys[11] => $this->getConstraintLimit(),
            $keys[12] => $this->getColor(),
            $keys[13] => $this->getClassName(),
            $keys[14] => $this->getBackgroundColor(),
            $keys[15] => $this->getBorderColor(),
            $keys[16] => $this->getTextColor(),
        );
        if ($result[$keys[3]] instanceof \DateTime) {
            $result[$keys[3]] = $result[$keys[3]]->format('c');
        }

        if ($result[$keys[4]] instanceof \DateTime) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->singleDentistevent) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'dentistevent';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'DentistEvent';
                        break;
                    default:
                        $key = 'Dentistevent';
                }

                $result[$key] = $this->singleDentistevent->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleWorkevent) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'workevent';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'WorkEvent';
                        break;
                    default:
                        $key = 'Workevent';
                }

                $result[$key] = $this->singleWorkevent->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\ORM\ORM\Calendarevent
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CalendareventTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\ORM\ORM\Calendarevent
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setTitle($value);
                break;
            case 2:
                $this->setAllDay($value);
                break;
            case 3:
                $this->setStartDate($value);
                break;
            case 4:
                $this->setEndDate($value);
                break;
            case 5:
                $this->setUrl($value);
                break;
            case 6:
                $this->setEditable($value);
                break;
            case 7:
                $this->setStartEditable($value);
                break;
            case 8:
                $this->setDurationEditable($value);
                break;
            case 9:
                $this->setRendering($value);
                break;
            case 10:
                $this->setOverlap($value);
                break;
            case 11:
                $this->setConstraintLimit($value);
                break;
            case 12:
                $this->setColor($value);
                break;
            case 13:
                $this->setClassName($value);
                break;
            case 14:
                $this->setBackgroundColor($value);
                break;
            case 15:
                $this->setBorderColor($value);
                break;
            case 16:
                $this->setTextColor($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CalendareventTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTitle($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAllDay($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setStartDate($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEndDate($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUrl($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setEditable($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setStartEditable($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setDurationEditable($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setRendering($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setOverlap($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setConstraintLimit($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setColor($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setClassName($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setBackgroundColor($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setBorderColor($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTextColor($arr[$keys[16]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\ORM\ORM\Calendarevent The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CalendareventTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CalendareventTableMap::COL_ID)) {
            $criteria->add(CalendareventTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_TITLE)) {
            $criteria->add(CalendareventTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_ALL_DAY)) {
            $criteria->add(CalendareventTableMap::COL_ALL_DAY, $this->all_day);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_START_DATE)) {
            $criteria->add(CalendareventTableMap::COL_START_DATE, $this->start_date);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_END_DATE)) {
            $criteria->add(CalendareventTableMap::COL_END_DATE, $this->end_date);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_URL)) {
            $criteria->add(CalendareventTableMap::COL_URL, $this->url);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_EDITABLE)) {
            $criteria->add(CalendareventTableMap::COL_EDITABLE, $this->editable);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_START_EDITABLE)) {
            $criteria->add(CalendareventTableMap::COL_START_EDITABLE, $this->start_editable);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_DURATION_EDITABLE)) {
            $criteria->add(CalendareventTableMap::COL_DURATION_EDITABLE, $this->duration_editable);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_RENDERING)) {
            $criteria->add(CalendareventTableMap::COL_RENDERING, $this->rendering);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_OVERLAP)) {
            $criteria->add(CalendareventTableMap::COL_OVERLAP, $this->overlap);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_CONSTRAINT_LIMIT)) {
            $criteria->add(CalendareventTableMap::COL_CONSTRAINT_LIMIT, $this->constraint_limit);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_COLOR)) {
            $criteria->add(CalendareventTableMap::COL_COLOR, $this->color);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_CLASS_NAME)) {
            $criteria->add(CalendareventTableMap::COL_CLASS_NAME, $this->class_name);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_BACKGROUND_COLOR)) {
            $criteria->add(CalendareventTableMap::COL_BACKGROUND_COLOR, $this->background_color);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_BORDER_COLOR)) {
            $criteria->add(CalendareventTableMap::COL_BORDER_COLOR, $this->border_color);
        }
        if ($this->isColumnModified(CalendareventTableMap::COL_TEXT_COLOR)) {
            $criteria->add(CalendareventTableMap::COL_TEXT_COLOR, $this->text_color);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCalendareventQuery::create();
        $criteria->add(CalendareventTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \ORM\ORM\Calendarevent (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setAllDay($this->getAllDay());
        $copyObj->setStartDate($this->getStartDate());
        $copyObj->setEndDate($this->getEndDate());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setEditable($this->getEditable());
        $copyObj->setStartEditable($this->getStartEditable());
        $copyObj->setDurationEditable($this->getDurationEditable());
        $copyObj->setRendering($this->getRendering());
        $copyObj->setOverlap($this->getOverlap());
        $copyObj->setConstraintLimit($this->getConstraintLimit());
        $copyObj->setColor($this->getColor());
        $copyObj->setClassName($this->getClassName());
        $copyObj->setBackgroundColor($this->getBackgroundColor());
        $copyObj->setBorderColor($this->getBorderColor());
        $copyObj->setTextColor($this->getTextColor());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            $relObj = $this->getDentistevent();
            if ($relObj) {
                $copyObj->setDentistevent($relObj->copy($deepCopy));
            }

            $relObj = $this->getWorkevent();
            if ($relObj) {
                $copyObj->setWorkevent($relObj->copy($deepCopy));
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \ORM\ORM\Calendarevent Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
    }

    /**
     * Gets a single ChildDentistevent object, which is related to this object by a one-to-one relationship.
     *
     * @param  ConnectionInterface $con optional connection object
     * @return ChildDentistevent
     * @throws PropelException
     */
    public function getDentistevent(ConnectionInterface $con = null)
    {

        if ($this->singleDentistevent === null && !$this->isNew()) {
            $this->singleDentistevent = ChildDentisteventQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleDentistevent;
    }

    /**
     * Sets a single ChildDentistevent object as related to this object by a one-to-one relationship.
     *
     * @param  ChildDentistevent $v ChildDentistevent
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDentistevent(ChildDentistevent $v = null)
    {
        $this->singleDentistevent = $v;

        // Make sure that that the passed-in ChildDentistevent isn't already associated with this object
        if ($v !== null && $v->getCalendarevent(null, false) === null) {
            $v->setCalendarevent($this);
        }

        return $this;
    }

    /**
     * Gets a single ChildWorkevent object, which is related to this object by a one-to-one relationship.
     *
     * @param  ConnectionInterface $con optional connection object
     * @return ChildWorkevent
     * @throws PropelException
     */
    public function getWorkevent(ConnectionInterface $con = null)
    {

        if ($this->singleWorkevent === null && !$this->isNew()) {
            $this->singleWorkevent = ChildWorkeventQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleWorkevent;
    }

    /**
     * Sets a single ChildWorkevent object as related to this object by a one-to-one relationship.
     *
     * @param  ChildWorkevent $v ChildWorkevent
     * @return $this|\ORM\ORM\Calendarevent The current object (for fluent API support)
     * @throws PropelException
     */
    public function setWorkevent(ChildWorkevent $v = null)
    {
        $this->singleWorkevent = $v;

        // Make sure that that the passed-in ChildWorkevent isn't already associated with this object
        if ($v !== null && $v->getCalendarevent(null, false) === null) {
            $v->setCalendarevent($this);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->title = null;
        $this->all_day = null;
        $this->start_date = null;
        $this->end_date = null;
        $this->url = null;
        $this->editable = null;
        $this->start_editable = null;
        $this->duration_editable = null;
        $this->rendering = null;
        $this->overlap = null;
        $this->constraint_limit = null;
        $this->color = null;
        $this->class_name = null;
        $this->background_color = null;
        $this->border_color = null;
        $this->text_color = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->singleDentistevent) {
                $this->singleDentistevent->clearAllReferences($deep);
            }
            if ($this->singleWorkevent) {
                $this->singleWorkevent->clearAllReferences($deep);
            }
        } // if ($deep)

        $this->singleDentistevent = null;
        $this->singleWorkevent = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CalendareventTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
