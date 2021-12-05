<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_foreign_to_news extends CI_Migration
{
    public function up()
    {
        // $this->load->database();
        // this->db->query('ALTER TABLE `news` ADD FOREIGN KEY(`blog_id`) REFERENCES 'blog'(`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE;');
        $this->db->query("ALTER TABLE news ADD blog_id INT NULL");
        $ this -> dbforge -> add_key ( 'blog_id' ,  TRUE ); 
        // $this->dbforge->add_column('news',[
        //     'CONSTRAINT fk_id FOREIGN KEY(blog_id) REFERENCES blog(blog_id)',
        // ]);
    }

    public function down()
    {
        $this->dbforge->drop_column('blog');
    }
}
