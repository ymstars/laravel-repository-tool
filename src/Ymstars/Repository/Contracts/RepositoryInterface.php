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


use Ymstars\Repository\Exceptions\RepositoryException;

interface RepositoryInterface
{

    /**
     * 根据默认转换器输出格式化数据
     * @param $data
     * @param null $presenterClass
     * @return mixed
     * @throws RepositoryException
     */
    public function getFormatJsonData($data, $presenterClass = null);

    /**
     * @return mixed
     */
    public function first();

}