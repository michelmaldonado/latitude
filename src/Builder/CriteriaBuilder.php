<?php

declare(strict_types=1);

namespace Latitude\QueryBuilder\Builder;

use Latitude\QueryBuilder\CriteriaInterface;
use Latitude\QueryBuilder\StatementInterface;

use function Latitude\QueryBuilder\criteria;
use function Latitude\QueryBuilder\listing;

class CriteriaBuilder
{
    private StatementInterface $statement;

    public function __construct(StatementInterface $statement)
    {
        $this->statement = $statement;
    }

    /**
     * @param mixed $start
     * @param mixed $end
     */
    public function between($start, $end): CriteriaInterface
    {
        return criteria('%s BETWEEN %s AND %s', $this->statement, $start, $end);
    }

    /**
     * @param mixed $start
     * @param mixed $end
     */
    public function notBetween($start, $end): CriteriaInterface
    {
        return criteria('%s NOT BETWEEN %s AND %s', $this->statement, $start, $end);
    }

    /**
     * @param mixed ...$values
     */
    public function in(...$values): CriteriaInterface
    {
        return criteria('%s IN (%s)', $this->statement, listing($values));
    }

    /**
     * @param mixed ...$values
     */
    public function notIn(...$values): CriteriaInterface
    {
        return criteria('%s NOT IN (%s)', $this->statement, listing($values));
    }

    /**
     * @param mixed $value
     */
    public function eq($value): CriteriaInterface
    {
        return criteria('%s = %s', $this->statement, $value);
    }

    /**
     * @param mixed $value
     */
    public function notEq($value): CriteriaInterface
    {
        return criteria('%s != %s', $this->statement, $value);
    }

    /**
     * @param mixed $value
     */
    public function gt($value): CriteriaInterface
    {
        return criteria('%s > %s', $this->statement, $value);
    }

    /**
     * @param mixed $value
     */
    public function gte($value): CriteriaInterface
    {
        return criteria('%s >= %s', $this->statement, $value);
    }

    /**
     * @param mixed $value
     */
    public function lt($value): CriteriaInterface
    {
        return criteria('%s < %s', $this->statement, $value);
    }

    /**
     * @param mixed $value
     */
    public function lte($value): CriteriaInterface
    {
        return criteria('%s <= %s', $this->statement, $value);
    }

    public function isNull(): CriteriaInterface
    {
        return criteria('%s IS NULL', $this->statement);
    }

    public function isNotNull(): CriteriaInterface
    {
        return criteria('%s IS NOT NULL', $this->statement);
    }
}
