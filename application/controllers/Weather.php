<?php

class Weather extends CI_Controller {
     function index() {
		error_reporting(0);

        $this->load->library("NuSoap_lib");

        $weather = new NuSoap_lib();
        $weather -> getWeather("40.785091", "-73.968285");
}
}