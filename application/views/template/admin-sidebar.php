<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pustaka Hadist</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      <?php
			$id_akses= $this->session->userdata('id_akses');//mengambil data role id dari session
      //melakukan join tabel 
        
			$queryMenu = "  SELECT `pengguna_menu`.`id`,`menu`,`icon`
											FROM	 `pengguna_menu`  JOIN `pengguna_akses_menu`
												ON	 `pengguna_menu`.`id` = `pengguna_akses_menu`.`id_menu`
											WHERE	 `pengguna_akses_menu`.`id_akses`= $id_akses
									ORDER BY   `pengguna_akses_menu`.`id_menu` ASC										
									";

			$menu= $this->db->query($queryMenu)->result_array();		
			?>
      <?php foreach ($menu as $m):?>
      
      <div class="sidebar-heading">
        <?=$m['menu'];?>
      </div>

        
            <!-- looping sub menu -->
						
      <!-- Nav Item - Pages Collapse Menu -->
      <?php if($title == $m['menu']):?>
      <li class="nav-item active">
      <?php else :?>
        <li class="nav-item">
      <?php endif ;?>


        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?=$m['menu'];?>" aria-expanded="true" aria-controls="collapseTwo">
          <i class="<?=$m['icon'];?>"></i>

            <?php
						// queri sub menu
						$menuId= $m['id'];
							$queryMenu = "SELECT * FROM `pengguna_sub_menu`
														WHERE `id_menu` = $menuId
														AND `aktif` =1	ORDER BY sub_menu ASC 					
											";
							$subMenu =$this->db->query($queryMenu)->result_array();

						?>

          <span><?=$m['menu'];?></span>
        </a>
        <div id="<?=$m['menu'];?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">          

          <?php foreach ($subMenu as $sm):?>
            <a class="collapse-item" href="<?= base_url($sm['url']); ?>"><i class="mr-2 <?=$sm['icon']?>"></i><?=$sm['sub_menu']?></a>
            
            <?php endforeach;?>
          </div>
        </div>
      </li>
        <hr class="sidebar-divider">

<?php endforeach;?>
      <!-- Nav Item - Utilities Collapse Menu -->
     

     

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>