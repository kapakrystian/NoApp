<?php

namespace App\Controllers;

class LoginController extends Controller
{
    public function indexAction()
    {
        // jeśli użytkownik jest już zalogowany, przekieruj na inną stronę
        if (isset($_SESSION['logged_in'])) {
            $this->request->redirect('dashboard');
        }

        // sprawdź czy został przesłany formularz logowania
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $checkingUser = $this->loginModel->checkUser($_POST['username'], $_POST['password']);

            if ($checkingUser) {
                $_SESSION['user_id'] = $checkingUser[0]->id;
                $_SESSION['user_name'] = $checkingUser[0]->username;
                $_SESSION['logged_in'] = true;
                $_SESSION['permissions'] = $checkingUser[0]->permissions;

                $this->request->redirect('dashboard');
            }

            $this->view->render('login', ['error' => 'Nie działa']);
        }

        // jeśli nie został przesłany formularz, wyświetl formularz logowania
        $this->view->render('login');
    }
}
