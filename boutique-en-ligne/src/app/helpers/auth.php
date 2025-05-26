<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Waiting for the backoffice and user profile pages to be implemented
// before enabling route protection (requireLogin / requireAdmin)

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}


function isAdmin()
{
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
}


function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: /boutique-en-ligne/login');
        exit;
    }
}


function requireAdmin()
{
    if (!isAdmin()) {
        header('Location: /boutique-en-ligne/profile');
        exit;
    }
}
