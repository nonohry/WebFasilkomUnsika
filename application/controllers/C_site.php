<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_site extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_site');
	}
	
	function home(){

		$this->load->helper('text');
		$slider	 			= $this->db->query('select * from artikel order by id desc limit 4')->result_array();
		$artikel	 		= $this->db->query('select * from artikel order by id desc limit 1')->result_array();
		$artikel_lain 		= $this->db->query('select * from artikel order by id desc limit 6')->result_array();
		$sidebar_yutub 		= $this->m_site->getConfig('WHERE id_config = 5')->result_array();
		$sidebar_fb	 		= $this->m_site->getConfig('WHERE id_config = 6')->result_array();
		$sidebar_link 		= $this->m_site->getConfig('WHERE id_config = 9')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();

		$galeri	 			= $this->db->query('select * from galery where status = 1 and kategori=1 limit 6')->result_array();
		$pegawai	 		= $this->db->query('select * from galery where status = 1 and kategori=2 limit 6')->result_array();

		$pattern = "/<p[^>]*><\\/p[^>]*>/"; 

		$data	= 	array(
			'title'			=> strip_tags($home[0]['content']),
			'description'	=> strip_tags($deskripsi[0]['content']),
			'keyword'		=> strip_tags($keyword[0]['content']),
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'artikel'		=> $artikel,
			'artikel2'		=> $artikel_lain,
			'slider'		=> $slider,
			's_youtube'		=> $sidebar_yutub[0]['content'],
			's_fb'			=> $sidebar_fb[0]['content'],
			's_link'		=> $sidebar_link[0]['content'],
			'galeri'		=> $galeri,
			'pegawai'		=> $pegawai,
			'footer'		=> $footer[0]['content'],
		);
		$this->load->view('site/head', $data);
		$this->load->view('site/home');
		$this->load->view('site/sidebar');
		$this->load->view('site/footer');
	}

	function viewartikel($kode,$slug = ''){

		$this->load->helper('text');
		$data_konten		= $this->m_site->getArtikel("where id= '$kode'")->result_array();
		$sidebar_yutub 		= $this->m_site->getConfig('WHERE id_config = 5')->result_array();
		$sidebar_fb	 		= $this->m_site->getConfig('WHERE id_config = 6')->result_array();
		$sidebar_link 		= $this->m_site->getConfig('WHERE id_config = 9')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$artikel_lain 		= $this->db->query('select * from artikel order by id desc limit 6')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();

		$tanggal = strtotime($data_konten[0]['date']);
		$hari_en = date('l', $tanggal);
		$hari_ar = array("Monday"=>"Senin", "Tuesday"=>"Selasa", "Wednesday"=>"Rabu", "Thursday"=>"Kamis", "Friday"=>"Jumat", "Saturday"=>"Minggu", "Sunday"=>"Minggu");
		$hari_id = $hari_ar[$hari_en];

		$data = array(
			'title'			=> $data_konten[0]['title'],
			'description'	=> strip_tags(character_limiter($data_konten[0]['content'],400)),
			'keyword'		=> strip_tags($data_konten[0]['title'],400),
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'date'			=> $data_konten[0]['date'],
			'author'		=> $data_konten[0]['author'],
			'images'		=> $data_konten[0]['img_header'],
			'content'		=> $data_konten[0]['content'],
			'kategori'		=> $data_konten[0]['category'],
			's_youtube'		=> $sidebar_yutub[0]['content'],
			's_fb'			=> $sidebar_fb[0]['content'],
			's_link'		=> $sidebar_link[0]['content'],
			'footer'		=> $footer[0]['content'],
			'artikel2'		=> $artikel_lain,
			'hari'			=> $hari_id,
		);
		$this->load->view('site/head', $data);
		$this->load->view('site/single_artikel');
		$this->load->view('site/sidebar');
		$this->load->view('site/footer');
	}

	function viewpage($kode,$slug = ''){

		$this->load->helper('text');
		$data_konten	= $this->m_site->getPage("where id= '$kode'")->result_array();

		$sidebar_yutub 		= $this->m_site->getConfig('WHERE id_config = 5')->result_array();
		$sidebar_fb	 		= $this->m_site->getConfig('WHERE id_config = 6')->result_array();
		$sidebar_link 		= $this->m_site->getConfig('WHERE id_config = 9')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$artikel_lain 		= $this->db->query('select * from artikel order by id desc limit 6')->result_array();

		$data = array(
			'title'			=> $data_konten[0]['title'],
			'description'	=> strip_tags(character_limiter($data_konten[0]['content'],400)),
			'keyword'		=> strip_tags(character_limiter($data_konten[0]['title'],400)),
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'slug'			=> $data_konten[0]['slug'],
			'content'		=> $data_konten[0]['content'],
			's_youtube'		=> $sidebar_yutub[0]['content'],
			's_fb'			=> $sidebar_fb[0]['content'],
			's_link'		=> $sidebar_link[0]['content'],
			'footer'		=> $footer[0]['content'],
			'artikel2'		=> $artikel_lain,
		);

		$this->load->view('site/head', $data);
		$this->load->view('site/single_page');
		$this->load->view('site/sidebar');
		$this->load->view('site/footer');
	}

	function kontak(){

		$this->load->helper('text');
		$peta 		= $this->m_site->getConfig('WHERE id_config = 7')->result_array();
		$teks_kon 	= $this->m_site->getConfig('WHERE id_config = 8')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();

		

		$data	= 	array(
			'title'			=> 'Contact Us - Dinas Peternakan dan Perikanan Kab. Tapin kalsel',
			'description'	=> 'Contact Us - Dinas Peternakan dan Perikanan Kab. Tapin kalsel',
			'keyword'		=> 'Contact Us - Dinas Peternakan dan Perikanan Kab. Tapin kalsel',
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'sukses'		=> '',
			'maps'			=> $peta[0]['content'],
			'teks_kontak'	=> $teks_kon[0]['content'],
			'footer'		=> $footer[0]['content'],
		);
		$this->load->view('site/head', $data);
		$this->load->view('site/contact');
		$this->load->view('site/footer');
	}

	function aksikontak(){

		if($_POST){

			date_default_timezone_set('Asia/Jakarta');

			$nama		= $this->input->post('nama');
			$email		= $this->input->post('email');
			$message	= $this->input->post('message');

			$data 		= array(
				'fullname'	=> $nama,
				'email'		=> $email,
				'message'	=> $message,
				'date'		=> date('Y/m/d H:i:s'),
			);

				$this->m_site->insertdata('contact',$data);
				$peta 		= $this->m_site->getConfig('WHERE id_config = 7')->result_array();
				$teks_kon 	= $this->m_site->getConfig('WHERE id_config = 8')->result_array();
				$footer 	= $this->m_site->getConfig('WHERE id_config = 10')->result_array();


				$datax	= 	array(
					'title'			=> 'Contact Us - Dinas Peternakan dan Perikanan Kab. Tapin kalsel',
					'description'	=> 'Website Resmi Dinas Peternakan dan Perikanan Kab. Tapin kalsel',
					'menu'			=> $this->m_site->GetParentMenu(),
					'uri1'			=> $this->uri->segment(2),
					'uri2'			=> $this->uri->segment(3),
					'sukses'		=> '
						 <div class="alert-msg success">Pesan Berhasil Terkirim</div>
					',
					'maps'			=> $peta[0]['content'],
					'teks_kontak'	=> $teks_kon[0]['content'],
					'footer'		=> $footer[0]['content'],
				);
				$this->load->view('site/head', $datax);
				$this->load->view('site/contact');
				$this->load->view('site/footer');

		}
		else {
			echo "Dont Search Me :'(";
		}

	}



	function news($offset = 0){

		$this->load->helper('text');
		$sidebar_yutub 		= $this->m_site->getConfig('WHERE id_config = 5')->result_array();
		$sidebar_fb	 		= $this->m_site->getConfig('WHERE id_config = 6')->result_array();
		$sidebar_link 		= $this->m_site->getConfig('WHERE id_config = 9')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();

		$artikel_lain 		= $this->db->query('select * from artikel order by id desc limit 6')->result_array();

		$data['base'] 			= $this->config->item('base_url');
		$data['title'] 			= 'Berita';
		$this->load->model('m_site');
		$total 					= $this->m_site->artikel_count();
		$per_pg = 4;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'hal/news/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open']	= '<div id="pagination">';
		$config['full_tag_close']	= '</div>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();

		$data['kueri']			= $this->m_site->get_all_artikel($per_pg,$offset);

		$data['description']	= 'Berita';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['s_youtube']		= $sidebar_yutub[0]['content'];
		$data['s_fb']			= $sidebar_fb[0]['content'];
		$data['s_link']			= $sidebar_link[0]['content'];
		$dat['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		=  'Berita';
		$data['artikel2']		= $artikel_lain;



		
		$this->load->view('site/head', $data);
		$this->load->view('site/news');
		$this->load->view('site/sidebar');
		$this->load->view('site/footer');
	}

	function galleri($offset = 0){

		$this->load->helper('text');
		$galeri	 			= $this->db->query('select * from galery where status = 1 and kategori = 1')->result_array();
		$sidebar_yutub 		= $this->m_site->getConfig('WHERE id_config = 5')->result_array();
		$sidebar_fb	 		= $this->m_site->getConfig('WHERE id_config = 6')->result_array();
		$sidebar_link 		= $this->m_site->getConfig('WHERE id_config = 9')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();

		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();

		$artikel_lain 		= $this->db->query('select * from artikel order by id desc limit 6')->result_array();


		$data['base'] 			= $this->config->item('base_url');
		$data['title'] 			= 'Galeri Foto';
		$this->load->model('m_site');
		$total 					= $this->m_site->galeri_count();
		$per_pg = 12;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'hal/gallery/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open']	= '<div id="pagination">';
		$config['full_tag_close']	= '</div>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();

		$data['galeri']			= $this->m_site->get_all_galeri($per_pg,$offset);

		$data['description']	= 'Galeri Foto';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['s_youtube']		= $sidebar_yutub[0]['content'];
		$data['s_fb']			= $sidebar_fb[0]['content'];
		$data['s_link']			= $sidebar_link[0]['content'];
		$dat['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Galei Foto';
		$data['artikel2']		= $artikel_lain;


		$this->load->view('site/head', $data);
		$this->load->view('site/galeri');
		$this->load->view('site/footer');
	}
	
}