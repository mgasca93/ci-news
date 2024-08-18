<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;

class News extends BaseController
{

    private $session = NULL;

    public function __construct()
    {
        $this->session = service('session');
    }

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

    public function create()
    {
        helper('form');
        $data['title'] = 'Create news item';
        return    view( 'templates/header', $data )
                . view( 'news/create' )
                . view( 'templates/footer');
    }

    public function store()
    {       

        $data = $this->request->getPost(['title', 'body']);

        $validations = [
            'title'     => 'required|max_length[255]|min_length[3]|is_unique[news.title]',
            'body'      => 'required|max_length[5000]|min_length[10]'
        ];

        if( ! $this->validateData( $data, $validations ) ) :
            return $this->create();
        endif;

        /**
         * Get the validate data
         */
        $post = $this->validator->getValidated();
        $post['slug'] = strtolower( url_title($post['title'] ) );

        $model = model( NewsModel::class );

        $model->save($post);
        $this->session->setFlashdata('success','News created with success');

        return $this->create();
    }
}
