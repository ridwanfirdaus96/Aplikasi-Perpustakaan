<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmodel extends CI_Model {

	function dologin(){
		$u   = $this->input->post('username');
		$p   = $this->input->post('password');
		$cek = $this->db->where('username',$u)->where('password',$p)->get('tbl_user');
		if ($cek->num_rows()>0) {
			foreach ($cek->result() as $key) {
				$id = $key->id;
				$level = $key->level;
			}
			$user_data = array(
				'id'	   => $id,
				'username' => $u,
				'password' => $p,
				'level'	   => $level,
				 );
			$this->session->set_userdata( $user_data );
			return true;
		}else{
			return false;
		}
	}

	function get_table($table){
		return $this->db->get($table);
	}
	function get_where($table,array $where)
	{
		return $this->db->where($where)->get($table);
	}

    function get_all_paginate($table,$order_by,$num, $offset) {
        $this->db->order_by($order_by, "ASC");
        $query = $this->db->get($table, $num, $offset);
        return $query->result();
    }
    function get_all_paginate_book($table,$order_by,$num, $offset) {
        $this->db->order_by($order_by, "ASC")->where('jumlah >',0);
        $query = $this->db->get($table, $num, $offset);
        return $query->result();
    }

    function drop($table,$where,$wherenya){
		return $this->db->where($where,$wherenya)->delete($table);
    }

    function insert($table,array $data){
    	return $this->db->insert($table,$data);
    }
    function update($table,$where,$wherenya,array $data){
    	return $this->db->where($where,$wherenya)->update($table,$data);
    }
	function get_autocomplete($table,$like,$search_data)
	{
		$this->db->where($like, $search_data);
		return $this->db->get($table, 10)->result();
	}
	function get_autocomplete_book($table,$like,$search_data)
	{
		$this->db->where($like, $search_data)->where('jumlah >',0);
		return $this->db->get($table, 10)->result();
	}
	function get_where_buku($id,$buku)
	{
		return $this->db->where('id_anggota',$id)->where('id_buku',$buku)->where('status','belum')->get('tbl_peminjaman');
	}
	function get_where_peminjaman($id){
		return $this->db->where('id_anggota',$id)->where('status','belum')->get('tbl_peminjaman');
	}
}

/* End of file Mainmodel.php */
/* Location: ./application/models/Mainmodel.php */