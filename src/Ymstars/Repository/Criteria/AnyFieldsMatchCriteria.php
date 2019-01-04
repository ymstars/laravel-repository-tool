<?php

namespace Ymstars\Repository\Criteria;


use Ymstars\Repository\Contracts\CriteriaInterface;
use Ymstars\Repository\Contracts\RepositoryInterface;

/**
 * 任意一个字段满足条件
 * Class AnyFieldsMatchCriteria
 */
class AnyFieldsMatchCriteria implements CriteriaInterface
{
    //字段集
    protected $fields = [];
    //字段值
    protected $value;

    /**
     * AnyFieldsMatchCriteria constructor.
     * @param array $fields
     * @param $value
     */
    public function __construct(array $fields, $value)
    {
        $this->fields = $fields;
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
        $model = $model->where(function ($query) {
            foreach ($this->fields as $key => $field) {
                if ($key === 0) {
                    $query->where($field, '=', $this->value);
                } else {
                    $query->orWhere($field, '=', $this->value);
                }
            }
        });
        return $model;
    }
}
