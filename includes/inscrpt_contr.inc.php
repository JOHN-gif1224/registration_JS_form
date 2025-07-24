<?php

declare(strict_types=1);

function is_input_empty(string $lastName, string $firstName, string $email, string $mot_passe, string $mot_passe_confirmation) {
    if (empty($lastName) || empty($firstName) || empty($email) ||
        empty($mot_passe) || empty($mot_passe_confirmation)) {
            return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
    
}

function is_firstName_taken(object $pdo, string $firstName) {
    if (get_firstName( $pdo, $firstName)) {
        return true;
    } else {
        return false;
    }
    
}

function is_lastName_taken(object $pdo, string $lastName) {
    if (get_lastName( $pdo, $lastName)) {
        return true;
    } else {
        return false;
    }
    
}

function is_mot_passe_taken(object $pdo, string $mot_passe) {
    if (get_lastName( $pdo, $mot_passe)) {
        return true;
    } else {
        return false;
    }
    
}

function is_email_registered(object $pdo, string $email) {
    if (get_email( $pdo,  $email)) {
        return true;
    } else {
        return false;
    }
    
}

function create_user(object $pdo, string $lastName, string $firstName, string $email,  $mot_passe) {
    set_user( $pdo,  $lastName,  $firstName,  $email,  $mot_passe);
}

