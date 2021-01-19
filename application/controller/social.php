<?php

/**
 * Class Social
 *
 * Display user's social media urls
 */
class Social extends Controller
{
    /**
     * PAGE: media
     * This page will list all urls associated with the user to their various social media pages
     */
    public function media($staffid)
    {
        // unique title of the page that will be displayed on the title bar
        $pageTitle = 'Social Media';

        // load the model
        $this->loadModel('Model');
        
        // do getAllSocialMedia() in model/model.php
        $platforms = $this->model->getAllSocialMedia($staffid);

        require APP . 'view/_templates/session.php';
        require APP . 'view/social/header.php';
        require APP . 'view/_templates/navbar.php';
        require APP . 'view/social/sidebar.php';
        require APP . 'view/social/index.php';
        require APP . 'view/social/script.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addSocialMedia
     * IMPORTANT: This is not a normal page, it's an ACTION. This method handles all the POST data from the form and then redirects
     * the user back to social/media via the last line: header(...)
     */
    public function addSocialMedia($staffid)
    {
        // load the model
        $this->loadModel('Model');

        // if we have POST data to create a new social media entry
        if (isset($_POST["submit_add_social_media"])) {
            // do addSocialMedia() in model/model.php
            $this->model->addSocialMedia($_POST["platform"], $_POST["link"], $staffid);
        }

        // where to go after social media profile has been added
        header('location: ' . URL . 'social/media/' . $staffid);
    }

    /**
     * ACTION: deleteSocialMedia
     * IMPORTANT: This is not a normal page, it's an ACTION. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to social/media via the last line: header(...)
     */
    public function deleteSocialMedia($id, $staffid)
    {
        // load the model
        $this->loadModel('Model');

        // if we have an id of a social media account that should be deleted
        if (isset($id)) {
            // do deleteSocialMedia() in model/model.php
            $this->model->deleteSocialMedia($id);
        }

        // where to go after social media profile has been deleted
        header('location: ' . URL . 'social/media/' . $staffid);
    }

    /**
     * ACTION: editSocialMedia
     */
    public function editSocialMedia($id, $staffid)
    {
        // load the model
        $this->loadModel('Model');

        // if we have an id of a social media profile that should be edited
        if (isset($id)) {
            // do getSocialMedia() in model/model.php
            $socialmedia = $this->model->getSocialMedia($id);

            // we also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $socialmedia easily
            require APP . 'view/_templates/session.php';
            require APP . 'view/social/header.php';
            require APP . 'view/_templates/navbar.php';
            require APP . 'view/social/sidebar.php';
            require APP . 'view/social/edit.php';
            require APP . 'view/social/script.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to social media page (as we don't have an id)
            header('location: ' . URL . 'social/media/' . $staffid);
        }
    }

    /**
     * ACTION: updateSocialMedia
     * IMPORTANT: This is not a normal page, it's an ACTION. This method handles all the POST data from the form and then redirects
     * the user back to social/media via the last line: header(...)
     */
    public function updateSocialMedia($staffid)
    {
        // load the model
        $this->loadModel('Model');
        
        // if we have POST data to create a new social media profile entry
        if (isset($_POST["submit_update_social_media"])) {
            // do updateSocialMedia() from model/model.php
            $this->model->updateSocialMedia($_POST["platform"], $_POST["link"], $_POST['social_media_id']);
        }

        // where to go after social media profile has been updated
        header('location: ' . URL . 'social/media/' . $staffid);
    }
}
