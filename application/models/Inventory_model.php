<?php
class Inventory_model extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

        public function add_item()
        {
                $data = array(
                        'item_id' => NULL,
                        'name' => $this->input->post('test')
                );
                return $this->db->insert('items', $data);
        }

        public function get_items()
        {
                $query = $this->db->get('items');
                return $query->result_array();
        }
}
