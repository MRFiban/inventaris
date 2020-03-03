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

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);

                if (empty($data['news_item'])) {
                        show_404();
                }

                $data['title'] = $data['news_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }


        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Create a news item';

                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('text', 'Text', 'required');

                if ($this->form_validation->run() === FALSE) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('news/create');
                        $this->load->view('templates/footer');
                } else {
                        $this->news_model->set_news();
                        $this->load->view('news/success');
                }
        }
}
