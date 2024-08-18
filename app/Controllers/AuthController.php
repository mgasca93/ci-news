<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    private $session = NULL;

    public function __construct()
    {
        $this->session = service('session');
    }

    public function index()
    {
        helper('form');
        $data['title'] = 'Login';
        return  view( 'templates/header', $data )
                . view( 'auth/login' )
                . view( 'templates/footer' );
    }

    public function authenticate()
    {
        $model          = model( UsersModel::class );

        $data           = $this->request->getPost(['email', 'password']);
        $validations    = [
            'email'     => 'required|valid_email',
            'password'  => 'required|min_length[8]|max_length[20]'
        ];

        if( ! $this->validateData( $data, $validations ) ) :
            return $this->index();
        endif;

        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');

        $user = $model->where(['email'  => $email])->first();

        if( $user ) :
            if( password_verify( $password, $user['password'] ) ) :
                $sessionData = [
                    'id'            => $user['id'],
                    'email'         => $user['email'],
                    'name'          => $user['name'],
                    'last_name'     => $user['last_name'],
                    'logged_in'     => TRUE
                ];

                $this->session->set( $sessionData );
                return redirect()->to('/news');
            else :
                $this->session->setFlashdata('message', 'Password is incorrect');
                return $this->index();
            endif;
        else :
            $this->session->setFlashdata('message', 'User not find');
            return $this->index();
        endif;
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->route('login_form');
    }
}
