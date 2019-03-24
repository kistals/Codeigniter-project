<?php

defined('BASEPATH') OR exit('No direc script access allowd');

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('news_model');
    }

    public function index()
    {
        $data['title'] = 'Все новости';
        $data['news'] = $this->news_model->getNews();

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');

    }

    public function view($slag = NULL)
    {
        $data['news_item'] = $this->news_model->getNews($slag);

        if(empty($data['news_item'])){
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $data['content'] = $data['news_item']['text'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = "Добавить новость";

        if($this->input->post('slag') && $this->input->post('title') && $this->input->post('text'))
        {
            $slag = $this->input->post('slag');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if ($this->news_model->setNews($slag,$title,$text)) 
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/success', $data);
                $this->load->view('templates/footer');
            }
        }


        $this->load->view('templates/header', $data);
        $this->load->view('news/create', $data);
        $this->load->view('templates/footer');
    }

    public function edit($slag = NULL)
    {
        $data['news_item'] = $this->news_model->getNews($slag);

        $data['title_news'] = $data['news_item']['title'];
        $data['content_news'] = $data['news_item']['text'];
        $data['slag_news'] = $data['news_item']['slag'];

        $data['title'] = "Редоктировать " .$data['news_item']['title'];
/*

        if(empty($data['news_item'])){
            show_404();
        }
*/
        if($this->input->post('slag') && $this->input->post('title') && $this->input->post('text'))
        {
            $slag = $this->input->post('slag');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if($this->news_model->updateNews($slag, $title, $text))
            {
                echo 'Новость успешна отредоктирована';
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($slag = NULL)
    {
        $data['news'] = $this->news_model->getNews($slag);

        if(empty($data['news'])){
            show_404();
        }

        $data['title'] = "удалить новость";
        $data['result'] = "Ошибка удаления". $data['news']['title'];

        if($this->news_model->deleteNews($slag)) 
        {
            $data['result'] = $data['news']['title']." Успешно удалена";
        }

        $this->load->view('templates/header', $data);
        $this->load->view('news/delete', $data);
        $this->load->view('templates/footer');
    }
}