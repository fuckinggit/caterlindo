<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
 
				<ul class="nav nav-list">
				<?php
				$query = $crud->read('tb_hakaksesuser b,tb_menu a',array('where' =>array('fc_lvluser' => '1'),'where_kolom'=>array('a.fc_idmenu'=>'b.fc_idmenu'),'order_by'=>'fc_urutan ASC'));
				foreach($query as $menu){
					if($menu['fc_link'] <> 'javascript:;'){
				?>
						<li <?php if($menu['fc_idmenu']==$_GET['idmenu']){?>class="active"<?php }else{} ?>>
							<a href="<?php echo $menu['fc_link'].'&idmenu='.$menu['fc_idmenu']; ?>">
								<i class="<?php echo $menu['fv_class2']; ?>"></i>
								<span class="menu-text"> <?php echo $menu['fv_menu']; ?> </span>
							</a><b class="arrow"></b>
						</li>
				<?php } else {?>
						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="<?php echo $menu['fv_class2']; ?>"></i>
							<span class="menu-text"> <?php echo $menu['fv_menu']; ?> </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
						<?php $query2 = $crud->read('tb_submenu',array('where'=>array('fc_idmenu'=>$menu['fc_idmenu'])));
						foreach($query2 as $submenu){
						?>
							<li <?php if($submenu['fc_idsubmenu']==$_GET['idsubmenu']){?>class="active"<?php }else{}?>>
								<a href="<?php echo $submenu['fc_link'].'&idsubmenu='.$submenu['fc_idsubmenu']; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo  $submenu['fv_menu']; ?>
								</a>
								<b class="arrow"></b>
							</li>
						<?php } ?>
						</ul>
					</li>
				<?php } 
				} ?>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>