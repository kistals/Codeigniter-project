<?php

class News_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getNews($slag = FALSE)
    {
        if($slag === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where( 'news', array('slag' => $slag) );
        return $query->row_array();
    }

    public function setNews( $slag, $title, $text )
    {
        $data = array(
            'title' => $title,
            'slag' => $slag,
            'text' => $text
        );

        return $this->db->insert( 'news', $data );
    }

    public function updateNews( $slag, $title, $text )
    {
        $data = array(
            'title' => $title,
            'slag' => $slag,
            'text' => $text
        );

        return $this->db->update( 'news', $data, array( 'slag' => $slag ) );
    }


    public function deleteNews($slag)
    {
        return $this->db->delete('news', array('slag'=>$slag));
    }
}