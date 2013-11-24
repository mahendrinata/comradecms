<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Language_model extends App_Model {

  public $has_many = array(
      'content_detail',
      'media',
      'route'
  );
  public $validate = array(
      array(
          'field' => 'slug',
          'label' => 'slug',
          'rules' => 'required|alpha_dash|is_unique[languages.slug]'
      ),
      array(
          'field' => 'name',
          'label' => 'Name',
          'rules' => 'required'
      ),
  );

}

?>