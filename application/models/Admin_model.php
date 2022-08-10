<?php

class Admin_model extends CI_Model
{

	public function __construct()
	{
		$this->db->cache_on();
	}

	public function get_total_rows($table)
	{
		$q = $this->db->from($table)
		->get();
		return $q->num_rows();
	}

	public function get_table_data($table, $limit, $offset)
	{
		$q = $this->db->from($table)
		->order_by('id', 'desc')
		->limit($limit, $offset)
		->get();
		return $q->result();
	}

	public function get_total_msg()
	{
		return $this->get_total_rows('contact_us');
	}

	public function get_paginate_data($table, $where , $limit, $offset)
	{
		$q = $this->db->from($table)
		->where($where)
		->order_by('id', 'desc')
		->limit($limit, $offset)
		->get();
		return $q->result();
	}



	public function set_name_with_code($id, $table)
	{
		$q = $this->db->from($table)
		->where('id', $id)
		->get();
		return $q->row()->name ;
	}

	public function set_code_with_with($name, $table)
	{
		$q = $this->db->from($table)
		->where('name', $name)
		->get();
		return $q->row()->id ;
	}

	public function get_search_user($like, $limit, $offset)
	{
		$q = $this->db->from('users')
		->like('username', $like)
		->limit($limit, $offset)
		->get();
		return $q->result();
	}




	public function get_search_contact($like, $limit, $offset)
	{
		$q = $this->db->from('contact_us')
		->like('email', $like)
		->limit($limit, $offset)
		->get();
		return $q->result();
	}


	public function get_total_contact()
	{
		return $this->get_total_rows('contact_us');
	}

	public function get_contact($limit, $offset)
	{
		return $this->get_table_data('contact_us', $limit, $offset);
	}

	public function getLogin( $username, $password )
	{
		$q = $this->admin->select_single_row( "app_auth_users", ['name'=>$username, 'pwd'=>$password] );
		if ( is_object($q) ) {
			return $q->id;
		}
	}

	public function getEmpLogin( $username, $password )
	{
		$q = $this->admin->select_single_row( "app_emp_users", ['name'=>$username, 'pwd'=>$password] );
		if ( is_object($q) ) {
			return $q->id;
		}
	}

	public function save_data($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function save_data_batch($table, $data)
	{
		return $this->db->insert_batch($table, $data);
	}

	public function save_data_get_id($table, $data)
	{
		$q = $this->db->insert($table, $data);
		$s = $this->db->from($table)
		->order_by('id', 'desc')
		->limit(1, 0)
		->get();
		return $s->row()->id;
	}

	public function select_all( $table )
	{
		$q = $this->db->from($table)
		->order_by('id', 'desc')
		->get();
		return $q->result();
	}

	public function select_distinct( $table, $coulmn)
	{
		$q = $this->db->distinct()
		->select($coulmn)
		->from($table)
		->order_by('id', 'desc')
		->get();
		return $q->result();
	}

	public function select_group_by($table, $group_by, $array)
	{
		$q = $this->db->from($table)
		->where($array)
		->group_by($group_by)
		->get();
		return $q->result();
	}

	public function delete($table, $where)
	{
		return $this->db->where($where)
		->delete($table);
	}

	public function select_with_where($id, $table)
	{
		$q = $this->db->from($table)
		->where('id', $id)
		->get();
		return $q->row();
	}

	public function select_custom_where($table, $array)
	{
		$q = $this->db->from($table)
		->where($array)
		->get();
		return $q->result();
	}

	public function select_custom_where_count($table, $where)
	{
		$q = $this->db->from($table)
		->where($where)
		->get();
		return $q->num_rows();
	}


	public function select_single_row($table, $where)
	{
		$q = $this->db->from($table)
		->where($where)
		->get();
		return $q->row();
	}

	public function select_like_single_row($table, $where, $like)
	{
		$q = $this->db->from($table)
		->where($where)
		->like($like)
		->get();
		return $q->row();
	}

	public function select_custom_like($table, $like_array)
	{
		$q = $this->db->from($table)
		->like($like_array)
		->get();
		return $q->result();
	}


	public function select_random_rows($table, $limit)
	{
		$q = $this->db->from($table)
		->order_by("rand()")
		->limit($limit)
		->get();
		return $q->result();
	}

	public function update_data($where, $table,  $data)
	{
		return 	$this->db->where($where)
		->update($table, $data);
	}

	public function update_with_where($where, $table,  $data)
	{
		return 	$this->db->where($where)
		->update($table, $data);
	}


	public function _atten_search($table, $where_array , $like_array, $limit)
	{
		$q = $this->db->from($table)
		->where($where_array)
		->like($like_array)
		->limit($limit)
		->order_by('time_in')
		->get();
		return $q->result();
	}

	public function atten_search($emp_code, $yyyy_mm)
	{
		$q = $this->db->query("SELECT
							*
						FROM
							`v_emp_atten`
						WHERE
							emp_code = '$emp_code'
						and atn_date like '%$yyyy_mm%'
						GROUP BY
							emp_code, date( atn_date )");
		return $q->result();
	}
	
	public function clear_hr_atn_logs($emp_code, $yyyy_mm)
	{
		return $this->db->query("delete from data where emp_code = '$emp_code'  and atn_date like '%$yyyy_mm%' and hr_action = 'Y' ");
	}
	
	public function roster_delete($emp_code, $yyyy_mm)
	{
		return $this->db->query("delete from emp_roster where emp_code = '$emp_code'  and atn_date like '%$yyyy_mm%'  ");
	}

	public function autocomplete($q)
	{
		$q = $this->db->from("product_chl")
		->like('name', $q)
		->order_by('id', 'random')
		->limit(10, 0)
		->get();
		return $q->result();
	}

	public function home_cat_list($cat_id, $limit, $offset)
	{
		$q = $this->db->from("sub_catagory")
		->where('catagory_id', $cat_id)
		->order_by('id', 'random')
		->limit($limit, $offset)
		->get();
		return $q->result();
	}

	public function home_cat_count($cat_id)
	{
		$q = $this->db->from("public_post")
		->where('sub_catagory_id', $cat_id)
		->get();
		return $q->num_rows();
	}

	public function select_custom_where_in($table, $coulmn , array $in_array, $like_array, $limit )
	{
		$q = $this->db->from($table)
		->where_in($coulmn, $in_array)
		->like($like_array)
		->limit($limit)
		->order_by('time_in')
		->get();
		return $q->result();
	}

	public function search_by_cats_count($sub_cat_ids)
	{
		$q = $this->db->from("public_post")
		->where_in('sub_catagory_id', $sub_cat_ids)
		->get();
		return $q->num_rows();
	}



	public function if_like_exist($post_id, $user_ip)
	{
		$q = $this->db->from('post_like')
		->where(['post_id'=>$post_id, 'user_ip'=>$user_ip])
		->get();
		return $q->row();
	}

	public function count_post_like($post_id )
	{
		$q = $this->db->from('post_like')
		->where(['post_id'=>$post_id, 'name'=>'1'])
		->get();
		return $q->num_rows();
	}

	public function update_post_like($id, $ip, $data)
	{
		return 	$this->db->where( ['post_id'=> $id, 'user_ip'=>$ip] )
		->update('post_like', $data);
	}

	//  favourite

	public function if_fav_exist($post_id, $user_id)
	{
		$q = $this->db->from('product_fav')
		->where(['product_id'=>$post_id, 'user_id'=>$user_id])
		->get();
		return $q->row();
	}

	public function count_post_fav($post_id)
	{
		$q = $this->db->from('post_fav')
		->where(['post_id'=>$post_id, 'name'=>'1'])
		->get();
		return $q->num_rows();
	}

	public function update_post_fav($id, $data)
	{
		return 	$this->db->where( ['id'=> $id] )
		->update('post_fav', $data);
	}

	public function get_between_data($table, $coulmn , $from, $to)
	{
		if (empty($from)) {
			$from=0;
		}
		if (empty($to)) {
			$to=0;
		}
		$q= $this->db->query("SELECT * FROM $table WHERE $coulmn between $from and $to order by $coulmn desc");
		return $q->result();
	}

	public function get_max_value($table, $coulmn)
	{
		$q = $this->db->select_max($coulmn)
		->from($table)
		->get();
		$single = $q->row();
		return $single->$coulmn + 1;
	}
}
