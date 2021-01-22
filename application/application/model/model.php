<?php

/**
 * Class Model
 *
 * Manage user activities.
 *
 */
class Model
{
    /**
     * @param object $db A PDO database connection
     */    
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get staff user details from database
     * @param string $email Email
     * @param string $password Password
     */
    public function getStaff($email,$password)
    {

        // candidate: manage sql query to the database.
        // candidate: fulfill the SELECT statement and assign it to the $sql variable below

        $sql = "SELECT firstname, lastname, email, staff.staffid, phonenumber FROM staff INNER JOIN password ON staff.staffid = password.staffid WHERE email=:email AND password=:password";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email, ':password' => $password);

        // useful for debugging: you can see the SQL behind above construction by using:
		
		
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that gets exactly one result

        return $query->fetch();
    }

    /**
     * Get all user's social media accounts from database
     * @param string $staffid Staff id
     */
    public function getAllSocialMedia($staffid)
    {
        // candidate: manage sql query to the database
		//SELECT email,staffid FROM staff 
		//$sql= "SELECT platform, link FROM social_media WHERE staffid.staff = staffid.social_media
        $sql= "SELECT id, platform, link FROM social_media INNER JOIN staff on social_media.staff_id = staff.staffid WHERE social_media.staff_id =:staffid"; 
        $query = $this->db->prepare($sql);
        $parameters = array(':staffid' => $staffid);
	

        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        
        return $query->fetchAll();
    }

    /**
     * Add a social media account to database
     * @param string $platform Social media platform
     * @param string $link Link or URL to social media account
     * @param string $staffid Staff id
     */
    public function addSocialMedia($platform, $link, $staffid)
    {
        // candidate: manage sql query to the database
        $sql= "INSERT INTO social_media (platform, link, staff_id)  VALUES (:platform, :link, :staff_id)";
        $query = $this->db->prepare($sql);
        $parameters = array( ':platform'=> $platform, ':link'=> $link, ':staff_id' => $staffid);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete social media account in the database
     * @param int $social_media_id Id of social media account
     */
    public function deleteSocialMedia($social_media_id)
    {
        // candidate: manage sql query to the database

        $sql = "DELETE FROM social_media WHERE id=:social_media_id";
        $query = $this->db->prepare($sql);
        $parameters = array( ':social_media_id' => $social_media_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get social media account from database
     * @param int $social_media_id Id of social media account
     */
    public function getSocialMedia($social_media_id)
    {

    //why isn't the argument $social_media_id passed?
        $sql = "SELECT id, platform, link FROM social_media WHERE id = :social_media_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':social_media_id' => $social_media_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that gets exactly one result

        return $query->fetch();
    } 

    /**
     * Update a social media account in database
     * @param string $platform Social media platform
     * @param string $link Link or URL to social media account
     * @param int $social_media_id Id of social media account
     */
    public function updateSocialMedia($platform, $link, $social_media_id)
    {
        // candidate: manage sql query to the database
        $sql = "UPDATE social_media SET platform=:platform, link=:link WHERE id = :social_media_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':platform' => $platform, ':link' => $link, ':social_media_id' => $social_media_id);


        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
}