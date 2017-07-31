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
	    $where['mobile'] = trim($this->input->post('mobile'));
	    $where['password'] = ZD_md5($this->input->post('password'));
	    $res = $this->Base_model->getWhere('user', $where);
	    if ($res->num_rows()>0) {
	        getJson(0, $res->row());
	    }
	    
	    getJson(1003);
	}
	
	/**
	 * @验证码
	 * */
	public function get_captcha()
	{
	    $this->load->helper('captcha');
	    $word = randomStr(4, 3);
	    $config = array(
	        'word'       => $word,
	        'img_path'   => $this->config->upload_image_path('captcha', TRUE),
	        'img_url'    => $this->config->image_url.'captcha/',
	        'font_path'  => 'assets/plugins/YHBold.ttf',
	        'img_width'  => 80,
	        'img_height' => 30,
	        'expiration' => '1200',
	    );
	    $captcha = create_captcha($config);
	    $this->input->set_cookie('captcha', $captcha['word'], 600);
	    echo json_encode($captcha);
	}
	
	
	
	
	
}

/** End of file Cuser.php */
/** Location: ./application/controllers/Cuser.php */