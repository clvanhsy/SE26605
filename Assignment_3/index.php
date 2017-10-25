<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 10:00 AM
 */
require_once ("files/dbconn.php");
require_once ("files/corps.php");
include_once("files/header.php");

$db = dbConn();


$corp = filter_input(INPUT_POST,'corp', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT) ?? null;
$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING) ?? "";

$corpo=[
    'corp'=> "",
    'email' => "",
    'zipcode' => "",
    'owner' => "",
    'phone' => ""
];

$Btn = "Add";
switch ($submit){
    case "Add":
        echo $corp, $incorp_dt, $email, $zipcode, $owner, $phone;
        addCorps($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone);
        break;
    case "Read":
        getCorps($db, $id);
        break;
    case "Update":
       updateCorps($db, $corp, $email, $zipcode, $owner, $phone, $id);
        $Btn = "Add";
        break;
    case "Delete":
        deleteCorps($db, $id);
        break;

}

echo corpsTable($db);
include_once ("files/corpsform.php");
include_once ("files/footer.php");
?>
