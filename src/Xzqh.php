<?php
/*
 * @author: 布尔
 * @name: 全国行政区查询
 * @desc: 介绍
 * @LastEditTime: 2022-11-17 17:44:21
 * @FilePath: \eyc3_data\app\Lib\Plugins\Juhe\Xzqh.php
 */
namespace Eykj\Juhe;

use Eykj\Base\GuzzleHttp;

class Xzqh
{
    protected ?GuzzleHttp $GuzzleHttp;
    
    // 通过设置参数为 nullable，表明该参数为一个可选参数
    public function __construct(?GuzzleHttp $GuzzleHttp)
    {
        $this->GuzzleHttp = $GuzzleHttp;
    }
    /**
     * 请求地址
     */
    protected $url = 'http://apis.juhe.cn';
    /**
     * @author: 布尔
     * @name: 全国行政区划查询
     * @param array $param
     * @return array
     */
    public function query(array $param) : array
    {
        $url = $this->url . '/xzqh/query?';
        $data = eyc_array_key($param, 'key,fid');
        $url .= http_build_query($data);
        $r = $this->GuzzleHttp->get($url);
        if ($r['error_code'] != 0) {
            alog($r);
            return $r;
        }
        return $r['result'];
    }
}