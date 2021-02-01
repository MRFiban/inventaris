<?php
class Emp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('EmpModel');
        $this->load->helper('url');
    }
    function index()
    {
        $this->load->view('news/listEmp');
    }
    function show()
    {
        $data = $this->EmpModel->employeeList();
        echo json_encode($data);
    }
    function save()
    {
        $data = $this->EmpModel->saveEmp();
        echo json_encode($data);
    }
    function update()
    {
        $data = $this->EmpModel->updateEmp();
        echo json_encode($data);
    }
    function delete()
    {
        $data = $this->EmpModel->deleteEmp();
        echo json_encode($data);
    }
}
