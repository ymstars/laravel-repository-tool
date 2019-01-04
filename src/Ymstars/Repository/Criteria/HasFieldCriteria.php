<?php

namespace Ymstars\Repository\Criteria;

use Ymstars\Repository\Contracts\CriteriaInterface;
use Ymstars\Repository\Contracts\RepositoryInterface;

/**
 * Class HasFieldCriteria.
 *
 * @package namespace App\Repositories\Criteria;
 */
class HasFieldCriteria implements CriteriaInterface
{
    protected $field;

    protected $value;

    /**
     * HasFieldCriteria constructor.
     * @param string $field
     * @param $value
     */
    public function __construct(string $field, $value)
    {
        $this->field = $field;
        $this->value = $value;
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
        /**
         * 如果值不为空，则构造查询条件
         */
        if (!is_null($this->value) && $this->value !== '') {
            $model = $model->where($this->field, '=', $this->value);
        }
        return $model;
    }
}
