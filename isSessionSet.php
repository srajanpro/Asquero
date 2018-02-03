<?php
//session_start();
  /* Session variables and their details
    id: stores the id of user, taken from users table.
    email: stores the email of user.
    paswrd: stores the password of user.
    tablename: stores the tablename assigned to the user.
  */
  function isSessionSet()
  {
    /*if(!isset($_SESSION['id']) && !isset($_SESSION['email']) && !isset($_SESSION['paswrd']))
    {
      return 0; //session and session variables are not set
    }*/
    if(isset($_SESSION['id']))
    {
      if(isset($_SESSION['email']))
      {
        if(isset($_SESSION['paswrd']))
        {
          if(isset($_SESSION['tablename']))
          {
            if(isset($_SESSION['firstname']))
            {
              if(isset($_SESSION['lastname']))
              {
                return 1; //all four session variables are set.
              }
              else
              {
                return 0;
              }
            }
            else
            {
              return 0;
            }
          }
          else
          {
            return 0; //tablename is not set, but id, email and paswrd are set, which means something is wrong.
          }
        }
        else //id and email are set but paswrd is not set, which means something is wrong.
        {
          return 0;
        }
      }
      else //id is set but email is not set, which means something is wrong.
      {
        return 0;
      }
    }
    else
    {
      return 0; //none of the session variables are set.
    }
  }

  function isTempIdSet()
  {
    if(!isset($_SESSION['temp_id']))
    {
      return 0;
    }
    else
    {
      return 1;
    }
  }

?>
