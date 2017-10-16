<?php
/** Created by PhpStorm **/
//$submit = isset($_GET['submit']) ? $_GET['submit'] : " ";
$dsn = "mysql:host=localhost;dbname=dogs";
$username = "dogs";
$password = "se266";
try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // If There is an issue throw it down to the catch
    $submit = $_GET['submit'] ?? ""; // Null  coalesce operator
    if($submit == "Do it") {
        $name = $_GET['name'] ?? ""; //_GET  is Global Var
        $gender = $_GET['gender'] ?? "";
        $fixed = $_GET['fixed'] ?? false;
        $sql = $db->prepare("INSERT INTO dogs VALUES (null, :name, :gender, :fixed )");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam('fixed', $fixed);
        $sql->execute();
        echo $sql->rowCount() . "Rows inserted";
    }
} catch (PDOException $e){
    die("There was a problem connecting to the DataBase.");
}

?>
    <!--HTML Document -->
    <form method="get" action="#">
        <input type="text" name="name" value=" " /><br /> <!-- Text Box -->
        <input type="radio" name="gender" value="M" /> Male <br /> <!-- Radio buttons -->
        <input type="radio" name="gender" value="F" /> Female <br />
        <input type="checkbox" name="fixed" value=true />  <br /> <!-- Check Box -->
        <input type="submit" id="foo" name="submit" value="Do It"/> <!-- Creates a button with a text in it -->
    </form>

<?php
$sql = $db->prepare("SELECT * FROM dogs");
$sql->execute();
$results = $sql->fetchAll();
if(count($results)){
    foreach ($results as $dogs) {
        print_r($dogs);
    }
}