<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function dashboard()
    {
        $data['menu']   = 'Dashboard';
        $data['judul']  = 'dNezast';
        $data['path']   = 'admin/dashboard';
        $user           = $this->session->userdata('username');
        $data['user']   = $this->db->get_where('user', ['username' => $user])->row_array();

        $role_id = $this->session->userdata('role_id');
        //Query menu
        $queryMenu = "SELECT `menu`.`id`, `menu`, `menu_name`, `menu_url`, `menu_icon`, `treeview_icon`, `drop_icon`
                        FROM `menu` JOIN `user_access_menu`
                          ON `menu`.`id` = `user_access_menu`.`id`
                       WHERE `user_access_menu`.`role_id` = $role_id
                       ORDER BY `user_access_menu`.`menu_id` ASC
                    ";

        $menu = $this->db->query($queryMenu)->result_array();
        $data['menulist']   = $menu;

        //Query submenu

        // foreach ($menu as &$m) {
        //     $menuId = $m['id'];
        //     $querySubMenu = "SELECT *
        //                     FROM `sub_menu` JOIN `menu`
        //                       ON `sub_menu`.`menu_id` = `menu`.`id`
        //                    WHERE `sub_menu`.`menu_id` = $menuId
        //                    AND `sub_menu`.`active` = 1
        //                 ";
        //     $subMenu = $this->db->query($querySubMenu)->result_array();
        //     $data['submenu'] = $subMenu;
        // }
        // // die;
        //Load view dashboard
        $this->load->view('template/header.php', $data);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('admin/dashboard.php');
        $this->load->view('template/footer.php');
    }
}
