<?php

/**
 * Class Problem
 *
 * Manage unintended links to non existing pages
 */
class Problem extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // unique title of the page that will be displayed on the title bar
        $pageTitle = 'Error 404';

        require APP . 'view/_templates/session.php';
        require APP . 'view/problem/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/problem/sidebar.php';
        require APP . 'view/problem/index.php';
        require APP . 'view/problem/script.php';
        require APP . 'view/_templates/footer.php';
    }
}
