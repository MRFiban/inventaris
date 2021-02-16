<?php
class Inventory_model extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
                $this->db->query("SET GLOBAL sql_mode = 'NO_ENGINE_SUBSTITUTION';");
        }
        public function auth_login($table, $where)
        {
                return $this->db->get_where($table, $where);
        }
        //Purchase
        function createPurchases()
        {
                $data = array(
                        'supplier_id'   => $this->input->post('supplier_id'),
                        'item_id'       => $this->input->post('item_id'),
                        'purchase_amount'        => $this->input->post('purchase_amount'),
                        'order_date'    => $this->input->post('order_date'),
                        'date_arrived'  => $this->input->post('date_arrived'),
                );
                $this->db->insert('purchases', $data);
                $purchase_id = $this->db->insert_id();
                $this->db->select('*');
                $this->db->from('purchases');
                $this->db->join('items', 'purchases.item_id = items.item_id');
                $this->db->join('suppliers', 'purchases.supplier_id = suppliers.supplier_id');
                $this->db->where('purchase_id', $purchase_id);
                $rowdata = $this->db->get();
                $row = $rowdata->row_array();
                return $row;
        }
        function readPurchases()
        {
                $this->db->select('*');
                $this->db->from('purchases');
                $this->db->join('items', 'purchases.item_id = items.item_id');
                $this->db->join('suppliers', 'purchases.supplier_id = suppliers.supplier_id');
                $result = $this->db->get();

                // $result = $this->db->get('purchases');
                return $result->result();
        }
        function updatePurchases()
        {
                $purchase_id   = $this->input->post('purchase_id');
                $supplier_id = $this->input->post('supplier_id');
                $supplier_name  = $this->input->post('supplier_name');
                $item_id      = $this->input->post('item_id');
                $item_name  = $this->input->post('item_name');
                $purchase_amount        = $this->input->post('purchase_amount');
                $order_date    = $this->input->post('order_date');
                $date_arrived  = $this->input->post('date_arrived');
                $this->db->set('supplier_id', $supplier_id);
                $this->db->set('item_id', $item_id);
                $this->db->set('purchase_amount', $purchase_amount);
                $this->db->set('order_date', $order_date);
                $this->db->set('date_arrived', $date_arrived);
                $this->db->where('purchase_id', $purchase_id);
                $this->db->update('purchases');

                $this->db->select('*');
                $this->db->from('purchases');
                $this->db->join('items', 'purchases.item_id = items.item_id');
                $this->db->join('suppliers', 'purchases.supplier_id = suppliers.supplier_id');
                $this->db->where('purchase_id', $purchase_id);
                $rowdata = $this->db->get();
                $row = $rowdata->row_array();
                return $row;
        }
        function deletePurchases()
        {
                $purchase_id = $this->input->post('purchase_id');
                $this->db->where('purchase_id', $purchase_id);
                $result = $this->db->delete('purchases');
                return $result;
        }

        //Consumption
        function createConsumption()
        {
                $data = array(
                        'project_id'   => $this->input->post('project_id'),
                        'item_id'       => $this->input->post('item_id'),
                        'consumption_amount'        => $this->input->post('consumption_amount'),
                        'rest'        => $this->input->post('rest'),
                        'consumption_date'    => $this->input->post('consumption_date'),
                );
                $this->db->insert('consumption', $data);
                $consumption_id = $this->db->insert_id();
                $this->db->select('*');
                $this->db->from('consumption');
                $this->db->join('items', 'consumption.item_id = items.item_id');
                $this->db->join('projects', 'consumption.project_id = projects.project_id');
                $this->db->where('consumption_id', $consumption_id);
                $rowdata = $this->db->get();
                $row = $rowdata->row_array();
                return $row;
        }
        function readConsumption()
        {
                $this->db->select('*');
                $this->db->from('consumption');
                $this->db->join('items', 'consumption.item_id = items.item_id');
                $this->db->join('projects', 'consumption.project_id = projects.project_id');
                $result = $this->db->get();
                return $result->result();
        }
        function updateConsumption()
        {
                $consumption_id   = $this->input->post('consumption_id');
                $project_id = $this->input->post('project_id');
                $item_id      = $this->input->post('item_id');
                $consumption_amount        = $this->input->post('consumption_amount');
                $rest        = $this->input->post('rest');
                $consumption_date    = $this->input->post('consumption_date');
                $this->db->set('project_id', $project_id);
                $this->db->set('item_id', $item_id);
                $this->db->set('consumption_amount', $consumption_amount);
                $this->db->set(
                        'rest',
                        $rest
                );
                $this->db->set('consumption_date', $consumption_date);
                $this->db->where('consumption_id', $consumption_id);
                $this->db->update('consumption');

                $this->db->select('*');
                $this->db->from('consumption');
                $this->db->join('items', 'consumption.item_id = items.item_id');
                $this->db->join('projects', 'consumption.project_id = projects.project_id');
                $this->db->where('consumption_id', $consumption_id);
                $rowdata = $this->db->get();
                $row = $rowdata->row_array();
                return $row;
        }
        function deleteConsumption()
        {
                $consumption_id = $this->input->post('consumption_id');
                $this->db->where('consumption_id', $consumption_id);
                $result = $this->db->delete('consumption');
                return $result;
        }
        //Warehouse
        function createWarehouse()
        {
                $data = array(
                        'warehouse_id'   => $this->input->post('warehouse_id'),
                        'warehouse_section'   => $this->input->post('warehouse_section'),
                        'description'       => $this->input->post('description'),
                        'capacity'        => $this->input->post('capacity'),
                );
                $this->db->insert('warehouse', $data);
                $warehouse_id = $this->input->post('warehouse_id');
                $this->db->where('warehouse_id', $warehouse_id);
                $rowdata = $this->db->get('warehouse');
                $row = $rowdata->row_array();
                return $row;
        }
        function readWarehouse()
        {
                $result = $this->db->get('warehouse');
                return $result->result();
        }
        function updateWarehouse()
        {
                $warehouse_id   = $this->input->post('warehouse_id');
                $warehouse_section   = $this->input->post('warehouse_section');
                $description = $this->input->post('description');
                $capacity      = $this->input->post('capacity');
                $this->db->set('warehouse_id', $warehouse_id);
                $this->db->set('warehouse_section', $warehouse_section);
                $this->db->set('description', $description);
                $this->db->set('capacity', $capacity);
                $this->db->where('warehouse_id', $warehouse_id);
                $this->db->update('warehouse');
                $this->db->where('warehouse_id', $warehouse_id);
                $rowdata = $this->db->get('warehouse');
                $row = $rowdata->row_array();
                return $row;
        }
        function deleteWarehouse()
        {
                $warehouse_id = $this->input->post('warehouse_id');
                $this->db->where('warehouse_id', $warehouse_id);
                $result = $this->db->delete('warehouse');
                return $result;
        }
        //Projects
        function createProjects()
        {
                $data = array(
                        'project_id'   => $this->input->post('project_id'),
                        'project_name'       => $this->input->post('project_name'),
                );
                $this->db->insert('projects', $data);
                $project_id = $this->input->post('project_id');
                $this->db->where('project_id', $project_id);
                $rowdata = $this->db->get('projects');
                $row = $rowdata->row_array();
                return $row;
        }
        function readProjects()
        {
                $result = $this->db->get('projects');
                return $result->result();
        }
        function updateProjects()
        {
                $project_id   = $this->input->post('project_id');
                $project_name = $this->input->post('project_name');
                $this->db->set('project_id', $project_id);
                $this->db->set('project_name', $project_name);
                $this->db->where('project_id', $project_id);
                $this->db->update('projects');
                $this->db->where('project_id', $project_id);
                $rowdata = $this->db->get('projects');
                $row = $rowdata->row_array();
                return $row;
        }
        function deleteProjects()
        {
                $project_id = $this->input->post('project_id');
                $this->db->where('project_id', $project_id);
                $result = $this->db->delete('projects');
                return $result;
        }
        //Needs
        function createNeeds()
        {
                $data = array(
                        'project_id'   => $this->input->post('project_id'),
                        'item_id'   => $this->input->post('item_id'),
                        'amount'       => $this->input->post('amount'),
                );
                $this->db->insert('needs', $data);
                $need_id = $this->db->insert_id();

                $this->db->select('*');
                $this->db->from('needs');
                $this->db->join('items', 'needs.item_id = items.item_id');
                $this->db->join('projects', 'needs.project_id = projects.project_id');
                $this->db->where('need_id', $need_id);
                $rowdata = $this->db->get();
                $row = $rowdata->row_array();
                return $row;
        }
        function readNeeds()
        {

                $this->db->select('*');
                $this->db->from('needs');
                $this->db->join('items', 'needs.item_id = items.item_id');
                $this->db->join('projects', 'needs.project_id = projects.project_id');
                $result = $this->db->get();
                return $result->result();
        }
        function updateNeeds()
        {
                $need_id   = $this->input->post('need_id');
                $project_id   = $this->input->post('project_id');
                $item_id   = $this->input->post('item_id');
                $amount   = $this->input->post('amount');
                $this->db->set('need_id', $need_id);
                $this->db->set('project_id', $project_id);
                $this->db->set('item_id', $item_id);
                $this->db->set('amount', $amount);
                $this->db->where('need_id', $need_id);
                $this->db->update('needs');

                $this->db->select('*');
                $this->db->from('needs');
                $this->db->join('items', 'needs.item_id = items.item_id');
                $this->db->join('projects', 'needs.project_id = projects.project_id');
                $this->db->where('need_id', $need_id);
                $rowdata = $this->db->get();
                $row = $rowdata->row_array();
                return $row;
        }
        function deleteNeeds()
        {
                $need_id = $this->input->post('need_id');
                $this->db->where('need_id', $need_id);
                $result = $this->db->delete('needs');
                return $result;
        }

        //Items
        function createItems()
        {
                $data = array(
                        'item_id'   => $this->input->post('item_id'),
                        'item_name'       => $this->input->post('item_name'),
                        'item_brand'   => $this->input->post('item_brand'),
                        'item_model'       => $this->input->post('item_model'),
                        'item_size'       => $this->input->post('item_size'),
                        'item_amount'   => $this->input->post('item_amount'),
                        'item_availability'       => $this->input->post('item_availability'),
                        'item_description'   => $this->input->post('item_description'),
                        'iwarehouse_id'       => $this->input->post('iwarehouse_id'),
                );
                $this->db->insert('inventory', $data);
                $item_id = $this->input->post('item_id');
                $this->db->where('item_id', $item_id);
                $rowdata = $this->db->get('inventory');
                $row = $rowdata->row_array();
                return $row;
        }
        function readItems()
        {
                $result = $this->db->get('inventory');
                return $result->result();
        }
        function updateItems()
        {
                $item_id   = $this->input->post('item_id');
                $item_name = $this->input->post('item_name');
                $item_brand   = $this->input->post('item_brand');
                $item_model = $this->input->post('item_model');
                $item_size = $this->input->post('item_size');
                $item_amount   = $this->input->post('item_amount');
                $item_availability = $this->input->post('item_availability');
                $item_description   = $this->input->post('item_description');
                $iwarehouse_id = $this->input->post('iwarehouse_id');
                $this->db->set('item_id', $item_id);
                $this->db->set('item_name', $item_name);
                $this->db->set('item_brand', $item_brand);
                $this->db->set('item_model', $item_model);
                $this->db->set('item_size', $item_size);
                $this->db->set('item_amount', $item_amount);
                $this->db->set('item_availability', $item_availability);
                $this->db->set('item_description', $item_description);
                $this->db->set('iwarehouse_id', $iwarehouse_id);
                $this->db->where('item_id', $item_id);
                $this->db->update('inventory');
                $this->db->where('item_id', $item_id);
                $rowdata = $this->db->get('inventory');
                $row = $rowdata->row_array();
                return $row;
        }
        function deleteItems()
        {
                $item_id = $this->input->post('item_id');
                $this->db->where('item_id', $item_id);
                $result = $this->db->delete('items');
                return $result;
        }
        //Suppliers
        function createSuppliers()
        {
                $data = array(
                        'supplier_id'   => $this->input->post('supplier_id'),
                        'supplier_name'       => $this->input->post('supplier_name'),
                        'supplier_address'       => $this->input->post('supplier_address'),
                        'contact_num'       => $this->input->post('contact_num'),
                );
                $this->db->insert('suppliers', $data);
                $supplier_id = $this->input->post('supplier_id');
                $this->db->where('supplier_id', $supplier_id);
                $rowdata = $this->db->get('suppliers');
                $row = $rowdata->row_array();
                return $row;
        }
        function readSuppliers()
        {
                $result = $this->db->get('suppliers');
                return $result->result();
        }
        function updateSuppliers()
        {
                $supplier_id   = $this->input->post('supplier_id');
                $supplier_name = $this->input->post('supplier_name');
                $supplier_address = $this->input->post('supplier_address');
                $contact_num = $this->input->post('contact_num');
                $this->db->set('supplier_id', $supplier_id);
                $this->db->set('supplier_name', $supplier_name);
                $this->db->set('supplier_address', $supplier_address);
                $this->db->set('contact_num', $contact_num);
                $this->db->where('supplier_id', $supplier_id);
                $this->db->update('suppliers');
                $this->db->where('supplier_id', $supplier_id);
                $rowdata = $this->db->get('suppliers');
                $row = $rowdata->row_array();
                return $row;
        }
        function deleteSuppliers()
        {
                $supplier_id = $this->input->post('supplier_id');
                $this->db->where('supplier_id', $supplier_id);
                $result = $this->db->delete('suppliers');
                return $result;
        }
        //SELECT2
        function readSuppliersList()
        {
                $results = $this->db->query('SELECT supplier_id as id,supplier_name as text FROM `suppliers`');
                $results = $results->result_array();
                $data = array($results);
                return $data;
        }
        function readItemsList()
        {
                $results = $this->db->query('SELECT item_id as id,item_name as text FROM `items`');
                $results = $results->result_array();
                $data = array($results);
                return $data;
        }
        function readProjectsList()
        {
                $results = $this->db->query('SELECT project_id as id,project_name as text FROM `projects`');
                $results = $results->result_array();
                $data = array($results);
                return $data;
        }
        function readWarehouseList()
        {
                $results = $this->db->query('SELECT warehouse_id as id, description as text FROM `warehouse`');
                $results = $results->result_array();
                $data = array($results);
                return $data;
        }
}
