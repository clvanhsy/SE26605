<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 11/27/2017
 * Time: 8:39 AM
 */

Function sitesDropDown ($db)
{
    try
    {
      $sql = "SELECT * FROM sites";
      $sql = $db->prepare($sql);
      $sql->excute();
      $sites = $sql->fetchALL(PDO::FETCH_ASSOC);

      if($sql->rowCount() > 0)
      {
          $dropDown = "<option vaule=''> -- Select -- </option>" . PHP_EOL;
          foreach ($sites as $site)
          {
              $dropDown .= "<option va;ie='" .$site['site'] . "</option>";
          }//End of Foreach Loop
      }//End of If Statement
      else
      {
         $dropDown = "There is no Data to obtain." . PHP_EOL;
      }//End of Else Statement
        return $dropDown;
    }//End of Try Statement
    catch (PDOException $e)
    {
        die("There was a problem with the universe, making the drop down broken.");
    }//End of Catch Statement
}// End of the sitesDropDown Function

Function addSites($db, $url)
{
    try
    {
        $sql = $db->prepare("INSERT INTO sites VALUES (null, :sites, NOW())");
        $sql->bindParam(':site', $url);
        $sql->excute();
        $Key = $db->lastInsertId();

        return $Key;
    }//End of Try Statement
    catch (PDOException $e)
    {
        die("There was a problem adding in a site!");
    }//End of Catch Statement
}//End of addSites Function

Function ValidationURL($db, $url)
{
    try
    {
    }
}