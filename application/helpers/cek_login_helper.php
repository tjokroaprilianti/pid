<?php

function cek_sudah_login()
{
    $CI = &get_instance();
    $login = $CI->session->userdata('login');
    if ($login == 1) {
        $CI->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            <div class="container text-center">
                <span class="badge badge-danger">Ditolak</span> Akses ditolak!.
            </div>
        </div>
        ');
        redirect('dashboard');
    }
}

function cek_belum_login()
{
    $CI = &get_instance();
    $login = $CI->session->userdata('login');
    if (!$login) {
        $CI->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert">
            <div class="container text-center">
                <span class="badge badge-danger">Ditolak</span> Akses ditolak!.
            </div>
        </div>
        ');
        redirect('login');
    }
}

// function cek_admin()
// {
// 	$CI = &get_instance();
// 	$login = $CI->session->userdata('login');
// 	if (!$login) {
// 		$CI->session->set_flashdata('message', '
//         <div class="alert alert-danger" role="alert">
//             <div class="container text-center">
//                 <span class="badge badge-danger">Ditolak</span> Akses ditolak!.
//             </div>
//         </div>
//         ');
// 		redirect('login');
// 	}
// }
