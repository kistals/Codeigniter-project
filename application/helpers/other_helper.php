<?php

    if(!function_exists('show_avtive_menu'))
    {
        function show_avtive_menu($slag)
        {
            $ci=& get_instance();

            $result_active = "";
            
            //print_r($ci->uri->segment(3,0));

            // for main
            if($ci->uri->segment(1,0) === $slag)
            {
                $result_active = "class='active'";
            }
            
            // for films / serials
            if($ci->uri->segment(3,0) === $slag)
            {
                $result_active = "class='active'";
            }

            // for item cat
            if($slag === 'films' && $ci->uri->segment(1,0) === 'movie' && $ci->uri->segment(2,0) === 'view')
            {
                $result_active = "class='active'";
            }
            
            if($slag === 'serials' && $ci->uri->segment(1,0) === 'movie' && $ci->uri->segment(2,0) === 'view')
            {
                $result_active = "class='active'";
            }
            
            return $result_active;
        }
    }

    if(!function_exists('getUserNameById'))
    {
        function getUserNameById($user_id)
        {
            $ci=& get_instance();
            $ci->load->model('dx_auth/users');
            $query = $ci->users->get_user_by_id($user_id);
            $result = $query->row();
            return $result;
        }
    }