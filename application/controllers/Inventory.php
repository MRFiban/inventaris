<?php
class Inventory extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('inventory_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['inventory'] = $this->inventory_model->get_news();
                $data['title'] = 'Dashboard';

                $this->load->view('templates/head', $data);
                // $this->load->view('templates/sidebar', $data);
                // $this->load->view('templates/topbar', $data);
                $this->load->view('inventory/dashboard', $data);
                $this->load->view('templates/off_canvas', $data);
                $this->load->view('templates/foot');
        }
        public function add_items()
        {
        }
        public function barcodes()
        {
        }
        public function current_inventory()
        {
        }
        public function dashboard()
        {
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
