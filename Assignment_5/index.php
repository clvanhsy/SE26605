<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/30/2017
 * Time: 12:52 AM
 */
include_once ("Files/Header.php");
include_once ("Files/dbconn.php");
require_once ("Files/Components.php");
require_once ("Files/Form.php");

$db = dbConn();
$Submit = filter_input(INPUT_GET, 'Submit', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST,'Submit', FILTER_SANITIZE_STRING) ?? NULL;
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING) ?? NULL;
$url = filter_var($url, FILTER_SANITIZE_URL);

switch ($Submit)
{
    case 'Submit':
        if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED))
        {
            echo ValidationURL($db, $url);
        }// End of If Statement
        else
        {
            echo "URL you've enter is invalid, Please try again. Ex: https://www.youtube.com";
        }// End if Else Statement
}// End of Switch Statement
include_once ("Files/Footer.php");
?>