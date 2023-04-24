<?php

declare(strict_types=1);

namespace NoApp;


class Validator
{

    //funkcja sprawdzająca wypełnienie wszystkich pól formularza
    public function checkEmptyFields(array $requiredFields): ?array
    {

        $formErrors = [];

        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || $_POST[$field] == NULL) {
                $formErrors[] = $field . ' - to pole jest wymagane';
            }
        }
        return $formErrors;
    }

    //funkcja sprawdzająca wymaganą ilość znaków w polu
    public function checkLength(array $fieldToCheck): ?array
    {
        $formErrors = [];

        foreach ($fieldToCheck as $field => $minLength) {
            if (strlen(trim($_POST[$field])) < $minLength) {
                $formErrors[] = $field . " - zbyt krótkie, wymagana ilość znaków: {$minLength}";
            }
        }
        return $formErrors;
    }

    //funkcja walidująca pole adresu mailowego
    public function checkEmail(array $data): ?array
    {
        $formErrors = [];
        $key = 'email';

        if (array_key_exists($key, $data)) {

            if ($_POST[$key] != null) {
                $key = filter_var($key, FILTER_SANITIZE_EMAIL);

                if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false) {
                    $formErrors[] = $key . " - podany adres email jest nieprawidłowy";
                }
            }
        }
        return $formErrors;
    }

    //funkcja pokazująca błędy
    public function showErrors(array $formErrorsArray): ?string
    {
        $errors = "<p><ul style='color: red;'>";

        foreach ($formErrorsArray as $error) {
            $errors .= "<li> {$error} </li>";
        }
        $errors .= "</ul></p>";
        return $errors;
    }

    // funkcja walidująca pole kodu pocztowego
    public function checkPostalCode(array $data)
    {
        $formErrors = [];
        $key = $data['postalCode'];
        $postalCodeRegex = '/^[0-9]{2}-[0-9]{3}$/';

        if (!preg_match($postalCodeRegex, $key)) {
            $formErrors[] = $key . " - podany kod pocztowy jest nieprawidłowy";
        }

        return $formErrors;
    }
}
