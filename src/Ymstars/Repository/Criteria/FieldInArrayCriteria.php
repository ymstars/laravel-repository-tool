<?php

namespace Ymstars\Repository\Criteria;

use Ymstars\Repository\Contracts\CriteriaInterface;
use Ymstars\Repository\Contracts\RepositoryInterface;

/**
 * Class FieldInArrayCriteria
 * @package namespace App\Repositories\Criteria;
 */
class FieldInArrayCriteria implements CriteriaInterface
{
    protected $field;

    protected $value = [];

    /**
     * FieldInArrayCriteria constructor.
     * @param $field
     * @param array $value
     */
    public function __construct($field, array $value)
    {
        $this->field = $field;
        $this->value = $value;
    }


    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (!empty($this->value)) {
            $model = $model->whereIn($this->field, $this->value);
        }

        return $model;
    }
}
