<?php
global $dt_modules, $dt_animation_types, $dtthemes_columns;
$dt_animation_types = array();

$dt_animation_types = array();

$dt_animation_types = array("flash" => "flash", "shake" => "shake", "bounce" => "bounce", "tada" => "tada", "swing" => "swing", "wobble" => "wobble", "pulse" => "pulse", "flip" => "flip", "flipInX" => "flipInX", "flipOutX" => "flipOutX", "flipInY" => "flipInY", "flipOutY" => "flipOutY", "fadeIn" => "fadeIn", "fadeInUp" => "fadeInUp", "fadeInDown" => "fadeInDown", "fadeInLeft" => "fadeInLeft", "fadeInRight" => "fadeInRight", "fadeInUpBig" => "fadeInUpBig", "fadeInDownBig" => "fadeInDownBig", "fadeInLeftBig" => "fadeInLeftBig", "fadeInRightBig" => "fadeInRightBig", "fadeOut" => "fadeOut", "fadeOutUp" => "fadeOutUp","fadeOutDown" => "fadeOutDown", "fadeOutLeft" => "fadeOutLeft", "fadeOutRight" => "fadeOutRight", "fadeOutUpBig" => "fadeOutUpBig", "fadeOutDownBig" => "fadeOutDownBig", "fadeOutLeftBig" => "fadeOutLeftBig","fadeOutRightBig" => "fadeOutRightBig", "bounceIn" => "bounceIn", "bounceInUp" => "bounceInUp", "bounceInDown" => "bounceInDown", "bounceInLeft" => "bounceInLeft", "bounceInRight" => "bounceInRight", "bounceOut" => "bounceOut", "bounceOutUp" => "bounceOutUp", "bounceOutDown" => "bounceOutDown", "bounceOutLeft" => "bounceOutLeft", "bounceOutRight" => "bounceOutRight", "rotateIn" => "rotateIn", "rotateInUpLeft" => "rotateInUpLeft", "rotateInDownLeft" => "rotateInDownLeft", "rotateInUpRight" => "rotateInUpRight", "rotateInDownRight" => "rotateInDownRight", "rotateOut" => "rotateOut", "rotateOutUpLeft" => "rotateOutUpLeft","rotateOutDownLeft" => "rotateOutDownLeft", "rotateOutUpRight" => "rotateOutUpRight", "rotateOutDownRight" => "rotateOutDownRight", "hinge" => "hinge", "rollIn" => "rollIn", "rollOut" => "rollOut", "lightSpeedIn" => "lightSpeedIn", "lightSpeedOut" => "lightSpeedOut", "slideDown" => "slideDown", "slideUp" => "slideUp", "slideLeft" => "slideLeft", "slideRight" => "slideRight", "slideExpandUp" => "slideExpandUp", "expandUp" => "expandUp", "expandOpen" => "expandOpen", "bigEntrance" => "bigEntrance", "hatch" => "hatch", "floating" => "floating", "tossing" => "tossing", "pullUp" => "pullUp", "pullDown" => "pullDown", "stretchLeft" => "stretchLeft", "stretchRight" => "stretchRight");

$variations = array('chocolate' => 'Chocolate', 'green' => 'Green', 'blue' => 'Blue', 'orange' => 'Orange', 'pink' => 'Pink', 'red' => 'Red', 'purple' => 'Purple', 'ocean' => 'Ocean', 'slateblue' => 'Slate Blue', 'skyblue' => 'Sky Blue', 'coral' => 'Coral', 'khaki' => 'Khaki', 'cyan' => 'Cyan', 'grey' => 'Grey', 'gold' => 'Gold', 'raspberry'=>'Raspberry', 'electricblue' => 'Electric Blue', 'eggplant' => 'Eggplant', 'ferngreen' => 'Fern Green', 'palebrown' => 'Pale Brown');

$button_types = array('without-icon' => 'Without Icon', 'with-icon-type1' => 'With Icon Type 1', 'with-icon-type2' => 'With Icon Type 2');

$button_size = array('small' => 'Small', 'medium' => 'Medium', 'large' => 'Large', 'xlarge' => 'Xlarge');

$page_targets = array('_blank' => 'Blank', '_new' => 'New', '_parent' => 'Parent', '_self' => 'Self', '_top' => 'Top');

$box_types = array('titled-box' => 'Titled Box', 'error-box' => 'Error Box', 'warning-box' => 'Warning Box', 'success-box' => 'Success Box', 'info-box' => 'Info Box');

$blocquote_types = array('type1' => 'Type 1', 'type2' => 'Type 2', 'type3' => 'Type 3');

$pullquote_types = array('pullquote1' => 'Pullquote 1', 'pullquote2' => 'Pullquote 2', 'pullquote3' => 'Pullquote 3', 'pullquote4' => 'Pullquote 4', 'pullquote5' => 'Pullquote 5', 'pullquote6' => 'Pullquote 6');

$callout_box_types = array('type1' => 'Type 1', 'type2' => 'Type 2', 'type3' => 'Type 3', 'type4' => 'Type 4', 'type5' => 'Type 5');

$pricingtable_types = $testimonial_types = $colored_icon_box_types = array('type1' => 'Type 1', 'type2' => 'Type 2');

$align = array('left' => 'Left', 'right' => 'Right', 'center' => 'Center');

$yesorno = array('yes' => 'Yes', 'no' => 'No');

$trueorfalse = array('true' => 'True', 'false' => 'False');

$tooltip_positions = array('top' => 'Top', 'right' => 'Right', 'bottom' => 'Bottom', 'left' => 'Left');

$tooltip_types = array('default' => 'Default', 'boxed' => 'Boxed');

$dropcap_types = array('Default' => 'Default', 'Circle' => 'Circle', 'Bordered Circle' => 'Bordered Circle', 'Square' => 'Square', 'Bordered Square' => 'Bordered Square');

$bacground_repeat = array('no-repeat' => 'No Repeat', 'repeat' => 'Repeat', 'repeat-x' => 'Repeat X', 'repeat-y' => 'Repeat Y');

$bacground_position = array('left top' => 'Left Top', 'left center' => 'Left Center', 'left bottom' => 'Left Bottom', 'right top' => 'Right Top', 'right center' => 'Right Center', 'right bottom' => 'Right Bottom', 'center top' => 'Center Top', 'center center' => 'Center Center', 'center bottom' => 'Center Bottom');

$lengths = array(5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55, 60 => 60, 65 => 65, 70 => 70, 75 => 75, 80 => 80, 85 => 85, 90 => 90, 95 => 95, 100 => 100);

$post_columns = array( 1 => 1, 2 => 2);

$boolean_values = array( "true" => "true", "false" => "false");

$portfolio_columns = array(2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6);

$teacher_columns = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5);

$progressbar_types = array('standard' => 'Standard', 'progress-striped' => 'Striped', 'progress-striped-active' => 'Active');

$oltypes = array('decimal' => 'Decimal', 'decimal-leading-zero' => 'Decimal With Leading Zero', 'lower-alpha' => 'Lower Alpha', 'lower-roman' => 'Lower Roman', 'upper-alpha' => 'Upper Alpha', 'upper-roman' => 'Upper Roman');

$ultypes = array('arrow' => 'Arrow', 'rounded-arrow' => 'Rounded Arrow', 'double-arrow' => 'Double Arrow', 'heart' => 'Heart', 'trash' => 'Trash', 'star' => 'Star', 'tick' => 'Tick', 'rounded-tick' => 'Rounded Tick', 'cross' => 'Cross', 'rounded-cross' => 'Rounded Cross', 'rounded-question' => 'Rounded Question', 'rounded-info' => 'Rounded Info', 'delete' => 'Delete', 'warning' => 'Warning', 'comment' => 'Comment', 'edit' => 'Edit', 'share' => 'Share', 'plus' => 'Plus', 'rounded-plus' => 'Rounded Plus', 'minus' => 'Minus', 'rounded-minus' => 'Rounded Minus', 'asterisk' => 'Asterisk', 'cart' => 'Cart', 'folder' => 'Folder', 'folder-open' => 'Folder Open', 'desktop' => 'Desktop', 'tablet' => 'Tablet', 'mobile' => 'Mobile', 'reply' => 'Reply', 'quote' => 'Quote', 'mail' => 'Mail', 'external-link' => 'External Link', 'adjust' => 'Adjust', 'pencil' => 'Pencil', 'print' => 'Print', 'tag' => 'Tag', 'thumbs-up' => 'Thumbs Up', 'thumbs-down' => 'Thumbs Down', 'time' => 'Time', 'globe' => 'Globe', 'pushpin' => 'Pushpin', 'map-marker' => 'Map Marker', 'link' => 'Link', 'paper-clip' => 'Paper Clip', 'download' => 'Download', 'key' => 'Key', 'search' => 'Search', 'rss' => 'Rss', 'twitter' => 'Twitter', 'facebook' => 'Facebook', 'linkedin' => 'Linkedin', 'google-plus' => 'Google Plus');

$slider_types = array('LayerSlider' => 'Layer Slider', 'RevolutionSlider' => 'Revolution Slider');

$column_options = array(
	'id' => array(  
		'title' => esc_html__('ID', 'dt_themes'),
		'type' => 'text',
		'default_value' => ''
	),
	'class' => array(
		'title' => esc_html__('CSS Class', 'dt_themes'),
		'type' => 'text',
		'default_value' => ''
	),
);

	
/*  Start of Columns Definition */
$dtthemes_columns['one_half'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('1/2 Column', 'dt_themes'));
$dtthemes_columns['one_third'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('1/3 Column', 'dt_themes'));
$dtthemes_columns['one_fourth'] 	= array( 'type' => 'column', 'options' => $column_options, 'name' => __('1/4 Column', 'dt_themes'));
$dtthemes_columns['one_fifth'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('1/5 Column', 'dt_themes'));
$dtthemes_columns['one_sixth'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('1/6 Column', 'dt_themes'));
$dtthemes_columns['two_third'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('2/3 Column', 'dt_themes'));
$dtthemes_columns['two_fifth'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('2/5 Column', 'dt_themes'));
$dtthemes_columns['two_sixth'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('2/6 Column', 'dt_themes'));
$dtthemes_columns['three_fourth'] 	= array( 'type' => 'column', 'options' => $column_options, 'name' => __('3/4 Column', 'dt_themes'));
$dtthemes_columns['three_fifth'] 	= array( 'type' => 'column', 'options' => $column_options, 'name' => __('3/5 Column', 'dt_themes'));
$dtthemes_columns['three_sixth'] 	= array( 'type' => 'column', 'options' => $column_options, 'name' => __('3/6 Column', 'dt_themes'));
$dtthemes_columns['four_fifth'] 	= array( 'type' => 'column', 'options' => $column_options, 'name' => __('4/5 Column', 'dt_themes'));
$dtthemes_columns['four_sixth'] 	= array( 'type' => 'column', 'options' => $column_options, 'name' => __('4/6 Column', 'dt_themes'));
$dtthemes_columns['five_sixth'] 	= array( 'type' => 'column', 'options' => $column_options, 'name' => __('5/6 Column', 'dt_themes'));
$dtthemes_columns['resizable'] 		= array( 'type' => 'column', 'options' => $column_options, 'name' => __('Resizable Column', 'dt_themes'));
unset($dtthemes_columns['resizable']['options']['type']);


$dtthemes_columns['fullwidth_section'] = array( 
	'name' => __('Fullwidth Section', 'dt_themes'),
	'type' => 'section',
	'options' => array(
		'backgroundcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'backgroundimage' => array(
			'title' => __('Background Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => ''
		),
		'opacity' => array(
			'title' => __('Background Opacity', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'parallax' => array(
			'title' => __('Parallax Effect', 'dt_themes'),
			'type' => 'select',
			'options' => $yesorno,
			'default_value' => array('no')
		),
		'backgroundrepeat' => array(
			'title' => __('Background Repeat', 'dt_themes'),
			'type' => 'select',
			'options' => $bacground_repeat,
			'default_value' => array('no-repeat')
		),
		'backgroundposition' => array(
			'title' => __('Background Position', 'dt_themes'),
			'type' => 'select',
			'options' => $bacground_position,
			'default_value' => array('left top')
		),
		'paddingtop' => array(
			'title' => __('Padding Top', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'paddingbottom' => array(
			'title' => __('Padding Bottom', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'class' => array(
			'title' => __('CSS Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		)
	)
);

/*  End of Columns definition */


/*  Start of General Modules */

$dt_modules['general']['doshortcode_anycontent'] = array(
	'name' => __('Add Any Content Here', 'dt_themes'),
	'tooltip' => 'Add any content using this module',
	'icon_class' => 'ico-anycontent',
	'options' => array(
		'acc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true
		)
	)
);
	
										 
$dt_modules['general']['doshortcode_accordion_framed'] = array(
	'name' => __('Accordion Framed', 'dt_themes'),
	'tooltip' => 'Add Accordion Framed Module',
	'icon_class' => 'ico-accordion',
	'options' => array(
		'acc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_accordion_group]<br>
							[dt_sc_toggle_framed title="Accordion 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Accordion 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Accordion 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
						[/dt_sc_accordion_group]'
		)
	)
);

$dt_modules['general']['doshortcode_accordion_default'] = array(
	'name' => __('Accordion Default', 'dt_themes'),
	'tooltip' => 'Add Accordion Default Module',
	'icon_class' => 'ico-accordion',
	'options' => array(
		'acc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_accordion_group]<br>
							[dt_sc_toggle title="Accordion 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Accordion 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Accordion 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
						[/dt_sc_accordion_group]'
		)
	)
);

$dt_modules['general']['animation'] = array(
	'name' => __('Animation', 'dt_themes'),
	'tooltip' => 'Add Animation effect for any content',
	'icon_class' => 'ico-animation',
	'options' => array(
		'effect' => array(
			'title' => __('Choose Effect', 'dt_themes'),
			'type' => 'select',
			'options' => $dt_animation_types,
			'default_value' => array('fadeInUp')
		),
		'delay' => array(
			'title' => __('Delay', 'dt_themes'),
			'type' => 'text',
			'default_value' => 400
		),
		'animation_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Add any content here for animation.'
		)
	)
);


$dt_modules['general']['titled_box'] = array(
	'name' => __('Titled Box', 'dt_themes'),
	'tooltip' => 'Add titled box and different types of messgae box',
	'icon_class' => 'ico-box',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $box_types,
			'default_value' => array('titled-box')
		),
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Title Comes Here'
		),
		'icon' => array(
			'title' => __('Fontawesome Icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-cogs'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'box_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
		)
	)
);

$dt_modules['general']['button'] = array(
	'name' => __('Button', 'dt_themes'),
	'tooltip' => 'Add Button',
	'icon_class' => 'ico-button',
	'options' => array(

		'type' => array(
			'title' => __('Style', 'dt_themes'),
			'type' => 'select',
			'options' => $button_types,
			'default_value' => array('without-icon')
		),
		
		'icon' => array(
			'title' => __('Icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-home'
		),
		
		'link' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		
		'size' => array(
			'title' => __('Size', 'dt_themes'),
			'type' => 'select',
			'options' => $button_size,
			'default_value' => array('medium')
		),
		
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		
		'target' => array(
			'title' => __('Target', 'dt_themes'),
			'type' => 'select',
			'options' => $page_targets,
			'default_value' => array('_blank')
		),
		
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'custom-class'
		),
		
		'button_content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Sample Button'
		),
	));

$dt_modules['general']['blockquote'] = array(
	'name' => __('Blockquote', 'dt_themes'),
	'tooltip' => 'Add Blockquote',
	'icon_class' => 'ico-blockquote',
	'options' => array(
	
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $blocquote_types,
			'default_value' => array('type1')
		),
		
		'align' => array(
			'title' => __('Align', 'dt_themes'),
			'type' => 'select',
			'options' => $align,
			'default_value' => array('left')
		),

		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		
		'cite' => array(
			'title' => __('Cite', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		
		'blockquote_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
		)
	) );

$dt_modules['general']['pullquote'] = array(
	'name' => __('Pullquote', 'dt_themes'),
	'tooltip' => 'Add different types of pullquotes',
	'icon_class' => 'ico-quote',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $pullquote_types,
			'default_value' => array('pullquote1')
		),
		'icon' => array(
			'title' => __('Show Icon', 'dt_themes'),
			'type' => 'select',
			'options' => $yesorno,
			'default_value' => array('yes')
		),
		'align' => array(
			'title' => __('Align', 'dt_themes'),
			'type' => 'select',
			'options' => $align,
			'default_value' => array('left')
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'cite' => array(
			'title' => __('Cite Name', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Dolor sit amet'
		),
		'pq_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
		)
	) );

$dt_modules['general']['tooltip'] = array(
	'name' => __('Tooltip', 'dt_themes'),
	'tooltip' => 'Add tooltip with different positions',
	'icon_class' => 'ico-pullquote',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $tooltip_types,
			'default_value' => array('default')
		),
		'position' => array(
			'title' => __('Position', 'dt_themes'),
			'type' => 'select',
			'options' => $tooltip_positions,
			'default_value' => array('top')
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'tooltip' => array(
			'title' => __('Tooltip Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Consectetur adipisicing elit'
		),
		'href' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		'target' => array(
			'title' => __('Target', 'dt_themes'),
			'type' => 'select',
			'options' => $page_targets,
			'default_value' => array('_blank')
		),
		'tp_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Lorem ipsum'
		)
	) );
	
$dt_modules['general']['callout_box'] = array(
	'name' => __('Callout Box', 'dt_themes'),
	'tooltip' => 'Add the callout box here',
	'icon_class' => 'ico-callout',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $callout_box_types,
			'default_value' => array('type1')
		),
		'link' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		'button_text' => array(
			'title' => __('Button Label', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Purchase Now'
		),
		
		'target' => array(
			'title' => __('Target', 'dt_themes'),
			'type' => 'select',
			'options' => $page_targets,
			'default_value' => array('_blank')
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text'
		),
		'cb_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "<h4>Our Technological services has been improved vastly</h4><h5>Come Experience the real life situations of saving life</h5>"
		)
	)
);

$dt_modules['general']['callout_box_with_moving_bg'] = array(
	'name' => __('Callout Box With Moving BG', 'dt_themes'),
	'tooltip' => 'Add the callout box with moving background here',
	'icon_class' => 'ico-callout',
	'options' => array(
		'background_image_url' => array(
			'title' => __('Background Image URL', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'cb_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "<h2>Our Technological services has been improved vastly</h2><h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed doeiusmod tempor incididunt ut labore etdolore magna aliqua Ut enim ad minim veniam doeiusmod tempor incididunt ut labore et dolore maga aliqua Ut enim ad minim veniam veniam doeiusmod tempor incididunt ut labore </h6>"
		)
	)
);


$dt_modules['general']['fancy_ol'] = array(
	'name' => __('Ordered Lists', 'dt_themes'),
	'tooltip' => 'Add items in ordered list',
	'icon_class' => 'ico-orderedlists',
	'options' => array(
		'style' => array(
			'title' => __('Style', 'dt_themes'),
			'type' => 'select',
			'options' => $oltypes,
			'default_value' => array('decimal')
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'ol_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ol>
							<li>Lorem ipsum dolor sit</li>
							<li>Praesent convallis nibh</li>
							<li>Nullam ac sapien sit</li>
							<li>Phasellus auctor augue</li>
						</ol>'
		)
	)
);

$dt_modules['general']['fancy_ul'] = array(
	'name' => __('Unordered Lists', 'dt_themes'),
	'tooltip' => 'Add items in unordered lists',
	'icon_class' => 'ico-unorderedlists',
	'options' => array(
		'style' => array(
			'title' => __('Style', 'dt_themes'),
			'type' => 'select',
			'options' => $ultypes,
			'default_value' => array('arrow')
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text'
		),
		'ul_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ul>
							<li>Lorem ipsum dolor sit</li>
							<li>Praesent convallis nibh</li>
							<li>Nullam ac sapien sit</li>
							<li>Phasellus auctor augue</li>
						</ul>'
		)
	));

$dt_modules['general']['manual_list'] = array(
	'name' => __('Manual Lists', 'dt_themes'),
	'tooltip' => 'Add items in manual lists',
	'icon_class' => 'ico-manuallists',
	'options' => array(
		'type' => array(
			'title' => __('Style', 'dt_themes'),
			'type' => 'select',
			'options' => array( 'type1' => 'Type 1', 'type2' => 'Type 2'),
			'default_value' => array('type1')
		),
		'ul_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ul>
				<li>[dt_sc_box]1[/dt_sc_box]Sinus Attack!</li>
				<li>[dt_sc_box]2[/dt_sc_box]Seasonal affective disorder</li>
				<li>[dt_sc_box]3[/dt_sc_box]Medicaid Eligibility</li>
				</ul>'
		)
	));
	
$dt_modules['general']['doshortcode_list_with_font_awesome_icons'] = array(
	'name' => __('Lists With FontAwesome Icons', 'dt_themes'),
	'tooltip' => 'Add FontAwesome Icons List Module',
	'icon_class' => 'ico-fa-lists',
	'options' => array(
		'iconlist_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[list_with_font_awesome_icons style="type2"]
					<ul>
						<li>[font_awesome_icon class="fa-leaf"] Created from natural herbs - Ginseng roots extract</li>
						<li>[font_awesome_icon class="fa-heart"] 100% safe for your skin</li>
						<li>[font_awesome_icon class="fa-shield"] Quality product from SpaLabs</li>
						<li>[font_awesome_icon class="fa-user-md"] Created by Medical Professionals of Spa Lab</li>
					</ul>
					[/list_with_font_awesome_icons]'
		)
	)
);

$dt_modules['general']['doshortcode_pricing_table'] = array(
	'name' => __('Pricing Table', 'dt_themes'),
	'tooltip' => 'Add Pricing Table',
	'icon_class' => 'ico-pricingtabletype1',
	'options' => array(
		'pricingtabletype1_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "[dt_sc_pricing_table type =' type1']
[dt_sc_one_third first]
[dt_sc_pricing_table_item heading='Heading' button_text='Buy Now' button_link='#' price='$15' per='month' selected]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]
[dt_sc_one_third]
[dt_sc_pricing_table_item heading='Heading' button_text='Buy Now' button_link='#' price='$15' per='month' ]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]
[dt_sc_one_third]
[dt_sc_pricing_table_item heading='Heading' button_text='Buy Now' button_link='#' price='$15' per='month' ]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]
[/dt_sc_pricing_table]"
		)
	)
);

$dt_modules['general']['doshortcode_pricing_table_with_image'] = array(
	'name' => __('Pricing Table With Image', 'dt_themes'),
	'tooltip' => 'Add Pricing Table With Image',
	'icon_class' => 'ico-pricingtabletype2',
	'options' => array(
		'pricingtabletype2_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "[dt_sc_pricing_table type =' type2']
[dt_sc_one_third first]
[dt_sc_pricing_table_item_with_image thumb='http://dummyimage.com/350x200' heading='Heading' button_text='Buy Now' button_link='#' button_size='small' price='$15' per='month' selected]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item_with_image]
[/dt_sc_one_third]
[dt_sc_one_third]
[dt_sc_pricing_table_item_with_image thumb='http://dummyimage.com/350x200' heading='Heading' button_text='Buy Now' button_link='#' button_size='small' price='$15' per='month' ]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item_with_image]
[/dt_sc_one_third]
[dt_sc_one_third]
[dt_sc_pricing_table_item_with_image thumb='http://dummyimage.com/350x200' heading='Heading' button_text='Buy Now' button_link='#' button_size='small' price='$15' per='month' ]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item_with_image]
[/dt_sc_one_third]
[/dt_sc_pricing_table]"
		)
	)
);

$dt_modules['general']['progressbar'] = array(
	'name' => __('Progress Bar', 'dt_themes'),
	'tooltip' => 'Add different types of progres bar',
	'icon_class' => 'ico-progressbar',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $progressbar_types,
			'default_value' => array('standard')
		),
		'color' => array(
			'title' => __('Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'value' => array(
			'title' => __('Value', 'dt_themes'),
			'type' => 'text',
			'default_value' => 55
		),
		'content' => array(
			'title' => __('Text', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Consectetur'
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
	));

$dt_modules['general']['tabs_horizontal'] = array(
	'name' => __('Tabs - Horizontal', 'dt_themes'),
	'tooltip' => 'Add horizontal tabs',
	'icon_class' => 'ico-tabs',
	'options' => array(

		'th_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_tab title="Tab 1"]<br>
							
							Tab 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 2"]<br>
							
							Tab 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 3"]<br>
							
							Tab 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]'
		)
	)
);

$dt_modules['general']['tabs_vertical'] = array(
	'name' => __('Tabs Vertical', 'dt_themes'),
	'tooltip' => 'Add vertical tabs',
	'icon_class' => 'ico-tabs',
	'options' => array(
		'tv_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_tab title="Tab 1"]<br>
							
							Tab 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 2"]<br>
							
							Tab 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 3"]<br>
							
							Tab 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]'
		)
	)
);

$dt_modules['general']['doshortcode_toggledefault'] = array(
	'name' => __('Toggle Default', 'dt_themes'),
	'tooltip' => 'Add default toggles',
	'icon_class' => 'ico-toggle',
	'options' => array(
		'td_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_toggle title="Toggle 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Toggle 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Toggle 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
						[/dt_sc_toggle]'
		)
	)
);

$dt_modules['general']['doshortcode_toggleframed'] = array(
	'name' => __('Toggle Framed', 'dt_themes'),
	'tooltip' => 'Add framed toggles',
	'icon_class' => 'ico-toggle',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_toggle_framed title="Toggle 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Toggle 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Toggle 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
						[/dt_sc_toggle_framed]'
		)
	)
);

$dt_modules['general']['dropcap'] = array(
	'name' => __('Dropcap', 'dt_themes'),
	'tooltip' => __('Use this module to add dropcap', 'dt_themes'),
	'icon_class' => 'ico-dropcap',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $dropcap_types,
			'default_value' => array('Circle')
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#4bbcd7'
		),
		'content' => array(
			'title' => __('Text', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'A'
		)
	)
);

$dt_modules['general']['doshortcode_team'] = array(
	'name' => __('Team', 'dt_themes'),
	'tooltip' => __('Use this module to add member', 'dt_themes'),
	'icon_class' => 'ico-team',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_team name="DesignThemes" role="Spa Director" email="yourname@domain.com" image="http://placehold.it/500" twitter="#" facebook="#" google="#" linkedin="#"]<br><p>Saleem naijar kaasram eerie can be disbursed in the wofl like of a fox that is her thing smaoasa lase lemedds laasd pamade eleifend sapien.</p>[/dt_sc_team]'
		)
	)
);

$dt_modules['general']['doshortcode_alignleft'] = array(
	'name' => __('Align Left', 'dt_themes'),
	'tooltip' => __('Use this module to align left', 'dt_themes'),
	'icon_class' => 'ico-team',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_align_left] This is simply dummy text [/dt_sc_align_left]'
		)
	)
);


$dt_modules['general']['doshortcode_alignright'] = array(
	'name' => __('Align Right', 'dt_themes'),
	'tooltip' => __('Use this module to align right', 'dt_themes'),
	'icon_class' => 'ico-team',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_align_right] This is simply dummy text [/dt_sc_align_right]'
		)
	)
);


$dt_modules['general']['doshortcode_aligncenter'] = array(
	'name' => __('Align Center', 'dt_themes'),
	'tooltip' => __('Use this module to align center', 'dt_themes'),
	'icon_class' => 'ico-team',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_align_center] This is simply dummy text [/dt_sc_align_center]'
		)
	)
);


$dt_modules['general']['doshortcode_testimonial'] = array(
	'name' => __('Testimonial', 'dt_themes'),
	'tooltip' => __('Use this module to add testimonial', 'dt_themes'),
	'icon_class' => 'ico-testimonial',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_testimonial name="John Doe" image="http://placehold.it/300" role="Cambridge Telcecom"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]'
		)
	)
);

$dt_modules['general']['testimonial_carousel'] = array(
	'name' => __('Testimonial Carousel', 'dt_themes'),
	'tooltip' => __('Use this module to add testimonial carousel', 'dt_themes'),
	'icon_class' => 'ico-testimonial',
	'options' => array(
	
		'tmc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ul>
					<li>[dt_sc_testimonial image="http://placehold.it/300" name="John Doe" role="Cambridge Telcecom"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]</li>
					<li>[dt_sc_testimonial image="http://placehold.it/300" name="John Doe" role="Cambridge Telcecom"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]</li>
					<li>[dt_sc_testimonial image="http://placehold.it/300" name="John Doe" role="Cambridge Telcecom"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]</li>
				</ul>'
		)
	)
);

$dt_modules['general']['doshortcode_three_columns_portfolio'] = array(
	'name' => __('3 Columns Portfolio Carousel', 'dt_themes'),
	'tooltip' => __('Use this module to add portfolio grid in 3 columns', 'dt_themes'),
	'icon_class' => 'ico-portfolio',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_three_columns_portfolio showposts="-1" categories=""]'
		)
	)
);

$dt_modules['general']['doshortcode_four_columns_portfolio'] = array(
	'name' => __('4 Columns portfolio Carousel', 'dt_themes'),
	'tooltip' => __('Use this module to add portfolio grid in 4 columns', 'dt_themes'),
	'icon_class' => 'ico-portfolio',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_four_columns_portfolio showposts="-1" categories=""]'
		)
	)
);

/* ICON BOX */

# Icon Box - Type 1
$dt_modules['general']['doshortcode_icon_box_type1'] = array(
	'name' => __('Icon Box-type1', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type1', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type1" fontawesome_icon="trophy" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[/dt_sc_icon_box]'
		)
	)
);

# Icon Box - Type 2
$dt_modules['general']['doshortcode_icon_box_type2'] = array(
	'name' => __('Icon Box-type2', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type2', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type2" fontawesome_icon="leaf" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[dt_sc_button link="#" size="small" target="_blank"]Know More[/dt_sc_button]
[/dt_sc_icon_box]'
		)
	)
);

# Icon Box - Type 3
$dt_modules['general']['doshortcode_icon_box_type3'] = array(
	'name' => __('Icon Box-type3', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type3', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type3" fontawesome_icon="bell" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[/dt_sc_icon_box]'
		)
	)
);

# Icon Box - Type 4
$dt_modules['general']['doshortcode_icon_box_type4'] = array(
	'name' => __('Icon Box-type4', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type4', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type4" fontawesome_icon="trophy" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[dt_sc_button link="#" size="small" target="_blank"]Know More[/dt_sc_button]
[/dt_sc_icon_box]'
		)
	)
);

# Icon Box - Type 5
$dt_modules['general']['doshortcode_icon_box_type5'] = array(
	'name' => __('Icon Box-type5', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type5', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type5" fontawesome_icon="flag" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[/dt_sc_icon_box]'
		)
	)
);

# Icon Box - Type 6
$dt_modules['general']['doshortcode_icon_box_type6'] = array(
	'name' => __('Icon Box-type6', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type6', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box_with_image type =" type6" image_url="http://dummyimage.com/100X100" image_alt="" image_title="" title="Well Trained Professionals" link="#" target="_blank" description="Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit." ]
[/dt_sc_icon_box_with_image]'
		)
	)
);

# Icon Box - Type 7
$dt_modules['general']['doshortcode_icon_box_type7'] = array(
	'name' => __('Icon Box-type7', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type7', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box_process type =" type7" value="1" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[/dt_sc_icon_box_process]'
		)
	)
);

# Icon Box - Type 8
$dt_modules['general']['doshortcode_icon_box_type8'] = array(
	'name' => __('Icon Box-type8', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type8', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type8" fontawesome_icon="bell" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[/dt_sc_icon_box]'
		)
	)
);

# Icon Box - Type 9
$dt_modules['general']['doshortcode_icon_box_type9'] = array(
	'name' => __('Icon Box-type9', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type9', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type9" fontawesome_icon="leaf" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[/dt_sc_icon_box]'
		)
	)
);

# Icon Box - Type 10
$dt_modules['general']['doshortcode_icon_box_type10'] = array(
	'name' => __('Icon Box-type10', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box type10', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_icon_box type =" type10" fontawesome_icon="key" title="Well Trained Professionals" link="#" target="_blank" ]
Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.
[/dt_sc_icon_box]'
		)
	)
);



/*  End of General Modules */


/*  Start of Unique Modules */

$dt_modules['unique']['spa_procedure'] = array(
	'name' => __('Spa Procedure','dt_themes'),
	'tooltip' => __('Use this module to add spa procedure','dt_themes'),
	'icon_class' => 'ico-spaprocedure',
	'options' => array(
		'procedure_title' => array(
			'title' => __('Procedure Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Ayurveda Spa Highlights'
		),
		'image_link' => array(
			'title' => __('Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => 'http://dummyimage.com/1170x810/a399a3/13131f&amp;text=Image'
		),
		'procedure_highlight1' => array(
			'title' => __('Procedure Highlight1', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Fusce nec purus dui, id placerat sem.'
		),
		'procedure_highlight2' => array(
			'title' => __('Procedure Highlight2', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Fusce nec purus dui, id placerat sem.'
		),
		'procedure_highlight3' => array(
			'title' => __('Procedure Highlight3', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Fusce nec purus dui, id placerat sem.'
		),
		'procedure_highlight4' => array(
			'title' => __('Procedure Highlight4', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Fusce nec purus dui, id placerat sem.'
		),
		'procedure_highlight5' => array(
			'title' => __('Procedure Highlight5', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Fusce nec purus dui, id placerat sem.'
		),
		'rang_title' => array(
			'title' => __('Range Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Price Range'
		),
		'catalog_item_ids' => array(
			'title' => __('Catalog Item Ids', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'catalog_show_dummy_price' => array(
			'title' => __('Catalog Show Dummy Price', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'true'
		),
		'button_text' => array(
			'title' => __('Button Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Make a Reservation'
		),
		'button_link' => array(
			'title' => __('Button Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		'button_target' => array(
			'title' => __('Button Target', 'dt_themes'),
			'type' => 'select',
			'options' => $page_targets,
			'default_value' => array('_blank')
		),
		
	)
);

$dt_modules['unique']['donutchart_small'] = array(
	'name' => __('Donut Chart - Small', 'dt_themes'),
	'tooltip' => __('Use this module to add small donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#4bbcd7'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '40'
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'This is simply dummy text.'
		),
	)
);

$dt_modules['unique']['donutchart_medium'] = array(
	'name' => __('Donut Chart - Medium', 'dt_themes'),
	'tooltip' => __('Use this module to add medium donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#7aa127'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '65'
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'This is simply dummy text.'
		),
	)
);

$dt_modules['unique']['donutchart_large'] = array(
	'name' => __('Donut Chart - Large', 'dt_themes'),
	'tooltip' => __('Use this module to add large donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#a23b6f'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '50'
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'This is simply dummy text.'
		),
	)
);

$dt_modules['unique']['donutchart_small_type2'] = array(
	'name' => __('Donut Chart - Small Type2', 'dt_themes'),
	'tooltip' => __('Use this module to add small type2 donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#7aa127'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '65'
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'This is simply dummy text.'
		),
	)
);


$dt_modules['unique']['donutchart_medium_type2'] = array(
	'name' => __('Donut Chart - Medium Type2', 'dt_themes'),
	'tooltip' => __('Use this module to add medium type2 donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#7aa127'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '65'
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'This is simply dummy text.'
		),
	)
);


$dt_modules['unique']['donutchart_large_type2'] = array(
	'name' => __('Donut Chart - Large Type2', 'dt_themes'),
	'tooltip' => __('Use this module to add large type2 donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#7aa127'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '65'
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'This is simply dummy text.'
		),
	)
);


$dt_modules['unique']['post'] = array(
	'name' => __('Individual Post', 'dt_themes'),
	'tooltip' => __('Use this module to display any single post', 'dt_themes'),
	'icon_class' => 'ico-singlepost',
	'options' => array(
		'id' => array(
			'title' => __('Post Id', 'dt_themes'),
			'type' => 'text',
			'default_value' => '1'
		),
		'read_more_text' => array(
			'title' => __('Read More Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Read More'
		),
		'excerpt_length' => array(
			'title' => __('Excerpt Length', 'dt_themes'),
			'type' => 'text',
			'default_value' => '10'
		)
	)
);

$dt_modules['unique']['recent_post'] = array(
	'name' => __('Recent Posts', 'dt_themes'),
	'tooltip' => __('Use this module to display recent posts', 'dt_themes'),
	'icon_class' => 'ico-recentposts',
	'options' => array(
		'column' => array(
			'title' => __('Columns', 'dt_themes'),
			'type' => 'select',
			'options' => $post_columns,
			'default_value' => array(3)
		),
		'count' => array(
			'title' => __('Limit', 'dt_themes'),
			'type' => 'text',
			'default_value' => '2'
		),
		'read_more_text_show' => array(
			'title' => __('Read More Text Show', 'dt_themes'),
			'type' => 'select',
			'options' => $boolean_values,
			'default_value' => array(3)
		),
		'read_more_text' => array(
			'title' => __('Read More Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Read More'
		),
		'excerpt_length' => array(
			'title' => __('Excerpt Length', 'dt_themes'),
			'type' => 'text',
			'default_value' => '10'
		),
		'excerpt' => array(
			'title' => __('Excerpt Show', 'dt_themes'),
			'type' => 'select',
			'options' => $boolean_values,
			'default_value' => array(3)
		)
	)
);

$dt_modules['unique']['recent_post_with_category'] = array(
	'name' => __('Recent Posts With Category', 'dt_themes'),
	'tooltip' => __('Use this module to display recent posts based on categories', 'dt_themes'),
	'icon_class' => 'ico-recentposts',
	'options' => array(
		'column' => array(
			'title' => __('Columns', 'dt_themes'),
			'type' => 'select',
			'options' => $post_columns,
			'default_value' => array(3)
		),
		'category_id' => array(
			'title' => __('Category ID', 'dt_themes'),
			'type' => 'text',
			'default_value' => '19'
		),
		'count' => array(
			'title' => __('Limit', 'dt_themes'),
			'type' => 'text',
			'default_value' => '2'
		),
		'read_more_text_show' => array(
			'title' => __('Read More Text Show', 'dt_themes'),
			'type' => 'select',
			'options' => $boolean_values,
			'default_value' => array(3)
		),
		'read_more_text' => array(
			'title' => __('Read More Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Read More'
		),
		'excerpt_length' => array(
			'title' => __('Excerpt Length', 'dt_themes'),
			'type' => 'text',
			'default_value' => '10'
		),
		'excerpt' => array(
			'title' => __('Excerpt Show', 'dt_themes'),
			'type' => 'select',
			'options' => $boolean_values,
			'default_value' => array(3)
		)
	)
);

$dt_modules['unique']['icon_box_colored'] = array(
	'name' => __('Colored Box', 'dt_themes'),
	'tooltip' => 'Add the colored icon box',
	'icon_class' => 'ico-coloredbox',
	'options' => array(
		'fontawesome_icon' => array(
			'title' => __('Fontawesome Icons', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'home'
		),
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Sample Title'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#333334'
		),
		'ibc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempora.</p>
			[dt_sc_button link="#" size="small" target="_blank"]Know More[/dt_sc_button]'
		)
	)
);

$dt_modules['unique']['infographic_bar'] = array(
	'name' => __('Infographic Bar', 'dt_themes'),
	'tooltip' => 'Add info graphic icons bar',
	'icon_class' => 'ico-chart',
	'options' => array(
	
		'icon' => array(
			'title' => __('Fontawesome Icons', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-female'),
		
		'icon_size' => array(
			'title' => __('Size', 'dt_themes'),
			'type' => 'text',
			'default_value' => '90'),
			
		'value' => array(
			'title' => __('Percentage', 'dt_themes'),
			'type' => 'text',
			'default_value' => '60'),
			
		'type' => array(
			'title' => __('Type','dt_themes'),
			'type' => 'select',
			'options' => array( 'standard' => __('standard (Default)','dt_themes'), 'progress-striped' => __('Progress Striped','dt_themes'),
							'progress-striped-active' => __('Progress Active Striped','dt_themes') ),
			'default_value' => array('standard')
		),
		'color' => array(
			'title' => __('Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#81d742'
		),
		'ibc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>'
		)
	)
);

$dt_modules['unique']['book_appointment'] = array(
	'name' => __('Book Appoinment', 'dt_themes'),
	'tooltip' => 'Add book appoinment section',
	'icon_class' => 'ico-appointment',
	'options' => array(
		'ibc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<br>[dt_sc_phone phone="+1 200 258 2145" /]</br>
			<br>[dt_sc_email emailid="yourname@somemail.com" /]</br>
			<br>[dt_sc_online_form url="http://www.google.com" /]</br>'
		)
	)
);

$dt_modules['unique']['doshortcode_catalog_items'] = array(
	'name' => __('Catalog Items', 'dt_themes'),
	'tooltip' => __('Use this module to add catalog items', 'dt_themes'),
	'icon_class' => 'ico-catalog-items',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_catalog_items item_ids="91,92,93" column="1" excerpt_length="25" link="#" target="_self"]'
		)
	)
);

$dt_modules['unique']['doshortcode_catalog_items_with_category'] = array(
	'name' => __('Catalog Items with Category', 'dt_themes'),
	'tooltip' => __('Use this module to add catalog items based on category', 'dt_themes'),
	'icon_class' => 'ico-catalog-items',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_catalog_items_with_category category_ids="37,38" column="1" excerpt_length="25" link="#" target="_self"]'
		)
	)
);


$dt_modules['unique']['doshortcode_catalog_menu_items_list'] = array(
	'name' => __('Catalog Menu Items', 'dt_themes'),
	'tooltip' => __('Use this module to add catalog menu items list', 'dt_themes'),
	'icon_class' => 'ico-catalog-menu-list',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_catalog_menu_items_list item_ids="91,92,93" icon="fa-leaf" show_dummy_price="true" link="#" target="_self"]'
		)
	)
);

$dt_modules['unique']['news_letter'] = array(
	'name' => __('News Letter', 'dt_themes'),
	'tooltip' => __('Use this module to add news letter', 'dt_themes'),
	'icon_class' => 'ico-gift-form',
	'options' => array(

		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Newsletter'),
		
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Fusce nec purus dui, id placerat sem.'),
		
		'placeholder_text' => array(
			'title' => __('Placeholder Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Enter Your Email ID'),
	)
);

$dt_modules['unique']['doshortcode_gift_form'] = array(
	'name' => __('Special Gifts', 'dt_themes'),
	'tooltip' => __('Use this module to add news letter', 'dt_themes'),
	'icon_class' => 'ico-news-letter',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_gift_products limit="-1" posts_column="one-fourth-column/one-half-column/one-third-column" category_slug=""]'
		)
	)
);


$dt_modules['unique']['doshortcode_counter'] = array(
	'name' => __('Counter', 'dt_themes'),
	'tooltip' => __('Use this module to add counter', 'dt_themes'),
	'icon_class' => 'ico-counter',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_counter title="Clients" number="250" /]'
		)
	)
);


$dt_modules['unique']['reserve_appointment'] = array(
	'name' => __('Reserve Appointment', 'dt_themes'),
	'tooltip' => __('Use this module to reserve appointment module.', 'dt_themes'),
	'icon_class' => 'ico-appointment',
	'options' => array(
		'serviceids' => array(
			'title' => __('Service Ids (separeted by commas)', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'staffids' => array(
			'title' => __('Staff Ids (separeted by commas)', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		)		
	)
);



/*  End of Unique Modules */

/*  Start of Others Modules */

$dt_modules['others']['h1_title'] = array(
	'name' => __('Heading 1', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 1', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Enter H1 Title'
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem ipsum dolor sit amet.'
		),		
	)
);

$dt_modules['others']['h2_title'] = array(
	'name' => __('Heading 2', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 2', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Enter H2 Title'
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem ipsum dolor sit amet.'
		),
	)
);

$dt_modules['others']['h3_title'] = array(
	'name' => __('Heading 3', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 3', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Enter H3 Title'
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem ipsum dolor sit amet.'
		),
	)
);

$dt_modules['others']['h4_title'] = array(
	'name' => __('Heading 4', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 4', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Enter H4 Title'
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem ipsum dolor sit amet.'
		),
	)
);

$dt_modules['others']['h5_title'] = array(
	'name' => __('Heading 5', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 5', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Enter H5 Title'
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem ipsum dolor sit amet.'
		),
	)
);

$dt_modules['others']['h6_title'] = array(
	'name' => __('Heading 6', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 6', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Enter H6 Title'
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem ipsum dolor sit amet.'
		),
	)
);

$dt_modules['others']['address'] = array(
	'name' => __('Address', 'dt_themes'),
	'tooltip' => __('Use this module to add address', 'dt_themes'),
	'icon_class' => 'ico-address',
	'options' => array(
		'line1' => array(
			'title' => __('Line 1', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'No: 58 A, East Madison St'
		),
		'line2' => array(
			'title' => __('Line 2', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Baltimore, MD, USA'
		),
		'line3' => array(
			'title' => __('Line 3', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'line4' => array(
			'title' => __('Line 4', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
	)
);

$dt_modules['others']['phone'] = array(
	'name' => __('Phone', 'dt_themes'),
	'tooltip' => __('Use this module to add phone number alone', 'dt_themes'),
	'icon_class' => 'ico-phone',
	'options' => array(
		'phone' => array(
			'title' => __('Phone No', 'dt_themes'),
			'type' => 'text',
			'default_value' => '+1 200 258 2145'
		)
	)
);

$dt_modules['others']['mobile'] = array(
	'name' => __('Mobile', 'dt_themes'),
	'tooltip' => __('Use this module to add mobile number alone', 'dt_themes'),
	'icon_class' => 'ico-mobile',
	'options' => array(
		'mobile' => array(
			'title' => __('Mobile No', 'dt_themes'),
			'type' => 'text',
			'default_value' => '+91 12345 49897'
		)
	)
);

$dt_modules['others']['fax'] = array(
	'name' => __('Fax', 'dt_themes'),
	'tooltip' => __('Use this module to add fax alone', 'dt_themes'),
	'icon_class' => 'ico-fax',
	'options' => array(
		'fax' => array(
			'title' => __('Fax No', 'dt_themes'),
			'type' => 'text',
			'default_value' => '+1 100 458 2345'
		)
	)
);

$dt_modules['others']['email'] = array(
	'name' => __('Email', 'dt_themes'),
	'tooltip' => __('Use this module to add email alone', 'dt_themes'),
	'icon_class' => 'ico-email',
	'options' => array(
		'emailid' => array(
			'title' => __('Email', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'yourname@somemail.com'
		)
	)
);

$dt_modules['others']['web'] = array(
	'name' => __('Website Url', 'dt_themes'),
	'tooltip' => __('Use this module to add website url alone', 'dt_themes'),
	'icon_class' => 'ico-web',
	'options' => array(
		'url' => array(
			'title' => __('URL', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'http://www.google.com'
		)
	)
);

$dt_modules['others']['online_form'] = array(
	'name' => __('Online Form Url', 'dt_themes'),
	'tooltip' => __('Use this module to add online form url alone', 'dt_themes'),
	'icon_class' => 'ico-form',
	'options' => array(
		'url' => array(
			'title' => __('URL', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		)
	)
);

$dt_modules['others']['clear'] = array(
	'name' => __('Clear', 'dt_themes'),
	'tooltip' => __('Add this module to add space between contents', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_border'] = array(
	'name' => __('Bordered Horizontal Rule', 'dt_themes'),
	'tooltip' => __('Use this module to add bordered horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_border_small'] = array(
	'name' => __('Bordered Horizontal Rule Small', 'dt_themes'),
	'tooltip' => __('Use this module to add bordered horizontal rule small', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);


$dt_modules['others']['hr'] = array(
	'name' => __('Horizontal Rule', 'dt_themes'),
	'tooltip' => __('Use this module to add horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_medium'] = array(
	'name' => __('Horizontal Rule Medium', 'dt_themes'),
	'tooltip' => __('Use this module to add medium horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_large'] = array(
	'name' => __('Horizontal Rule Large', 'dt_themes'),
	'tooltip' => __('Use this module to add large horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_top'] = array(
	'name' => __('Horizontal Rule With Top Link', 'dt_themes'),
	'tooltip' => __('Use this module to add horizontal rule with top link', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible'] = array(
	'name' => __('Whitespace', 'dt_themes'),
	'tooltip' => __('Use this module to add whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible_small'] = array(
	'name' => __('Whitespace Small', 'dt_themes'),
	'tooltip' => __('Use this module to add small whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible_medium'] = array(
	'name' => __('Whitespace Medium', 'dt_themes'),
	'tooltip' => __('Use this module to add medium whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible_large'] = array(
	'name' => __('Whitespace Large', 'dt_themes'),
	'tooltip' => __('Use this module to add large whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);
/*  End of Others Modules */?>