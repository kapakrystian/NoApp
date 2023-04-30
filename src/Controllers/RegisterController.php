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
            $name_surname = trim($_POST["name_surname"]);
            $phone = trim($_POST["phone"]);

            if (empty($username) || empty($email) || empty($password) || empty($name_surname) || empty($phone)) {
                $error_message = "Wypełnij wszystkie pola";
            } else {
                if ($this->registerModel->registerUser($username, $email, $password, $name_surname, $phone)) {
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
