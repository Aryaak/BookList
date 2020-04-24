<?php 
  
  class Controller {

  	    public function view ($view, $data = [], $pages = 1, $page = 1) {

               require_once "../app/views/".$view.".php";

  	    }

  	    public function model ($model) {

               require_once "../app/models/".$model.".php";
               return new $model;

  	    }
  	
  }

?>