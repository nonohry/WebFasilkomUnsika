<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] 			= "welcome";
$route['404_override'] 					= '';
$route['panel'] 						= 'C_panel';
$route['panel/auth'] 					= 'C_panel/auth';
$route['panel/logout'] 					= 'C_panel/logout';
$route['home'] 							= 'C_site/home';
$route['panel/home'] 					= 'C_admin';
$route['panel/landing'] 				= 'C_admin/landing';
$route['panel/landing/add'] 			= 'C_admin/landingadd';
$route['panel/landing/edit/(:any)']		= 'C_admin/landingedit/$1';
$route['panel/landing/del/(:any)']		= 'C_admin/landingdelete/$1';
$route['panel/landing/save'] 			= 'C_admin/landingsave';
$route['panel/setting'] 				= 'C_admin/config';
$route['panel/setting/edit/(:any)']		= 'C_admin/configedit/$1';
$route['panel/setting/save']			= 'C_admin/configsave';
$route['panel/user']					= 'C_admin/user';
$route['panel/user/save']				= 'C_admin/saveuser';
$route['panel/menu']					= 'C_admin/menu';
$route['panel/menu/add']				= 'C_admin/menuadd';
$route['panel/menu/save']				= 'C_admin/menusave';
$route['panel/menu/edit/(:any)']		= 'C_admin/menuedit/$1';
$route['panel/menu/del/(:any)']			= 'C_admin/menudelete/$1';
$route['panel/pages']					= 'C_admin/page';
$route['panel/pages/add']				= 'C_admin/pagesadd';
$route['panel/pages/save']				= 'C_admin/pagessave';
$route['panel/pages/edit/(:any)']		= 'C_admin/pagesedit/$1';
$route['panel/pages/del/(:any)']		= 'C_admin/pagesdelete/$1';


$route['panel/slider'] 					= 'C_admin/slider';
$route['panel/slider/add'] 				= 'C_admin/slideradd';
$route['panel/slider/edit/(:any)']		= 'C_admin/slideredit/$1';
$route['panel/slider/del/(:any)']		= 'C_admin/sliderdelete/$1';
$route['panel/slider/save'] 			= 'C_admin/slidersave';

$route['panel/artikel']					= 'C_admin/artikel';
$route['panel/artikel/add']				= 'C_admin/artikeladd';
$route['panel/artikel/edit/(:any)']		= 'C_admin/artikeledit/$1';
$route['panel/artikel/save']			= 'C_admin/artikelsave';
$route['panel/artikel/del/(:any)']		= 'C_admin/artikeldelete/$1';

$route['pengumuman/(:any)-(:any)']		= 'welcome/viewpengumuman/$1-$2';
$route['panel/pengumuman']				= 'C_admin/pengumuman';
$route['panel/pengumuman/add']			= 'C_admin/pengumumanadd';
$route['panel/pengumuman/edit/(:any)']	= 'C_admin/pengumumanedit/$1';
$route['panel/pengumuman/save']			= 'C_admin/pengumumansave';
$route['panel/pengumuman/del/(:any)']	= 'C_admin/pengumumandel/$1';

$route['panel/pendaftaran']				= 'C_admin/pendaftaran';
$route['panel/pendaftaran/view/(:any)']	= 'C_admin/pendaftaranview/$1';
$route['panel/pendaftaran/del/(:any)']	= 'C_admin/pendaftarandel/$1';

$route['content/(:any)/(:any)']			= 'welcome/viewcontent/$1/$2';
$route['panel/contact']					= 'C_admin/contact';
$route['panel/contact/del/(:any)']		= 'C_admin/contactdelete/$1';
$route['panel/contact/view/(:any)']		= 'C_admin/contactview/$1';
$route['panel/contact/replay']			= 'C_admin/repMessage';

$route['panel/galeri']					= 'C_admin/galeri';
$route['panel/galeri/add']				= 'C_admin/galeriadd';
$route['panel/galeri/edit/(:any)']		= 'C_admin/galeriedit/$1';
$route['panel/galeri/del/(:any)']		= 'C_admin/galeridelete/$1';
$route['panel/galeri/save']				= 'C_admin/galerisave';

$route['panel/album']					= 'C_admin/album';
$route['panel/album/add']				= 'C_admin/albumadd';
$route['panel/album/edit/(:any)']		= 'C_admin/albumedit/$1';
$route['panel/album/del/(:any)']		= 'C_admin/albumdelete/$1';
$route['panel/album/save']				= 'C_admin/albumsave';

//Data Karyawan
$route['panel/karyawan']				= 'C_admin/karyawan';
$route['panel/karyawan/add']			= 'C_admin/karyawanadd';
$route['panel/karyawan/save']			= 'C_admin/karyawansave';
$route['panel/karyawan/edit/(:any)']	= 'C_admin/karyawanedit/$1';
$route['panel/karyawan/del/(:any)']		= 'C_admin/karyawandelete/$1';

// Contact Page
$route['pages/contact-us']				= 'welcome/kontak';
$route['pages/contact-us/send']			= 'welcome/aksikontak';

// Download Page Admin
$route['panel/download']				= 'c_admin/download';
$route['panel/download/new']			= 'c_admin/downloadadd';
$route['panel/download/edit/(:any)']	= 'C_admin/downloadedit/$1';
$route['panel/download/del/(:any)']		= 'C_admin/downloaddelete/$1';
$route['panel/download/save']			= 'C_admin/downloadsave';

$route['pages/download']				= 'welcome/download';

$route['panel/link_ex']					= 'c_admin/link_ex';
$route['panel/link_ex/new']				= 'c_admin/link_exadd';
$route['panel/link_ex/save']			= 'C_admin/link_ex_save';
$route['panel/link_ex/del/(:any)']		= 'C_admin/link_ex_delete/$1';
$route['panel/link_ex/edit/(:any)']		= 'C_admin/link_ex_edit/$1';



$route['search']						= 'welcome/cari';
$route['lost']						= 'welcome/data_kosong';

$route['pages/album']					= 'welcome/galleri';
$route['pages/album/(:any)']			= 'welcome/galleri';
$route['pages/album_galeri/(:any)']		= 'welcome/galleri_detail/$1';


$route['pages/news']					= 'welcome/news';
$route['pages/news/(:any)']				= 'welcome/news';

$route['pages/pengumuman']						= 'welcome/pengumuman';
$route['pages/pengumuman/(:any)']				= 'welcome/pengumuman';

$route['pages/elearning']						= 'welcome/elearning';
$route['pages/elearning/(:any)']				= 'welcome/elearning';

$route['pages/data-dosen']						= 'welcome/dosen';
$route['pages/data-dosen/(:any)']				= 'welcome/dosen';

$route['pages/data-staf']						= 'welcome/staf';
$route['pages/data-staf/(:any)']				= 'welcome/staf';


$route['pages/(:any)']					= 'welcome/viewpage/$1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */