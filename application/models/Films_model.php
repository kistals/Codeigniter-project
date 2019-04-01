<?php

class Films_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getMovie($slag = FALSE)
    {
        if ($slag === FALSE) 
        {
            $query = $this->db->get('movie');
            return $query->result_array();
        }

        $query = $this->db->get_where('movie', array('slag' => $slag ));
        return $query->row_array();
    }
    
    public function setMovie( $slag, $name, $descriptions, $year, $rating )
    {
        $data = array(
            'name' => $name,
            'slag' => $slag,
            'descriptions' => $descriptions,
            'year' => $year,
            'rating' => $rating
        );
        return $this->db->insert( 'movie', $data );
    }

    public function updateMovie( $slag, $name, $descriptions, $year, $rating )
    {
        $data = array(
            'name' => $name,
            'slag' => $slag,
            'descriptions' => $descriptions,
            'year' => $year,
            'rating' => $rating
        );
        return $this->db->update( 'movie', $data, array( 'slag' => $slag) );

    }

    public function deleteMovie($slag){
        return $this->db->delete( 'movie', array( 'slag' =>$slag ) );
    }

    public function getFilms($slag = FALSE, $limit, $type = 1)
    {
        if($slag === FALSE){
            $query = $this->db
                ->where('category_id', $type)
                ->order_by('add_date', 'desc')
                ->limit($limit)
                ->get('movie');
            return $query->result_array();
        }

        $query = $this->db->get_where('movie', array('slag'=>$slag));
        return $query->row_array();
    }

    
    public function getFilmsByRating($limit)
    {
        $query = $this->db
            ->order_by('rating', 'desc')
            ->where('category_id', 1)
            ->where('rating>', 0)
            ->limit($limit)
            ->get('movie');

        return $query->result_array();
    }

    public function getMoviesOnePage($row_count, $offset, $type = 1)
    {
        $query = $this->db
            ->where('category_id', $type)
            ->order_by('add_date', 'desc')
            ->get('movie', $row_count, $offset);

        return $query->result_array();
    }

    public function getMoviesOnPageByRating($row_count, $offset) {
        $query = $this->db
            ->where('category_id', 1)
            ->where('rating>', 0)
            ->order_by('rating', 'desc')
            ->get('movie', $row_count, $offset);
        return $query->result_array();
    }
}