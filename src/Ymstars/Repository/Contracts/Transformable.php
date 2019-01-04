<?php
/**
 * Created by YMSTARS.LTD -Junjie Zeng.
 * Author: Junjie Zeng
 * Email: ymstars@qq.com
 * Url: www.ymstars.com
 * Date: 2019/1/4
 * Time: 13:48
 */

namespace Ymstars\Repository\Contracts;

/**
 * Interface Transformable
 * @package Ymstars\Repository\Contracts
 */
interface Transformable
{
    /**
     * @return array
     */
    public function transform();
}
