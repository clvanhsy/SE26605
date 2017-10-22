<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 10/22/2017
 * Time: 2:05 AM
 */
?>
<form method="post" action="#">
    Corporation: <input type="text" name="corp" value="<?php echo $corpo['corp']; ?> "/> <br />
    Corporation Created: <input type="text" name="incorp_dt" value="<?php echo $corpo['incorp_dt']; ?>" /> <br />
    Email: <input type="text" name="email" value="<?php echo $corpo['email']; ?>" /> <br />
    Zipcode: <input type="text" name="zipcode" value="<?php echo $corpo['zipcode']; ?>" /> <br />
    Owner: <input type="text" name="owner" value="<?php echo $corpo['owner']; ?>" /> <br />
    Phone Number: <input type="text" name="phone" value="<?php echo $corpo['phone']; ?>" /> <br />
    <input type="submit" id="corporation" name="submit" value="<?php echo $Btn; ?>" />
</form>
