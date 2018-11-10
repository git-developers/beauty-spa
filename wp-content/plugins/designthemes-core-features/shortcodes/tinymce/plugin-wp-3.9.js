(function() {
	
	var dummy_conent = "Lorem ipsum dolor sit amet, consectetur"
					+ " adipiscing elit. Morbi hendrerit elit turpis,"
					+ " a porttitor tellus sollicitudin at."
					+ " Class aptent taciti sociosqu ad litora "
					+ " torquent per conubia nostra,"
					+ " per inceptos himenaeos.",
					
			dummy_tabs = '<br>[dt_sc_tab title="Tab 1"]'
					+ "<br>" + dummy_conent + "<br>" + '[/dt_sc_tab]' + "<br>"
					+ '[dt_sc_tab title="Tab 2"]' + "<br>"
					+ dummy_conent + "<br>" + '[/dt_sc_tab]' + "<br>"
					+ '[dt_sc_tab title="Tab 3"]' + "<br>"
					+ dummy_conent + "<br>" + '[/dt_sc_tab]<br>';
			
			var testimonal = '[dt_sc_testimonial image="http://placehold.it/300" name="John Doe" role="Cambridge Telcecom"]'+dummy_conent+'[/dt_sc_testimonial]';
					

	// add DTCoreShortcodePlugin plugin
	tinymce.PluginManager.add("DTCoreShortcodePlugin",function( editor , url ) {
		
		editor.on('init', function() {

			editor.addCommand("scnOpenDialog", function(obj) {
				scnSelectedShortcodeType = obj.identifier;
				jQuery.get(url + "/dialog.php", function(b) {
					jQuery("#scn-dialog").remove();
					jQuery("body").append(b);
					jQuery("#scn-dialog").hide();
					var f = jQuery(window).width();
					b = jQuery(window).height();
					f = 720 < f ? 720 : f;
					f -= 80;
					b -= 84;
					tb_show("Insert Shortcode", "#TB_inline?width=" + f
							+ "&height=" + b + "&inlineId=scn-dialog");
					jQuery("#scn-options h3:first").text("Customize the " + obj.title + " Shortcode");
					
				});
			});
		});
	
			
			
		editor.addButton('designthemes_sc_button', {
			title : "DT Shortcodes",
			icon : 'dt-icon',
			type: 'menubutton',
			menu: [

				{ text : 'Accordion',
					menu : [
						{ text: 'Default', onclick: function(e){
							e.stopPropagation();
							var content = "[dt_sc_accordion_group]"
								+'<br>[dt_sc_toggle title="Accordion 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Accordion 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Accordion 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+"<br>[/dt_sc_accordion_group]";
								editor.insertContent(content);
							}
						},

						{ text: 'Framed', onclick: function(e){
							e.stopPropagation();
							var content = "[dt_sc_accordion_group]"
								+'<br>[dt_sc_toggle_framed title="Accordion 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Accordion 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Accordion 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+"<br>[/dt_sc_accordion_group]";
							editor.insertContent(content);
							}
						}
					]
				},
				
				{ text: 'Animation' , onclick: function() {

						editor.windowManager.open({

							title : "Add Animation",
							body : [

								{ type: 'listbox', name:'effect', label:'Choose Effect',values:[
									{ text: 'Flash', value : 'flash' },							{ text: 'Shake', value : 'shake' },							{ text: 'Bounce', value : 'bounce' },
									{ text: 'Tada', value : 'tada' },							{ text: 'Swing', value : 'swing'},							{ text: 'Wobble', value : 'wobble' },
									{ text: 'Pulse', value : 'pulse' },							{ text: 'Flip', value : 'flip' },							{ text: 'Flip In X Axis', value : 'flipInX' },
									{ text: 'Flip Out X Axis', value : 'flipOutX' },			{ text: 'Flip In Y Axis', value : 'flipInY' },				{ text: 'Flip Out Y Axis', value : 'flipOutY' },
									{ text: 'fadeIn', value:'fadeIn'},							{ text: 'fadeInUp', value:'fadeInUp'},						{ text: 'fadeInDown', value:'fadeInDown'},
									{ text: 'fadeInLeft', value:'fadeInLeftfadeInLeft'},		{ text: 'fadeInRight', value:'fadeInRight'},				{ text: 'fadeInUpBig', value:'fadeInUpBig'},
									{ text: 'fadeInDownBig', value:'fadeInDownBig'},			{ text: 'fadeInLeftBig', value:'fadeInLeftBig'},			{ text: 'fadeInRightBig', value:'fadeInRightBig'},
									{ text: 'fadeOut', value:'fadeOut'},						{ text: 'fadeOutUp', value:'fadeOutUp'},					{ text: 'fadeOutDown', value:'fadeOutDown'},
									{ text: 'fadeOutLeft', value:'fadeOutLeft'},				{ text: 'fadeOutRight', value:'fadeOutRight'},				{ text: 'fadeOutUpBig', value:'fadeOutUpBig'},
									{ text: 'fadeOutDownBig', value:'fadeOutDownBig'},			{ text: 'fadeOutLeftBig', value:'fadeOutLeftBig'},			{ text: 'fadeOutRightBig', value:'fadeOutRightBig'},
									{ text: 'bounceIn', value:'bounceIn'},						{ text: 'bounceInUp', value:'bounceInUp'},					{ text: 'bounceInDown', value:'bounceInDown'},
									{ text: 'bounceInLeft', value:'bounceInLeft'},				{ text: 'bounceInRight', value:'bounceInRight'},			{ text: 'bounceOut', value:'bounceOut'},
									{ text: 'bounceOutUp', value:'bounceOutUp'},				{ text: 'bounceOutDown', value:'bounceOutDown'},			{ text: 'bounceOutLeft', value:'bounceOutLeft'},
									{ text: 'bounceOutRight', value:'bounceOutRight'},			{ text:'rotateIn', value:'rotateIn'},						{ text:'rotateInUpLeft', value:'rotateInUpLeft'},		
									{ text:'rotateInDownLeft', value:'rotateInDownLeft'},		{ text:'rotateInUpRight', value:'rotateInUpRight'},			{ text:'rotateInDownRight', value:'rotateInDownRight'},		
									{ text:'rotateOut', value:'rotateOut'},						{ text:'rotateOutUpLeft', value:'rotateOutUpLeft'},			{ text:'rotateOutDownLeft', value:'rotateOutDownLeft'},		
									{ text:'rotateOutUpRight', value:'rotateOutUpRight'},		{ text:'rotateOutDownRight', value:'rotateOutDownRight'},	{ text:'hinge', value:'hinge'},		
									{ text:'rollIn', value:'rollIn'},							{ text:'rollOut', value:'rollOut'},							{ text:'lightSpeedIn', value:'lightSpeedIn'},		
									{ text:'lightSpeedOut', value:'lightSpeedOut'},				{ text:'slideDown', value:'slideDown'},						{ text:'slideUp', value:'slideUp'},		
									{ text:'slideLeft', value:'slideLeft'},						{ text:'slideRight', value:'slideRight'},					{ text:'slideExpandUp', value:'slideExpandUp'},
									{ text:'expandUp', value:'expandUp'},						{ text:'expandOpen', value:'expandOpen'},					{ text:'bigEntrance', value:'bigEntrance'},		
									{ text:'hatch', value:'hatch'},								{ text:'floating', value:'floating'},						{ text:'tossing', value:'tossing'},		
									{ text:'pullUp', value:'pullUp'},							{ text:'pullDown', value:'pullDown'},						{ text:'stretchLeft', value:'stretchLeft'},
									{ text:'stretchRight', value:'stretchRight'}],
								},

								{ type: 'textbox', name:'delay',label : "Time Delay"},
							],
							onsubmit: function(e) {
								editor.insertContent('[dt_sc_animation effect="'+e.data.effect +'" delay="'+ e.data.delay+'"] Add Content to Animate [/dt_sc_animation]');
							}
						});	}
				},
				
				
				{ text : 'Align', menu :[

					{ text: 'Left', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_align_left] This is simply dummy text [/dt_sc_align_left]');
					}},

					{ text: 'Right', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_align_right] This is simply dummy text [/dt_sc_align_right]');
					}},

					{ text: 'Center', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_align_center] This is simply dummy text [/dt_sc_align_center]');
					}},

				] },
				


				{ text : 'Button',
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "button"});
					}
				},

				{ text: 'Block Quote',
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "blockquote"});
					}
				},

				{ text: 'Call Out Button',
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "callout"});
					}
					
				 },
				 
				 { text: 'Callout With Moving BG ',
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "calloutwithmovingbg"});
					}
					
				 },

				{ text: 'Column Layout', 
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "column"});
					}
				},

				{ text: 'Colored Box',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "coloredbox"});
					}
				},

				{ text : 'Contact Info', menu :[

					{ text: 'Address', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_address line1="No: 58 A, East Madison St" line2="Baltimore, MD, USA" /]');
					}},

					{ text: 'Phone', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_phone phone="+1 200 258 2145" /]');
					}},

					{ text: 'Mobile', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_mobile mobile="+1 100 458 2345" /]');
					}},

					{ text: 'Fax', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_fax fax="+1 100 458 2345" /]');
					}},

					{ text: 'Email', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_email emailid="yourname@somemail.com" /]');
					}},

					{ text: 'Web', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_web url="http://www.google.com" /]');
					}},
					
					{ text: 'Onlie Form', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_online_form url="http://www.google.com" /]');
					}},
				] },
				
				{ text: 'Counter', onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "counter"});
					}
				},

				{ text : 'Donut Chart', menu:[

					{ text: 'Small', onclick: function(e) {
						e.stopPropagation();
						editor.insertContent('[dt_sc_donutchart_small title="Lorem" bgcolor="#808080" fgcolor="#4bbcd7" percent="70" description="This is simply dummy text." /]');
					} },


					{ text: 'Medium', onclick: function(e) {
						e.stopPropagation();
						editor.insertContent('[dt_sc_donutchart_medium title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]');
					} },
					
					
					{ text: 'Large', onclick: function(e) {
						e.stopPropagation();
						editor.insertContent('[dt_sc_donutchart_large title="Lorem" bgcolor="#808080" fgcolor="#a23b6f" percent="50" description="This is simply dummy tex." /]');
					} },
					
					
					{ text: 'Small Type2', onclick: function(e) {
						e.stopPropagation();
						editor.insertContent('[dt_sc_donutchart_small_type2 title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]');
					} },
					
					
					{ text: 'Medium Type2', onclick: function(e) {
						e.stopPropagation();
						editor.insertContent('[dt_sc_donutchart_medium_type2 title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]');
					} },
					
					
					{ text: 'Large Type2', onclick: function(e) {
						e.stopPropagation();
						editor.insertContent('[dt_sc_donutchart_large_type2 title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]');
					} },
				] },

				{ text: 'Drop Cap',
					onclick: function( e ){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "dropcap"});
					}
				},

				{ text : 'Dividers', menu:[

					{ text: 'Clear', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_clear]');
					}},

					{ text: 'Bordered Horizontal Rule', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_border]');
					}},

					{ text: 'Bordered Horizontal Rule Small', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_border_small]');
					}},					

					{ text: 'Horizontal Rule', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr]');
					}},

					{ text: 'Horizontal Rule Medium', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_medium]');
					}},

					{ text: 'Horizontal Rule Large', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_large]');
					}},

					{ text: 'Horizontal Rule with top link', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr top]');
					}},

					{ text: 'Whitespace', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_invisible]');
					}},
					
					{ text: 'Whitespace Small', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_invisible_small]');
					}},

					{ text: 'Whitespace Medium', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_invisible_medium]');
					}},

					{ text: 'Whitespace Large', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_hr_invisible_large]');
					}},
				] },

				{ text: 'Icon Boxes', 
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "iconbox"});
					}
				},
				
				{ text: 'Full Width Section', 
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "fullwidth"});
					}
				},
				
				{ text : 'Lists', menu:[

					{ text:'Ordered List',
						onclick: function(e){
							e.stopPropagation();
							tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "orderedlist"});
					}},
					
					{ text:'Unordered List',
						onclick: function(e){
							e.stopPropagation();
							tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "unorderedlist"});
					}},
					
					{ text: 'Manual List 1', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_manual_list type="type1"]<br><ul><li>[dt_sc_box]1[/dt_sc_box]Alternative Therapies</li><li>[dt_sc_box]2[/dt_sc_box]Manicures & Pedicures </li> <li>[dt_sc_box]3[/dt_sc_box]Calming Facial</li></ul><br>[/dt_sc_manual_list]');
					}},
					
					{ text: 'Manual List 2', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_manual_list type="type2"]<br><ul><li>[dt_sc_box]1[/dt_sc_box]Alternative Therapies</li><li>[dt_sc_box]2[/dt_sc_box]Manicures & Pedicures</li> <li>[dt_sc_box]3[/dt_sc_box]Calming Facial</li></ul><br>[/dt_sc_manual_list]');
					}},
					
					{ text: 'List With Font Awesome Icons', onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[list_with_font_awesome_icons style="type2"]<br><ul><li> [font_awesome_icon class="fa-leaf"] Created from natural herbs - Ginseng roots extract</li><li> [font_awesome_icon class="fa-heart"] 100% safe for your skin</li> <li> [font_awesome_icon class="fa-shield"] Quality product from SpaLabs</li><li> [font_awesome_icon class="fa-user-md"] Created by Medical Professionals of Spa Lab</li></ul><br>[/list_with_font_awesome_icons]');
					}},
					
				] },

				{ text:'Pull Quote',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "pullquote"});
					}
				},

				{ text:'Pricing Table',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "pricingtable"});
					}
				},

				{
					text: 'Progress Bar',
					menu:[

						{ text:'Standard',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_progressbar value="85" type="standard" color="#006400" textcolor=""] consectetur[/dt_sc_progressbar]');
							}
						},

						{ text:'Stripe',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_progressbar value="75" type="progress-striped" color="#9c59b6" textcolor=""] consectetur[/dt_sc_progressbar]');
							}
						},
						
						{ text:'Active', 
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_progressbar value="45" type="progress-striped-active" color="#800080"] consectetur[/dt_sc_progressbar]');
							}
						},
					]
				},

				{ text:'Info Graphics Bar',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "infographicbar"});
					}
				},

				{ text: 'Tabs',
					menu:[
						{ text:'Horizontal',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent("[dt_sc_tabs_horizontal]" + dummy_tabs + "[/dt_sc_tabs_horizontal]");
							}
						},
						{ text:'Vertical',
							onclick:function(e){
								e.stopPropagation();
								editor.insertContent("[dt_sc_tabs_vertical]" + dummy_tabs+ "[/dt_sc_tabs_vertical]");
							}
						},
					]
				},
				
				{ text:'Titled Box',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "box"});
					}
				},

				{ text: 'Toggle',
					menu:[
						{
							text: 'Default',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_toggle title="Toggle 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
										+'<br>[dt_sc_toggle title="Toggle 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
										+'<br>[dt_sc_toggle title="Toggle 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]");
							}
						},

						{
							text: 'Framed',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_toggle_framed title="Toggle 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
										+'<br>[dt_sc_toggle_framed title="Toggle 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
										+'<br>[dt_sc_toggle_framed title="Toggle 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]");
							}
						},
					]
				},

				{ text:'Tool tip',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "tooltip"});
					}
				},
				
				{ text: 'Title',
					menu:[
						{
							text: 'Title - H1',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_h1_title  title="Enter H1 Title" description="Lorem ipsum dolor sit amet." class=""]');
							}
						},

						{
							text: 'Title - H2',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_h2_title  title="Enter H2 Title" description="Lorem ipsum dolor sit amet." class=""]');
							}
						},
						
						{
							text: 'Title - H3',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_h3_title  title="Enter H3 Title" description="Lorem ipsum dolor sit amet." class=""]');
							}
						},
						
						{
							text: 'Title - H4',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_h4_title  title="Enter H4 Title" description="Lorem ipsum dolor sit amet." class=""]');
							}
						},
						
						{
							text: 'Title - H5',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_h5_title  title="Enter H5 Title" description="Lorem ipsum dolor sit amet." class=""]');
							}
						},
						
						{
							text: 'Title - H6',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_h6_title  title="Enter H6 Title" description="Lorem ipsum dolor sit amet." class=""]');
							}
						},
					]
				},
				
				{ text:'Gifts', 
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_gift_products limit="-1" posts_column="one-fourth-column/one-half-column/one-third-column" category_slug=""]');
							}
				},
				
				
				{ text:'Others',
					menu:[

						{ text:'Recent Posts',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_recent_post  count="2" column="2" read_more_text_show="false" read_more_text="Read More" excerpt_length="10" excerpt="false" ]');
							}
						},
						
						{ text:'Recent Posts With Category',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_recent_post_with_category  count="2" category_id="" column="2" read_more_text_show="false" read_more_text="Read More" excerpt_length="10" excerpt="false" ]');
							}
						},
						
						{ text:'Individual Post',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_post id="18" excerpt_length="20" read_more_text="Read More"/]');
							}
						},
						
						
						{ text:'Catalog Items',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_catalog_items  item_ids="2" column="1" excerpt_length="25" link="#" target="_self"]');
							}
						},
						
						{ text:'Catalog Items With Category',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_catalog_items_with_category  category_ids="37,38" column="1" excerpt_length="25" link="#" target="_self"]');
							}
						},
						
						{ text:'Catalog Menu Items List',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_catalog_menu_items_list  item_ids="92,93,94" icon="fa-leaf" show_dummy_price="true" link="#" target="_self"]');
							}
						},
						
						{ text:'3 Columns Portfolio Carousel',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_three_columns_portfolio  showposts="-1" categories=""]');
							}
						},

						{ text:'4 Columns Portfolio Carousel',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_four_columns_portfolio  showposts="-1" categories=""]');
							}
						},

						{ text:'Team',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_team name="DesignThemes" role="Spa Director" email="yourname@domain.com" image="http://placehold.it/500" twitter="#" facebook="#" google="#" linkedin="#"]<br><p>Saleem naijar kaasram eerie can be disbursed in the wofl like of a fox that is her thing smaoasa lase lemedds laasd pamade eleifend sapien.</p>[/dt_sc_team]');
							}
						},

						{ text:'Testimonial',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent(testimonal);
							}
						},

						{ text:'Testimonial Carousel',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_testimonial_carousel]<br>'
									+'<ul>'
									+'<li>'+testimonal+'</li>'
									+'<li>'+testimonal+'</li>'
									+'<li>'+testimonal+'</li>'
									+'</ul>'
									+'<br>[/dt_sc_testimonial_carousel]');
							}
						}, 
						
						{ text: 'Spa Procedure', 
							onclick: function(e){
								e.stopPropagation();
							editor.insertContent('[dt_sc_spa_procedure image_link="http://dummyimage.com/1170x810/a399a3/13131f&text=Image" procedure_title="Ayurveda Spa Highlights" procedure_highlight1="Fusce nec purus dui, id placerat sem." procedure_highlight2="Fusce nec purus dui, id placerat sem." procedure_highlight3="Fusce nec purus dui, id placerat sem." rang_title="Price Range" catalog_item_ids="" catalog_show_dummy_price="true" button_text="Make a Reservation" button_link="#" button_target="_blank" /]' );
							}
						},
						{ text: 'Newsletter', 
							onclick: function(e){
								e.stopPropagation();
							editor.insertContent('[dt_sc_news_letter title="Newsletter" description="Fusce nec purus dui, id placerat sem." placeholder_text="Enter Your Email ID" /]' );
							}
						},
						{ text:'Reserve Appointment',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_reserve_appointment serviceids="" staffids="" /]');
							}
						},
					]
				}
			]
		});
		
	});
})();