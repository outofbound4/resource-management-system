<?php
/**
*@author:GAURAV SHARMA
*/
class SessionManager{

    function __construct()
    {
      @session_start();
    }

    public function setValue($key, $value)
    {
      $_SESSION[$key] = $value;
    }

    public function getValue($key)
    {
      return $_SESSION[$key];
    }

    public function destroySession()
    {
      session_unset();
      session_destroy();
    }

    public function checkSession()
    {
      if(empty($_SESSION))
      {
        return false;
      }
      return true;
    }

    public function checkVariable($key)
    {
      if(isset($_SESSION[$key]))
      {
        return true;
      }
      return false;
    }
  }
?>