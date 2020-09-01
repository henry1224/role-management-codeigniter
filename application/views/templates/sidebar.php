<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" width="70" height="70" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Hello, <?= $user['name']; ?></span>
                    </a>
                </div>
                <div class="logo-element">
                    <i class="fa fa-code"></i>
                </div>
            </li>

            <?php
            $role_id = $this->session->userdata('role_id');

            $this->db->select('*');
            $this->db->from('user_role');
            $this->db->join('user_access_menu', 'user_access_menu.role_id = user_role.id');
            $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
            $this->db->where('role_id', $role_id);
            $this->db->where('is_active', '1');
            $this->db->where('is_main_menu', '0');
            $query = $this->db->get()->result();
            ?>

            <?php foreach ($query as $menu) : ?>
                <?php
                $this->db->select('*');
                $this->db->from('user_role');
                $this->db->join('user_access_menu', 'user_access_menu.role_id = user_role.id');
                $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
                $this->db->where('role_id', $role_id);
                $this->db->where('is_active', '1');
                $this->db->where('is_main_menu', $menu->id);
                $sub_menu = $this->db->get(); ?>

                <?php if ($sub_menu->num_rows() != 0) : ?>
                    <li <?= $this->uri->segment('1') == $menu->url ? 'class="active"' : '' ?>>
                        <a href="#"><i class="<?= $menu->icon; ?>"></i> <span class="nav-label"><?= $menu->title; ?></span><span class="fa arrow"></span></a>
                        <?php foreach ($sub_menu->result() as $sub) : ?>
                            <ul class="nav nav-second-level collapse">
                                <li <?= $this->uri->segment('1') == $sub->url ? 'class="active"' : '' ?>><a href="<?= base_url($sub->url); ?>"><?= $sub->title; ?> </a></li>
                            </ul>
                        <?php endforeach; ?>
                    </li>
                <?php else : ?>
                    <li <?= $this->uri->segment('1') == $menu->url ? 'class="active"' : '' ?>>
                        <a href="<?= base_url($menu->url) ?>"><i class="<?= $menu->icon; ?>"></i> <span class="nav-label"><?= $menu->title; ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

            <li>
                <a href="<?= base_url('auth/logout') ?>"><i class="fa fa-fw fa-sign-out"></i> <span class="nav-label">Logout</span></a>
            </li>
        </ul>
    </div>
</nav>