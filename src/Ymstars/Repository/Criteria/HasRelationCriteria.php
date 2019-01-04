<?php

namespace Ymstars\Repository\Criteria;

use Ymstars\Repository\Contracts\CriteriaInterface;
use Ymstars\Repository\Contracts\RepositoryInterface;

/**
 * Class HasRelationCriteria.
 *
 * @package namespace App\Repositories\Criteria;
 */
class HasRelationCriteria implements CriteriaInterface
{

    /**
     * @var string
     */
    protected $relation;

    /**
     * @var string
     */
    protected $field;

    protected $value;

    /**
     * @var string
     */
    protected $op;

    protected $relationTableName;


    /**
     * HasRelationCriteria constructor.
     * @param string $relation
     * @param $value
     * @param null $relationTableName
     * @param string $field
     * @param string $op
     */
    public function __construct(string $relation, $value, $relationTableName = null, string $field = 'id', string $op = '=')
    {
        $this->relation = $relation;
        $this->field = $field;
        $this->value = $value;
        $this->op = $op;
        $this->relationTableName = $relationTableName === null ? $relation : $relationTableName;
    }


    /**
     * Apply criteria in query repository
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereHas($this->relation, function ($query) {
            $query->where($this->relationTableName . '.' . $this->field, $this->op, $this->value);
        });
    }
}
