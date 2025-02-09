<?php

class Model_Login extends Model {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "POST method is required";
            exit;
        }

        // Retrieve form data
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        // Trim and sanitize input to prevent malicious input
        $email = trim($email);
        $password = trim($password);

    
        // Validate input (basic example)
        if (empty($email) || empty($password)) {
            echo "Both username and password are required.";
            exit;    
        }

        $findedUser = $GLOBALS['pdo']->query('SELECT `id`, `email`, `name`, `password` FROM `users` WHERE `email` = "' . $email . '"');
        $findedUser = $findedUser->fetch();

        if (empty($findedUser) || $password !== $findedUser['password']) {
          return "Error of authorization"; // TODO: Figure out with throw error
        }


        // TOSO: Write cookie authorisation

        // Perform authentication logic here
        // For example, check against a database
        if ($email === 'admin' && $password === 'password123') {
            echo "Login successful!";
        } else {
            echo "Invalid credentials.";
        }
    }
}
