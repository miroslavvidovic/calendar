<?php

namespace ORM\ORM\Base;

use \Exception;
use \PDO;
use ORM\ORM\Dentistevent as ChildDentistevent;
use ORM\ORM\DentisteventQuery as ChildDentisteventQuery;
use ORM\ORM\Map\DentisteventTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'DentistEvent' table.
 *
 *
 *
 * @method     ChildDentisteventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDentisteventQuery orderByInfo($order = Criteria::ASC) Order by the info column
 * @method     ChildDentisteventQuery orderByCalendareventId($order = Criteria::ASC) Order by the CalendarEvent_id column
 *
 * @method     ChildDentisteventQuery groupById() Group by the id column
 * @method     ChildDentisteventQuery groupByInfo() Group by the info column
 * @method     ChildDentisteventQuery groupByCalendareventId() Group by the CalendarEvent_id column
 *
 * @method     ChildDentisteventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDentisteventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDentisteventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDentisteventQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDentisteventQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDentisteventQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDentisteventQuery leftJoinCalendarevent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Calendarevent relation
 * @method     ChildDentisteventQuery rightJoinCalendarevent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Calendarevent relation
 * @method     ChildDentisteventQuery innerJoinCalendarevent($relationAlias = null) Adds a INNER JOIN clause to the query using the Calendarevent relation
 *
 * @method     ChildDentisteventQuery joinWithCalendarevent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Calendarevent relation
 *
 * @method     ChildDentisteventQuery leftJoinWithCalendarevent() Adds a LEFT JOIN clause and with to the query using the Calendarevent relation
 * @method     ChildDentisteventQuery rightJoinWithCalendarevent() Adds a RIGHT JOIN clause and with to the query using the Calendarevent relation
 * @method     ChildDentisteventQuery innerJoinWithCalendarevent() Adds a INNER JOIN clause and with to the query using the Calendarevent relation
 *
 * @method     \ORM\ORM\CalendareventQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDentistevent findOne(ConnectionInterface $con = null) Return the first ChildDentistevent matching the query
 * @method     ChildDentistevent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDentistevent matching the query, or a new ChildDentistevent object populated from the query conditions when no match is found
 *
 * @method     ChildDentistevent findOneById(int $id) Return the first ChildDentistevent filtered by the id column
 * @method     ChildDentistevent findOneByInfo(string $info) Return the first ChildDentistevent filtered by the info column
 * @method     ChildDentistevent findOneByCalendareventId(int $CalendarEvent_id) Return the first ChildDentistevent filtered by the CalendarEvent_id column *

 * @method     ChildDentistevent requirePk($key, ConnectionInterface $con = null) Return the ChildDentistevent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDentistevent requireOne(ConnectionInterface $con = null) Return the first ChildDentistevent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDentistevent requireOneById(int $id) Return the first ChildDentistevent filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDentistevent requireOneByInfo(string $info) Return the first ChildDentistevent filtered by the info column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDentistevent requireOneByCalendareventId(int $CalendarEvent_id) Return the first ChildDentistevent filtered by the CalendarEvent_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDentistevent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDentistevent objects based on current ModelCriteria
 * @method     ChildDentistevent[]|ObjectCollection findById(int $id) Return ChildDentistevent objects filtered by the id column
 * @method     ChildDentistevent[]|ObjectCollection findByInfo(string $info) Return ChildDentistevent objects filtered by the info column
 * @method     ChildDentistevent[]|ObjectCollection findByCalendareventId(int $CalendarEvent_id) Return ChildDentistevent objects filtered by the CalendarEvent_id column
 * @method     ChildDentistevent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DentisteventQuery extends ModelCriteria
{

    // delegate behavior

    protected $delegatedFields = [
        'Title' => 'Calendarevent',
        'AllDay' => 'Calendarevent',
        'StartDate' => 'Calendarevent',
        'EndDate' => 'Calendarevent',
        'Url' => 'Calendarevent',
        'Editable' => 'Calendarevent',
        'StartEditable' => 'Calendarevent',
        'DurationEditable' => 'Calendarevent',
        'Rendering' => 'Calendarevent',
        'Overlap' => 'Calendarevent',
        'ConstraintLimit' => 'Calendarevent',
        'Color' => 'Calendarevent',
        'ClassName' => 'Calendarevent',
        'BackgroundColor' => 'Calendarevent',
        'BorderColor' => 'Calendarevent',
        'TextColor' => 'Calendarevent',
    ];

protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ORM\ORM\Base\DentisteventQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ORM\\ORM\\Dentistevent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDentisteventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDentisteventQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDentisteventQuery) {
            return $criteria;
        }
        $query = new ChildDentisteventQuery();
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
     * @return ChildDentistevent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DentisteventTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DentisteventTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDentistevent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, info, CalendarEvent_id FROM DentistEvent WHERE id = :p0';
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
            /** @var ChildDentistevent $obj */
            $obj = new ChildDentistevent();
            $obj->hydrate($row);
            DentisteventTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDentistevent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDentisteventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DentisteventTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDentisteventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DentisteventTableMap::COL_ID, $keys, Criteria::IN);
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
     * @see       filterByCalendarevent()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDentisteventQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DentisteventTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DentisteventTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DentisteventTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the info column
     *
     * Example usage:
     * <code>
     * $query->filterByInfo('fooValue');   // WHERE info = 'fooValue'
     * $query->filterByInfo('%fooValue%'); // WHERE info LIKE '%fooValue%'
     * </code>
     *
     * @param     string $info The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDentisteventQuery The current query, for fluid interface
     */
    public function filterByInfo($info = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($info)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DentisteventTableMap::COL_INFO, $info, $comparison);
    }

    /**
     * Filter the query on the CalendarEvent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCalendareventId(1234); // WHERE CalendarEvent_id = 1234
     * $query->filterByCalendareventId(array(12, 34)); // WHERE CalendarEvent_id IN (12, 34)
     * $query->filterByCalendareventId(array('min' => 12)); // WHERE CalendarEvent_id > 12
     * </code>
     *
     * @param     mixed $calendareventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDentisteventQuery The current query, for fluid interface
     */
    public function filterByCalendareventId($calendareventId = null, $comparison = null)
    {
        if (is_array($calendareventId)) {
            $useMinMax = false;
            if (isset($calendareventId['min'])) {
                $this->addUsingAlias(DentisteventTableMap::COL_CALENDAREVENT_ID, $calendareventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calendareventId['max'])) {
                $this->addUsingAlias(DentisteventTableMap::COL_CALENDAREVENT_ID, $calendareventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DentisteventTableMap::COL_CALENDAREVENT_ID, $calendareventId, $comparison);
    }

    /**
     * Filter the query by a related \ORM\ORM\Calendarevent object
     *
     * @param \ORM\ORM\Calendarevent|ObjectCollection $calendarevent The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDentisteventQuery The current query, for fluid interface
     */
    public function filterByCalendarevent($calendarevent, $comparison = null)
    {
        if ($calendarevent instanceof \ORM\ORM\Calendarevent) {
            return $this
                ->addUsingAlias(DentisteventTableMap::COL_ID, $calendarevent->getId(), $comparison);
        } elseif ($calendarevent instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DentisteventTableMap::COL_ID, $calendarevent->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCalendarevent() only accepts arguments of type \ORM\ORM\Calendarevent or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Calendarevent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDentisteventQuery The current query, for fluid interface
     */
    public function joinCalendarevent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Calendarevent');

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
            $this->addJoinObject($join, 'Calendarevent');
        }

        return $this;
    }

    /**
     * Use the Calendarevent relation Calendarevent object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ORM\ORM\CalendareventQuery A secondary query class using the current class as primary query
     */
    public function useCalendareventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCalendarevent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Calendarevent', '\ORM\ORM\CalendareventQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDentistevent $dentistevent Object to remove from the list of results
     *
     * @return $this|ChildDentisteventQuery The current query, for fluid interface
     */
    public function prune($dentistevent = null)
    {
        if ($dentistevent) {
            $this->addUsingAlias(DentisteventTableMap::COL_ID, $dentistevent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the DentistEvent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DentisteventTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DentisteventTableMap::clearInstancePool();
            DentisteventTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DentisteventTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DentisteventTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DentisteventTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DentisteventTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // delegate behavior
    /**
    * Filter the query by title column
    *
    * Example usage:
    * <code>
        * $query->filterByTitle(1234); // WHERE title = 1234
        * $query->filterByTitle(array(12, 34)); // WHERE title IN (12, 34)
        * $query->filterByTitle(array('min' => 12)); // WHERE title > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByTitle($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByTitle($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByTitle($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByTitle($order)->endUse();
    }
    /**
    * Filter the query by all_day column
    *
    * Example usage:
    * <code>
        * $query->filterByAllDay(1234); // WHERE all_day = 1234
        * $query->filterByAllDay(array(12, 34)); // WHERE all_day IN (12, 34)
        * $query->filterByAllDay(array('min' => 12)); // WHERE all_day > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByAllDay($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByAllDay($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByAllDay($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByAllDay($order)->endUse();
    }
    /**
    * Filter the query by start_date column
    *
    * Example usage:
    * <code>
        * $query->filterByStartDate(1234); // WHERE start_date = 1234
        * $query->filterByStartDate(array(12, 34)); // WHERE start_date IN (12, 34)
        * $query->filterByStartDate(array('min' => 12)); // WHERE start_date > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByStartDate($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByStartDate($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByStartDate($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByStartDate($order)->endUse();
    }
    /**
    * Filter the query by end_date column
    *
    * Example usage:
    * <code>
        * $query->filterByEndDate(1234); // WHERE end_date = 1234
        * $query->filterByEndDate(array(12, 34)); // WHERE end_date IN (12, 34)
        * $query->filterByEndDate(array('min' => 12)); // WHERE end_date > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByEndDate($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByEndDate($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByEndDate($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByEndDate($order)->endUse();
    }
    /**
    * Filter the query by url column
    *
    * Example usage:
    * <code>
        * $query->filterByUrl(1234); // WHERE url = 1234
        * $query->filterByUrl(array(12, 34)); // WHERE url IN (12, 34)
        * $query->filterByUrl(array('min' => 12)); // WHERE url > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByUrl($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByUrl($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByUrl($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByUrl($order)->endUse();
    }
    /**
    * Filter the query by editable column
    *
    * Example usage:
    * <code>
        * $query->filterByEditable(1234); // WHERE editable = 1234
        * $query->filterByEditable(array(12, 34)); // WHERE editable IN (12, 34)
        * $query->filterByEditable(array('min' => 12)); // WHERE editable > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByEditable($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByEditable($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByEditable($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByEditable($order)->endUse();
    }
    /**
    * Filter the query by start_editable column
    *
    * Example usage:
    * <code>
        * $query->filterByStartEditable(1234); // WHERE start_editable = 1234
        * $query->filterByStartEditable(array(12, 34)); // WHERE start_editable IN (12, 34)
        * $query->filterByStartEditable(array('min' => 12)); // WHERE start_editable > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByStartEditable($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByStartEditable($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByStartEditable($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByStartEditable($order)->endUse();
    }
    /**
    * Filter the query by duration_editable column
    *
    * Example usage:
    * <code>
        * $query->filterByDurationEditable(1234); // WHERE duration_editable = 1234
        * $query->filterByDurationEditable(array(12, 34)); // WHERE duration_editable IN (12, 34)
        * $query->filterByDurationEditable(array('min' => 12)); // WHERE duration_editable > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByDurationEditable($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByDurationEditable($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByDurationEditable($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByDurationEditable($order)->endUse();
    }
    /**
    * Filter the query by rendering column
    *
    * Example usage:
    * <code>
        * $query->filterByRendering(1234); // WHERE rendering = 1234
        * $query->filterByRendering(array(12, 34)); // WHERE rendering IN (12, 34)
        * $query->filterByRendering(array('min' => 12)); // WHERE rendering > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByRendering($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByRendering($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByRendering($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByRendering($order)->endUse();
    }
    /**
    * Filter the query by overlap column
    *
    * Example usage:
    * <code>
        * $query->filterByOverlap(1234); // WHERE overlap = 1234
        * $query->filterByOverlap(array(12, 34)); // WHERE overlap IN (12, 34)
        * $query->filterByOverlap(array('min' => 12)); // WHERE overlap > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByOverlap($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByOverlap($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByOverlap($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByOverlap($order)->endUse();
    }
    /**
    * Filter the query by constraint_limit column
    *
    * Example usage:
    * <code>
        * $query->filterByConstraintLimit(1234); // WHERE constraint_limit = 1234
        * $query->filterByConstraintLimit(array(12, 34)); // WHERE constraint_limit IN (12, 34)
        * $query->filterByConstraintLimit(array('min' => 12)); // WHERE constraint_limit > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByConstraintLimit($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByConstraintLimit($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByConstraintLimit($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByConstraintLimit($order)->endUse();
    }
    /**
    * Filter the query by color column
    *
    * Example usage:
    * <code>
        * $query->filterByColor(1234); // WHERE color = 1234
        * $query->filterByColor(array(12, 34)); // WHERE color IN (12, 34)
        * $query->filterByColor(array('min' => 12)); // WHERE color > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByColor($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByColor($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByColor($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByColor($order)->endUse();
    }
    /**
    * Filter the query by class_name column
    *
    * Example usage:
    * <code>
        * $query->filterByClassName(1234); // WHERE class_name = 1234
        * $query->filterByClassName(array(12, 34)); // WHERE class_name IN (12, 34)
        * $query->filterByClassName(array('min' => 12)); // WHERE class_name > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByClassName($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByClassName($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByClassName($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByClassName($order)->endUse();
    }
    /**
    * Filter the query by background_color column
    *
    * Example usage:
    * <code>
        * $query->filterByBackgroundColor(1234); // WHERE background_color = 1234
        * $query->filterByBackgroundColor(array(12, 34)); // WHERE background_color IN (12, 34)
        * $query->filterByBackgroundColor(array('min' => 12)); // WHERE background_color > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByBackgroundColor($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByBackgroundColor($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByBackgroundColor($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByBackgroundColor($order)->endUse();
    }
    /**
    * Filter the query by border_color column
    *
    * Example usage:
    * <code>
        * $query->filterByBorderColor(1234); // WHERE border_color = 1234
        * $query->filterByBorderColor(array(12, 34)); // WHERE border_color IN (12, 34)
        * $query->filterByBorderColor(array('min' => 12)); // WHERE border_color > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByBorderColor($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByBorderColor($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByBorderColor($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByBorderColor($order)->endUse();
    }
    /**
    * Filter the query by text_color column
    *
    * Example usage:
    * <code>
        * $query->filterByTextColor(1234); // WHERE text_color = 1234
        * $query->filterByTextColor(array(12, 34)); // WHERE text_color IN (12, 34)
        * $query->filterByTextColor(array('min' => 12)); // WHERE text_color > 12
        * </code>
    *
    * @param     mixed $value The value to use as filter.
    *              Use scalar values for equality.
    *              Use array values for in_array() equivalent.
    *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
    * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
    *
    * @return $this|ChildDentisteventQuery The current query, for fluid interface
    */
    public function filterByTextColor($value = null, $comparison = null)
    {
        return $this->useCalendareventQuery()->filterByTextColor($value, $comparison)->endUse();
    }

    /**
    * Adds an ORDER BY clause to the query
    * Usability layer on top of Criteria::addAscendingOrderByColumn() and Criteria::addDescendingOrderByColumn()
    * Infers $column and $order from $columnName and some optional arguments
    * Examples:
    *   $c->orderBy('Book.CreatedAt')
    *    => $c->addAscendingOrderByColumn(BookTableMap::CREATED_AT)
    *   $c->orderBy('Book.CategoryId', 'desc')
    *    => $c->addDescendingOrderByColumn(BookTableMap::CATEGORY_ID)
    *
    * @param string $order      The sorting order. Criteria::ASC by default, also accepts Criteria::DESC
    *
    * @return $this|ModelCriteria The current object, for fluid interface
    */
    public function orderByTextColor($order = Criteria::ASC)
    {
        return $this->useCalendareventQuery()->orderByTextColor($order)->endUse();
    }

    /**
     * Adds a condition on a column based on a column phpName and a value
     * Uses introspection to translate the column phpName into a fully qualified name
     * Warning: recognizes only the phpNames of the main Model (not joined tables)
     * <code>
     * $c->filterBy('Title', 'foo');
     * </code>
     *
     * @see Criteria::add()
     *
     * @param string $column     A string representing thecolumn phpName, e.g. 'AuthorId'
     * @param mixed  $value      A value for the condition
     * @param string $comparison What to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ModelCriteria The current object, for fluid interface
     */
    public function filterBy($column, $value, $comparison = Criteria::EQUAL)
    {
        if (isset($this->delegatedFields[$column])) {
            $methodUse = "use{$this->delegatedFields[$column]}Query";

            return $this->{$methodUse}()->filterBy($column, $value, $comparison)->endUse();
        } else {
            return $this->add($this->getRealColumnName($column), $value, $comparison);
        }
    }

} // DentisteventQuery
