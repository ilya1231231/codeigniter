 <?php
 defined('BASEPATH') OR exit('No direc script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NewsModel');//Подгружаем модель таким образом
    }

    public function index()
    {
        $data['title'] = 'Все новости2';
        $data['news'] = $this->NewsModel->getNews();  //Обращаемся к методу getnews из модели MewsModel

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $data['news_item'] = $this->NewsModel->getNews($slug);

        if(empty($data['news_item']) ){
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $data['content'] = $data['news_item']['text'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
}
