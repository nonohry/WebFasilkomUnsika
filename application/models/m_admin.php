<?php

class M_admin extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function user(){
		return $this->db->query("select * from users");
	}

	function insertdata($tabel, $data){
		return $this->db->insert($tabel,$data);
	}
	
	function deldata($tabel,$where){
		return $this->db->delete($tabel,$where);
	}
	
	function updatedata($tabel,$data,$where){
		return $this->db->update($tabel,$data,$where);
	}

	function selectdata($where = ''){
		return $this->db->query("select * from $where;");
	}

	function getSlider($where = ''){
		return $this->db->query("select * from slider $where;");
	}

	function getConfig($where = ''){
		return $this->db->query("select * from config $where;");
	}

	function getMenu($where = ''){
		return $this->db->query("select * from menu $where;");
	}

	function getPage($where= ''){
		return $this->db->query("select * from pages $where;");
	}

	function getArtikel($where= ''){
		return $this->db->query("select * from artikel $where;");
	}

	function getPengumuman($where= ''){
		return $this->db->query("select * from pengumuman $where;");
	}

	function getPendaftaran($where= ''){
		return $this->db->query("select * from pendaftaran $where;");
	}

	function getContact($where= ''){
		return $this->db->query("select * from contact $where;");
	}

	function getGalery($where= ''){
		return $this->db->query("select * from galery $where;");
	}

	function getAlbum($where= ''){
		return $this->db->query("select * from album_foto $where;");
	}

	function getKaryawan($where= ''){
		return $this->db->query("select * from data_dosen $where;");
	}

	function getDownload($where= ''){
		return $this->db->query("select * from download $where;");
	}

	function getLink($where= ''){
		return $this->db->query("select * from link_external $where;")->result_array();
	}

	public function GetParentMenu(){	
		$query	= "SELECT * FROM menu
						WHERE parent_id = '0' AND status = '1'
				";
		return $this->db->query($query);		
	}
	public function GetChildMenu($id){
		$query = "SELECT * FROM menu 
						WHERE parent_id = '$id' AND status = '1'
				";	
		return $this->db->query($query);		
	}
	
}

?>