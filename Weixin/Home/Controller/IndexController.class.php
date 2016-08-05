<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //微信验证流程
        //1. 将timestamp, nonce, token 按字典序排序
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $token = 'weixin';
        $signature = $_GET['signature'];
        $array = [$timestamp, $nonce, $token];
        sort($array);

        //2. 将排序后的三个字符串拼接后用sha1加密
        $tmpStr = sha1(implode('', $array));

        //3. 将加密后的三个字符串和$signature进行对比，判断该请求是否来自微信
        if($signature == $tmpStr){
            exit($_GET['echostr']);
        }
    }
}