<?php


class Posts_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPosts($slag = FALSE)
    {
        if($slag === FALSE)
        {
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('slag' => $slag));
        return $query->row_array();

    }
}