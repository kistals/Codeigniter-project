<?php

defined('BASEPATH') OR exit('No direc script access allowd');

class Main extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Главная страница";
        

        $this->load->model('films_model');
        $this->data['movie'] = $this->films_model->getFilms(false, 8, 1);

        $this->load->model('films_model');
        $this->data['serials'] = $this->films_model->getFilms(false, 4, 2);

        $this->load->view('templates/header', $this->data);
        $this->load->view('main/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function rating()
    {
        $this->data['title'] = "Рейтинг фильмов";

        $this->load->library('pagination');                                     						//pagination
        $offset = (int) $this->uri->segment(2);															//pagination
        $row_count = 5;																					//pagination
        $count = count($this->films_model->getMoviesOnPageByRating(0, 0));								//pagination
        $p_config['base_url'] = '/rating';																//pagination
        $this->data['movie'] = $this->films_model->getMoviesOnPageByRating($row_count, $offset);		//pagination

        //pagination config
        $p_config['total_rows'] = $count;
        $p_config['per_page'] = $row_count;

        //pagination bootstrap
        $p_config['full_tag_open'] = "<ul class='pagination'>";
        $p_config['full_tag_close'] ="</ul>";
        $p_config['num_tag_open'] = '<li>';
        $p_config['num_tag_close'] = '</li>';
        $p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $p_config['next_tag_open'] = "<li>";
        $p_config['next_tagl_close'] = "</li>";
        $p_config['prev_tag_open'] = "<li>";
        $p_config['prev_tagl_close'] = "</li>";
        $p_config['first_tag_open'] = "<li>";
        $p_config['first_tagl_close'] = "</li>";
        $p_config['last_tag_open'] = "<li>";
        $p_config['last_tagl_close'] = "</li>";

        //init pagination
        $this->pagination->initialize($p_config);
        $this->data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $this->data);
        $this->load->view('main/rating', $this->data);
        $this->load->view('templates/footer');
    }
}