<?php
class Users extends Controller {

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login(){
        $data = [
            'title' => 'Users Login page',
            'usernameError' => '',
            'passwordError' => ''
        ];
        return $this->view('users/login',$data);
    }
}