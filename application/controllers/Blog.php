<?php
defined('BASEPATH') OR exit('No direc script access allowed');

class Blog extends CI_Controller
{
   public function __construct()
   {
       parent::__construct();
       $this->load->model('BlogModel');//Подгружаем модель таким образом
       $this->load->database();
   }

   public function index()
   {
       $data['title'] = 'Все новости Блога!!!';
       $data['blognews'] = $this->BlogModel->getBlogsNews();  //Обращаемся к методу getnews из модели MewsModel

       $this->load->view('templates/header', $data);
       $this->load->view('blog/index', $data);
       $this->load->view('templates/footer');
   }

    public function blogitems($blog_id)
    {
        //даем переенной массив из новостей(ищем через блог)
        $data['blognews'] = $this->BlogModel-> getOneBlogNews($blog_id);
        if(empty($data['blognews']) ){
            echo "Этот блог еще не создан или у него нет записей";
        }else{
            $data['title'] = $data['blognews']['title'];
            $data['content'] = $data['blognews']['text'];
            $this->load->view('templates/header');
            $this->load->view('blog/blogitems', $data);
            $this->load->view('templates/footer');
        }

        // if (in_array('blog_id', 'check')){
        //     $data['blognews'] = $this->BlogModel-> getOneBlogNews($blog_id);
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('blog/blogitems', $data);
        //     $this->load->view('templates/footer');
        //   }else{
        //     echo "RWKNGKLRENGNREKLGss";
        // }
    }
}
