<?php 
/**
 * Cuser.php
 * ==============================================
 * Copy right 2017 http://www.texmall.com
 * ==============================================
 * @author: zoudong
 * @date: 2017年6月13日
 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuser extends CI_Controller {
    private $table = 'user';
    
	public function _init()
	{
		
	}
	
	/**
	 * @登陆验证获取用户信息
	 * @method post
	 * @param string mobile：手机号
	 * @param string password：用户密码
	 * @return mixed
	 * */
	public function check_login()
	{
	    $where['mobile']   = trim($this->input->post('mobile'));
	    $where['password'] = ZD_md5($this->input->post('password'));
	    $res = $this->Base_model->getWhere($this->table, $where);
	    if ($res->num_rows()>0) {
	        getJson(0, $res->row());
	    }
	    
	    getJson(1003);
	}
	
	
}

/** End of file Cuser.php */
/** Location: ./application/controllers/Cuser.php */