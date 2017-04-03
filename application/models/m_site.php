<?php

class M_site extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insertdata($tabel, $data){
		return $this->db->insert($tabel,$data);
	}

	public function GetParentMenu(){	 
		$query	= "SELECT * FROM menu WHERE parent_id = '0' AND status = '1' order by menu_id asc";
		return $this->db->query($query);		
	}

	public function GetChildMenu($id){
		$query = "SELECT * FROM menu WHERE parent_id = '$id' AND status = '1' order by menu_id asc";	
		return $this->db->query($query);		
	}

	function getArtikel($where= ''){
		return $this->db->query("select * from artikel $where;");
	}

	function getPengumuman($where= ''){
		return $this->db->query("select * from pengumuman $where;");
	}

	function getConfig($where= ''){
		return $this->db->query("select * from config $where;");
	}

	function getSliderHome($where= ''){
		return $this->db->query("SELECT `img_header`,`title`,`slug` from artikel limit 4");
	}

	function selectdata($where = ''){
		return $this->db->query("select * from $where;");
	}

	function getPage($where= ''){
		return $this->db->query("select * from pages $where;");
	}

	function more_news($num,$offset){
		$this->db->order_by('id','ASC');
		$data = $this->db->get('artikel',$num,$offset);
		return $data->result();
	}

	function pagi_artikel(){

		$string_query       	= "select * from artikel order by id"; 
        $query          		= $this->db->query($string_query);    
	}

	function getAllAlbum($per_pg,$offset){
		$this->db->order_by('id','desc');
		$query = $this->db->get('album_foto',$per_pg,$offset);
		return $query->result();
	}

	function Album_Count(){
		return $this->db->count_all('album_foto');
	}

	function getAllGaleri($kode ,$per_pg){
		$this->db->where('id_album = "'.$kode.'" and kategori = 1 and status = 1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('galery',$per_pg);
		return $query->result();
	}

	function Galeri_Count($kode){
		return $this->db->count_all('galery where id_album = "'.$kode.'"');
	}

	function getAllDosen($per_pg,$offset){
		$this->db->order_by('id','desc');
		$query = $this->db->get('data_dosen',$per_pg,$offset);
		return $query->result();
	}

	function Dosen_Count(){
		return $this->db->count_all('data_dosen');
	}

	function getAllStaf($per_pg,$offset){

		$this->db->where('jenis_karyawan = 2');
		$this->db->order_by('id','desc');
		$query = $this->db->get('karyawan',$per_pg,$offset);
		return $query->result();
	}

	function Staf_Count(){
		return $this->db->count_all('karyawan where jenis_karyawan = 2');
	}

	function get_all_artikel($per_pg,$offset){
		$this->db->where('(category = "news" or category = "kampus") and status = 1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('artikel',$per_pg,$offset);
		return $query->result();
	}

	function artikel_count(){
		return $this->db->count_all('artikel');
	}

	function get_all_pengumuman($per_pg,$offset){
		$this->db->where('category = "pengumuman" and status = 1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('artikel',$per_pg,$offset);
		return $query->result();
	}

	function pengumuman_count(){
		return $this->db->count_all('artikel where category = "pengumuman" and status = "1" ');
	}

	function get_all_elearning($per_pg,$offset){
		$this->db->where('category = "elearning"  and status = 1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('artikel',$per_pg,$offset);
		return $query->result();
	}

	function elearning_count(){
		return $this->db->count_all('artikel where category = "elearning"  and status = "1" ');
	}

	function get_posts($count)
	{
		$query = $this->db->get('artikel', $count)->result();
		return $query;
	}
}