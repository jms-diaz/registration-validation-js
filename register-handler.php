<?php
$errors = array();

$username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

function sanitizeEmail($email, &$errors) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
        return $errors[] = 'Empty email or incorrect format';
    } else {
        return $email;
    }
}

echo sanitizeEmail($email, $errors[]);
