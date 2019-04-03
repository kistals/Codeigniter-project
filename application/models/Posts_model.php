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

    public function setPosts($slag, $title, $text)
    {
        $data = array(
            'title' => $title,
            'text' => $text,
            'slag' => $slag
            );

        return $this->db->insert('posts', $data);
    }

    public  function updatePosts($slag, $title, $text)
    {
        $data = array(
            'title' => $title,
            'text' => $text,
            'slag' => $slag
        );

        return $this->db->update('posts', $data, array('slag' => $slag));
    }

    public function deletePosts($slag)
    {
        return $this->db->delete('posts', array('slag' => $slag));
    }

}