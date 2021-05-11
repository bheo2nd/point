<?php


function is_logged_in()

{
    $login = get_instance();
    if (!$login->session->userdata('username')) {
        redirect('auth');
    }
}
