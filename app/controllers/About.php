<?php 
  
  class About extends Controller {

  	    public function index ($nama = "Arya", $umur = "17") {
               
               $data["nama"] = $nama;
               $data["umur"] = $umur;
               $data["judul"] = "About";
               $this->view("templates/header", $data);
               $this->view("about/index", $data);
               $this->view("templates/footer");

  	    }

        public function page () {
               
               $data["judul"] = "About";
               $this->view("templates/header", $data);
               $this->view("about/page");
               $this->view("templates/footer");

        }

  }

?>