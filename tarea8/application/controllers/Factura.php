<?php
defined('BASEPATH') OR exit('No direct script accesos allowed');

class Factura extends CI_Controller{


  public function __construct(){

    parent::__construct();
$this->load->helper('entidades');
  }
  function editar($id=0){
    $this->load->view('editar',array('id'=>$id));
  }
  function imprimir($id=0){
          $this->load->view('imprimir',array('id'=>$id));
     }
  function index()
  {
    $this->load->view('listado');
  }
}
