<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		$this->load->library('gravatar');
		$this->load->model('m_admin');

		if($this->session->userdata('login') != TRUE)
		{
			redirect('panel');
		}

	}
	
	function index(){


		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');

		// Jumlah Artikel
		$art 	 		= $this->m_admin->getArtikel();
		$artikel 		= $art->num_rows();

		// Jumlah Halaman
		$hal 	 		= $this->m_admin->getPage();
		$halaman 		= $hal->num_rows();

		//Jumlah Galeri
		$gale 	 		= $this->m_admin->getGalery();
		$galeri 		= $gale->num_rows();

		//Jumlah Pesan Masuk
		$cont 	 		= $this->m_admin->getContact();
		$kontak 		= $cont->num_rows();

		
		$data = array(
			'title'			=> 'Welcome Administrator',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'jml_artikel'	=> $artikel,
			'jml_halaman'	=> $halaman,
			'jml_galeri'	=> $galeri,
			'jml_pesan'		=> $kontak,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/home');
		$this->load->view('panel/footer');
	}

	function slider(){


		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$slider 		= $this->m_admin->selectdata('slider order by id')->result_array();
		$this->load->helper('text');
		

		$data = array(
			'title'		=> 'Setting Image Slider',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'slider'	=> $slider,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/slider');
		$this->load->view('panel/footer');
	}

	function slideradd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');


		$data = array(
			'title'		=> 'Add Slider Images',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'status'	=> 'baru',
			'kode'		=> '',
			'judul'		=> '',
			'image'		=> '',
			'deskripsi'	=> '',
			'link'		=> '',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/slider_form');
		$this->load->view('panel/footer');
	}

	
	function slideredit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getSlider("where id= '$kode' ")->result_array();


		$data = array(
			'title'		=> 'Edit Slider Images',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'status'	=> 'edit',
			'kode'		=> $data_konten[0]['id'],
			'judul'		=> $data_konten[0]['title'],
			'deskripsi'	=> $data_konten[0]['desc'],
			'link'		=> $data_konten[0]['link'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/slider_form');
		$this->load->view('panel/footer');
	}

	function sliderdelete($kode = 0){
		$this->db->where('id',$kode);
		$query 	= $this->db->get('slider');
		$row	= $query->row();
		
		unlink("./file/slider/$row->background_img");
		$hasil	= $this->m_admin->deldata('slider',array('id' => $kode));
		redirect('panel/slider');
	}

	function slidersave(){
		if($_POST){

			$kode		= $this->input->post('kode');
			$judul		= $this->input->post('judul');
			$image		= $this->input->post('foto');
			$deskripsi	= $this->input->post('deskripsi');
			$status 	= $this->input->post('status');
			
			if($status == 'baru'){

				if($_FILES['foto']['name'] != ""){
				    $config['upload_path'] = 'file/slider';
				    $config['allowed_types'] = 'jpg|png|jpeg';
				    $config['max_size'] = '2000';
				    $config['remove_spaces'] = true;
				    $config['overwrite'] = false;
				    $config['encrypt_name'] = true;
				    $config['max_width']  = '';
				    $config['max_height']  = '';
				    $this->load->library('upload', $config);
				    $this->upload->initialize($config);            
				    if (!$this->upload->do_upload('foto'))
				    {
				        $error = array('error' => $this->upload->display_errors());
				        print_r($error);
				        exit();
				    }
				    else
				    {
			        $image = $this->upload->data();
			        if ($image['file_name'])
			        {
			            $data['file1'] = $image['file_name'];
			        }        
			       		 $img 	= $data['file1'];
			    	}
				}
				
				$data = array(
					'title' 				=> $judul,
					'background_img'		=> $img,
					'desc'					=> $deskripsi,
				);
				
				$this->m_admin->insertdata('slider',$data);
				redirect('panel/slider');
				
			}
			else {

				$this->db->where('id',$kode);
				$query 	= $this->db->get('slider');
				$row	= $query->row();
				
				unlink("./file/slider/$row->background_img");

				if($_FILES['foto']['name'] != ""){
				    $config['upload_path'] = 'file/slider';
				    $config['allowed_types'] = 'jpg|png|jpeg';
				    $config['max_size'] = '2000';
				    $config['remove_spaces'] = true;
				    $config['overwrite'] = false;
				    $config['encrypt_name'] = true;
				    $config['max_width']  = '';
				    $config['max_height']  = '';
				    $this->load->library('upload', $config);
				    $this->upload->initialize($config);            
				    if (!$this->upload->do_upload('foto'))
				    {
				        $error = array('error' => $this->upload->display_errors());
				        print_r($error);
				        exit();
				    }
				    else
				    {
			        $image = $this->upload->data();
			        if ($image['file_name'])
			        {
			            $data['file1'] = $image['file_name'];
			        }        
			       		 $img 	= $data['file1'];
			    	}
				}
				

				$data = array(
					'title' 				=> $judul,
					'background_img'		=> $img,
					'desc'					=> $deskripsi,
				);
				$this->m_admin->updatedata('slider',$data,array('id' => $kode));
				redirect('panel/slider');
			}
			
		}
		else {
			echo "Page Not Found";
		}
	}

	function config(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$config 		= $this->m_admin->selectdata('config order by id_config')->result_array();
		$this->load->helper('text');
		

		$data = array(
			'title'		=> 'Setting Website',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'config'	=> $config,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/config');
		$this->load->view('panel/footer');
	}

	function configedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getConfig("where id_config= '$kode' ")->result_array();


		$data = array(
			'title'		=> 'Edit Setting Website',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'kode'		=> $data_konten[0]['id_config'],
			'judul'		=> $data_konten[0]['title'],
			'konten'	=> $data_konten[0]['content'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/config_form');
		$this->load->view('panel/footer');
	}

	function configsave(){
		if($_POST){

			$kode		= $this->input->post('kode');
			$judul		= $this->input->post('judul');
			$konten		= $this->input->post('konten');

				
				$data = array(
					'title' 		=> $judul,
					'content'		=> $konten,
				);
				
				$this->m_admin->updatedata('config',$data,array('id_config' => $kode));
				redirect('panel/setting');
			
		}
		else {
			echo "Page Not Found";
		}
	}

	function user(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$user 			= $this->m_admin->selectdata('users order by id')->result_array();
		$this->load->helper('text');
		

		$data = array(
			'title'		=> 'Setting  Administrator Account ',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'kode'		=> $user[0]['id'],
			'fullname'	=> $user[0]['fullname'],
			'username'	=> $user[0]['username'],
			'password'	=> $this->encrypt->sha1($user[0]['password']),
			'email'		=> $user[0]['email'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/profil');
		$this->load->view('panel/footer');
	}

	function saveuser(){

		if($_POST){

			$kode					= $this->input->post('kode');
			$nama_lengkap			= $this->input->post('nama_lengkap');
			$username				= $this->input->post('username');
			$password				= $this->encrypt->sha1($this->input->post('password'));
			$email					= $this->input->post('email');

			
				$data = array(
					'fullname'	=> $nama_lengkap,
					'username'	=> $username,
					'password'	=> $password,
					'email'		=> $email,
				);
				
				$this->m_admin->updatedata('users',$data,array('id' => $kode));
				redirect('panel/user');
		}
		else {
			echo "Page Not Found";
		}

	}

	function menu(){


		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$menu 			= $this->m_admin->selectdata('menu order by menu_id desc')->result_array();
		$this->load->helper('text');

		
		$data = array(
			'title'		=> 'Setting Menu Website ',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'menu'		=> $menu,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/menu');
		$this->load->view('panel/footer');
	}

	function menuadd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$menu 			= $this->m_admin->selectdata('menu order by menu_id')->result_array();
		$this->load->helper('text');
		$this->load->helper('url');


		$data = array(
			'title'			=> 'Add Menu Website',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> '',
			'menu_name'		=> '',
			'menu_url'		=> '',
			'parent_id'		=> '',
			'content_id'	=> '',
			'view_type'		=> '',
			'status'		=> '',
			'stat'			=> 'new',
			'menu'			=> $this->m_admin->GetParentMenu(''),
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/menu_form');
		$this->load->view('panel/footer');
	}

	function menuedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getMenu("where menu_id= '$kode' ")->result_array();


		$data = array(
			'title'			=> 'Edit Menu Website',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> $data_konten[0]['menu_id'],
			'menu_name'		=> $data_konten[0]['menu_name'],
			'content_id'	=> $data_konten[0]['content_id'],
			'stat'			=> 'edit',
			'menu'			=> $this->m_admin->GetParentMenu(''),
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/menu_form');
		$this->load->view('panel/footer');

	}

	function menusave(){

		if($_POST){

			$this->load->helper('url');

			$kode			= $this->input->post('kode');
			$stat 			= $this->input->post('stat');
			$menu_name 		= $this->input->post('menu_name');
			$parent_id 		= $this->input->post('parent_id');
			$view_type 		= $this->input->post('view_type');
			$content_id		= $this->input->post('content_id');
			$status			= $this->input->post('status');
			$slug 			= url_title($menu_name, 'dash', TRUE);

			
			if($stat == 'new'){

				$data = array(
					'menu_name' 		=> $menu_name,
					'menu_url'			=> $slug,
					'parent_id'			=> $parent_id,
					'content_id'		=> $content_id,
					'view_type'			=> $view_type,
					'status'			=> $status,
				);
				
				$this->m_admin->insertdata('menu',$data);
				redirect('panel/menu');

			}
			else {

				$data = array(
					'menu_name' 		=> $menu_name,
					'menu_url'			=> $slug,
					'parent_id'			=> $parent_id,
					'content_id'		=> $content_id,
					'view_type'			=> $view_type,
					'status'			=> $status,
				);
				
				$this->m_admin->updatedata('menu',$data,array('menu_id' => $kode));
				redirect('panel/menu');
			}

		}
		else {
			echo "Page Not Found";
		}

	}

	function menudelete($kode = 0){

		$hasil	= $this->m_admin->deldata('menu',array('menu_id' => $kode));
		redirect('panel/menu');
	}

	function page(){


		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$pages 			= $this->m_admin->selectdata('pages order by id desc')->result_array();
		$this->load->helper('text');

		
		$data = array(
			'title'		=> 'Pages Website ',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'pages'		=> $pages,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/page');
		$this->load->view('panel/footer');

	}

	function pagesadd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$pages 			= $this->m_admin->selectdata('pages order by id')->result_array();
		$this->load->helper('text');
		$this->load->helper('url');


		$data = array(
			'title'			=> 'Add Pages Website',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> '',
			'judul'			=> '',
			'slug'			=> '',
			'content'		=> '',
			'status'		=> '',
			'stat'			=> 'new',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/pages_form');
		$this->load->view('panel/footer');
	}

	function pagesedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getPage("where id= '$kode' ")->result_array();


		$data = array(
			'title'			=> 'Edit Pages Website',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'slug'			=> $data_konten[0]['slug'],
			'content'		=> $data_konten[0]['content'],
			'status'		=> $data_konten[0]['status'],
			'stat'			=> 'edit',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/pages_form');
		$this->load->view('panel/footer');

	}

	function pagessave(){

		if($_POST){

			$this->load->helper('url');

			$kode			= $this->input->post('kode');
			$judul			= $this->input->post('judul');
			$slug 			= url_title($judul, 'dash', TRUE);
			$content		= $this->input->post('content');
			$status			= $this->input->post('status');
			$stat 			= $this->input->post('stat');

			
			if($stat == 'new'){

				$data = array(
					'title' 			=> $judul,
					'slug'				=> $slug,
					'content'			=> $content,
					'status'			=> $status,
				);
				
				$this->m_admin->insertdata('pages',$data);
				redirect('panel/pages');

			}
			else {

				$data = array(
					'title' 			=> $judul,
					'slug'				=> $slug,
					'content'			=> $content,
					'status'			=> $status,
				);
				
				$this->m_admin->updatedata('pages',$data,array('id' => $kode));
				redirect('panel/pages');
			}

		}
		else {
			echo "Page Not Found";
		}

	}

	function pagesdelete($kode = 0){

		$hasil	= $this->m_admin->deldata('pages',array('id' => $kode));
		redirect('panel/pages');
	}

	function viewpage($kode,$slug = ''){
		$data_konten	= $this->m_admin->getPage("where id= '$kode'")->result_array();

		$data = array(
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'slug'			=> $data_konten[0]['slug'],
			'content'		=> $data_konten[0]['content'],
		);

		$this->load->view('site/njajal.php',$data);
	}

	function artikel(){


		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$artikel 		= $this->m_admin->selectdata('artikel order by id desc')->result_array();
		$this->load->helper('text');

		
		$data = array(
			'title'		=> 'Artikel Artikel Website ',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'artikel'	=> $artikel,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/artikel');
		$this->load->view('panel/footer');

	}

	function artikeladd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$pages 			= $this->m_admin->selectdata('artikel order by id')->result_array();
		$this->load->helper('text');
		$this->load->helper('url');


		$data = array(
			'title'			=> 'Add Content Website',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> '',
			'judul'			=> '',
			'slug'			=> '',
			'author'		=> '',
			'image'			=> '',
			'content'		=> '',
			'kategori'		=> '',
			'status'		=> '',
			'stat'			=> 'new',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/artikel_form');
		$this->load->view('panel/footer');
	}

	function artikeledit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getArtikel("where id= '$kode' ")->result_array();


		$data = array(
			'title'			=> 'Edit Content Website',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'image'			=> $data_konten[0]['img_header'],
			'content'		=> $data_konten[0]['content'],
			'kategori'		=> $data_konten[0]['category'],
			'status'		=> $data_konten[0]['status'],
			'stat'			=> 'edit',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/artikel_form');
		$this->load->view('panel/footer');

	}

	

	function artikelsave(){

		if($_POST){

			date_default_timezone_set('Asia/Jakarta'); 

			$this->load->helper('url');

			$kode			= $this->input->post('kode');
			$judul			= $this->input->post('judul');
			$slug 			= url_title($judul, 'dash', TRUE);
			$date 			= date('Y-m-d H:i:s');
			$time 			= date('H:i:s');

			$user_data 		= $this->m_admin->user()->result_array();
			$fullname 		= $user_data[0]['fullname'];

			$author 		= $fullname;
			$content		= $this->input->post('content');
			$kategori		= $this->input->post('kategori');
			$status			= $this->input->post('status');
			$stat 			= $this->input->post('stat');

			
			if($stat == 'new'){

				if($_FILES['foto']['name'] != ""){
			    $config['upload_path'] = 'file/blog';
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('foto'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $img_header = $data['file1'];
		    	}
			}

				$data = array(
					'title'			=> $judul,
					'slug'			=> $slug,
					'date'			=> $date,
					'time'			=> $time,
					'img_header'	=> $img_header,
					'author'		=> $author,
					'content'		=> $content,
					'category'		=> $kategori,
					'status'		=> $status,
				);
				
				$this->m_admin->insertdata('artikel',$data);
				redirect('panel/artikel');

			}
			else {

				$this->db->where('id',$kode);
				$query 	= $this->db->get('artikel');
				$row	= $query->row();
				
				unlink("./file/blog/$row->img_header");

				if($_FILES['foto']['name'] != ""){
			    $config['upload_path'] = 'file/blog';
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('foto'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $img_header = $data['file1'];
		    	}
		    }

				$data = array(
					'title'			=> $judul,
					'slug'			=> $slug,
					'date'			=> $date,
					'time'			=> $time,
					'img_header'	=> $img_header,
					'author'		=> $author,
					'content'		=> $content,
					'category'		=> $kategori,
					'status'		=> $status,
				);
				
				$this->m_admin->updatedata('artikel',$data,array('id' => $kode));
				redirect('panel/artikel');
			}

		}
		else {
			echo "Page Not Found";
		}

	}

	function artikeldelete($kode = 0){

		$this->db->where('id',$kode);
		$query 	= $this->db->get('artikel');
		$row	= $query->row();
		
		unlink("./file/blog/$row->img_header");

		$hasil	= $this->m_admin->deldata('artikel',array('id' => $kode));
		redirect('panel/artikel');
	}

	function viewartikel($kode,$slug = ''){
		$data_konten	= $this->m_admin->getArtikel("where id= '$kode'")->result_array();

		$data = array(
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'date'			=> $data_konten[0]['date'],
			'author'		=> $data_konten[0]['author'],
			'images'		=> $data_konten[0]['img_header'],
			'content'		=> $data_konten[0]['content'],
			'kategori'		=> $data_konten[0]['category'],
		);

		$this->load->view('site/blog',$data);
	}

	function pengumuman(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$pengumuman		= $this->m_admin->selectdata('pengumuman order by id')->result_array();
		$this->load->helper('text');

		
		$data = array(
			'title'			=> 'Pengumuman Pengumuman',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'pengumuman'	=> $pengumuman,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/pengumuman');
		$this->load->view('panel/footer');
	}

	function pengumumanadd()
	{
		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$pages 			= $this->m_admin->selectdata('artikel order by id')->result_array();
		$this->load->helper('text');
		$this->load->helper('url');


		$data = array(
			'title'			=> 'Tambah Pengumuman Website',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> '',
			'judul'			=> '',
			'slug'			=> '',
			'author'		=> '',
			'image'			=> '',
			'content'		=> '',
			'status'		=> '',
			'stat'			=> 'new',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/pengumuman_form');
		$this->load->view('panel/footer');
	}

	function pengumumansave()
	{
		if($_POST){

			date_default_timezone_set('Asia/Jakarta'); 

			$this->load->helper('url');

			$kode			= $this->input->post('kode');
			$judul			= $this->input->post('judul');
			$slug 			= url_title($judul, 'dash', TRUE);
			$date 			= date('Y-m-d H:i:s');

			$user_data 		= $this->m_admin->user()->result_array();
			$fullname 		= $user_data[0]['fullname'];

			$author 		= $fullname;
			$content		= $this->input->post('content');
			$status			= $this->input->post('status');
			$stat 			= $this->input->post('stat');

			
			if($stat == 'new'){

				$data = array(
					'title'			=> $judul,
					'slug'			=> $slug,
					'date'			=> $date,
					'author'		=> $author,
					'content'		=> $content,
					'status'		=> $status,
				);
				
				$this->m_admin->insertdata('pengumuman',$data);
				redirect('panel/pengumuman');

			}
			else {

				$data = array(
					'title'			=> $judul,
					'slug'			=> $slug,
					'date'			=> $date,
					'author'		=> $author,
					'content'		=> $content,
					'status'		=> $status,
				);
				
				$this->m_admin->updatedata('pengumuman',$data,array('id' => $kode));
				redirect('panel/pengumuman');
			}

		}
		else {
			echo "Page Not Found";
		}
	}

	function pengumumanedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getPengumuman("where id= '$kode' ")->result_array();


		$data = array(
			'title'			=> 'Edit Pengumuman',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'content'		=> $data_konten[0]['content'],
			'stat'			=> 'edit',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/pengumuman_form');
		$this->load->view('panel/footer');
	}

	function pengumumandel($kode = 0){
		$hasil	= $this->m_admin->deldata('pengumuman',array('id' => $kode));
		redirect('panel/pengumuman');
	}

	function contact(){
		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$kontak 		= $this->m_admin->selectdata('contact order by id')->result_array();
		$this->load->helper('text');
		

		$data = array(
			'title'		=> 'Contact Us',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'kontak'	=> $kontak,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/contact');
		$this->load->view('panel/footer');
	}

	function contactdelete($kode = 0){

		$hasil	= $this->m_admin->deldata('contact',array('id' => $kode));
		redirect('panel/contact');
	}

	function contactview($kode = 0){
		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getContact("where id= '$kode' ")->result_array();


		$data = array(
			'title'			=> 'Contact Us',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'kode'			=> $data_konten[0]['id'],
			'fullname'		=> $data_konten[0]['fullname'],
			'email'			=> $data_konten[0]['email'],
			'website'		=> $data_konten[0]['website'],
			'message'		=> $data_konten[0]['message'],
			'time'			=> $data_konten[0]['date'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/contact_view');
		$this->load->view('panel/footer');
	}

	function repMessage(){

		$config['protocol'] = 'smtp';		
		$config['smtp_host'] = 'smtp.gmail.com';	
		$config['smtp_port'] = 465;		
		$config['smtp_user'] = 'akun.tester232@gmail.com';		
		$config['smtp_pass'] = 'akuntester232';			
		$this->load->library('email', $config);		
		$this->email->set_newline("\r\n");				
		$user_data 		= $this->m_admin->user()->result_array();		
		$email 			= $user_data[0]['email'];		
		$adminmail		= $email;		
		$vstremail 		= $this->input->post('email');	
		$subjek 		= $this->input->post('subjek');		
		$messagerep		= $this->input->post('messagerep');				
		$this->email->from($adminmail, 'Sistem Email Online');		
		$this->email->to($vstremail);				
		$this->email->subject($subjek);				
		$this->email->message($messagerep);						

		if($this->email->send())
			{			
				redirect('panel/contact');		
			}				
			else		
				{			
					show_error($this->email->print_debugger());		
				}

	}

	function karyawan(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$karyawan 		= $this->m_admin->selectdata('data_dosen order by id desc')->result_array();
		$this->load->helper('text');

		
		$data = array(
			'title'		=> 'Data Dosen',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'karyawan'	=> $karyawan,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/karyawan');
		$this->load->view('panel/footer');
	}

	function karyawanadd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');


		$data = array(
			'title'					=> 'Add Data Dosen',
			'user'					=> $user_data[0]['fullname'],
			'avatar'				=> $this->gravatar->get_gravatar($email),
			'status'				=> 'baru',
			'kode'					=> '',
			'nama_dosen'			=> '',
			'nidn'				=> '',

		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/karyawan_form');
		$this->load->view('panel/footer');
	}

	function karyawansave(){
		if($_POST){

			$kode				= $this->input->post('kode');
			$nama_dosen			= $this->input->post('nama_dosen');
			$nidn 			= $this->input->post('nidn');
			$foto				= $this->input->post('foto');
			$status				= $this->input->post('status');
			$cv 				= $this->input->post('cv');
			$status_mengajar 	= $this->input->post('status_mengajar');
			
			if($status == 'baru'){

				// Foto Karyawan

				if($_FILES['foto']['name'] != ""){
			    $config['upload_path'] = 'file/dosen';
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('foto'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $foto = $data['file1'];
		    	}
				}

				// CV Karyawan

				if($_FILES['cv']['name'] != ""){
			    $config['upload_path'] = 'file/cv';
			    $config['allowed_types'] = 'pdf|docx|doc';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('cv'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $cv = $data['file1'];
		    	}
				}


				$data = array(
					'nama_dosen' 		=> $nama_dosen,
					'nidn'			=> $nidn,
					'foto'				=> $foto,
					'cv'				=> $cv,
					'status_mengajar'	=> $status_mengajar,
				);
				$this->m_admin->insertdata('data_dosen',$data);
				redirect('panel/karyawan');
				
			}
			else {

						
					$this->db->where('id',$kode);
					$query 	= $this->db->get('data_dosen');
					$row	= $query->row();
					
					unlink("./file/dosen/$row->foto");

					// Foto Karyawan
					if($_FILES['foto']['name'] != ""){
					    $config['upload_path'] = 'file/dosen';
					    $config['allowed_types'] = 'jpg|png|jpeg';
					    $config['max_size'] = '2000';
					    $config['remove_spaces'] = true;
					    $config['overwrite'] = false;
					    $config['encrypt_name'] = true;
					    $config['max_width']  = '';
					    $config['max_height']  = '';
					    $this->load->library('upload', $config);
					    $this->upload->initialize($config);            
					    if (!$this->upload->do_upload('foto'))
					    {
					        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
					        exit();
					    }
					    else
					    {
				        $image = $this->upload->data();
				        if ($image['file_name'])
				        {
				            $data['file1'] = $image['file_name'];
				        }        
				        $foto = $data['file1'];
				    	}
					}
	
						$this->db->where('id',$kode);
						$query 	= $this->db->get('data_dosen');
						$row	= $query->row();
						
						unlink("./file/cv/$row->cv");

						// CV Karyawan

						if($_FILES['cv']['name'] != ""){
					    $config['upload_path'] = 'file/cv';
					    $config['allowed_types'] = 'pdf|docx|doc';
					    $config['max_size'] = '2000';
					    $config['remove_spaces'] = true;
					    $config['overwrite'] = false;
					    $config['encrypt_name'] = true;
					    $config['max_width']  = '';
					    $config['max_height']  = '';
					    $this->load->library('upload', $config);
					    $this->upload->initialize($config);            
					    if (!$this->upload->do_upload('cv'))
					    {
					        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
					        exit();
					    }
					    else
					    {
				        $image = $this->upload->data();
				        if ($image['file_name'])
				        {
				            $data['file1'] = $image['file_name'];
				        }        
				        $cv = $data['file1'];
				    	}
						}
						
						$data = array(
							'nama_dosen' 		=> $nama_dosen,
							'nidn'			=> $nidn,
							'foto'				=> $foto,
							'cv'				=> $cv,
							'status_mengajar'	=> $status_mengajar,
						);
						
						$this->m_admin->updatedata('data_dosen',$data,array('id' => $kode));
						redirect('panel/karyawan');
				
			}
			
		}
		else {
			echo "Page Not Found";
		}
	}

	function karyawanedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getKaryawan("where id= '$kode' ")->result_array();


		$data = array(
			'title'					=> 'Edit Data Dosen',
			'user'					=> $user_data[0]['fullname'],
			'avatar'				=> $this->gravatar->get_gravatar($email),
			'status'				=> 'edit',
			'kode'					=> $data_konten[0]['id'],
			'nama_dosen'			=> $data_konten[0]['nama_dosen'],
			'nidn'				=> $data_konten[0]['nidn'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/karyawan_form');
		$this->load->view('panel/footer');
	}

	function karyawandelete($kode = 0){
		$this->db->where('id',$kode);
		$query 	= $this->db->get('data_dosen');
		$row	= $query->row();
		
		unlink("./file/dosen/$row->foto");
		unlink("./file/cv/$row->cv");
		$hasil	= $this->m_admin->deldata('data_dosen',array('id' => $kode));
		redirect('panel/karyawan');
	}


	function galeri(){


		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$galeri 		= $this->m_admin->selectdata('galery order by id desc')->result_array();
		$this->load->helper('text');
		
		
		$data = array(
			'title'		=> 'Galeri Foto',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'galeri'	=> $galeri,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/galeri');
		$this->load->view('panel/footer');

	}

	function galeriadd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$album 			= $this->db->query("select * from album_foto order by id desc")->result_array();


		$data = array(
			'title'			=> 'Add Portofolio',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'baru',
			'kode'			=> '',
			'judul'			=> '',
			'deskripsi'		=> '',
			'album'			=> $album
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/galeri_form');
		$this->load->view('panel/footer');
	}

	function galeriedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getGalery("where id= '$kode' ")->result_array();
		$album 			= $this->db->query("select * from album_foto order by id desc")->result_array();


		$data = array(
			'title'			=> 'Edit Portofolio',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'edit',
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title_img'],
			'image'			=> $data_konten[0]['image_url'],
			'deskripsi'		=> $data_konten[0]['description'],
			'album'			=> $album
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/galeri_form');
		$this->load->view('panel/footer');
	}

	function galeridelete($kode = 0){
		$this->db->where('id',$kode);
		$query 	= $this->db->get('galery');
		$row	= $query->row();
		
		unlink("./file/galeri/$row->image_url");
		$hasil	= $this->m_admin->deldata('galery',array('id' => $kode));
		redirect('panel/galeri');
	}

	function galerisave(){
		if($_POST){

			$kode		= $this->input->post('kode');
			$judul		= $this->input->post('judul');
			$album 		= $this->input->post('album');
			$image		= $this->input->post('foto');
			$deskripsi	= $this->input->post('deskripsi');
			$kategori 	= $this->input->post('kategori');
			$statuspub	= $this->input->post('statuspub');
			$status		= $this->input->post('status');
			
			if($status == 'baru'){

				if($_FILES['foto']['name'] != ""){
			    $config['upload_path'] = 'file/galeri';
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('foto'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $galeri = $data['file1'];
		    	}
			}
				
				$data = array(
					'id_album'		=> $album,
					'title_img' 	=> $judul,
					'image_url'		=> $galeri,
					'description'	=> $deskripsi,
					'kategori'		=> $kategori,
					'status'		=> $statuspub,
				);
				
				$this->m_admin->insertdata('galery',$data);
				redirect('panel/galeri');
				
			}
			else {

				$this->db->where('id',$kode);
				$query 	= $this->db->get('galery');
				$row	= $query->row();
				
				unlink("./file/galeri/$row->image_url");

				if($_FILES['foto']['name'] != ""){
			    $config['upload_path'] = 'file/galeri';
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('foto'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $galeri = $data['file1'];
		    	}
			}

				$data = array(
					'id_album'		=> $album,
					'title_img' 	=> $judul,
					'image_url'		=> $galeri,
					'description'	=> $deskripsi,
					'kategori'		=> $kategori,
					'status'		=> $statuspub,
				);
				$this->m_admin->updatedata('galery',$data,array('id' => $kode));
				redirect('panel/galeri');
			}
			
		}
		else {
			echo "Page Not Found";
		}
	}

	function album(){


		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$album 			= $this->m_admin->selectdata('album_foto order by id desc')->result_array();
		$this->load->helper('text');

		
		$data = array(
			'title'		=> 'Album Foto',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'album'		=> $album,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/album');
		$this->load->view('panel/footer');

	}

	function albumadd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');


		$data = array(
			'title'			=> 'Add Album Foto',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'baru',
			'kode'			=> '',
			'nama_album'	=> '',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/album_form');
		$this->load->view('panel/footer');
	}

	function albumsave(){
		if($_POST){

			$kode			= $this->input->post('kode');
			$nama_album		= $this->input->post('nama_album');
			$status			= $this->input->post('status');
			
			if($status == 'baru'){

				if($_FILES['sampul_album']['name'] != ""){
			    $config['upload_path'] = 'file/album';
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('sampul_album'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        	$album = $data['file1'];
		    	}
			}
				
				$data = array(
					'nama_album' 	=> $nama_album,
					'sampul_album'	=> $album,
				);
				
				$this->m_admin->insertdata('album_foto',$data);
				redirect('panel/album');
				
			}
			else {

				$this->db->where('id',$kode);
				$query 	= $this->db->get('album_foto');
				$row	= $query->row();
				
				unlink("./file/album/$row->sampul_album");

				if($_FILES['sampul_album']['name'] != ""){
			    $config['upload_path'] = 'file/album';
			    $config['allowed_types'] = 'jpg|png|jpeg';
			    $config['max_size'] = '2000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('sampul_album'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 2Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        	$album = $data['file1'];
		    	}
			}

				$data = array(
					'nama_album' 	=> $nama_album,
					'sampul_album'	=> $album,
				);
				$this->m_admin->updatedata('album_foto',$data,array('id' => $kode));
				redirect('panel/album');
			}
			
		}
		else {
			echo "Page Not Found";
		}
	}

	function albumdelete($kode = 0){
		$this->db->where('id',$kode);
		$query 	= $this->db->get('album_foto');
		$row	= $query->row();
		
		unlink("./file/album/$row->sampul_album");
		$hasil	= $this->m_admin->deldata('album_foto',array('id' => $kode));
		redirect('panel/album');
	}

	function albumedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getAlbum("where id= '$kode' ")->result_array();


		$data = array(
			'title'			=> 'Edit Album Foto',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'edit',
			'kode'			=> $data_konten[0]['id'],
			'nama_album'	=> $data_konten[0]['nama_album'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/album_form');
		$this->load->view('panel/footer');
	}

	function download(){
		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$download 		= $this->m_admin->selectdata('download order by id')->result_array();
		$this->load->helper('text');
		

		$data = array(
			'title'		=> 'Manajemen Download',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'download'	=> $download,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/download');
		$this->load->view('panel/footer');
	}

	function downloadadd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');


		$data = array(
			'title'			=> 'Add File Download',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'baru',
			'kode'			=> '',
			'judul'			=> '',
			'file'			=> '',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/download_form');
		$this->load->view('panel/footer');
	}

	function downloadedit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getDownload("where id= '$kode' ")->result_array();


		$data = array(
			'title'			=> 'Edit Slide Image Landing',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'edit',
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['judul_file'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/download_form');
		$this->load->view('panel/footer');
	}

	function downloaddelete($kode = 0){
		$this->db->where('id',$kode);
		$query 	= $this->db->get('download');
		$row	= $query->row();
		
		unlink("./file/download/$row->file");
		$hasil	= $this->m_admin->deldata('download',array('id' => $kode));
		redirect('panel/download');
	}

	function downloadsave(){
		if($_POST){

			$kode		= $this->input->post('kode');
			$judul		= $this->input->post('judul');
			$file		= $this->input->post('file');
			$status_pb	= $this->input->post('statuspub');
			$status		= $this->input->post('status');
			
			if($status == 'baru'){

				if($_FILES['file']['name'] != ""){
			    $config['upload_path'] = 'file/download';
			    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|doc|zip|rar';
			    $config['max_size'] = '5000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('file'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 5 Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $file = $data['file1'];
		    	}
			}
				
				$data = array(
					'judul_file' 	=> $judul,
					'file'			=> $file,
					'status'		=> $status_pb,
					'tanggal'		=> date('Y-m-d'),
				);
				
				$this->m_admin->insertdata('download',$data);
				redirect('panel/download');
				
			}
			else {

				$this->db->where('id',$kode);
				$query 	= $this->db->get('download');
				$row	= $query->row();
				
				unlink("./file/download/$row->file");

				if($_FILES['file']['name'] != ""){
			    $config['upload_path'] = 'file/download';
			    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|doc|zip|rar';
			    $config['max_size'] = '5000';
			    $config['remove_spaces'] = true;
			    $config['overwrite'] = false;
			    $config['encrypt_name'] = true;
			    $config['max_width']  = '';
			    $config['max_height']  = '';
			    $this->load->library('upload', $config);
			    $this->upload->initialize($config);            
			    if (!$this->upload->do_upload('file'))
			    {
			        print_r('Ukuran File Terlalu Besar. Maksimal 5 Mb');
			        exit();
			    }
			    else
			    {
		        $image = $this->upload->data();
		        if ($image['file_name'])
		        {
		            $data['file1'] = $image['file_name'];
		        }        
		        $galeri = $data['file1'];
		    	}
			}

				$data = array(
					'judul_file' 	=> $judul,
					'file'			=> $file,
					'status'		=> $status_pb,
					'tanggal'		=> date('Y-m-d'),
				);
				$this->m_admin->updatedata('download',$data,array('id' => $kode));
				redirect('panel/download');
			}
			
		}
		else {
			echo "Page Not Found";
		}
	}

	function link_ex(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$link_ex 		= $this->m_admin->selectdata('link_external order by id desc')->result_array();
		$this->load->helper('text');
		

		$data = array(
			'title'		=> 'Eksternal Link',
			'user'		=> $user_data[0]['fullname'],
			'avatar'	=> $this->gravatar->get_gravatar($email),
			'link_ex'	=> $link_ex,
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/link_ex');
		$this->load->view('panel/footer');
	}

	function link_exadd(){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');


		$data = array(
			'title'			=> 'Add Eksternal Link',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'baru',
			'kode'			=> '',
			'nama_link'		=> '',
			'url_link'		=> '',
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/link_ex_add');
		$this->load->view('panel/footer');
	}

	function link_ex_save(){

		if($_POST){

			$nama_link 	= $this->input->post('nama_link');
			$url_link 	= $this->input->post('url_link');
			$status 	= $this->input->post('status');
			$kode 		= $this->input->post('kode');

			if($status == 'baru'){

			$data 		= array(
				'nama_link'		=> $nama_link,
				'url'			=> $url_link,
			);

			$this->m_admin->insertdata('link_external',$data);
			redirect('panel/link_ex');

			}
			else {

			$data 		= array(
				'nama_link'		=> $nama_link,
				'url'			=> $url_link,
			);

			$this->m_admin->updatedata('link_external',$data,array('id' => $kode));
			redirect('panel/link_ex');

			}

			


		}
		else {
			echo "Mau Kemana Nak ?";
		}
	}

	function link_ex_delete($kode = 0){
		$hasil	= $this->m_admin->deldata('link_external',array('id' => $kode));
		redirect('panel/link_ex');
	}

	function link_ex_edit($kode = 0){

		date_default_timezone_set('Asia/Jakarta');
		$user			= $this->session->userdata('login');
		$user_data 		= $this->m_admin->user()->result_array();
		$email 			= $user_data[0]['email'];
		$this->load->library('gravatar');
		$data_konten	= $this->m_admin->getLink("where id= '$kode' ");


		$data = array(
			'title'			=> 'Edit Eksternal Link',
			'user'			=> $user_data[0]['fullname'],
			'avatar'		=> $this->gravatar->get_gravatar($email),
			'status'		=> 'edit',
			'kode'			=> $data_konten[0]['id'],
			'nama_link'		=> $data_konten[0]['nama_link'],
			'url_link'		=> $data_konten[0]['url'],
		);
		$this->load->view('panel/head',$data);
		$this->load->view('panel/link_ex_add');
		$this->load->view('panel/footer');
	}


}
