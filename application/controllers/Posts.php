<?php

defined('BASEPATH') OR exit('No direc script access allowd');

class Posts extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
    }

    public function index()
    {
        $this->date['title'] = "Блог";

        $this->data['posts'] = $this->posts_model->getPosts();

        $this->load->view('templates/header', $this->data);
        $this->load->view('posts/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function view($slag = NULL)
    {
        $this->data['posts_item'] = $this->posts_model->getPosts($slag);

        if (empty($this->data['posts_item'])) {
            show_404();
        }

        $this->data['title'] = $this->data['posts_item']['title'];
        $this->data['text'] = $this->data['posts_item']['text'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('posts/view', $this->data);
        $this->load->view('templates/footer');
    }

}