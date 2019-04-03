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
        $this->data['slag'] = $this->data['posts_item']['slag'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('posts/view', $this->data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        if (!$this->dx_auth->is_admin()) {
            show_404();
        }

        $this->data['title'] = "Добавить статью";

        if($this->input->post('slag') && $this->input->post('title') && $this->input->post('text'))
        {
            $slag = $this->input->post('slag');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if($this->posts_model->setPosts($slag, $title, $text))
            {
                $this->data['title'] = "Статья добавлена";
                $this->load->view('templates/header', $this->data);
                $this->load->view('posts/created');
                $this->load->view('templates/footer');
            }
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('posts/create', $this->data);
        $this->load->view('templates/footer');
    }

    public function edit($slag = NULL)
    {
        if (!$this->dx_auth->is_admin()) {
            show_404();
        }

        $this->data['title'] = "Редоктировать статью";
        $this->data['posts_item'] = $this->posts_model->getPosts($slag);

        if (empty($this->data['posts_item'])) {
            show_404();
        }

        $this->data['id_posts'] = $this->data['posts_item']['id'];
        $this->data['title_posts'] = $this->data['posts_item']['title'];
        $this->data['text_posts'] = $this->data['posts_item']['text'];
        $this->data['slag_posts'] = $this->data['posts_item']['slag'];

        if($this->input->post('slag') && $this->input->post('title') && $this->input->post('text'))
        {
            $id = $this->data['posts_item']['id'];
            $slag = $this->input->post('slag');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if($this->posts_model->updatePosts($slag, $title, $text))
            {
                $this->data['title'] = 'Успешно обновлено';
                $this->load->view('templates/header', $this->data);
                $this->load->view('posts/edited');
                $this->load->view('templates/footer');
            }
        }
        else {
            $this->load->view('templates/header', $this->data);
            $this->load->view('posts/edit', $this->data);
            $this->load->view('templates/footer');
        }
    }

    public function delete($slag = NULL)
    {
        if (!$this->dx_auth->is_admin()) {
            show_404();
        }

        $this->data['posts_delete'] = $this->posts_model->getPosts($slag);

        $this->data['title'] = "Удалить пост";
        $this->data['result'] = "".$this->data['posts_delete']['title'];

        if($this->posts_model->deletePosts($slag))
        {
            $this->data['result'] = $this->data['posts_delete']['title']." успешно удален";
        }
        $this->load->view('templates/header', $this->data);
        $this->load->view('posts/delete', $this->data);
        $this->load->view('templates/footer');

    }

}