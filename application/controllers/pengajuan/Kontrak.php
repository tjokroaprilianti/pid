<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Core_Model', 'core');
	}

	public function index()
	{
		cek_belum_login();
		$join = [
			'join1' => 'tb_cost_unit', 'referensi1' => 'tb_cost_unit.id_cost_unit = tb_pengajuan.cost_unit_id',
			'join2' => 'tb_cost_center', 'referensi2' => 'tb_cost_center.id_cost_center = tb_pengajuan.cost_center_id',
		];
		$data = [
			'title' => 'Pengajuan Kontrak',
			'pengajuan' => $this->core->get_join_2tb('tb_pengajuan', $join, ['select_by' => 'id_pengajuan', 'order_by' => 'DESC']),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar');
		$this->load->view('pengajuan/kontrak/index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		cek_belum_login();
		$this->form_validation->set_rules('cost_center_id', 'Cost Center', 'trim|required');
		$this->form_validation->set_rules('cost_unit_id', 'Cost Unit', 'trim|required');
		$this->form_validation->set_rules('tanggal_invoice_pengajuan', 'Tanggal Invoice Pengajuan', 'trim|required');
		$this->form_validation->set_rules('vendor_pengajuan', 'Vendor Pengajuan', 'trim|required');
		$this->form_validation->set_rules('proyek_pengajuan', 'Proyek Pengajuan', 'trim|required');
		$this->form_validation->set_rules('alamat_vendor_pengajuan', 'Alamat Vendor Pengajuan', 'trim|required');
		$this->form_validation->set_rules('vet_pajak_pengajuan', 'VET Pajak Pengajuan', 'trim|required');
		$this->form_validation->set_rules('dpp_pajak_pengajuan', 'DPP Pajak Pengajuan', 'trim|required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong!.');
		if ($this->form_validation->run() == false) {
			$data = [
				'title' => 'Tambah Kontrak',
				'cost_unit' => $this->core->get('tb_cost_unit'),
				'cost_center' => $this->core->get('tb_cost_center'),
			];
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/topbar');
			$this->load->view('pengajuan/kontrak/tambah', $data);
			$this->load->view('layout/footer');
		} else {
			$user = $this->core->select('tb_user', ['username_user' => $this->session->userdata('username')]);
			// $random = '1234567890abcdefghijklmopqrstuvwxyz';
			$kode_pengajuan = md5($this->input->post('proyek_pengajuan'));
			$data_pengajuan = [
				'user_id' => $user->id_user,
				'kode_pengajuan' => $kode_pengajuan,
				'cost_center_id' => $this->input->post('cost_center_id'),
				'cost_unit_id' => $this->input->post('cost_unit_id'),
				'tanggal_invoice_pengajuan' => $this->input->post('tanggal_invoice_pengajuan'),
				'proyek_pengajuan' => $this->input->post('proyek_pengajuan'),
				'vendor_pengajuan' => $this->input->post('vendor_pengajuan'),
				'alamat_vendor_pengajuan' => $this->input->post('alamat_vendor_pengajuan'),
				'vet_pajak_pengajuan' => $this->input->post('vet_pajak_pengajuan'),
				'dpp_pajak_pengajuan' => $this->input->post('dpp_pajak_pengajuan'),
			];
			$this->core->create('tb_pengajuan', $data_pengajuan);
			$data_histori = [
				'kode_pengajuan' => $data_pengajuan['kode_pengajuan'],
				'status_histori' => 'MENUNGGU',
				'penerima' => 'Manager',
			];
			$this->core->create('tb_histori', $data_histori);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
					<div class="container text-center">
						<span class="badge badge-success">Berhasil</span> Pengajuan kontrak berhasil dibuat.
					</div>
				</div>
				');
			redirect('pengajuan/kontrak');
		}
	}
	
	public function histori($kode)
	{
		$all_histori = $this->core->get_all_histori(['kode_pengajuan' => $kode], ['select_by' => 'id_histori', 'order_by' => 'DESC']);
		$select_histori = $this->core->select_histori(['kode_pengajuan' => $kode], ['select_by' => 'id_histori', 'order_by' => 'DESC']);
		$data = [
			'title' => 'Histori Kontrak',
			'histori' => $all_histori,
			'select_histori' => $select_histori,
			'pengajuan' => $this->core->select_pengajuan(['kode_pengajuan' => $kode]),
			'user' => $this->core->select_user(['role' => $select_histori->penerima]),
		];
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/topbar');
		$this->load->view('pengajuan/kontrak/histori', $data);
		$this->load->view('layout/footer');
	}

	public function menyetujui($kode_pengajuan)
	{
		$input_status_histori = $this->input->post('status_histori', true);
		$select_history_by_code = $this->core->select_histori(['kode_pengajuan' => $kode_pengajuan], ['select_by' => 'id_histori', 'order_by' => 'DESC']);
		$data_histori = [
			'kode_pengajuan' => $kode_pengajuan,
			'status_histori' => $input_status_histori,
		];
		if($select_history_by_code->penerima == 'Manager'){
			$data_histori['penerima'] = 'Accounting';
		}elseif($select_history_by_code->penerima == 'Accounting'){
			$data_histori['penerima'] = 'Pajak';
		}else{
			$data_histori['penerima'] = 'Pembayaran';
		}
		$this->core->create('tb_histori', $data_histori);
		$message = '
		<div class="alert alert-success" role="alert">
			<div class="container text-center">
				<span class="badge badge-success">Berhasil</span> Pengajuan kontrak diterima, dengan kode : '.$kode_pengajuan.'
			</div>
		</div>
		';
        $this->session->set_flashdata('message', $message);
        redirect('pengajuan/histori/'. $kode_pengajuan);
	}
}
