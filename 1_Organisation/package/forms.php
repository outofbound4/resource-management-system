<?php

  class Forms{
    private $method = "";
    private $formdata = array();

    function __construct(){
      if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $this->method = 'POST';
        foreach ($_POST as $key => $value){
          $this->formdata[$key] = $this->sanitizeData($value);
        }
      }
      else if($_SERVER["REQUEST_METHOD"] == 'GET'){
        $this->method = 'GET';
        foreach ($_GET as $key => $value){
          $this->formdata[$key] = $this->sanitizeData($value);
        }
      }
    }

    function __destruct(){
      $this->method = null;
      $this->dumpFormData();
    }

    private function dumpFormData(){
      unset($this->formdata);
      if($this->method == 'POST'){
        unset($_POST);
      }
      else if($this->method == 'GET'){
        unset($_GET);
      }
    }

    public function sanitizeData($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    public function getFormData(){
      return $this->formdata;
    }
  }
?>