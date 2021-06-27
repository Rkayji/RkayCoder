<?php

class Demo extends Controller
{
    public function __construct()
    {
        $this->demoModel = $this->model('DemoModel');
    }

    public function index()
    {
        // smtp_mailer('mrrkayj86@gmail.com', 'test from server', 'This is testing from server');
        $model = new DemoModel();
        $mail = $model->smtp_mailer('mrrkayj86@gmail.com', 'test from server', 'This is testing from server');
        if($mail)
        $return = 'Mail sent successfully.';
        else
        $return = 'Mail sent error (enable debug to see error)';
        $data = [
            'test' => "test demo",
            'returns' => $return
        ];   
        $this->view('demo/index',$data);
    }
}
