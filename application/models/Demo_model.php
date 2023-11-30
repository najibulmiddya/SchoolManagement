<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Student_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Najibul Middya
 * @param     ...
 * @return    ...
 *
 */

class Demo_model extends CI_Model
{

  // ------------------------------------------------------------------------

  private $table = "employee";
  private $table_city = "city";
 

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------

// CREATE TABLE city(
//     cid INT AUTO_INCREMENT,
//     city_name VARCHAR (50),
//     PRIMARY KEY (cid)
// );


// ---------------------------------------------------
// CREATE TABLE employee(
//     id INT AUTO_INCREMENT,
//     city INT NOT NULL,
//     PRIMARY KEY (id),
//     name VARCHAR(30),
//     FOREIGN KEY (city) REFERENCES city (cid)
// );

  // ------------------------------------------------------------------------
 
  public function get_all()
  {
    $this->db->select("e.name, c.city_name,");
    $this->db->from("{$this->table} e");
    $this->db->join("{$this->table_city} c","e.city=c.cid");
    return $this->db->get()->result();
    
  }




}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */