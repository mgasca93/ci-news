<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class News extends Seeder
{
    protected $notices = [];
    public function run()
    {
        helper('date');
        $this->notices = [
            1   => [
                'title'         => 'Elvis sighted',
                'slug'          => 'elvis-sighted',
                'body'          => 'Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.',
                'created_at'    => date('Y-m-d H:i:s', now()),
                'updated_at'    => date('Y-m-d H:i:s', now()),
            ],
            2   => [
                'title'         => 'Say it isn\'t so!',
                'slug'          => 'say-it-isnt-so',
                'body'          => 'Scientists conclude that some programmers have a sense of humor.',
                'created_at'    => date('Y-m-d H:i:s', now()),
                'updated_at'    => date('Y-m-d H:i:s', now()),
            ],
            3   => [
                'title'         => 'Caffeination, Yes!',
                'slug'          => 'caffeination-yes',
                'body'          => 'World\'s largest coffee shop open onsite nested coffee shop for staff only.',
                'created_at'    => date('Y-m-d H:i:s', now()),
                'updated_at'    => date('Y-m-d H:i:s', now()),
            ],
        ];

        
        foreach( $this->notices as $notice ) :
            $this->db->table('news')->insert( $notice );
        endforeach;
    }
}
