<?php
class Inventory extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('inventory_model');
                $this->load->helper('url');
        }

        public function index()
        {
                $this->dashboard();
        }
        public function add_item()
        {
                $this->load->library('form_validation');
                $data['title'] = 'Add Item';
                $data['items'] = $this->inventory_model->get_items(); //test

                $this->form_validation->set_rules('test', 'Text String', 'required');
                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/head', $data);
                        $this->load->view('inventory/add_item', $data);
                        $this->load->view('templates/off_canvas', $data);
                        $this->load->view('templates/foot');
                } else {
                        $this->inventory_model->add_item();
                        echo "Success!! But DO NOT reload this page!!";
                }
        }

        public function inventory()
        {
                $this->load->library('form_validation');
                $data['title'] = 'Add Item';
                $data['items'] = $this->inventory_model->get_items(); //test

                $this->form_validation->set_rules('test', 'Text String', 'required');
                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/head', $data);
                        $this->load->view('inventory/inventory', $data);
                        $this->load->view('templates/off_canvas', $data);
                        $this->load->view('templates/foot');
                } else {
                        $this->inventory_model->add_item();
                        echo "Success!! But DO NOT reload this page!!";
                }
        }
        public function dashboard()
        {
                $this->load->library('form_validation');

                $data['inventory'] = $this->inventory_model->get_items();
                $data['title'] = 'Dashboard';

                $this->load->view('templates/head', $data);
                // $this->load->view('templates/sidebar', $data);
                // $this->load->view('templates/topbar', $data);
                $this->load->view('inventory/dashboard', $data);
                $this->load->view('templates/off_canvas', $data);
                $this->load->view('templates/foot');
        }

        public function purchases()
        {
                $this->load->library('form_validation');
                $data['title'] = 'Purchases';
                $data['purchases'] = $this->inventory_model->get_purchases(); //test

                $this->form_validation->set_rules('supplier_id', 'Number', 'required');
                if ($this->form_validation->run() == FALSE) {
                        $this->load->view('templates/head', $data);
                        $this->load->view('inventory/purchases', $data);
                        $this->load->view('templates/off_canvas', $data);
                        $this->load->view('templates/foot');
                } else {
                        $this->inventory_model->add_purchase();
                        echo "Success!! But DO NOT reload this page!!";
                }
        }

        public function consumption()
        {
                $this->load->library('form_validation');
                $data['title'] = 'Consumption';
                $data['consumption'] = $this->inventory_model->get_consumption(); //test

                $this->form_validation->set_rules('project_id', 'Number', 'required');
                if ($this->form_validation->run() == FALSE) {
                        $this->load->view('templates/head', $data);
                        $this->load->view('inventory/consumption', $data);
                        $this->load->view('templates/off_canvas', $data);
                        $this->load->view('templates/foot');
                } else {
                        $this->inventory_model->add_consumption();
                        echo "Success!! But DO NOT reload this page!!";
                }
        }
        public function projects()
        {
                $this->load->library('form_validation');
                $data['title'] = 'Projects Needs';
                $data['needs'] = $this->inventory_model->get_needs(); //test

                $this->form_validation->set_rules('amount', 'Number', 'required');
                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/head', $data);
                        $this->load->view('inventory/projects', $data);
                        $this->load->view('templates/off_canvas', $data);
                        $this->load->view('templates/foot');
                } else {
                        $this->inventory_model->add_project();
                        echo "Success!! But DO NOT reload this page!!";
                }
        }

        public function warehouse()
        {
                $this->load->library('form_validation');
                $data['title'] = 'Warehouse';
                $data['warehouse'] = $this->inventory_model->get_warehouse(); //test

                $this->form_validation->set_rules('capacity', 'Number', 'required');
                if ($this->form_validation->run() == FALSE) {
                        $this->load->view('templates/head', $data);
                        $this->load->view('inventory/warehouse', $data);
                        $this->load->view('templates/off_canvas', $data);
                        $this->load->view('templates/foot');
                } else {
                        $this->inventory_model->add_warehouse();
                        echo "Success!! But DO NOT reload this page!!";
                }
        }
        function readPurchases()
        {
                $data = $this->inventory_model->readPurchases();
                echo json_encode($data);
        }
        function createPurchases()
        {
                $data = $this->inventory_model->createPurchases();
                echo json_encode($data);
        }
        function updatePurchases()
        {
                $data = $this->inventory_model->updatePurchases();
                echo json_encode($data);
        }
        function deletePurchases()
        {
                $data = $this->inventory_model->deletePurchases();
                echo json_encode($data);
        }
}
