<?php
/**
 * Created by PhpStorm.
 * User: Cynthia
 * Date: 12/7/2017
 * Time: 6:03 PM
 */


Function loginForm($email = "", $password = "")
{
    $form = "<section>
    <form method = 'post' action ='index.php'>
    <h1> Login </h1>
    <label for='email'>Email: </label>
    <br/>
    <input type='text' name='email' id='email' value='$email'/>
    <br/>
    <label for='password'>Password: </label>
    <br/>
    <input type='password' name='password' id='password' value='$password'/>
    <br/>
    <input type='hidden' name='submit' value='submit'/>
    <br/><br/>
    <input type='submit'/>
    </form>
    </section>";
    return $form;
}

Function NewStored($db, $email, $password)
{
    $sql = $db->prepare("SELECT email FROM users WHERE email = :email");
    $sql->bindParam('email', $email);
    $sql->execute();
    $rows = $sql->rowCount();
    if($rows == 0)
    {
        try
        {
            $date = new DateTime('now');
            $created = $date->format('Y-m-d H:i:s');
            $sql = $db->prepare("INSERT INTO users VALUES (null, :email, :password, :created)");
            $sql->bindParam(':email', $email);
            $sql->bindParam(':password', $password);
            $sql->bindParam(':created', $created);
            $sql->execute();

            if($sql)
            {
                $Res = "User is now in!";
            }

        }
        catch (PDOException $e)
        {
            die("There was a issue");
        }
    }
    else
    {
        $Res = " Email was already used.";
    }

    return $Res;
}


Function AddUser2($email = "", $password = "", $confirm = "")
{
    $form ="<section><form method='post' action='regUser.php'>
 <h1>New User</h1>
 <label for='email'> Email: </label>
 <br/>
 <input type='text' name='email' id='email' value='$email'/>
 <br/>
 <label for='password'>Password: </label>
 <br/>
 <input type='password' name='password' id='password' value='$password'/>
 <br/>
 <label for='confirm'> Please Confirm your password: </label>
 <br/>
 <input type='password' name='confirm' id='confirm' value='$confirm'/>
 <input type='hidden' name='submit' value='submit' />
 <br/><br/>
 <input type='submit'/>
 </form>
 </section>";
    return $form;
}

Function regUser($newpage)
{
    $form = "<form method='post' action='index.php'> ";
    $form .= "<input type='hidden' name='submit' value='Register'/> <input type='submit' name='submit' value='$newpage'/></form> ";
    return $form;
}
Function ckUser($db, $email, $password, $hash)
{
    $sql = $db->prepare("SELECT * FROM users WHERE email = :email");
    $bind = array(":email" => $email,);
    if($sql->execute($bind))
    {
        $Res = $sql->fetch(PDO::FETCH_ASSOC);
        $rows = $sql->rowCount();
        if($rows == 1)
        {
            if(password_verify($password, $Res['password']))
            {
                $user_id = $Res['user_id'];
                $neg = $user_id;
            }
            else
            {
                $neg = -1;
            }
        }
        else
        {
            $neg = 0;
        }
    }
    else
    {
        $neg = -2;
    }
    return $neg;
}
