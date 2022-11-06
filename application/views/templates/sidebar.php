<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class='bx bx-code-alt' style="font-size: 2.5rem ;"></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">P.std </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `tb_user_menu`.`id`, `menu`
                        FROM `tb_user_menu` JOIN `tb_user_access_menu` 
                        ON `tb_user_menu`.`id` = `tb_user_access_menu`.`menu_id`
                        WHERE `tb_user_access_menu`.`role_id` = $role_id
                        ORDER BY `tb_user_access_menu`.`menu_id` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <ul class="menu-inner py-1">
        <!-- LOOPING MENU -->
        <?php foreach ($menu as $m) : ?>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text"><?= $m['menu']; ?></span>
            </li>

            <!-- SUB MENU according to MENU  -->
            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * FROM `tb_user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) : ?>
                <li class="menu-item">
                    <a href="<?= base_url($sm['url']); ?>" class="menu-link">
                        <i class="menu-icon tf-icons <?= $sm['icon']; ?>"></i>
                        <div data-i18n="Analytics"><?= $sm['title']; ?></div>
                    </a>
                </li>
            <?php endforeach; ?>


        <?php endforeach; ?>






        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text"></span></li>
        <li class="menu-item">
            <a href="<?= base_url('auth/logout'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->