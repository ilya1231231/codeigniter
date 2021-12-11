<?php

class BlogModel extends CI_Model
{
  public function __construct()
  {
      $this->load->database(); //Загрузили из фреймворка базу данных
  }

  public function getBlogsNews()
  {
      $query = $this->db->get_where('news', array('blog_id' => 1));
      return $query->row_array();
  }

  public function getOneBlogNews($blog_id)
  {
      $query = $this->db->get_where('news', array('blog_id' => $blog_id));
      return $query->row_array();
  }

  public function getIdBlogs()
  {
      return $this->db->get('blog', 'blog_id')->row_array();
  }

}
