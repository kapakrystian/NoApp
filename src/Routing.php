<?php

namespace App;

class Routing
{
    public static function execute()
    {
        $controllerName = 'Login'; // domyślny kontroler
        $actionName = 'index'; // domyślna akcja


        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // usunięcie ewentualnego znaku zapytania
        $pos = strpos($requestUri, '?');
        if ($pos !== false) {
            $requestUri = substr($requestUri, 0, $pos);
        }

        // podzielenie request URI na człony
        $uriParts = explode('/', trim($requestUri, '/'));

        // jeśli pierwszy człon jest nazwą kontrolera, to go ustaw
        if (!empty($uriParts[0])) {
            $controllerName = ucfirst($uriParts[0]);
        }

        // jeśli drugi człon jest nazwą akcji, to ją ustaw
        if (!empty($uriParts[1])) {
            $actionName = strtolower($uriParts[1]);
        }

        // dodanie sufixów
        $controllerName .= 'Controller';
        $actionName .= 'Action';
        // sprawdzenie czy użytkownik jest zalogowany
        session_start();
        $loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

        // jeśli użytkownik nie jest zalogowany i próbuje dostać się do innej strony niż login lub register,
        // to zostaje przekierowany na strone logowania
        if (!$loggedIn && $controllerName !== 'LoginController' && $controllerName !== 'RegisterController') {
            $controllerName = 'LoginController';
            $actionName = 'indexAction';
        }

        // ładowanie kontrolera
        $controllerFileName = __DIR__ . '/Controllers/' . $controllerName . '.php';
        if (file_exists($controllerFileName)) {
            require_once($controllerFileName);
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            exit();
        }

        $controllerName = 'App\Controllers\\' . $controllerName;

        // tworzenie kontrolera i wywoływanie akcji
        $controller = new $controllerName();
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            exit();
        }
    }
}
