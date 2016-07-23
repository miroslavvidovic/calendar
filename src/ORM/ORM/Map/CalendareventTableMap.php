<?php

namespace ORM\ORM\Map;

use ORM\ORM\Calendarevent;
use ORM\ORM\CalendareventQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'CalendarEvent' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CalendareventTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ORM.ORM.Map.CalendareventTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'CalendarEvent';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ORM\\ORM\\Calendarevent';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ORM.ORM.Calendarevent';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the id field
     */
    const COL_ID = 'CalendarEvent.id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'CalendarEvent.title';

    /**
     * the column name for the all_day field
     */
    const COL_ALL_DAY = 'CalendarEvent.all_day';

    /**
     * the column name for the start_date field
     */
    const COL_START_DATE = 'CalendarEvent.start_date';

    /**
     * the column name for the end_date field
     */
    const COL_END_DATE = 'CalendarEvent.end_date';

    /**
     * the column name for the url field
     */
    const COL_URL = 'CalendarEvent.url';

    /**
     * the column name for the editable field
     */
    const COL_EDITABLE = 'CalendarEvent.editable';

    /**
     * the column name for the start_editable field
     */
    const COL_START_EDITABLE = 'CalendarEvent.start_editable';

    /**
     * the column name for the duration_editable field
     */
    const COL_DURATION_EDITABLE = 'CalendarEvent.duration_editable';

    /**
     * the column name for the rendering field
     */
    const COL_RENDERING = 'CalendarEvent.rendering';

    /**
     * the column name for the overlap field
     */
    const COL_OVERLAP = 'CalendarEvent.overlap';

    /**
     * the column name for the constraint_limit field
     */
    const COL_CONSTRAINT_LIMIT = 'CalendarEvent.constraint_limit';

    /**
     * the column name for the color field
     */
    const COL_COLOR = 'CalendarEvent.color';

    /**
     * the column name for the class_name field
     */
    const COL_CLASS_NAME = 'CalendarEvent.class_name';

    /**
     * the column name for the background_color field
     */
    const COL_BACKGROUND_COLOR = 'CalendarEvent.background_color';

    /**
     * the column name for the border_color field
     */
    const COL_BORDER_COLOR = 'CalendarEvent.border_color';

    /**
     * the column name for the text_color field
     */
    const COL_TEXT_COLOR = 'CalendarEvent.text_color';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Title', 'AllDay', 'StartDate', 'EndDate', 'Url', 'Editable', 'StartEditable', 'DurationEditable', 'Rendering', 'Overlap', 'ConstraintLimit', 'Color', 'ClassName', 'BackgroundColor', 'BorderColor', 'TextColor', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'allDay', 'startDate', 'endDate', 'url', 'editable', 'startEditable', 'durationEditable', 'rendering', 'overlap', 'constraintLimit', 'color', 'className', 'backgroundColor', 'borderColor', 'textColor', ),
        self::TYPE_COLNAME       => array(CalendareventTableMap::COL_ID, CalendareventTableMap::COL_TITLE, CalendareventTableMap::COL_ALL_DAY, CalendareventTableMap::COL_START_DATE, CalendareventTableMap::COL_END_DATE, CalendareventTableMap::COL_URL, CalendareventTableMap::COL_EDITABLE, CalendareventTableMap::COL_START_EDITABLE, CalendareventTableMap::COL_DURATION_EDITABLE, CalendareventTableMap::COL_RENDERING, CalendareventTableMap::COL_OVERLAP, CalendareventTableMap::COL_CONSTRAINT_LIMIT, CalendareventTableMap::COL_COLOR, CalendareventTableMap::COL_CLASS_NAME, CalendareventTableMap::COL_BACKGROUND_COLOR, CalendareventTableMap::COL_BORDER_COLOR, CalendareventTableMap::COL_TEXT_COLOR, ),
        self::TYPE_FIELDNAME     => array('id', 'title', 'all_day', 'start_date', 'end_date', 'url', 'editable', 'start_editable', 'duration_editable', 'rendering', 'overlap', 'constraint_limit', 'color', 'class_name', 'background_color', 'border_color', 'text_color', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'AllDay' => 2, 'StartDate' => 3, 'EndDate' => 4, 'Url' => 5, 'Editable' => 6, 'StartEditable' => 7, 'DurationEditable' => 8, 'Rendering' => 9, 'Overlap' => 10, 'ConstraintLimit' => 11, 'Color' => 12, 'ClassName' => 13, 'BackgroundColor' => 14, 'BorderColor' => 15, 'TextColor' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'allDay' => 2, 'startDate' => 3, 'endDate' => 4, 'url' => 5, 'editable' => 6, 'startEditable' => 7, 'durationEditable' => 8, 'rendering' => 9, 'overlap' => 10, 'constraintLimit' => 11, 'color' => 12, 'className' => 13, 'backgroundColor' => 14, 'borderColor' => 15, 'textColor' => 16, ),
        self::TYPE_COLNAME       => array(CalendareventTableMap::COL_ID => 0, CalendareventTableMap::COL_TITLE => 1, CalendareventTableMap::COL_ALL_DAY => 2, CalendareventTableMap::COL_START_DATE => 3, CalendareventTableMap::COL_END_DATE => 4, CalendareventTableMap::COL_URL => 5, CalendareventTableMap::COL_EDITABLE => 6, CalendareventTableMap::COL_START_EDITABLE => 7, CalendareventTableMap::COL_DURATION_EDITABLE => 8, CalendareventTableMap::COL_RENDERING => 9, CalendareventTableMap::COL_OVERLAP => 10, CalendareventTableMap::COL_CONSTRAINT_LIMIT => 11, CalendareventTableMap::COL_COLOR => 12, CalendareventTableMap::COL_CLASS_NAME => 13, CalendareventTableMap::COL_BACKGROUND_COLOR => 14, CalendareventTableMap::COL_BORDER_COLOR => 15, CalendareventTableMap::COL_TEXT_COLOR => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'title' => 1, 'all_day' => 2, 'start_date' => 3, 'end_date' => 4, 'url' => 5, 'editable' => 6, 'start_editable' => 7, 'duration_editable' => 8, 'rendering' => 9, 'overlap' => 10, 'constraint_limit' => 11, 'color' => 12, 'class_name' => 13, 'background_color' => 14, 'border_color' => 15, 'text_color' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('CalendarEvent');
        $this->setPhpName('Calendarevent');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ORM\\ORM\\Calendarevent');
        $this->setPackage('ORM.ORM');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('all_day', 'AllDay', 'BOOLEAN', false, 1, null);
        $this->addColumn('start_date', 'StartDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('end_date', 'EndDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('url', 'Url', 'VARCHAR', false, 255, null);
        $this->addColumn('editable', 'Editable', 'BOOLEAN', false, 1, null);
        $this->addColumn('start_editable', 'StartEditable', 'BOOLEAN', false, 1, null);
        $this->addColumn('duration_editable', 'DurationEditable', 'BOOLEAN', false, 1, null);
        $this->addColumn('rendering', 'Rendering', 'VARCHAR', false, 255, null);
        $this->addColumn('overlap', 'Overlap', 'BOOLEAN', false, 1, null);
        $this->addColumn('constraint_limit', 'ConstraintLimit', 'VARCHAR', false, 255, null);
        $this->addColumn('color', 'Color', 'VARCHAR', false, 255, null);
        $this->addColumn('class_name', 'ClassName', 'VARCHAR', false, 255, null);
        $this->addColumn('background_color', 'BackgroundColor', 'VARCHAR', false, 255, null);
        $this->addColumn('border_color', 'BorderColor', 'VARCHAR', false, 255, null);
        $this->addColumn('text_color', 'TextColor', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Dentistevent', '\\ORM\\ORM\\Dentistevent', RelationMap::ONE_TO_ONE, array (
  0 =>
  array (
    0 => ':id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Workevent', '\\ORM\\ORM\\Workevent', RelationMap::ONE_TO_ONE, array (
  0 =>
  array (
    0 => ':id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to CalendarEvent     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        DentisteventTableMap::clearInstancePool();
        WorkeventTableMap::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CalendareventTableMap::CLASS_DEFAULT : CalendareventTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Calendarevent object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CalendareventTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CalendareventTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CalendareventTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CalendareventTableMap::OM_CLASS;
            /** @var Calendarevent $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CalendareventTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CalendareventTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CalendareventTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Calendarevent $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CalendareventTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CalendareventTableMap::COL_ID);
            $criteria->addSelectColumn(CalendareventTableMap::COL_TITLE);
            $criteria->addSelectColumn(CalendareventTableMap::COL_ALL_DAY);
            $criteria->addSelectColumn(CalendareventTableMap::COL_START_DATE);
            $criteria->addSelectColumn(CalendareventTableMap::COL_END_DATE);
            $criteria->addSelectColumn(CalendareventTableMap::COL_URL);
            $criteria->addSelectColumn(CalendareventTableMap::COL_EDITABLE);
            $criteria->addSelectColumn(CalendareventTableMap::COL_START_EDITABLE);
            $criteria->addSelectColumn(CalendareventTableMap::COL_DURATION_EDITABLE);
            $criteria->addSelectColumn(CalendareventTableMap::COL_RENDERING);
            $criteria->addSelectColumn(CalendareventTableMap::COL_OVERLAP);
            $criteria->addSelectColumn(CalendareventTableMap::COL_CONSTRAINT_LIMIT);
            $criteria->addSelectColumn(CalendareventTableMap::COL_COLOR);
            $criteria->addSelectColumn(CalendareventTableMap::COL_CLASS_NAME);
            $criteria->addSelectColumn(CalendareventTableMap::COL_BACKGROUND_COLOR);
            $criteria->addSelectColumn(CalendareventTableMap::COL_BORDER_COLOR);
            $criteria->addSelectColumn(CalendareventTableMap::COL_TEXT_COLOR);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.all_day');
            $criteria->addSelectColumn($alias . '.start_date');
            $criteria->addSelectColumn($alias . '.end_date');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.editable');
            $criteria->addSelectColumn($alias . '.start_editable');
            $criteria->addSelectColumn($alias . '.duration_editable');
            $criteria->addSelectColumn($alias . '.rendering');
            $criteria->addSelectColumn($alias . '.overlap');
            $criteria->addSelectColumn($alias . '.constraint_limit');
            $criteria->addSelectColumn($alias . '.color');
            $criteria->addSelectColumn($alias . '.class_name');
            $criteria->addSelectColumn($alias . '.background_color');
            $criteria->addSelectColumn($alias . '.border_color');
            $criteria->addSelectColumn($alias . '.text_color');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CalendareventTableMap::DATABASE_NAME)->getTable(CalendareventTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CalendareventTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CalendareventTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CalendareventTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Calendarevent or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Calendarevent object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CalendareventTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ORM\ORM\Calendarevent) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CalendareventTableMap::DATABASE_NAME);
            $criteria->add(CalendareventTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CalendareventQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CalendareventTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CalendareventTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the CalendarEvent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CalendareventQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Calendarevent or Criteria object.
     *
     * @param mixed               $criteria Criteria or Calendarevent object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CalendareventTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Calendarevent object
        }

        if ($criteria->containsKey(CalendareventTableMap::COL_ID) && $criteria->keyContainsValue(CalendareventTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CalendareventTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CalendareventQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CalendareventTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CalendareventTableMap::buildTableMap();
