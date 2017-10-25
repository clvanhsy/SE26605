<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/25/2017
 * Time: 9:59 AM
 */
?>
<form method="post" action="#">
    <h2> Create A Corporation </h2>
    <p> Corporation: </p> <input type="text" name="corp" value="<?php echo $corpo['corp']; ?> "/>
    <br />
    <p> Email: </p> <input type="text" name="email" value="<?php echo $corpo['email']; ?>" />
    <br />
    <p> Zipcode: </p> <input type="text" name="zipcode" value="<?php echo $corpo['zipcode']; ?>" />
    <br />
    <p> Owner: </p> <input type="text" name="owner" value="<?php echo $corpo['owner']; ?>" />
    <br />
    <p> Phone Number: </p> <input type="text" name="phone" value="<?php echo $corpo['phone']; ?>" />
    <br /><br />
    <input type="hidden" name="'id" value="<? echo $corpo['id']; ?> " />
    <input type="submit" id="corporation" name="submit" value="<?php echo $Btn; ?>" />
</form>