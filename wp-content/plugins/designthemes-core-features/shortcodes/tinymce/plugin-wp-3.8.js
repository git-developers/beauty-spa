(function() {
	tinymce.create("tinymce.plugins.DTCoreShortcodePlugin", {

		init : function(d, e) {

			d.addCommand("scnOpenDialog", function(a, c) {
				scnSelectedShortcodeType = c.identifier;
				jQuery.get(e + "/dialog.php", function(b) {
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
					jQuery("#scn-options h3:first").text(
							"Customize the " + c.title + " Shortcode");
				});

			});

		},

		getInfo : function() {
			return {
				longname : 'DesignThemes Core Shortcodes',
				author : 'DesignThemes',
				authorurl : 'http://themeforest.net/user/designthemes',
				infourl : '',
				version : "1.0"
			};

		},

		createControl : function(btn, e) {

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
					

			if ("designthemes_sc_button" === btn) {

				var a = this;
				var btn = e.createSplitButton("designthemes_sc_buttons",
						{
							title : "Insert Shortcode",
							image : spalab_DTCorePlugin.tinymce_folder
									+ "/images/dt-icon.png",
							icons : false
						});

				btn.onRenderMenu
						.add(function(c, b) {

							/* Accordion */
							c = b.addMenu({
								title : "Accordion"
							});
							a.addImmediate(c, "Default",
								"[dt_sc_accordion_group]"
								+'<br>[dt_sc_toggle title="Accordion 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Accordion 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Accordion 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+"<br>[/dt_sc_accordion_group]");
							 									
							a.addImmediate(c, "Framed",
								"[dt_sc_accordion_group]"
								+'<br>[dt_sc_toggle_framed title="Accordion 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Accordion 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Accordion 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+"<br>[/dt_sc_accordion_group]");
								
							a.addWithDialog(b, "Button", "button");
							a.addWithDialog(b, "Blockquote", "blockquote");
							
							/* Callout Button */
							a.addWithDialog(b, "Callout Button", "callout");
							
							/* Callout Button With Moving Background */
							a.addWithDialog(b, "Callout With Moving BG ", "calloutwithmovingbg");
							
							a.addWithDialog(b, "Column Layout", "column");
							
							a.addWithDialog(b, "Colored Box", "coloredbox");
							
							/* Contact Info */
							c = b.addMenu({
								title: "Contact Info"
							});
							a.addImmediate(c, "Address",'<br>[dt_sc_address line1="No: 58 A, East Madison St" line2="Baltimore, MD, USA" /]<br>');
							a.addImmediate(c, "Phone",'<br>[dt_sc_phone phone="+1 200 258 2145" /]<br>');
							a.addImmediate(c, "Mobile",'<br>[dt_sc_mobile mobile="+1 100 458 2345" /]<br>');
							a.addImmediate(c, "Fax",'<br>[dt_sc_fax fax="+1 100 458 2345" /]<br>');
							a.addImmediate(c, "Email",'<br>[dt_sc_email emailid="yourname@somemail.com" /]<br>');
							a.addImmediate(c, "Web",'<br>[dt_sc_web url="http://www.google.com" /]<br>');
							a.addImmediate(c, "Onlie Form",'<br>[dt_sc_online_form url="http://www.google.com" /]<br>');
							
							/* Counter */
							a.addWithDialog(b, "Counter", "counter");
							
							/* Donutchart */
							c = b.addMenu({
								title: "Donut Chart"
							});
							a.addImmediate(c, "Small",'<br>[dt_sc_donutchart_small title="Lorem" bgcolor="#808080" fgcolor="#4bbcd7" percent="70" description="This is simply dummy text." /]<br>');
							a.addImmediate(c, "Medium",'<br>[dt_sc_donutchart_medium title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]<br>');
							a.addImmediate(c, "Large",'<br>[dt_sc_donutchart_large title="Lorem" bgcolor="#808080" fgcolor="#a23b6f" percent="50" description="This is simply dummy text." /]<br>');
							a.addImmediate(c, "Small",'<br>[dt_sc_donutchart_small_type2 title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]<br>');
							a.addImmediate(c, "Medium",'<br>[dt_sc_donutchart_medium_type2 title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]<br>');
							a.addImmediate(c, "Large",'<br>[dt_sc_donutchart_large_type2 title="Lorem" bgcolor="#808080" fgcolor="#7aa127" percent="65" description="This is simply dummy text." /]<br>');
							
							/* Dropcap Shortcodes */
							a.addWithDialog(b, "Dropcap", "dropcap");

							/* Dividers Shortcodes */
							c = b.addMenu({
								title : "Dividers"
							});
							
							a.addImmediate(c,"Clear",
									"<br>[dt_sc_clear]<br>");

							a.addImmediate(c, "Bordered Horizontal Rule",
									"<br>[dt_sc_hr_border] <br>");
									
							a.addImmediate(c, "Bordered Horizontal Rule Small",
									"<br>[dt_sc_hr_border_small] <br>");									
							
							a.addImmediate(c, "Horizontal Rule",
									"<br>[dt_sc_hr] <br>");
							
							a.addImmediate(c, "Horizontal Rule Medium",
									"<br>[dt_sc_hr_medium] <br>");
							
							a.addImmediate(c, "Horizontal Rule Large",
									"<br>[dt_sc_hr_large] <br>");
							
							a.addImmediate(c, "Horizontal Rule with top link",
									"<br>[dt_sc_hr top] <br>");
							
							a.addImmediate(c, "Whitespace",
									"<br>[dt_sc_hr_invisible] <br>");
							
							a.addImmediate(c, "Whitespace Small",
									"<br>[dt_sc_hr_invisible_small] <br>");
							
							a.addImmediate(c, "Whitespace Medium",
									"<br>[dt_sc_hr_invisible_medium] <br>");
							
							a.addImmediate(c, "Whitespace Large",
									"<br>[dt_sc_hr_invisible_large] <br>");
									
							
							/* Icon Box */
							a.addWithDialog(b, "Icon Boxes", "iconbox");
							
							/* Full Width Section */
							a.addWithDialog(b,"Full Width Section","fullwidth");


							/* List Shortcodes */
							c = b.addMenu({
								title : "Lists"
							});
							a.addWithDialog(c, "Ordered List", "orderedlist");
							a.addWithDialog(c, "Unordered List","unorderedlist");
							a.addImmediate(c, "Manual List 1","[dt_sc_manual_list type='type1']<br><ul><li>[dt_sc_box]1[/dt_sc_box]Alternative Therapies</li><li>[dt_sc_box]2[/dt_sc_box]Manicures & Pedicures</li> <li>[dt_sc_box]3[/dt_sc_box]Calming Facial</li></ul><br>[/dt_sc_manual_list]");
							a.addImmediate(c, "Manual List 2","[dt_sc_manual_list type='type2']<br><ul><li>[dt_sc_box]1[/dt_sc_box]Alternative Therapies</li><li>[dt_sc_box]2[/dt_sc_box]Manicures & Pedicures</li> <li>[dt_sc_box]3[/dt_sc_box]Calming Facial</li></ul><br>[/dt_sc_manual_list]");
							a.addImmediate(c, "List With Font Awesome Icons",'[list_with_font_awesome_icons style="type2"]<br><ul><li> [font_awesome_icon class="fa-leaf"] Created from natural herbs - Ginseng roots extract</li><li> [font_awesome_icon class="fa-heart"] 100% safe for your skin</li> <li> [font_awesome_icon class="fa-shield"] Quality product from SpaLabs</li><li> [font_awesome_icon class="fa-user-md"] Created by Medical Professionals of Spa Lab</li></ul><br>[/list_with_font_awesome_icons]');
							
							/*Pullquotes*/							
							a.addWithDialog(b, "Pullquote", "pullquote");
							

							/*Pricing Table*/
							a.addWithDialog(b, "Pricing Table", "pricingtable");
							
							/* Progressbar*/
							c = b.addMenu({ title:"Progress Bar"});
							a.addImmediate(c, "Standard","<br>[dt_sc_progressbar value='85' type='standard' color='#006400' textcolor=''] consectetur[/dt_sc_progressbar]<br>");
							a.addImmediate(c, "Stripe","<br>[dt_sc_progressbar value='75' type='progress-striped' color='#9c59b6' textcolor=''] consectetur[/dt_sc_progressbar]<br>");
							a.addImmediate(c, "Active","<br>[dt_sc_progressbar value='45' type='progress-striped-active' color='#800080'] consectetur[/dt_sc_progressbar]<br>");
							
							/* Info Graphics Progress bar*/
							a.addWithDialog(b, "Info Graphics Bar", "infographicbar");

							/* Tab */
							c = b.addMenu({
								title : "Tabs"
							});
							a.addImmediate(c, "Horizontal",
									"[dt_sc_tabs_horizontal]" + dummy_tabs
											+ "[/dt_sc_tabs_horizontal]");

							a.addImmediate(c, "Vertical",
									"[dt_sc_tabs_vertical]" + dummy_tabs
											+ "[/dt_sc_tabs_vertical]");
							
							a.addWithDialog(b, "Titled Box", "box");				

							/* Toggle */
							c = b.addMenu({
								title : "Toggle"
							});

							a.addImmediate(c, "Default",
								'[dt_sc_toggle title="Toggle 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Toggle 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Toggle 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]");
							
							a.addImmediate(c, "Framed",
								'[dt_sc_toggle_framed title="Toggle 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Toggle 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Toggle 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]");
									
							/* Tooltip Shortcodes */
							a.addWithDialog(b, "Tooltip", "tooltip");							

							/* Title */
							c = b.addMenu({
								title : "Title"
							});
							a.addImmediate(c,"Title - H1 ",'<br>[dt_sc_h1_title  title="Enter H1 Title" description="Lorem ipsum dolor sit amet." class=""]<br>');
							a.addImmediate(c,"Title - H2 ",'<br>[dt_sc_h2_title  title="Enter H2 Title" description="Lorem ipsum dolor sit amet." class=""]<br>');
							a.addImmediate(c,"Title - H3 ",'<br>[dt_sc_h3_title  title="Enter H3 Title" description="Lorem ipsum dolor sit amet." class=""]<br>');
							a.addImmediate(c,"Title - H4 ",'<br>[dt_sc_h4_title  title="Enter H4 Title" description="Lorem ipsum dolor sit amet." class=""]<br>');
							a.addImmediate(c,"Title - H5 ",'<br>[dt_sc_h5_title  title="Enter H5 Title" description="Lorem ipsum dolor sit amet." class=""]<br>');
							a.addImmediate(c,"Title - H6 ",'<br>[dt_sc_h6_title  title="Enter H6 Title" description="Lorem ipsum dolor sit amet." class=""]<br>');
							
							
							c = b.addMenu({
								title : "Others"
							});
							
							a.addImmediate(c,"Recent Posts",'<br>[dt_sc_recent_post  count="2" column="2" read_more_text_show="false" read_more_text="Read More" excerpt_length="10" excerpt="false"]<br>');
							a.addImmediate(c,"Recent Posts With Category",'<br>[dt_sc_recent_post_with_category  count="2" category_id="" column="2" read_more_text_show="false" read_more_text="Read More" excerpt_length="10" excerpt="false"]<br>');
							a.addImmediate(c,"Individual Post",'<br>[dt_sc_post id="18" excerpt_length="20" read_more_text="Read More"/]<br>');
							a.addImmediate(c,"Catalog Items",'<br>[dt_sc_catalog_items  item_ids="2" column="2" excerpt_length="25" link="#" target="_self"]<br>');
							a.addImmediate(c,"Catalog Items With Category",'<br>[dt_sc_catalog_items_with_category  category_ids="37,38" column="2" excerpt_length="25" link="#" target="_self"]<br>');
							a.addImmediate(c,"Catalog Menu Items List",'<br>[dt_sc_catalog_menu_items_list  item_ids="2" icon="fa-leaf" show_dummy_price="true" link="#" target="_self"]<br>');
							a.addImmediate(c,"3 Columns Portfolio Carousel",'<br>[dt_sc_three_columns_portfolio  showposts="-1" categories=""]<br>');
							a.addImmediate(c,"4 Columns Portfolio Carousel",'<br>[dt_sc_four_columns_portfolio  showposts="-1" categories=""]<br>');
							
							a.addImmediate(c, "Team",'<br>[dt_sc_team name="DesignThemes" role="Spa Director" email="yourname@domain.com"  image="http://placehold.it/500" twitter="#" facebook="#" google="#" linkedin="#"]<br><p>Saleem naijar kaasram eerie can be disbursed in the wofl like of a fox that is her thing smaoasa lase lemedds laasd pamade eleifend sapien.</p>[/dt_sc_team]<br>');
							
							var testimonal = '[dt_sc_testimonial name="John Doe" role="Cambridge Telcecom" image="http://placehold.it/300"]'+dummy_conent+'[/dt_sc_testimonial]';
							a.addImmediate(c, "Testimonial",'<br>'+testimonal+'<br>');
							a.addImmediate(c, "Testimonial Carousel",'<br>[dt_sc_testimonial_carousel]<br>'
										+'<ul>'
										+'<li>'+testimonal+'</li>'
										+'<li>'+testimonal+'</li>'
										+'<li>'+testimonal+'</li>'
										+'</ul>'
										+'<br>[/dt_sc_testimonial_carousel]<br>');
							a.addImmediate(c, "Gifts",'[dt_sc_gift_products limit="-1" posts_column="one-fourth-column/one-half-column/one-third-column" category_slug=""]');
							a.addImmediate(c, "Spa Procedure",'[dt_sc_spa_procedure image_link="http://dummyimage.com/1170x810/a399a3/13131f&text=Image" procedure_title="Ayurveda Spa Highlights" procedure_highlight1="Fusce nec purus dui, id placerat sem." procedure_highlight2="Fusce nec purus dui, id placerat sem." procedure_highlight3="Fusce nec purus dui, id placerat sem." rang_title="Price Range" catalog_item_ids="" catalog_show_dummy_price="true" button_text="Make a Reservation" button_link="#" button_target="_blank" /]');
							
							a.addImmediate(c, "News Letter",'[dt_sc_news_letter title="Newsletter" description="Fusce nec purus dui, id placerat sem." placeholder_text="Enter Your Email ID" /]');
							a.addImmediate(b, "Reserve Appointment",'[dt_sc_reserve_appointment serviceids="" staffids="" /]');	
						});

				return btn;

			}

		},

		addImmediate : function(d, e, a) {
			d.add({
				title : e,
				onclick : function() {
					tinyMCE.activeEditor.execCommand("mceInsertContent", false,
							a);
				}
			});
		},

		addWithDialog : function(d, e, a) {
			d.add({
				title : e,
				onclick : function() {
					tinyMCE.activeEditor.execCommand("scnOpenDialog", false, {
						title : e,
						identifier : a
					});
				}
			});

		}

	});

	// add DTCoreShortcodePlugin plugin
	tinymce.PluginManager.add("DTCoreShortcodePlugin",
			tinymce.plugins.DTCoreShortcodePlugin);
})();