	
    <!-- Contact -->
	<div id="footer">
		<div class="row">
			<div class="nine col center text-center">


				<?php if (_option('footer_top_text')!= ''){
                    echo _option('footer_top_text');           
                	  } ?>

				
                <?php if (_option('footer_widgets',1)== '1'){ ?>
				<div class="row mb30">
                     <?php 
						if ( !dynamic_sidebar ( 'footer_widgets' ) ){
							thdglkr_emptysidebar('Footer');
						}        				
					?>

				</div>
				<?php } ?>

				<?php if (_option('footer_social_icons',1)==1 ){ ?>
                    <div class="c-icons mb30">	
                        <?php get_template_part('functions/social-icons'); ?>
                    </div>               
                <?php } ?>


			</div>
		</div>

		<?php if (_option('pcf_enable','1')=='1'):?>
		<!-- Form popup modal -->
		<div id="<?php echo esc_attr(_option('pcf_id','the-form')); ?>" class="mfp-hide c-form-modal">
        	<?php if (_option('pcf_title','')!=''){
				echo '<p class="h1 responsive-txt uber mb0">'._option('pcf_title','').'</p>';
				};
				
			if (_option('pcf_subtitle','')!=''){
				echo '<p class="h2 responsive-txt serif italic text-light">'._option('pcf_subtitle','').'</p>';
				};
				
			echo do_shortcode(_option('pcf_shortcode',''));
			
			?>
		</div>
        <?php endif;?>
        
	</div>




	<!-- Credits -->
	<div class="credits">
		<p><?php echo _option('footer_text'); ?></p>
	</div>



	<?php if (_option('footer_gototop')==1): ?>
	<!-- Back to top button -->
	<div class="relative">
		<a href="#top" class="backtotop right scrollto"><i class="fa fa-long-arrow-up"></i></a>
	</div>
	<?php endif; ?>


<?php wp_footer(); ?>


</body>
</html>