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
        public function barcodes()
        {
        }
        public function current_inventory()
        {
                // $data['inventory'] = $this->inventory_model->get_news();
                $data['title'] = 'Inventaris';

                $this->load->view('templates/head', $data);
                // $this->load->view('templates/sidebar', $data);
                // $this->load->view('templates/topbar', $data);
                $this->load->view('inventory/current_inventory', $data);
                $this->load->view('templates/off_canvas', $data);
                $this->load->view('templates/foot');
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
        public function forecast()
        {
        }
        public function help()
        {
        }
        public function history()
        {
        }

        public function incoming_purchases()
        {
        }
        public function login()
        {
        }

        public function outgoing_orders()
        {
        }
        public function projects()
        {
        }
        public function reports()
        {
        }
        public function signup()
        {
        }
        public function tracking()
        {
        }
        public function user_profile()
        {
        }
        public function warehouses()
        {
        }
}
