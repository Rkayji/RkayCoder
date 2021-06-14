<?php
class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            $nameValidation = '/^[a-zA-Z0-9]*$/';
            $passwordValidation = '/^(.{0,7}|[^a-z]*|[^\d]*)$/i';

            // validate username on latters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = "Please enter username.";
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = "Name can only contains latters and numbers.";
            }

            // validate email
            if (empty($data['email'])) {
                $data['emailError'] = "Please enter email address.";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "Please enter correct format.";
            } else {
                // check if email exists
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = "Email is already Taken.";
                }
            }

            // password validation on length and numeric values
            if (empty($data['password'])) {
                $data['passwordError'] = "Please enter password.";
            } elseif (strlen($data['password'] < 6)) {
                $data['passwordError'] = "Please must be atleast 8 characters.";
            } elseif (!preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = "Password must have atleast one numeric value.";
            }

            // Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = "Please enter Confirm Password.";
            } else {
                if ($data['confirmPassword'] != $data['password']) {
                    $data['confirmPasswordError'] = "Passwords do not match, please try again.";
                }
            }

            // make sures errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                //  password hash
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // register user from model function
                if ($this->userModel->register($data)) {
                    // Redirect to the user login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Users Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        // check Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];

            // Validate Username
            if (empty($data['username'])) {
                $data['usernameError'] = "Please enter a username";
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['passwordError'] = "Please enter a password";
            }

            // check if all variables are empty
            if (empty($data['username'] && empty($data['password']))) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or Username is incorrect. Please try again.';
                    $this->view('users/login', $data);
                }
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }

        $this->view('users/login', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->user_name;
        $_SESSION['email'] = $user->user_email;
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:' . URLROOT.'/users/login');
    }
}
