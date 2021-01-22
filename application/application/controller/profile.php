<?php

/**
 * Class Profile
 *
 * Display user profile information upon successful log in
 */
class Profile extends Controller
{
    /**
     * PAGE: index
     * Display information about the user
     */
    public function index()
    {
        // unique title of the page that will be displayed on the title bar
        $pageTitle = 'User Profile';

        require APP . 'view/_templates/session.php';
        require APP . 'view/profile/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/profile/sidebar.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/profile/script.php';
        require APP . 'view/_templates/footer.php';
    }
}
