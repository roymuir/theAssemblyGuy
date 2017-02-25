<?php
/*
Template For Header Social Icons
*/
?>


	<?php 

		$target = '';
		if (_option('social_icons_link_target')==1):
			$target = ' target="_blank" ';
		endif;
	?>
	
    
        
    <?php if(_option('twitter_link')): ?>
        <a href="<?php echo esc_url(_option('twitter_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Twitter">
        	<i class="fa fa-twitter"></i>
        </a >	
    <?php endif; ?> 
      
        
    <?php if(_option('facebook_link')): ?>
        <a href="<?php echo esc_url(_option('facebook_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Facebook">
        	<i class="fa fa-facebook"></i>
        </a >	
    <?php endif; ?> 
    

    <?php if(_option('pinterest_link')): ?>
        <a href="<?php echo esc_url(_option('pinterest_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Pinterest">
        	<i class="fa fa-pinterest"></i>
        </a >	
    <?php endif; ?> 
    
    
    
    
    <?php if(_option('flickr_link')): ?>
        <a href="<?php echo esc_url(_option('flickr_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Flickr">
        	<i class="fa fa-flickr"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('google_link')): ?>
        <a href="<?php echo esc_url(_option('google_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Google +"> 
        	<i class="fa fa-google-plus"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('youtube_link')): ?>
        <a href="<?php echo esc_url(_option('youtube_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Youtube">
        	<i class="fa fa-youtube"></i>
        </a >	
    <?php endif; ?> 
    
    <?php if(_option('vimeo_link')): ?>
        <a href="<?php echo esc_url(_option('vimeo_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Vimeo">
        	<i class="fa fa-vimeo-square"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('dribbble_link')): ?>
        <a href="<?php echo esc_url(_option('dribbble_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Dribbble">
        	<i class="fa fa-dribbble"></i>
        </a >	
    <?php endif; ?> 
    
    <?php if(_option('behance_link')): ?>
        <a href="<?php echo esc_url(_option('behance_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Behance">
        	<i class="fa fa-behance"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('instagram_link')): ?>
        <a href="<?php echo esc_url(_option('instagram_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Instagram">
        	<i class="fa fa-instagram"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('linkedin_link')): ?>
        <a href="<?php echo esc_url(_option('linkedin_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Linkedin">
        	<i class="fa fa-linkedin"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('skype_link')): ?>
        <a href="<?php echo esc_url(_option('skype_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Skype">
        	<i class="fa fa-skype"></i>
        </a >	
    <?php endif; ?> 
    
    <?php if(_option('tumblr_link')): ?>
        <a href="<?php echo esc_url(_option('tumblr_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Tumblr">
        	<i class="fa fa-tumblr"></i>
        </a >	
    <?php endif; ?> 
	
    <?php if(_option('soundcloud_link')): ?>
        <a href="<?php echo esc_url(_option('soundcloud_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="SoundCloud">
        	<i class="fa fa-soundcloud"></i>
        </a >
    <?php endif; ?> 
    

    <?php if(_option('github_link')): ?>
        <a href="<?php echo esc_url(_option('github_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="GitHub">
        	<i class="fa fa-github"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('email_address')): ?>
        <a href="mailto:<?php echo themetor_sanitize(_option('email_address')); ?>" <?php echo themetor_sanitize($target); ?>  title="Email">
        	<i class="fa fa-envelope-o"></i>
        </a >
    <?php endif; ?> 
    
    
    <?php if(_option('rss_link')): ?>
        <a href="<?php echo esc_url(_option('rss_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="RSS">
        	<i class="fa fa-rss"></i>
        </a >	
    <?php endif; ?> 
    
    
    <?php if(_option('sitemap_link')): ?>
        <a href="<?php echo esc_url(_option('sitemap_link')); ?>" <?php echo themetor_sanitize($target); ?>  title="Sitemap">
        	<i class="fa fa-sitemap"></i>
        </a >	
    <?php endif; ?> 
    
