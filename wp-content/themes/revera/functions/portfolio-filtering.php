<div class="row">
    <div class="twelve col text-center grid-mb project-filters">
        <h4>
        <?php
			$portfolio_types = get_terms('portfolio_types');
            if($portfolio_types): ?>	
                <?php foreach($portfolio_types as $portfolio_type): ?>
					<span class="filter" data-filter=".<?php echo esc_attr($portfolio_type->slug); ?>"><?php echo esc_html($portfolio_type->name); ?></span>
                <?php endforeach; ?>
				<span class="filter" data-filter="all"><?php _e('Show All', 'revera'); ?></span>
        <?php endif; ?>
            
        </h4>
    </div>
</div>