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

                        'name' => $this->input->post('test'),
                        'item_id' => NULL,
                        // 'brand_id' => $this->input->post('test'),
                        // 'code' => $this->input->post('test'),
                        // 'category_id' => $this->input->post('test'),
                        // 'model' => $this->input->post('test'),
                        // 'serial_number' => $this->input->post('test'),
                        // 'size' => $this->input->post('test'),
                        // 'year_made' => $this->input->post('test'),
                        'amount' => $this->input->post('test'),
                        // 'price' => $this->input->post('test'),                        'name' => $this->input->post('test'),
                        // 'description' => $this->input->post('test'),
                        // 'pictures' => $this->input->post('test'),
                        // 'warehouse_id' => $this->input->post('test'),


                );
                return $this->db->insert('items', $data);
        }

        public function get_items()
        {
                $query = $this->db->get('items');
                return $query->result_array();
        }

        public function add_warehouse()
        {
                $data = array(

                        'warehouse_section' => $this->input->post('section'),
                        'description' => $this->input->post('description'),
                        // 'brand_id' => $this->input->post('test'),
                        // 'code' => $this->input->post('test'),
                        // 'category_id' => $this->input->post('test'),
                        // 'model' => $this->input->post('test'),
                        // 'serial_number' => $this->input->post('test'),
                        // 'size' => $this->input->post('test'),
                        // 'year_made' => $this->input->post('test'),
                        'capacity' => $this->input->post('capacity'),
                        // 'price' => $this->input->post('test'),                        'name' => $this->input->post('test'),
                        // 'description' => $this->input->post('test'),
                        // 'pictures' => $this->input->post('test'),
                        // 'warehouse_id' => $this->input->post('test'),


                );
                return $this->db->insert('warehouse', $data);
        }
        public function add_consumption()
        {
                $data = array(

                        'project_id' => $this->input->post('project_id'),
                        'item_id' => $this->input->post('item_id'),
                        'amount' => $this->input->post('amount'),
                        'consumption_date' => $this->input->post('date'),
                        // 'category_id' => $this->input->post('test'),
                        // 'model' => $this->input->post('test'),
                        // 'serial_number' => $this->input->post('test'),
                        // 'size' => $this->input->post('test'),
                        // 'year_made' => $this->input->post('test'),
                        // 'capacity' => $this->input->post('capacity'),
                        // 'price' => $this->input->post('test'),                        'name' => $this->input->post('test'),
                        // 'description' => $this->input->post('test'),
                        // 'pictures' => $this->input->post('test'),
                        // 'warehouse_id' => $this->input->post('test'),


                );
                return $this->db->insert('consumption', $data);
        }

        public function add_purchase()
        {
                $data = array(

                        'supplier_id' => $this->input->post('supplier_id'),
                        'item_id' => $this->input->post('item_id'),
                        'amount' => $this->input->post('amount'),
                        'order_date' => $this->input->post('order_date'),
                        'date_arrived' => $this->input->post('date_arrived'),
                        // 'model' => $this->input->post('test'),
                        // 'serial_number' => $this->input->post('test'),
                        // 'size' => $this->input->post('test'),
                        // 'year_made' => $this->input->post('test'),
                        // 'capacity' => $this->input->post('capacity'),
                        // 'price' => $this->input->post('test'),                        'name' => $this->input->post('test'),
                        // 'description' => $this->input->post('test'),
                        // 'pictures' => $this->input->post('test'),
                        // 'warehouse_id' => $this->input->post('test'),


                );
                return $this->db->insert('purchases', $data);
        }

        public function get_warehouse()
        {
                $query = $this->db->get('warehouse');
                return $query->result_array();
        }
        public function get_consumption()
        {
                $query = $this->db->get('consumption');
                return $query->result_array();
        }
        public function get_purchases()
        {
                $query = $this->db->get('purchases');
                return $query->result_array();
        }

        public function get_needs()
        {
                $query = $this->db->get('needs');
                return $query->result_array();
        }
        public function add_project()
        {
                $data = array(

                        'project_id' => $this->input->post('project_id'),
                        'item_id' => $this->input->post('item_id'),
                        // 'brand_id' => $this->input->post('test'),
                        // 'code' => $this->input->post('test'),
                        // 'category_id' => $this->input->post('test'),
                        // 'model' => $this->input->post('test'),
                        // 'serial_number' => $this->input->post('test'),
                        // 'size' => $this->input->post('test'),
                        // 'year_made' => $this->input->post('test'),
                        'amount' => $this->input->post('amount'),
                        // 'price' => $this->input->post('test'),                        'name' => $this->input->post('test'),
                        // 'description' => $this->input->post('test'),
                        // 'pictures' => $this->input->post('test'),
                        // 'warehouse_id' => $this->input->post('test'),


                );
                return $this->db->insert('needs', $data);
        }
        function readPurchases()
        {
                $hasil = $this->db->get('purchases');
                return $hasil->result();
        }
        function createPurchases()
        {
                $data = array(
                        // 'purchase_id'   => $this->db->insert_id(),
                        'supplier_id'   => $this->input->post('supplier_id'),
                        'item_id'       => $this->input->post('item_id'),
                        'amount'        => $this->input->post('amount'),
                        'order_date'    => $this->input->post('order_date'),
                        'date_arrived'  => $this->input->post('date_arrived'),
                );
                $result = $this->db->insert('purchases', $data);

                $id = $this->db->insert_id();
                $this->db->where('id', $id);
                $rowdata = $this->db->get('purchases');
                $row = $rowdata->row_array();
                return $row;
        }
        function updatePurchases()
        {
                $id   = $this->input->post('id');
                $supplier_id = $this->input->post('supplier_id');
                $item_id      = $this->input->post('item_id');
                $amount        = $this->input->post('amount');
                $order_date    = $this->input->post('order_date');
                $date_arrived  = $this->input->post('date_arrived');

                $this->db->set('supplier_id', $supplier_id);
                $this->db->set('item_id', $item_id);
                $this->db->set('amount', $amount);
                $this->db->set('order_date', $order_date);
                $this->db->set('date_arrived', $date_arrived);

                $this->db->where('id', $id);
                $this->db->update('purchases');
                $this->db->where('id', $id);

                $rowdata = $this->db->get('purchases');
                $row = $rowdata->row_array();
                return $row;
        }
        function deletePurchases()
        {
                $id = $this->input->post('id');
                $this->db->where('id', $id);
                $result = $this->db->delete('purchases');
                return $result;
        }
}
