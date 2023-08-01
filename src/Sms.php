<?php
/*
 * @author: 布尔
 * @name: 聚合短信类
 * @desc: 介绍
 * @LastEditTime: 2022-06-21 19:31:03
 * @FilePath: \eyc3_ai\app\Lib\Plugins\Juhe\Sms.php
 */
namespace Eykj\Juhe;

use Eykj\Base\GuzzleHttp;

class Sms
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
    protected $url = 'http://v.juhe.cn';

    /**
     * @author: 布尔
     * @name: 发送短信
     * @param array $param
     * @return array
     */
    public function send(array $param) : array
    {
        $url = $this->url . '/sms/send?';
        $data = eyc_array_key($param, 'mobile,tpl_id,vars');
        $data['key'] = env('JUHE_KEY', '');
        $url .= http_build_query($data);
        return $this->GuzzleHttp->get($url);
    }
}