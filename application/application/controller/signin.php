<?php

/**
 * Class SignIn
 *
 * Manage user log in and log out
 *
 */
class SignIn extends Controller
{

    /**
     * PAGE: index
     * This is the default page used when sigining in
     */
    public function index()
    {
        // unique title of the page that will be displayed on the title bar
        $pageTitle = 'IS Evaluation Test';

        require APP . 'view/signin/header.php';
        require APP . 'view/signin/index.php';
        require APP . 'view/signin/script.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * Log in user
     */
    public function logIn()
    {
        // load the model
        $this->loadModel('Model');

        // then do getStaff() in model/model.php
        $staff = $this->model->getStaff($_POST["email"], $_POST["password"]);
        session_start();
        if ($staff != null) {
            $_SESSION["firstname"] = $staff->firstname;
            $_SESSION["lastname"] = $staff->lastname;
            $_SESSION["email"] = $staff->email;
            $_SESSION["staffid"] = $staff->staffid;
            $_SESSION["phonenumber"] = $staff->phonenumber;
            $_SESSION["login"] = true;
            $_SESSION["LAST_ACTIVITY"] = time();

            // load the profile page after successful credentials validation
            header('Location:' . URL . 'profile');
        } else {

            // redirect the user back to the sign in page upon failed validation to try again
            header('Location:' . URL . 'signin');
        }
    }
    
    /**
     * Log out user
     */
    public function logOut()
    {
        // candidate: fulfill session management here:
        session_unset();
        session_destroy();

        // remember to redirect the user back to the sign in page after logging them out
        header('Location:' . URL . 'signin');
    }
}