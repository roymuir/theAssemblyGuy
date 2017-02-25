/* Live Customizer */
( function( $ ){		
	
	wp.customize('theme_color',function( value ) {
		value.bind(function(cc) {
			var str='.text-color,.text-color h1,.text-color h2,.text-color h3,.text-color h4,.text-color h5,.text-color h6,.text-color p,.btn.outline.color,.no-touch .icon-list:hover i,.no-touch ul.points li:hover:before,.no-touch .menu-wrap .logo a:hover,.no-touch .menu-wrap.menu-white .logo a:hover,.no-touch .mh-logo h1 a:hover,.no-touch .menu-white .mh-logo h1 a:hover,.no-touch .service-item:hover > i,.no-touch .c-links a:hover,.no-touch .post-title a:hover,.no-touch .aa-details h3 a:hover{color: '+cc+'}';
			str+='.bg-color, .btn.color,.no-touch .row-icons i:hover,.no-touch ul.circle li:hover i,.no-touch .tags a:hover,.no-touch .tagcloud a:hover,.no-touch .pagination a:hover{background:'+cc+';}';
			str+='.btn.outline.color,.no-touch .row-icons i:hover,.no-touch ul.circle li:hover i,.no-touch .pagination a:hover{border-color: '+cc+';}';
			$('head').append('<style type="text/css">'+str+'</style>');
		});
	});
	
	wp.customize('links_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">a{color: '+cc+';}</style>');
		});
	});
	
	wp.customize('hover_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">a:hover, a:focus{color:'+cc+';}</style>');
		});
	});
	
	wp.customize('icon_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.no-touch .icon-list i,.no-touch .service-item i{color:'+cc+';}</style>');
		});
	});
	
	wp.customize('menu_bg_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.menu-wrap,.menu-horizontal{background:'+cc+';}.menu-icons i{border-color: '+cc+';}</style>');
		});
	});
	
	
	wp.customize('menu_border_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.menu-icons,.menu-search,.menu-search input,.menu-horizontal{border-color:'+cc+';}</style>');
		});
	});
	
	wp.customize('menu_text_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.menu-items a,.menu-close,.menu ul li a{color: '+cc+';}</style>');
		});
	});
	
	wp.customize('menu_hover_text_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.menu-search input:focus,.no-touch .menu-icons i:hover{border-color:'+cc+';}.no-touch .menu-items a:hover,.no-touch .menu-close:hover,.no-touch .menu-icons i:hover,.menu-search input:focus,.no-touch .menu ul li:hover a{color:'+cc+';}</style>');
		});
	});

	wp.customize('menu_icon_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.menu-icons i{color: '+cc+';}</style>');
		});
	});
		
	wp.customize('menu_ind_color_light',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">#toggle-left.toggle-light,#toggle-right.toggle-light{color:'+cc+';border-color:'+cc+';}</style>');
		});
	});
	
	wp.customize('menu_ind_color_dark',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">#toggle-left,#toggle-right{color:'+cc+';border-color:'+cc+';}</style>');
		});
	});

	
	wp.customize('footer_bg_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">#footer{background:'+cc+'}</style>');
		});
	});
	
	wp.customize('footer_text_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">#footer{color:'+cc+'}</style>');
		});
	});
	
	wp.customize('footer_title_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">#footer p.serif{color:'+cc+'}</style>');
		});
	});
	
	
	wp.customize('footer_links_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">#footer a,a.backtotop{color:'+cc+'}a.backtotop{border-color:'+cc+'}</style>');
		});
	});
	
	wp.customize('footer_hover_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.no-touch #footer a:hover,.no-touch a.backtotop:hover{color:'+cc+'}.no-touch a.backtotop:hover{border-color:'+cc+'}</style>');
		});
	});
	
	wp.customize('copyright_text_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.credits p{color: '+cc+'}</style>');
		});
	});
	
	wp.customize('footer_bottom_bg_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.credits{background:'+cc+'}</style>');
			$('').attr('style', 'color: '+cc+' !important');
		});
	});
	
	wp.customize('footer_bottom_border_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.credits{border-color:'+cc+'}</style>');
		});
	});
	
	wp.customize('footer_icon_color',function( value ) {
		value.bind(function(cc) {
			$('head').append('<style type="text/css">.c-icons i{color:'+cc+'}</style>');
		});
	});

} )( jQuery );



