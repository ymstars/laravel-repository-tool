<?php
/**
 * Created by YMSTARS.LTD -Junjie Zeng.
 * Author: Junjie Zeng
 * Email: ymstars@qq.com
 * Url: www.ymstars.com
 * Date: 2019/1/4
 * Time: 13:48
 */

namespace Ymstars\Repository\Events;

/**
 * Class RepositoryEntityCreated
 * @package Ymstars\Repository\Events
 */
class RepositoryEntityCreated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "created";
}
