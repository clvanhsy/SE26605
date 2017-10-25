<?php1
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/22/2017
 * Time: 2:05 AM
 */
?>
<form method="post" action="#">
    <h2> Create A Corporation </h2>
    <p> Corporation: </p> <input type="text" name="corp" value=" "/>
    <br />
    <p> Email: </p> <input type="text" name="email" value="" />
    <br />
    <p> Zipcode: </p> <input type="text" name="zipcode" value="" />
    <br />
    <p> Owner: </p> <input type="text" name="owner" value="" />
    <br />
    <p> Phone Number: </p> <input type="text" name="phone" value="" />
    <br /><br />
    <input type="submit" id="corporation" name="submit" value="<?php echo $Btn ?>" />
</form>
