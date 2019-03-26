<?php

defined('BASEPATH') OR exit('No direc script access allowd');

class Movie extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('films_model');
    }

    public function type($slag = NULL)
    {
        $this->data['movie_data'] = null;

        if($slag=="films"){
            $this->data['title'] = "Фильмы";
            $this->data['movie_data'] = $this->films_model->getFilms(false, 10, 1);
        }

        if($slag=="serials"){
            $this->data['title'] = "Сериалы";
            $this->data['movie_data'] = $this->films_model->getFilms(false, 10, 2);
        }


        if($this->data['movie_data'] == null)
        {
            show_404();
        }

        /*  $this->data['title'] = 'Все Фильмы';
            $this->data['movie'] = $this->films_model->getMovie();
        */
        $this->load->view('templates/header', $this->data);
        $this->load->view('movie/type', $this->data);
        $this->load->view('templates/footer');
    }

    public function view($slag = NULL)
    {
        $movie_slag = $this->films_model->getFilms($slag, false, false);


        if(empty($movie_slag))
        {
            show_404();
        }

        $this->data['title'] = $movie_slag['name'];
        $this->data['name'] = $movie_slag['name'];
        $this->data['descriptions'] = $movie_slag['descriptions'];
        $this->data['player_code'] = $movie_slag['player_code'];
        $this->data['year'] = $movie_slag['year'];
        $this->data['poster'] = $movie_slag['poster'];
        $this->data['rating'] = $movie_slag['rating'];


        $this->data['movie'] = $this->films_model->getMovie();

        $this->load->view('templates/header', $this->data);
        $this->load->view('movie/view', $this->data);
        $this->load->view('templates/footer');
    }


    public function create()
    {
        $this->data['title'] = "Добавить фильм/сериал";
        
        if($this->input->post('slag') && $this->input->post('name') && $this->input->post('descriptions') && $this->input->post('year') && $this->input->post('rating') )
        {
            $slag = $this->input->post('slag');
            $name = $this->input->post('name');
            $descriptions = $this->input->post('descriptions');
            $year = $this->input->post('year');
            $rating = $this->input->post('rating');

            if($this->films_model->setMovie($slag, $name, $descriptions, $year, $rating))
            {
                $this->load->view('templates/header', $this->data);
                $this->load->view('movie/success', $this->data);
                $this->load->view('templates/footer');
            }
        }
        $this->load->view('templates/header', $this->data);
        $this->load->view('movie/create', $this->data);
        $this->load->view('templates/footer');
    }

    public function edit($slag = NULL)
    {

        $this->data['movie_item'] = $this->films_model->getMovie($slag);

        //$this->data['title'] = $this->data['movie_item']['name'];
        $this->data['name_item'] = $this->data['movie_item']['name'];
        $this->data['slag_item'] = $this->data['movie_item']['slag'];
        $this->data['descriptions_item'] = $this->data['movie_item']['descriptions'];
        $this->data['year_item'] = $this->data['movie_item']['year'];
        $this->data['poster_item'] = $this->data['movie_item']['poster'];
        $this->data['rating_item'] = $this->data['movie_item']['rating'];
        
        $this->data['title'] = "Редоктировать " .$this->data['movie_item']['name'];

        if($this->input->post('slag') && $this->input->post('name') && $this->input->post('descriptions') && $this->input->post('year') && $this->input->post('rating') )
        {
            $slag = $this->input->post('slag');
            $name = $this->input->post('name');
            $descriptions = $this->input->post('descriptions');
            $year = $this->input->post('year');
            $rating = $this->input->post('rating');

            if($this->films_model->updateMovie($slag, $name, $descriptions, $year, $rating))
            {
                echo 'Видео успешно отредоктировано';
            }
        }
        $this->load->view('templates/header', $this->data);
        $this->load->view('movie/edit', $this->data);
        $this->load->view('templates/footer');
    }

    public function delete($slag = NULL)
    {
        $this->data['movie_delete'] = $this->films_model->getMovie($slag);

        if(empty($this->data['movie_delete']))
        {
            show_404();
        }

        $this->data['title'] = "удалить видео";
        $this->data['result'] = "Ошибка удаления". $this->data['movie_delete']['name'];

        if($this->films_model->deleteMovie($slag))
        {
            $this->data['tesult'] = $this->data['movie_delete']['name']. " Успешно удалена";
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('movie/delete', $this->data);
        $this->load->view('templates/footer');
    }

}