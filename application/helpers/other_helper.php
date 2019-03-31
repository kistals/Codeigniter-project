<?php

if(!function_exists('show_active_menu')) {

    function show_active_menu($slag, $category) {

        $ci=& get_instance();

        $result = "";

        if($ci->uri->segment(1,0) === $slag) {
            $result = 'class="active"';
        }

        if($ci->uri->segment(3,0) === $slag && $ci->uri->segment(1,0) === 'movie' && $ci->uri->segment(2,0) === 'type') {
            $result = 'class="active"';
        }

        if($slag === 'films' && $category === '1' && $ci->uri->segment(1,0) === 'movie' && $ci->uri->segment(2,0) === 'view') {
            $result = 'class="active"';
        }

        if($slag === 'serials' && $category === '2' && $ci->uri->segment(1,0) === 'movie' && $ci->uri->segment(2,0) === 'view') {
            $result = 'class="active"';
        }

        return $result;
    }
}

if(!function_exists('getUserNameByID')) {

    function getUserNameByID($user_id) {

        $ci=& get_instance();

        $ci->load->model('dx_auth/users');

        $query = $ci->users->get_user_by_id($user_id);
        $result = $query->row();
        return $result;

    }
}