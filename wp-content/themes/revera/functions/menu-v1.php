<!-- Menu -->
<div class="menu-right" id="theMenu">
    <div class="menu-wrap">

		<?php if ( _option('logo')!=''){ ?>
        <a href="<?php echo home_url(); ?>"><img src="<?php echo _option('logo');?>" alt="logo" class="logo"></a>
		<?php }else{ ?>
        <h1 class="logo"><a href="<?php echo home_url(); ?>"><?php echo _option('logo_text','REVERA');?></a></h1>
		<?php } ?>

        <!-- Close menu -->
        <p class="menu-close">X</p>

		<?php
		$menu_type = rwmb_meta('revera_menu_type');
		if($menu_type==''){$menu_type='primary';};
		if($menu_type=='primary'){$menu_name='Main Menu';}else{$menu_name='One Page';};
		wp_nav_menu(  
			array(
				'theme_location' => $menu_type,
				'menu' => $menu_name, 
				'container'       	=> 'div',
				'container_class'  => 'menu-items' ,
				'menu_class'	   => 'main-menu'
				
			)  
		); 
			
		?>
		
        
        <?php if (_option('search')): ?>
            <div class="menu-search">
                <form action="<?php echo home_url(); ?>" id="searchform" method="get" role="search">
                    <input id="s" name="s" type="text" onfocus="if (this.value=='&#xf002;') this.value = '';" onblur="if (this.value=='') this.value = '&#xf002;';" value="&#xf002;" />  
                </form>
            </div><!-- search -->
        <?php endif; ?>
                    
        
        <?php if (_option('header_social_icons',1)==1 ){ ?>
            <div class="menu-icons">	
                <?php get_template_part('functions/social-icons'); ?>
            </div>               
		<?php } ?>


    </div>


    <!-- Menu toggle -->
    <div id="toggle-right"><i class="fa fa-bars"></i></div>


</div>