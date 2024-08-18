<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class News extends Seeder
{
    protected $notices = [
        1   => [
            'title' => 'Elvis sighted',
            'slug'  => 'elvis-sighted',
            'body'  => 'Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.',
        ],
        2   => [
            'title' => 'Say it isn\'t so!',
            'slug'  => 'say-it-isnt-so',
            'body'  => 'Scientists conclude that some programmers have a sense of humor.'
        ],
        3   => [
            'title' => 'Caffeination, Yes!',
            'slug'  => 'caffeination-yes',
            'body'  => 'World\'s largest coffee shop open onsite nested coffee shop for staff only.'
        ],
    ];
    public function run()
    {
        foreach( $this->notices as $notice ) :
            $this->db->table('news')->insert( $notice );
        endforeach;
    }
}
