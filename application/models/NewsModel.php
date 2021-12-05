<?php

class NewsModel extends CI_Model
{
  public function __construct()
  {
      $this->load->database(); //Загрузили из фреймворка базу данных
  }

  public function getNews($slug = FALSE)
  {
      //Если слага не существует ,то возвращаем все новости
      if($slug === FALSE){
          $query = $this->db->get('news');
          return $query->result_array();
      }
      //Если слаг существует  
      $query = $this->db->get_where('news', array('slug' => $slug));
      return $query->row_array();
  }

}
