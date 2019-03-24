<?php

defined('BASEPATH') OR exit('No direc script access allowd');

class News extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();        
        $this->load->model('news_model');
    }

    public function index()
    {
        $this->data['title'] = 'Все новости';
        $this->data['news'] = $this->news_model->getNews();

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/index', $this->data);
        $this->load->view('templates/footer');

    }

    public function view($slag = NULL)
    {
        $this->data['news_item'] = $this->news_model->getNews($slag);

        if(empty($this->data['news_item'])){
            show_404();
        }

        $this->data['title'] = $this->data['news_item']['title'];
        $this->data['content'] = $this->data['news_item']['text'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/view', $this->data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->data['title'] = "Добавить новость";

        if($this->input->post('slag') && $this->input->post('title') && $this->input->post('text'))
        {
            $slag = $this->input->post('slag');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if ($this->news_model->setNews($slag,$title,$text)) 
            {
                $this->load->view('templates/header', $this->data);
                $this->load->view('news/success', $this->data);
                $this->load->view('templates/footer');
            }
        }


        $this->load->view('templates/header', $this->data);
        $this->load->view('news/create', $this->data);
        $this->load->view('templates/footer');
    }

    public function edit($slag = NULL)
    {
        $this->data['news_item'] = $this->news_model->getNews($slag);

        $this->data['title_news'] = $this->data['news_item']['title'];
        $this->data['content_news'] = $this->data['news_item']['text'];
        $this->data['slag_news'] = $this->data['news_item']['slag'];

        $this->data['title'] = "Редоктировать " .$this->data['news_item']['title'];
/*

        if(empty($this->data['news_item'])){
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

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/edit', $this->data);
        $this->load->view('templates/footer');
    }

    public function delete($slag = NULL)
    {
        $this->data['news_delete'] = $this->news_model->getNews($slag);

        if(empty($this->data['news_delete'])){
            show_404();
        }

        $this->data['title'] = "удалить новость";
        $this->data['result'] = "Ошибка удаления". $this->data['news_delete']['title'];

        if($this->news_model->deleteNews($slag)) 
        {
            $this->data['result'] = $this->data['news_delete']['title']." Успешно удалена";
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/delete', $this->data);
        $this->load->view('templates/footer');
    }
}