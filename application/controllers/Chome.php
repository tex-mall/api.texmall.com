<?php 
/**
 * Chome.php
 * ==============================================
 * Copy right 2017 http://www.texmall.com
 * ==============================================
 * @author: zoudong
 * @date: 2017年6月13日
 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chome extends TM_Controller {
    
    function _init()
	{
		header("Content-type: text/html; Charset=utf-8");
	}
	
	
	/**
	 * @获取产品数量
	 * */
	private function _get_user_num()
	{
	    $ret['goods_num'] = $this->Base_model->getTableNum('goods');
	    return $ret;
	}
	
	
	
}

/** End of file Chome.php */
/** Location: ./application/controllers/Chome.php */
