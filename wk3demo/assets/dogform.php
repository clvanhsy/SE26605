<?php
/**
 * Created by PhpStorm.
 * User: calexande
 * Date: 10/16/2017
 * Time: 9:45 AM
 */
?>
<form method="post" action="#">
    Name: <input type="text" name="name" value="" /><br />
    Male: <input type="radio" name="gender" value="M" /><br />
    Female: <input type="radio" name="gender" value="F" /><br />
    Fixed: <input type="checkbox" name="fixed" value="true" /><br />
    <input type="submit" id="foo" name="action" value="<?php echo $button; ?>" />
</form>