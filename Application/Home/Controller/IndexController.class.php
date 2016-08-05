<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $time = 111111111;
        $year = date('Y') - date('Y', $time);

        $this->assign('year', $year);

        $this->display();
    }
}