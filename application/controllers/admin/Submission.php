<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission extends CI_Controller {

	public function contract()
	{
		$data = [
			'title' => 'Submission Contract',
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar');
		$this->load->view('admin/submission/contract/index', $data);
		$this->load->view('layout/footer');
	}
}
