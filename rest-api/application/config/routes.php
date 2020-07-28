<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['user']='user/base';
$route['user/me']='user/me';
$route['user/school']='user/school';
$route['user/teacher']='user/teacher';
$route['user/konfirmasi']='user/konfirmasi';
$route['user/aktivasi']='user/aktivasi';
$route['user/lupasandi']='user/lupasandi';
$route['user/reset']='user/reset';
$route['user/sch/(:any)']='user/sch/$1';
$route['user/(:any)']='user/param/$1';

$routes->get('/', 'Home::index');
$routes->resource('admin');

$route['siswa']='siswa/base';
$route['siswa/(:num)']='siswa/param/$1';

$route['kelas']='kelas/base';
$route['kelas/(:num)']='kelas/param/$1';

$route['guru']='guru/base';
$route['guru/(:num)']='guru/param/$1';

$route['sekolah']='sekolah/base';
$route['sekolah/(:num)']='sekolah/param/$1';

$route['mapel']='mapel/base';
$route['mapel/(:num)']='mapel/param/$1';

$route['prestasi']='ekstensi/prestasi/base';
$route['prestasi/(:num)']='ekstensi/prestasi/param/$1';

$route['presensi']='ekstensi/presensi/base';
$route['presensi/(:num)']='ekstensi/presensi/param/$1';

$route['ekskul']='ekstensi/ekskul/base';
$route['ekskul/peserta']='ekstensi/ekskul/peserta';
$route['ekskul/image/(:num)']='ekstensi/ekskul/image/$1';
$route['ekskul/image/(:num)/(:num)']='ekstensi/ekskul/image/$1/$1';
$route['ekskul/(:num)']='ekstensi/ekskul/param/$1';

$route['fisik']='ekstensi/fisik/base';
$route['fisik/(:num)']='ekstensi/fisik/param/$1';

$route['eksis']='ekstensi/eksis/base';
$route['eksis/all']='ekstensi/eksis/all';
$route['eksis/mine']='ekstensi/eksis/mine';
$route['eksis/(:any)']='ekstensi/eksis/params';

$route['agenda']='ekstensi/agenda/base';
$route['agenda/(:any)']='ekstensi/agenda/param/$1';
$route['agenda/image/(:any)']='ekstensi/agenda/image/$1';

$route['slider']='ekstensi/slider/base';
$route['slider/(:any)']='ekstensi/slider/param/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

