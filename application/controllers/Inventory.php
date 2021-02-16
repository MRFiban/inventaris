<?php
class Inventory extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('inventory_model');
                $this->load->helper('url');
                $this->load->library('session', 'database');
                if ($this->session->userdata('status') != "logged_in") {
                        redirect(base_url("auth"));
                }
        }


        public function index()
        {
                redirect(base_url("inventory/inventory"));
        }
        public function inventory()
        {
                $data['title'] = 'Inventaris';
                $this->load->view('templates/head', $data);
                $this->load->view('templates/navbar');
                $this->load->view('inventory/inventory');
                $this->load->view('templates/foot');
        }
        // public function dashboard()
        // {
        //         $data['title'] = 'Beranda';
        //         $this->load->view('templates/head', $data);
        //         $this->load->view('templates/navbar');
        //         $this->load->view('inventory/dashboard');
        //         $this->load->view('templates/foot');
        // }
        public function purchases()
        {
                $data['title'] = 'Barang Masuk';
                $this->load->view('templates/head', $data);
                $this->load->view('templates/navbar');
                $this->load->view('inventory/purchases');
                $this->load->view('templates/foot');
        }
        public function consumption()
        {
                $data['title'] = 'Barang Keluar';
                $this->load->view('templates/head', $data);
                $this->load->view('templates/navbar');
                $this->load->view('inventory/consumption');
                $this->load->view('templates/foot');
        }
        public function projects()
        {
                $data['title'] = 'Proyek';
                $this->load->view('templates/head', $data);
                $this->load->view('templates/navbar');
                $this->load->view('inventory/projects');
                $this->load->view('templates/foot');
        }
        public function warehouse()
        {
                $data['title'] = 'Gudang';
                $this->load->view('templates/head', $data);
                $this->load->view('templates/navbar');
                $this->load->view('inventory/warehouse');
                $this->load->view('templates/foot');
        }
        //Purchases
        function createPurchases()
        {
                $data = $this->inventory_model->createPurchases();
                echo json_encode($data);
        }
        function readPurchases()
        {
                $data = $this->inventory_model->readPurchases();
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
        //Consumption
        function createConsumption()
        {
                $data = $this->inventory_model->createConsumption();
                echo json_encode($data);
        }
        function readConsumption()
        {
                $data = $this->inventory_model->readConsumption();
                echo json_encode($data);
        }
        function updateConsumption()
        {
                $data = $this->inventory_model->updateConsumption();
                echo json_encode($data);
        }
        function deleteConsumption()
        {
                $data = $this->inventory_model->deleteConsumption();
                echo json_encode($data);
        }
        //Projects
        function createProjects()
        {
                $data = $this->inventory_model->createProjects();
                echo json_encode($data);
        }
        function readProjects()
        {
                $data = $this->inventory_model->readProjects();
                echo json_encode($data);
        }
        function updateProjects()
        {
                $data = $this->inventory_model->updateProjects();
                echo json_encode($data);
        }
        function deleteProjects()
        {
                $data = $this->inventory_model->deleteProjects();
                echo json_encode($data);
        }
        //Warehouse
        function createWarehouse()
        {
                $data = $this->inventory_model->createWarehouse();
                echo json_encode($data);
        }
        function readWarehouse()
        {
                $data = $this->inventory_model->readWarehouse();
                echo json_encode($data);
        }
        function updateWarehouse()
        {
                $data = $this->inventory_model->updateWarehouse();
                echo json_encode($data);
        }
        function deleteWarehouse()
        {
                $data = $this->inventory_model->deleteWarehouse();
                echo json_encode($data);
        }
        //Needs
        function createNeeds()
        {
                $data = $this->inventory_model->createNeeds();
                echo json_encode($data);
        }
        function readNeeds()
        {
                $data = $this->inventory_model->readNeeds();
                echo json_encode($data);
        }
        function updateNeeds()
        {
                $data = $this->inventory_model->updateNeeds();
                echo json_encode($data);
        }
        function deleteNeeds()
        {
                $data = $this->inventory_model->deleteNeeds();
                echo json_encode($data);
        }
        //Items
        function createItems()
        {
                $data = $this->inventory_model->createItems();
                echo json_encode($data);
        }
        function readItems()
        {
                $data = $this->inventory_model->readItems();
                echo json_encode($data);
        }
        function updateItems()
        {
                $data = $this->inventory_model->updateItems();
                echo json_encode($data);
        }
        function deleteItems()
        {
                $data = $this->inventory_model->deleteItems();
                echo json_encode($data);
        }
        //Suppliers
        function createSuppliers()
        {
                $data = $this->inventory_model->createSuppliers();
                echo json_encode($data);
        }
        function readSuppliers()
        {
                $data = $this->inventory_model->readSuppliers();
                echo json_encode($data);
        }
        function updateSuppliers()
        {
                $data = $this->inventory_model->updateSuppliers();
                echo json_encode($data);
        }
        function deleteSuppliers()
        {
                $data = $this->inventory_model->deleteSuppliers();
                echo json_encode($data);
        }
        //SELECT2
        function readSuppliersList()
        {
                $data = $this->inventory_model->readSuppliersList();
                echo json_encode($data);
        }
        function readProjectsList()
        {
                $data = $this->inventory_model->readProjectsList();
                echo json_encode($data);
        }
        function readItemsList()
        {
                $data = $this->inventory_model->readItemsList();
                echo json_encode($data);
        }
        function readWarehouseList()
        {
                $data = $this->inventory_model->readWarehouseList();
                echo json_encode($data);
        }
}
