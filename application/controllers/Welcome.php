<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
				        $this->load->library('email');
						$config = array(
							'protocol'  => 'smtp',
							'smtp_host' => 'smtp.googlemail.com',
							'smtp_port' => 587,
							'smtp_user' => 'sachinvish07@gmail.com',
					        'smtp_pass' => '9009796860',
							'smtp_crypto' => 'tls',
							'mailtype'  => 'html',
							'charset'   => 'utf-8',
						);
						$this->email->initialize($config);
						$this->email->set_mailtype("html");
						$this->email->set_newline("\r\n");
						$this->email->to('sachinvish07@gmail.com');
						$this->email->from('sachinvish07@gmail.com','Bild It');
						$this->email->subject('sdfdf');
						$this->email->message('sdsds');
						$this->email->send();	            // echo "<pre>";
	}
}
