<?php
class Core_Model extends CI_Model
{

	public function get($table, $order=null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if($order != null){
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function get_join_1tb($table, $join, $order=null){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join['join'], $join['referensi']);
		if($order != null){
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function get_join_2tb($table, $join, $order=null){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join['join1'], $join['referensi1']);
		$this->db->join($join['join2'], $join['referensi2']);
		if($order != null){
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->result();
	}

	public function create($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function select_join_2tb($table, $where, $join, $order=null){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id_pengajuan', $where);
		$this->db->join($join['join1'], $join['referensi1']);
		$this->db->join($join['join2'], $join['referensi2']);
		if($order != null){
			$this->db->order_by($order['select_by'], $order['order_by']);
		}
		return $this->db->get()->row();
	}

	public function select($table, $where)
	{
		return $this->db->get_where($table, $where)->row();
	}

	public function update($table, $where, $data)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete($table, $where)
	{
		$this->db->where($where['param'], $where['id']);
		return $this->db->delete($table);
	}
}