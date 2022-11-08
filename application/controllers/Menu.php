<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('flash', 'added');
            redirect('menu');
        }
    }

    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('is_active', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title', true)),
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true)),
            ];
            $this->db->insert('tb_user_sub_menu', $data);
            $this->session->set_flashdata('flash', 'added');
            redirect('menu/submenu');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_menu');
        $this->session->set_flashdata('flash', 'deleted');
        redirect('menu');
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_sub_menu');
        $this->session->set_flashdata('flash', 'deleted');
        redirect('menu/submenu');
    }

    // public function edit($id)
    // {
    //     $data['menu'] = $this->db->get_where('tb_user_menu', ['id', $id])->row_array();


    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('menu/edit_menu', $data);
    //     } else {
    //         $this->db->insert('tb_user_menu', ['menu' => $this->input->post('menu')]);
    //         $this->session->set_flashdata('flash', 'added');
    //         redirect('menu');
    //     }
    // }
}
