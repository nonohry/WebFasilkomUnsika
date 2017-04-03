<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_site');
	}





	function index()
	{
		$this->load->helper('text');
		date_default_timezone_set('Asia/Jakarta');

		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$footer2 			= $this->m_site->getConfig('WHERE id_config = 9')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 6')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$download 			=  $this->db->query('select * from download order by id desc limit 4')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();

		$data	= 	array(
			'title'			=> strip_tags($home[0]['content']),
			'description'	=> strip_tags($deskripsi[0]['content']),
			'keyword'		=> strip_tags($keyword[0]['content']),
			'footer'		=> strip_tags($footer[0]['content']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'slider_ar'		=> $slider_ar,
			'berita_baru'	=> $berita_baru,
			'berita_kampus'	=> $berita_kampus,
			'pengumuman'	=> $pengumuman,
			'galeri'		=> $galeri,
			'download'		=> $download,
			'link_ex'		=> $link_ex,
			'menu_foot'		=> $menu_foot,
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
		);
		$this->load->view('home/head', $data);
		$this->load->view('home/home');
		$this->load->view('home/footer');
	}

	function viewcontent($cat,$slug = ''){

		$this->load->helper('text');
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 4')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();


		$data_konten		= $this->m_site->getArtikel("where slug= '$slug'")->result_array();

		$data = array(
		'title'			=> strip_tags($data_konten[0]['title']),
		'description'	=> strip_tags(character_limiter($data_konten[0]['content'], 500)),
		'keyword'		=> strip_tags($data_konten[0]['title']),
		'logo'			=> strip_tags($logoheader[0]['content']),
		'footer'		=>  $footer[0]['content'],
		'menu'			=> $this->m_site->GetParentMenu(),
		'uri1'			=> $this->uri->segment(2),
		'uri2'			=> $this->uri->segment(3),
		'berita_baru'	=> $berita_baru,
		'galeri'		=> $galeri,
		'link_ex'		=> $link_ex,
		'menu_foot'		=> $menu_foot,
		'kode'			=> $data_konten[0]['id'],
		'judul'			=> $data_konten[0]['title'],
		'slug'			=> $data_konten[0]['slug'],
		'date'			=> $data_konten[0]['date'],
		'time'			=> $data_konten[0]['time'],
		'author'		=> $data_konten[0]['author'],
		'images'		=> $data_konten[0]['img_header'],
		'content'		=> $data_konten[0]['content'],
		'kategori'		=> $data_konten[0]['category'],
		);
		$this->load->view('home/head', $data);
		$this->load->view('home/content_detail');
		$this->load->view('home/footer');
	}


	function viewpage($slug = ''){

		$this->load->helper('text');

		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 4')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();


		$data_konten		= $this->m_site->getPage("where slug= '$slug'")->result_array();

		$data = array(
			'title'			=> strip_tags($data_konten[0]['title']),
			'description'	=> strip_tags(character_limiter($data_konten[0]['content'], 200)),
			'keyword'		=> strip_tags($data_konten[0]['title']),
			'logo'			=> strip_tags($logoheader[0]['content']),
			'footer'		=> strip_tags($footer[0]['content']),
			'kode'			=> $data_konten[0]['id'],
			'judul'			=> $data_konten[0]['title'],
			'slug'			=> $data_konten[0]['slug'],
			'content'		=> $data_konten[0]['content'],
			'menu_foot'		=> $menu_foot,
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'berita_baru'	=> $berita_baru,
			'galeri'		=> $galeri,
			'link_ex'		=> $link_ex,
		);
		$this->load->view('home/head', $data);
		$this->load->view('home/pages');
		$this->load->view('home/footer');
	}


	function news($offset = 0){

		$this->load->helper('text');
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 3')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();


		$data['base'] 			= $this->config->item('base_url');
		$data['title'] 			= 'Semua Berita';
		$this->load->model('m_site');
		$total 					= $this->m_site->artikel_count();
		$per_pg = 6;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'pages/news/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();

		$data['kueri']			= $this->m_site->get_all_artikel($per_pg,$offset);

		$data['description']	= 'Semua Berita';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Semua Berita';
		$data['logo']			= strip_tags($logoheader[0]['content']);
		$data['footer']			= strip_tags($footer[0]['content']);
		$data['berita_baru']	= $berita_baru;
		$data['galeri']			= $galeri;
		$data['link_ex']		= $link_ex;
		$data['menu_foot']		= $menu_foot;

		$this->load->view('home/head', $data);
		$this->load->view('home/news');
		$this->load->view('home/footer');
	}

	function pengumuman($offset = 0){

		$this->load->helper('text');
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 3')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();


		$data['base'] 			= $this->config->item('base_url');
		$data['title'] 			= 'Semua Pengumuman';
		$this->load->model('m_site');
		$total 					= $this->m_site->pengumuman_count();
		$per_pg = 6;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'pages/pengumuman/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();

		$data['kueri']			= $this->m_site->get_all_pengumuman($per_pg,$offset);

		$data['description']	= 'Semua Berita';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Semua Berita';
		$data['logo']			= strip_tags($logoheader[0]['content']);
		$data['footer']			= strip_tags($footer[0]['content']);
		$data['berita_baru']	= $berita_baru;
		$data['galeri']			= $galeri;
		$data['link_ex']		= $link_ex;
		$data['menu_foot']		= $menu_foot;

		$this->load->view('home/head', $data);
		$this->load->view('home/news');
		$this->load->view('home/footer');
	}


	function elearning($offset = 0){

		$this->load->helper('text');
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 3')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();


		$data['base'] 			= $this->config->item('base_url');
		$data['title'] 			= 'E-Learning';
		$this->load->model('m_site');
		$total 					= $this->m_site->elearning_count();
		$per_pg = 6;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'pages/elearning/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();

		$data['kueri']			= $this->m_site->get_all_elearning($per_pg,$offset);

		$data['description']	= 'E-Learning';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'E-Learning';
		$data['logo']			= strip_tags($logoheader[0]['content']);
		$data['footer']			= strip_tags($footer[0]['content']);
		$data['berita_baru']	= $berita_baru;
		$data['galeri']			= $galeri;
		$data['link_ex']		= $link_ex;
		$data['menu_foot']		= $menu_foot;

		$this->load->view('home/head', $data);
		$this->load->view('home/news');
		$this->load->view('home/footer');
	}


	function kontak(){

		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 4')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$teks_kontak		= $this->m_site->getConfig('WHERE id_config = 8')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();
		

		$data	= 	array(
			'title'			=> 'Hubungi Kami',
			'description'	=> 'Hubungi Kami',
			'keyword'		=> 'Hubungi Kami',
			'sukses'		=> '',
			'logo'			=> strip_tags($logoheader[0]['content']),
			'footer'		=> $footer[0]['content'],
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'link_ex'		=> $link_ex,
			'teks_kontak'	=> $teks_kontak[0]['content'],
			'menu_foot'		=> $menu_foot,
		);
		$this->load->view('home/head', $data);
		$this->load->view('home/contact');
		$this->load->view('home/footer');
	}

	function aksikontak(){

		if($_POST){

			date_default_timezone_set('Asia/Jakarta');

			$fullname		= $this->input->post('fullname');
			$email			= $this->input->post('email');
			$website		= $this->input->post('website');
			$message		= $this->input->post('message');

			$data 		= array(
				'fullname'		=> $fullname,
				'email'			=> $email,
				'website'		=> $website,
				'message'		=> $message,
				'date'			=> date('Y/m/d'),
				'time'			=> date(' H:i:s')
			);

			$this->m_site->insertdata('contact',$data);

			$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
			$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
			$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
			$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
			$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
			$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
			$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 4')->result_array();
			$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
			$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
			$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
			$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
			$teks_kontak		= $this->m_site->getConfig('WHERE id_config = 8')->result_array();
			$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();




				$data	= 	array(
					'title'			=> 'Hubungi Kami',
					'description'	=> 'Hubungi Kami',
					'keyword'		=> 'Hubungi Kami',
					'sukses'		=> '
						<br /><div class="alert alert-success">
					    	<strong>Berhasil!</strong> Pesan anda telah terkirim ke kotak masuk kami.
					    </div>
					',
					'logo'			=> strip_tags($logoheader[0]['content']),
					'footer'		=>  $footer[0]['content'],
					'footer'		=> $footer[0]['content'],
					'menu'			=> $this->m_site->GetParentMenu(),
					'uri1'			=> $this->uri->segment(2),
					'uri2'			=> $this->uri->segment(3),
					'link_ex'		=> $link_ex,
					'teks_kontak'	=> $teks_kontak[0]['content'],
					'menu_foot'		=> $menu_foot,
				);

			$this->load->view('home/head', $data);
			$this->load->view('home/contact');
			$this->load->view('home/footer');

		}
		else {
			echo "Dont Search Me :'(";
		}

	}

	function galleri($offset = 0){

		$this->load->helper('text');
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 3')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();



		$data['base'] 			= $this->config->item('base_url');
		$data['title'] 			= 'Album Foto';
		$this->load->model('m_site');
		$total 					= $this->m_site->Album_Count();
		$per_pg = 6;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'pages/album/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();

		$data['kueri']			= $this->m_site->getAllAlbum($per_pg,$offset);

		$data['description']	= 'Album Foto';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Album Foto';
		$data['logo']			= strip_tags($logoheader[0]['content']);
		$data['footer']			= strip_tags($footer[0]['content']);
		$data['berita_baru']	= $berita_baru;
		$data['galeri']			= $galeri;
		$data['link_ex']		= $link_ex;
		$data['menu_foot']		= $menu_foot;


		
		$this->load->view('home/head',$data);
		$this->load->view('home/galeri');
		$this->load->view('home/footer');
		
	}

	function galleri_detail($kode = 0){

		
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 4')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$teks_kontak		= $this->m_site->getConfig('WHERE id_config = 8')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();
		

		$galeri_detail 		= $this->db->query('select * from galery where id_album = "'.$kode.'"')->result_array();

		if($galeri_detail[0]['id_album'] == '')
		{
			redirect('/lost');
		}
		else
		{
			$nama_album 		= $this->db->query('select * from album_foto where id = "'.$galeri_detail[0]['id_album'].'"')->result_array();

			$data	= 	array(
			'title'			=> 'Album Foto > '. $nama_album[0]['nama_album'],
			'description'	=> 'Album Foto > ',
			'keyword'		=> 'Album Foto > ',
			'logo'			=> strip_tags($logoheader[0]['content']),
			'footer'		=> $footer[0]['content'],
			'menu'			=> $this->m_site->GetParentMenu(),
			'uri1'			=> $this->uri->segment(2),
			'uri2'			=> $this->uri->segment(3),
			'link_ex'		=> $link_ex,
			'teks_kontak'	=> $teks_kontak[0]['content'],
			'berita_baru'	=> $berita_baru,
			'menu_foot'		=> $menu_foot,
			'galeri'		=> $galeri_detail,
		);
		$this->load->view('home/head', $data);
		$this->load->view('home/detail_galery');
		$this->load->view('home/footer');

		}
		
	}

	function dosen($offset = 0){
		$this->load->helper('text');
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 3')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();



		$data['base'] 			= $this->config->item('base_url');
		$data['title'] 			= 'Data Dosen';
		$this->load->model('m_site');
		$total 					= $this->m_site->Dosen_Count();
		$per_pg = 6;
		$offset = $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url']			= $data['base'].'pages/data-dosen/';
		$config['total_rows']		= $total;
		$config['per_page']			= $per_pg;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagination']		= $this->pagination->create_links();

		$data['kueri']			= $this->m_site->getAllDosen($per_pg,$offset);

		$data['description']	= 'Data Dosen';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Data Dosen';
		$data['logo']			= strip_tags($logoheader[0]['content']);
		$data['footer']			= strip_tags($footer[0]['content']);
		$data['berita_baru']	= $berita_baru;
		$data['galeri']			= $galeri;
		$data['link_ex']		= $link_ex;
		$data['menu_foot']		= $menu_foot;


		
		$this->load->view('home/head',$data);
		$this->load->view('home/karyawan');
		$this->load->view('home/footer');
	}

	function data_kosong()
	{
		$this->load->view('home/data_kosong');
	}

	function cari(){

	if($_GET){

		$query = $this->input->get_post('s',TRUE);

		$data['cari']	= $this->db->query('select * from artikel WHERE title LIKE  "%'.$query.'%" ')->result();
		
		$this->load->helper('text');
		$logoheader			= $this->m_site->getConfig('WHERE id_config = 1')->result_array();
		$deskripsi 			= $this->m_site->getConfig('WHERE id_config = 3')->result_array();
		$keyword 			= $this->m_site->getConfig('WHERE id_config = 4')->result_array();
		$home 				= $this->m_site->getConfig('WHERE id_config = 2')->result_array();
		$footer 			= $this->m_site->getConfig('WHERE id_config = 10')->result_array();
		$slider_ar 			= $this->db->query('select * from artikel where category= "news" order by rand() limit 3')->result_array();
		$berita_baru		= $this->db->query('select * from artikel where category= "news" order by id desc limit 3')->result_array();
		$berita_kampus 		= $this->db->query('select * from artikel where category= "kampus" order by id desc limit 3')->result_array();
		$pengumuman 		= $this->db->query('select * from artikel where category= "pengumuman" order by id desc limit 3')->result_array();
		$galeri 			= $this->db->query('select * from galery where kategori = 1 and status = 1 order by id desc limit 8')->result_array();
		$link_ex 			= $this->db->query('select * from link_external order by id desc limit 5')->result_array();
		$menu_foot 			= $this->db->query('select * from menu where parent_id = 0 and view_type = 4  order by menu_id asc limit 5')->result_array();


		$data['title'] 			= 'Pencarian Berita';
		$data['description']	= 'Pencarian Berita';
		$data['menu']			= $this->m_site->GetParentMenu();
		$data['footer']			= $footer[0]['content'];
		$data['uri1']			= $this->uri->segment(2);
		$data['uri2']			= $this->uri->segment(3);
		$data['keyword']		= 'Pencarian Berita';
		$data['logo']			= strip_tags($logoheader[0]['content']);
		$data['footer']			= strip_tags($footer[0]['content']);
		$data['berita_baru']	= $berita_baru;
		$data['galeri']			= $galeri;
		$data['link_ex']		= $link_ex;
		$data['t_se']			= $this->input->get_post('s',TRUE);
		$data['menu_foot']		= $menu_foot;

		if($data['cari'] == null){

			$data['kosong']			= 'Data Yang Anda Cari Tidak Ada';
			$this->load->view('home/head', $data);
			$this->load->view('home/cari');
			$this->load->view('home/footer');
		}
		else {

		$data['kosong']			= '';

		$this->load->view('home/head', $data);
		$this->load->view('home/cari');
		$this->load->view('home/footer');

		}
	}
	else {
		redirect('Not_Found');
	}

		
	}

}

