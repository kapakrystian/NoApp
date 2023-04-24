<?php

namespace App\Controllers;

class RegisterController extends Controller
{
    public function indexAction()
    {
        // jeśli użytkownik jest już zalogowany, przekieruj na inną stronę
        if (isset($_SESSION['logged_in'])) {
            $this->request->redirect('dashboard');
        }

        $this->view->render('signup');
    }

    public function createAction()
    {
        $error_message = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST["username"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);

            if (empty($username) || empty($email) || empty($password)) {
                $error_message = "Wypełnij wszystkie pola";
            } else {
                if ($this->registerModel->registerUser($username, $email, $password)) {
                    $this->request->redirect('login');

                    exit();
                } else {
                    $error_message = 'Rejestracja nie powiodła się. Spróbuj ponownie';
                }
            }
            return $error_message;
        }
        $this->view->render('signup');
    }
}
