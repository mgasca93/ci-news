<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);
        $data = [
            'news_list'     => $model->getNews(),
            'title'         => 'News archive'
        ];

        return    view( 'templates/header', $data)
                . view( 'news/index', $data )
                . view( 'templates/footer');
    }

    public function show(?string $slug = NULL)
    {
        $model = model(NewsModel::class);
        $data['news']   = $model->getNews( $slug );     
        
        if( $data['news'] === NULL ) :
            throw new PageNotFoundException( 'Can not find the news item: ' . $slug );
        endif;
        $data['title'] = $data['news']['title'];

        return      view( 'templates/header', $data )
                  . view( 'news/show', $data )
                  . view( 'templates/footer');
    }
}
