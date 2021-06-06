<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function index()
    {       
        $data = [
            'title' => 'Home Page',
        ];
        $this->view('pages/index', $data);
    }
    public function about()
    {
        $this->view('pages/about');
    }
    public function test(){
        $users = $this->userModel->getUsers();
        $data = [
            'users' => $users
        ];
        $this->view('pages/test',$data);
    }
    public function projects()
    {
        $data = [
            'numberError' => '',
            'result'=> '',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'number' => $_POST['number'],
                'numberError' => '',
                'result' => '',
            ];
            if (empty($data['number'])) {
                $data['numberError'] = "Number cannot be blank";
            }
            $access_key = '9a0fa759fed6691d3e465a951e2f1df6';
            $url = 'http://apilayer.net/api/validate?access_key=' . $access_key . '&number=' . $data['number'] . '&country_code=IN&format=1';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
            $result = curl_exec($ch);
            $err = curl_error($ch);
            curl_close($ch);            
            $data['result'] = $result;
            $this->view('pages/projects', $data);
        }
        $this->view('pages/projects', $data);
    }
}
