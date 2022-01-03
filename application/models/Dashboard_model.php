<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class Dashboard_model extends CI_Model {

// 	public function query_menu()
// 	{
//         $role_id = $this->session->userdata('role_id');
// 		$query_menu = "SELECT `user_menu`. `id`, `menu`
//                         FROM `user_menu` JOIN `user_access_menu`
//                         ON `user_menu` . `id` = `user_access_menu` . `menu_id`
//                         WHERE `user_access_menu` . `role_id` = $role_id
//                         ORDER BY `user_access_menu` . `menu_id` ASC
//         ";
		
//         return $menu = $this->db->query('query_menu')->result_array();
// 	}
// }
