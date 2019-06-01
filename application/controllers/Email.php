<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function send()
	{
		$config['mailtype']  = 'text';
		$config['protocol']  = 'smtp';
		$config['smtp_host'] = 'smtp.mailtrap.io';
		$config['smtp_user'] = 'a379aebfd8ae9b';
		$config['smtp_pass'] = '4f483c6328c391';
		$config['smtp_port'] = 587;
		$config['newline']   = "\r\n";

		$this->load->library('email', $config);

		$this->email->from('no-reply@bahasaweb.com', 'Sistem Bahasaweb.com');
		$this->email->to('admin@bahasaweb.com');
		$this->email->subject('Contoh Kirim Email Dengan Codeigniter');
		$this->email->message('Contoh pesan yang dikirim dengan codeigniter');
		$this->email->attach('./asset/ContohAttachment.docx');

		if($this->email->send()) {
			echo 'Email berhasil dikirim';
		}
		else {
			echo 'Email tidak berhasil dikirim';
			echo '<br />';
			echo $this->email->print_debugger();
		}

	}

}