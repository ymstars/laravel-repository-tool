<?php
/**
 * Created by YMSTARS.LTD -Junjie Zeng.
 * Author: Junjie Zeng
 * Email: ymstars@qq.com
 * Url: www.ymstars.com
 * Date: 2019/1/4
 * Time: 13:48
 */

namespace Ymstars\Repository\Serializer;

use Carbon\Carbon;
use League\Fractal\Serializer\ArraySerializer;

/**
 * api返回过滤
 * Class FlatArraySerializer
 * @package Xunyi\Serializer
 */
class FlatArraySerializer extends ArraySerializer
{
    /**
     * 筛选item
     * @param string $resourceKey
     * @param array $data
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        foreach ($data as &$item) {
            if ($item instanceof Carbon) {
                $item = $item->format('Y-m-d H:i:s');
            } elseif (is_null($item)) {
                $item = null;
            }
        }
        return $this->formatResource($data, $resourceKey);
    }

    /**
     * 过滤collection
     * @param string $resourceKey
     * @param array $data
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        foreach ($data as &$subData) {
            foreach ($subData as &$item) {
                if ($item instanceof Carbon) {
                    $item = $item->format('Y-m-d H:i:s');
                } elseif (is_null($item)) {
                    $item = null;
                }
            }
        }
        return $this->formatResource($data, $resourceKey);
    }

    public function null()
    {
        return null;
    }

    /**
     * 统一格式化资源返回
     * @param $data
     * @param $resourceKey
     * @return array
     */
    private function formatResource($data, $resourceKey)
    {
        if ($resourceKey === false) {
            return $data;
        } else {
            return [$resourceKey ?: 'data' => $data, 'code' => 0, 'success' => true];
        }
    }
}