<!-- Menu -->

<div class="menu-horizontal mh-hide">
    <div class="row">
        <div class="twelve col">


            <div class="mh-logo">
            <?php if ( _option('logo')!=''){ ?>
            	<a href="<?php echo home_url(); ?>"><img src="<?php echo _option('logo');?>" alt="logo" class="logo"></a>
            <?php }
				if (_option('logo_text')!='') { ?>
            	<h1><a href="<?php echo home_url(); ?>"><?php echo _option('logo_text','REVERA');?></a></h1>
            <?php } ?>
			</div>

            <!-- Menu toggle -->
            <input type="checkbox" id="toggle" />
            <label for="toggle" class="toggle"></label>

			<?php 
				$menu_type = rwmb_meta('revera_menu_type');
				if($menu_type==''){$menu_type='primary';};
				if($menu_type=='primary'){$menu_name='Main Menu';}else{$menu_name='One Page';};
				wp_nav_menu(  
					array(
						'theme_location' => $menu_type,
						'menu' => $menu_name, 
						'container'       	=> 'div',
						'container_class'  => 'menu' ,
						'menu_class'	   => 'main-menu'
						
					)  
				); 
				
			?>

        </div>
    </div>
</div>