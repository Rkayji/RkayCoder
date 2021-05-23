<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (user_id,user_name,user_email,password,created_on) VALUES (:uniqe_id,:username,:email,:password,:date)');
        $uniqu_id = uniqid('', true);
        // Bind Values
        $this->db->bind(':uniqe_id', $uniqu_id);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':date', date('Y-m-d h:i:s'));

        // Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE user_name = :username');

        // bind the Values
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    // find user by email . Email is passed in by the Controller.
    public function findUserByEmail($email)
    {
        // prepared statement
        $this->db->query("SELECT * FROM users WHERE email = :email");

        // Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        // check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        $result = $this->db->resultSet();
        return $result;
    }
}
