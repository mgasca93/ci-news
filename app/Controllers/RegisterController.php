<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \App\Models\UsersModel;

class RegisterController extends BaseController
{
    private $session = NULL;

    public function __construct()
    {
        $this->session = service('session');
    }

    public function index()
    {
        helper('form');
        $data = [
            'title' => 'Register Page',
        ];
        return      view( 'templates/header', $data )
                   . view( 'auth/register' )
                   . view( 'templates/footer' );
    }

    public function authenticate()
    {
        $data = $this->request->getPost(['name', 'last_name', 'email', 'password', 'password_confirm']);        
        $validations = [
            'name'              => 'required',
            'last_name'         => 'required',
            'email'             => 'required|valid_email|is_unique[users.email]',
            'password'          => 'required|min_length[8]|max_length[255]',
            'password_confirm'  => 'required|matches[password]',
        ];

        if( !$this->validateData( $data, $validations ) ) :
            return $this->index();
        endif;
        
        $model = new UsersModel();
        $data = [
            'name'      => $this->request->getPost('name'),
            'last_name' => $this->request->getPost('last_name'),
            'email'     => $this->request->getPost('email'),
            'password'  => $this->request->getPost('password'),
        ];
        if( $model->insert( $data ) ) :
            $userID = $model->getInsertID();

            $sessionData = [
                'id'            => $userID,
                'name'          => $this->request->getPost('name'),
                'last_name'     => $this->request->getPost('last_name'),
                'email'         => $this->request->getPost('email'),
                'logged_in'     => TRUE,
            ];
            $this->session->set( $sessionData );
            return redirect()->to('/news');
        endif;
           
        $this->session->setFlashdata('error', 'Registration user failed, try again later');
        return redirect()->route('register_form');
    }
}
