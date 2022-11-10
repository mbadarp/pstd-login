<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('flash', 'added');
            redirect('admin/role');
        }
    }

    public function deleteRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_role');
        $this->session->set_flashdata('flash', 'deleted');
        redirect('admin/role');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('tb_user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role_access', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_role_id', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('flash', 'added');
            redirect('admin/role');
        }
    }

    public function change_access()
    {
        $menu_id  = $this->input->post('menuId');
        $role_id  = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('tb_user_access_menu', $data);

        if ($result->num_rows < 1) {
            $this->db->insert('tb_user_access_menu', $data);
        } else {
            $this->db->delete('tb_user_access_menu', $data);
        }

        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Access change!</div>');
    }
}
