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
        $sql = $db->prepare("SELECT * FROM sites WHERE `site` LIKE '%$url%'");
        $sql->execute();
        $sites = $sql->fetchALL(PDO::FETCH_ASSOC);

        if (count($sites) > 0)
        {
            echo "This record is already been added!";
            include_once ("Form.php");
        }//End of If Statement
        else
        {
            $Key = addSites($db, $url);
            echo $url . "was added.";
            $filed = captured($url);
            links($db, $filed, $Key);
            echo linksTable($filed, $url);
        }// End of Else Statement
    }
    catch (PDOException $e)
    {
        die("There was an issue.");
    }// End of Catch Statement
}// End of ValidationURL Function

Function captured($url)
{
    $filed = @file_get_contents($url);
    return $filed;
}// End of captured Function

Function linksTable($filed, $url)
{
    $pattern = "/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/";
    preg_match_all($pattern, $filed, $matches, PREG_PATTERN_ORDER);

    if ($filed == false)
    {
        $table = "<table>";
    }// End of If statement
    else
    {
        $table = "<h1>Success!</h1>" . PHP_EOL;
        $table .= "Links from " . $url . PHP_EOL;
        $table .= "<table>" . PHP_EOL;
        $tempArray = array_unique($matches[1]);
        $tempArray = array_values($tempArray);
        foreach ($tempArray as $url)
        {
            $table .= "<tr><td>" . $url . "</td></tr>";
        }// End of Foreach Statement
    }// End of Else Statement
    $table .= "</table>";
    return $table;
}// End of LinksTable Function

Function links($db, $filed, $Key)
{
    try
    {
        $pattern = "/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/";
        preg_match_all($pattern, $filed, $matches, PREG_PATTERN_ORDER);

        if($filed == false)
        {
            echo " THE GALAXY HAS FORBID THE INSERTION OF THESE SO CALLED LINKS!! ";
        }// End of If Statement
        else
        {
            $tempArray = array_unique($matches[1]);
            $tempArray = array_values($tempArray);

            foreach ($tempArray as $url)
            {
                $sql = $db->prepare("INSERT INTO sitelinks (site_id, link) VALUES (:site_id, :link)");
                $sql->bindParam(':site_id', $Key);
                $sql->bindParam(':link', $url);
                $sql->execute();
                echo $sql->rowCount() . "records were added.";
            }// End of Foreach Statement
        }// End of Else Statement
    }// End of Try Statement
    catch(PDOException $e)
        {
            die("You've met a terrible end haven't you?");
        }// End of Catch Statement
}// End of Links Function

Function getKey($db, $url)
{
    try
    {
        $sql = $db->prepare("SELECT site_id FROM sites WHERE site='$url'");
        $sql->bindParam(':site', $url);
        $sql->execute();
        $Key = $sql->fetchALL(PDO::FETCH_ASSOC);

        foreach ($Key as $PrimKey)
        {
            $Res = $PrimKey['site_id'];
        }//End of Foreach Loop
    }// End of Try Statement
    catch(PDOException $e)
    {
        die("There was an issue trying to steal the records... Lets try again later.");
    }// End of Catch Statement
    return $Res;
}// End of getKey Function

Function StoreData($db, $url, $rowCount)
{
    try
    {
        $sql = $db->prepare("SELECT date FROM sites WHERE site='$url'");
        $sql->bindParam(':site', $url);
        $sql->execute();
        $date = $sql->fetchALL(PDO::FETCH_ASSOC);
        foreach ($date as $dateStored)
        {
            $Res = date('m/d/Y', strtotime($dateStored['date']));
        }// End of Foreach Loop
        date_default_timezone_set("America/New_York");
        $now = date("m/d/y g:i a"); //get current date and time
        echo $rowCount . " links from " . $url;
        echo " Stored on " .$Res. ". Retrieved " . $now;
    }// End of Try Statement
    catch (PDOException $e)
    {
        die("There was an issue..");
    }// End of Catch Statement
}// End of StoreData Function

Function DDLinks($db, $Key)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM sitelinks WHERE site_id ='$Key'");
        $sql->bindParam(':site_id', $Key);
        $sql->execute();
        $links = $sql->fetchALL(PDO::FETCH_ASSOC);

        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($links as $link)
            {
                $table .= "<tr><td><a href='" . $link['link'] . "' target='popup'>" . $link['link'] . "</a></td></tr>";
            }// End of Foreach Loop
            $table .= "</table>" . PHP_EOL;
            return $table;
        }// End of If Statement

        else
        {
            echo " No Data here. ";
        }// End of Else Statement
    }// End of Try Statement
    catch (PDOException $e)
    {
        die("There was a problem getting links. ");
    }// End of Catch Statement
}// End of DDLinks Function

Function rowCountforLinks($db, $Key)
{
    $sql = $db->prepare("SELECT * FROM sitelinks WHERE site_id ='$Key'");
    $sql->bindParam(':site_id', $Key);
    $sql->execute();
    $rowCount = $sql->rowCount();
    return $rowCount;

}


