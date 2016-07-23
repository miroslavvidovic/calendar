<?php

namespace ORM\ORM\Base;

use \Exception;
use \PDO;
use ORM\ORM\Calendarevent as ChildCalendarevent;
use ORM\ORM\CalendareventQuery as ChildCalendareventQuery;
use ORM\ORM\Map\CalendareventTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'CalendarEvent' table.
 *
 *
 *
 * @method     ChildCalendareventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCalendareventQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildCalendareventQuery orderByAllDay($order = Criteria::ASC) Order by the all_day column
 * @method     ChildCalendareventQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     ChildCalendareventQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     ChildCalendareventQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildCalendareventQuery orderByEditable($order = Criteria::ASC) Order by the editable column
 * @method     ChildCalendareventQuery orderByStartEditable($order = Criteria::ASC) Order by the start_editable column
 * @method     ChildCalendareventQuery orderByDurationEditable($order = Criteria::ASC) Order by the duration_editable column
 * @method     ChildCalendareventQuery orderByRendering($order = Criteria::ASC) Order by the rendering column
 * @method     ChildCalendareventQuery orderByOverlap($order = Criteria::ASC) Order by the overlap column
 * @method     ChildCalendareventQuery orderByConstraintLimit($order = Criteria::ASC) Order by the constraint_limit column
 * @method     ChildCalendareventQuery orderByColor($order = Criteria::ASC) Order by the color column
 * @method     ChildCalendareventQuery orderByClassName($order = Criteria::ASC) Order by the class_name column
 * @method     ChildCalendareventQuery orderByBackgroundColor($order = Criteria::ASC) Order by the background_color column
 * @method     ChildCalendareventQuery orderByBorderColor($order = Criteria::ASC) Order by the border_color column
 * @method     ChildCalendareventQuery orderByTextColor($order = Criteria::ASC) Order by the text_color column
 *
 * @method     ChildCalendareventQuery groupById() Group by the id column
 * @method     ChildCalendareventQuery groupByTitle() Group by the title column
 * @method     ChildCalendareventQuery groupByAllDay() Group by the all_day column
 * @method     ChildCalendareventQuery groupByStartDate() Group by the start_date column
 * @method     ChildCalendareventQuery groupByEndDate() Group by the end_date column
 * @method     ChildCalendareventQuery groupByUrl() Group by the url column
 * @method     ChildCalendareventQuery groupByEditable() Group by the editable column
 * @method     ChildCalendareventQuery groupByStartEditable() Group by the start_editable column
 * @method     ChildCalendareventQuery groupByDurationEditable() Group by the duration_editable column
 * @method     ChildCalendareventQuery groupByRendering() Group by the rendering column
 * @method     ChildCalendareventQuery groupByOverlap() Group by the overlap column
 * @method     ChildCalendareventQuery groupByConstraintLimit() Group by the constraint_limit column
 * @method     ChildCalendareventQuery groupByColor() Group by the color column
 * @method     ChildCalendareventQuery groupByClassName() Group by the class_name column
 * @method     ChildCalendareventQuery groupByBackgroundColor() Group by the background_color column
 * @method     ChildCalendareventQuery groupByBorderColor() Group by the border_color column
 * @method     ChildCalendareventQuery groupByTextColor() Group by the text_color column
 *
 * @method     ChildCalendareventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCalendareventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCalendareventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCalendareventQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCalendareventQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCalendareventQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCalendareventQuery leftJoinDentistevent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dentistevent relation
 * @method     ChildCalendareventQuery rightJoinDentistevent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dentistevent relation
 * @method     ChildCalendareventQuery innerJoinDentistevent($relationAlias = null) Adds a INNER JOIN clause to the query using the Dentistevent relation
 *
 * @method     ChildCalendareventQuery joinWithDentistevent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dentistevent relation
 *
 * @method     ChildCalendareventQuery leftJoinWithDentistevent() Adds a LEFT JOIN clause and with to the query using the Dentistevent relation
 * @method     ChildCalendareventQuery rightJoinWithDentistevent() Adds a RIGHT JOIN clause and with to the query using the Dentistevent relation
 * @method     ChildCalendareventQuery innerJoinWithDentistevent() Adds a INNER JOIN clause and with to the query using the Dentistevent relation
 *
 * @method     ChildCalendareventQuery leftJoinWorkevent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Workevent relation
 * @method     ChildCalendareventQuery rightJoinWorkevent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Workevent relation
 * @method     ChildCalendareventQuery innerJoinWorkevent($relationAlias = null) Adds a INNER JOIN clause to the query using the Workevent relation
 *
 * @method     ChildCalendareventQuery joinWithWorkevent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Workevent relation
 *
 * @method     ChildCalendareventQuery leftJoinWithWorkevent() Adds a LEFT JOIN clause and with to the query using the Workevent relation
 * @method     ChildCalendareventQuery rightJoinWithWorkevent() Adds a RIGHT JOIN clause and with to the query using the Workevent relation
 * @method     ChildCalendareventQuery innerJoinWithWorkevent() Adds a INNER JOIN clause and with to the query using the Workevent relation
 *
 * @method     \ORM\ORM\DentisteventQuery|\ORM\ORM\WorkeventQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCalendarevent findOne(ConnectionInterface $con = null) Return the first ChildCalendarevent matching the query
 * @method     ChildCalendarevent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCalendarevent matching the query, or a new ChildCalendarevent object populated from the query conditions when no match is found
 *
 * @method     ChildCalendarevent findOneById(int $id) Return the first ChildCalendarevent filtered by the id column
 * @method     ChildCalendarevent findOneByTitle(string $title) Return the first ChildCalendarevent filtered by the title column
 * @method     ChildCalendarevent findOneByAllDay(boolean $all_day) Return the first ChildCalendarevent filtered by the all_day column
 * @method     ChildCalendarevent findOneByStartDate(string $start_date) Return the first ChildCalendarevent filtered by the start_date column
 * @method     ChildCalendarevent findOneByEndDate(string $end_date) Return the first ChildCalendarevent filtered by the end_date column
 * @method     ChildCalendarevent findOneByUrl(string $url) Return the first ChildCalendarevent filtered by the url column
 * @method     ChildCalendarevent findOneByEditable(boolean $editable) Return the first ChildCalendarevent filtered by the editable column
 * @method     ChildCalendarevent findOneByStartEditable(boolean $start_editable) Return the first ChildCalendarevent filtered by the start_editable column
 * @method     ChildCalendarevent findOneByDurationEditable(boolean $duration_editable) Return the first ChildCalendarevent filtered by the duration_editable column
 * @method     ChildCalendarevent findOneByRendering(string $rendering) Return the first ChildCalendarevent filtered by the rendering column
 * @method     ChildCalendarevent findOneByOverlap(boolean $overlap) Return the first ChildCalendarevent filtered by the overlap column
 * @method     ChildCalendarevent findOneByConstraintLimit(string $constraint_limit) Return the first ChildCalendarevent filtered by the constraint_limit column
 * @method     ChildCalendarevent findOneByColor(string $color) Return the first ChildCalendarevent filtered by the color column
 * @method     ChildCalendarevent findOneByClassName(string $class_name) Return the first ChildCalendarevent filtered by the class_name column
 * @method     ChildCalendarevent findOneByBackgroundColor(string $background_color) Return the first ChildCalendarevent filtered by the background_color column
 * @method     ChildCalendarevent findOneByBorderColor(string $border_color) Return the first ChildCalendarevent filtered by the border_color column
 * @method     ChildCalendarevent findOneByTextColor(string $text_color) Return the first ChildCalendarevent filtered by the text_color column *

 * @method     ChildCalendarevent requirePk($key, ConnectionInterface $con = null) Return the ChildCalendarevent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOne(ConnectionInterface $con = null) Return the first ChildCalendarevent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCalendarevent requireOneById(int $id) Return the first ChildCalendarevent filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByTitle(string $title) Return the first ChildCalendarevent filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByAllDay(boolean $all_day) Return the first ChildCalendarevent filtered by the all_day column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByStartDate(string $start_date) Return the first ChildCalendarevent filtered by the start_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByEndDate(string $end_date) Return the first ChildCalendarevent filtered by the end_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByUrl(string $url) Return the first ChildCalendarevent filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByEditable(boolean $editable) Return the first ChildCalendarevent filtered by the editable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByStartEditable(boolean $start_editable) Return the first ChildCalendarevent filtered by the start_editable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByDurationEditable(boolean $duration_editable) Return the first ChildCalendarevent filtered by the duration_editable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByRendering(string $rendering) Return the first ChildCalendarevent filtered by the rendering column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByOverlap(boolean $overlap) Return the first ChildCalendarevent filtered by the overlap column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByConstraintLimit(string $constraint_limit) Return the first ChildCalendarevent filtered by the constraint_limit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByColor(string $color) Return the first ChildCalendarevent filtered by the color column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByClassName(string $class_name) Return the first ChildCalendarevent filtered by the class_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByBackgroundColor(string $background_color) Return the first ChildCalendarevent filtered by the background_color column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByBorderColor(string $border_color) Return the first ChildCalendarevent filtered by the border_color column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCalendarevent requireOneByTextColor(string $text_color) Return the first ChildCalendarevent filtered by the text_color column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCalendarevent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCalendarevent objects based on current ModelCriteria
 * @method     ChildCalendarevent[]|ObjectCollection findById(int $id) Return ChildCalendarevent objects filtered by the id column
 * @method     ChildCalendarevent[]|ObjectCollection findByTitle(string $title) Return ChildCalendarevent objects filtered by the title column
 * @method     ChildCalendarevent[]|ObjectCollection findByAllDay(boolean $all_day) Return ChildCalendarevent objects filtered by the all_day column
 * @method     ChildCalendarevent[]|ObjectCollection findByStartDate(string $start_date) Return ChildCalendarevent objects filtered by the start_date column
 * @method     ChildCalendarevent[]|ObjectCollection findByEndDate(string $end_date) Return ChildCalendarevent objects filtered by the end_date column
 * @method     ChildCalendarevent[]|ObjectCollection findByUrl(string $url) Return ChildCalendarevent objects filtered by the url column
 * @method     ChildCalendarevent[]|ObjectCollection findByEditable(boolean $editable) Return ChildCalendarevent objects filtered by the editable column
 * @method     ChildCalendarevent[]|ObjectCollection findByStartEditable(boolean $start_editable) Return ChildCalendarevent objects filtered by the start_editable column
 * @method     ChildCalendarevent[]|ObjectCollection findByDurationEditable(boolean $duration_editable) Return ChildCalendarevent objects filtered by the duration_editable column
 * @method     ChildCalendarevent[]|ObjectCollection findByRendering(string $rendering) Return ChildCalendarevent objects filtered by the rendering column
 * @method     ChildCalendarevent[]|ObjectCollection findByOverlap(boolean $overlap) Return ChildCalendarevent objects filtered by the overlap column
 * @method     ChildCalendarevent[]|ObjectCollection findByConstraintLimit(string $constraint_limit) Return ChildCalendarevent objects filtered by the constraint_limit column
 * @method     ChildCalendarevent[]|ObjectCollection findByColor(string $color) Return ChildCalendarevent objects filtered by the color column
 * @method     ChildCalendarevent[]|ObjectCollection findByClassName(string $class_name) Return ChildCalendarevent objects filtered by the class_name column
 * @method     ChildCalendarevent[]|ObjectCollection findByBackgroundColor(string $background_color) Return ChildCalendarevent objects filtered by the background_color column
 * @method     ChildCalendarevent[]|ObjectCollection findByBorderColor(string $border_color) Return ChildCalendarevent objects filtered by the border_color column
 * @method     ChildCalendarevent[]|ObjectCollection findByTextColor(string $text_color) Return ChildCalendarevent objects filtered by the text_color column
 * @method     ChildCalendarevent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CalendareventQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ORM\ORM\Base\CalendareventQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ORM\\ORM\\Calendarevent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCalendareventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCalendareventQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCalendareventQuery) {
            return $criteria;
        }
        $query = new ChildCalendareventQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCalendarevent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CalendareventTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CalendareventTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCalendarevent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, all_day, start_date, end_date, url, editable, start_editable, duration_editable, rendering, overlap, constraint_limit, color, class_name, background_color, border_color, text_color FROM CalendarEvent WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCalendarevent $obj */
            $obj = new ChildCalendarevent();
            $obj->hydrate($row);
            CalendareventTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCalendarevent|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CalendareventTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CalendareventTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CalendareventTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CalendareventTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the all_day column
     *
     * Example usage:
     * <code>
     * $query->filterByAllDay(true); // WHERE all_day = true
     * $query->filterByAllDay('yes'); // WHERE all_day = true
     * </code>
     *
     * @param     boolean|string $allDay The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByAllDay($allDay = null, $comparison = null)
    {
        if (is_string($allDay)) {
            $allDay = in_array(strtolower($allDay), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_ALL_DAY, $allDay, $comparison);
    }

    /**
     * Filter the query on the start_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartDate('2011-03-14'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate('now'); // WHERE start_date = '2011-03-14'
     * $query->filterByStartDate(array('max' => 'yesterday')); // WHERE start_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $startDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByStartDate($startDate = null, $comparison = null)
    {
        if (is_array($startDate)) {
            $useMinMax = false;
            if (isset($startDate['min'])) {
                $this->addUsingAlias(CalendareventTableMap::COL_START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startDate['max'])) {
                $this->addUsingAlias(CalendareventTableMap::COL_START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_START_DATE, $startDate, $comparison);
    }

    /**
     * Filter the query on the end_date column
     *
     * Example usage:
     * <code>
     * $query->filterByEndDate('2011-03-14'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate('now'); // WHERE end_date = '2011-03-14'
     * $query->filterByEndDate(array('max' => 'yesterday')); // WHERE end_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $endDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByEndDate($endDate = null, $comparison = null)
    {
        if (is_array($endDate)) {
            $useMinMax = false;
            if (isset($endDate['min'])) {
                $this->addUsingAlias(CalendareventTableMap::COL_END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endDate['max'])) {
                $this->addUsingAlias(CalendareventTableMap::COL_END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_END_DATE, $endDate, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the editable column
     *
     * Example usage:
     * <code>
     * $query->filterByEditable(true); // WHERE editable = true
     * $query->filterByEditable('yes'); // WHERE editable = true
     * </code>
     *
     * @param     boolean|string $editable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByEditable($editable = null, $comparison = null)
    {
        if (is_string($editable)) {
            $editable = in_array(strtolower($editable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_EDITABLE, $editable, $comparison);
    }

    /**
     * Filter the query on the start_editable column
     *
     * Example usage:
     * <code>
     * $query->filterByStartEditable(true); // WHERE start_editable = true
     * $query->filterByStartEditable('yes'); // WHERE start_editable = true
     * </code>
     *
     * @param     boolean|string $startEditable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByStartEditable($startEditable = null, $comparison = null)
    {
        if (is_string($startEditable)) {
            $startEditable = in_array(strtolower($startEditable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_START_EDITABLE, $startEditable, $comparison);
    }

    /**
     * Filter the query on the duration_editable column
     *
     * Example usage:
     * <code>
     * $query->filterByDurationEditable(true); // WHERE duration_editable = true
     * $query->filterByDurationEditable('yes'); // WHERE duration_editable = true
     * </code>
     *
     * @param     boolean|string $durationEditable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByDurationEditable($durationEditable = null, $comparison = null)
    {
        if (is_string($durationEditable)) {
            $durationEditable = in_array(strtolower($durationEditable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_DURATION_EDITABLE, $durationEditable, $comparison);
    }

    /**
     * Filter the query on the rendering column
     *
     * Example usage:
     * <code>
     * $query->filterByRendering('fooValue');   // WHERE rendering = 'fooValue'
     * $query->filterByRendering('%fooValue%'); // WHERE rendering LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rendering The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByRendering($rendering = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rendering)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_RENDERING, $rendering, $comparison);
    }

    /**
     * Filter the query on the overlap column
     *
     * Example usage:
     * <code>
     * $query->filterByOverlap(true); // WHERE overlap = true
     * $query->filterByOverlap('yes'); // WHERE overlap = true
     * </code>
     *
     * @param     boolean|string $overlap The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByOverlap($overlap = null, $comparison = null)
    {
        if (is_string($overlap)) {
            $overlap = in_array(strtolower($overlap), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_OVERLAP, $overlap, $comparison);
    }

    /**
     * Filter the query on the constraint_limit column
     *
     * Example usage:
     * <code>
     * $query->filterByConstraintLimit('fooValue');   // WHERE constraint_limit = 'fooValue'
     * $query->filterByConstraintLimit('%fooValue%'); // WHERE constraint_limit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $constraintLimit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByConstraintLimit($constraintLimit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($constraintLimit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_CONSTRAINT_LIMIT, $constraintLimit, $comparison);
    }

    /**
     * Filter the query on the color column
     *
     * Example usage:
     * <code>
     * $query->filterByColor('fooValue');   // WHERE color = 'fooValue'
     * $query->filterByColor('%fooValue%'); // WHERE color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $color The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByColor($color = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($color)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_COLOR, $color, $comparison);
    }

    /**
     * Filter the query on the class_name column
     *
     * Example usage:
     * <code>
     * $query->filterByClassName('fooValue');   // WHERE class_name = 'fooValue'
     * $query->filterByClassName('%fooValue%'); // WHERE class_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $className The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByClassName($className = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($className)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_CLASS_NAME, $className, $comparison);
    }

    /**
     * Filter the query on the background_color column
     *
     * Example usage:
     * <code>
     * $query->filterByBackgroundColor('fooValue');   // WHERE background_color = 'fooValue'
     * $query->filterByBackgroundColor('%fooValue%'); // WHERE background_color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $backgroundColor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByBackgroundColor($backgroundColor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($backgroundColor)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_BACKGROUND_COLOR, $backgroundColor, $comparison);
    }

    /**
     * Filter the query on the border_color column
     *
     * Example usage:
     * <code>
     * $query->filterByBorderColor('fooValue');   // WHERE border_color = 'fooValue'
     * $query->filterByBorderColor('%fooValue%'); // WHERE border_color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $borderColor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByBorderColor($borderColor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($borderColor)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_BORDER_COLOR, $borderColor, $comparison);
    }

    /**
     * Filter the query on the text_color column
     *
     * Example usage:
     * <code>
     * $query->filterByTextColor('fooValue');   // WHERE text_color = 'fooValue'
     * $query->filterByTextColor('%fooValue%'); // WHERE text_color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $textColor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByTextColor($textColor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($textColor)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendareventTableMap::COL_TEXT_COLOR, $textColor, $comparison);
    }

    /**
     * Filter the query by a related \ORM\ORM\Dentistevent object
     *
     * @param \ORM\ORM\Dentistevent|ObjectCollection $dentistevent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByDentistevent($dentistevent, $comparison = null)
    {
        if ($dentistevent instanceof \ORM\ORM\Dentistevent) {
            return $this
                ->addUsingAlias(CalendareventTableMap::COL_ID, $dentistevent->getId(), $comparison);
        } elseif ($dentistevent instanceof ObjectCollection) {
            return $this
                ->useDentisteventQuery()
                ->filterByPrimaryKeys($dentistevent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDentistevent() only accepts arguments of type \ORM\ORM\Dentistevent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dentistevent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function joinDentistevent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dentistevent');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Dentistevent');
        }

        return $this;
    }

    /**
     * Use the Dentistevent relation Dentistevent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ORM\ORM\DentisteventQuery A secondary query class using the current class as primary query
     */
    public function useDentisteventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDentistevent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dentistevent', '\ORM\ORM\DentisteventQuery');
    }

    /**
     * Filter the query by a related \ORM\ORM\Workevent object
     *
     * @param \ORM\ORM\Workevent|ObjectCollection $workevent the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCalendareventQuery The current query, for fluid interface
     */
    public function filterByWorkevent($workevent, $comparison = null)
    {
        if ($workevent instanceof \ORM\ORM\Workevent) {
            return $this
                ->addUsingAlias(CalendareventTableMap::COL_ID, $workevent->getId(), $comparison);
        } elseif ($workevent instanceof ObjectCollection) {
            return $this
                ->useWorkeventQuery()
                ->filterByPrimaryKeys($workevent->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWorkevent() only accepts arguments of type \ORM\ORM\Workevent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Workevent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function joinWorkevent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Workevent');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Workevent');
        }

        return $this;
    }

    /**
     * Use the Workevent relation Workevent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ORM\ORM\WorkeventQuery A secondary query class using the current class as primary query
     */
    public function useWorkeventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWorkevent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Workevent', '\ORM\ORM\WorkeventQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCalendarevent $calendarevent Object to remove from the list of results
     *
     * @return $this|ChildCalendareventQuery The current query, for fluid interface
     */
    public function prune($calendarevent = null)
    {
        if ($calendarevent) {
            $this->addUsingAlias(CalendareventTableMap::COL_ID, $calendarevent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the CalendarEvent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CalendareventTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CalendareventTableMap::clearInstancePool();
            CalendareventTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CalendareventTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CalendareventTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CalendareventTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CalendareventTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CalendareventQuery
