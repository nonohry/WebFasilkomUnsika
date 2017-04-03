<?php

class M_panel extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function login($where = ''){
		return $this->db->query("select * from users $where;");
	}
}

?>