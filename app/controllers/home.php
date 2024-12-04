<?php
class Home extends Controller {
    public function index() {
        $this->view("templates/header");
        $this->view("pages/home/index");
        $this->view("templates/header");
    }
}