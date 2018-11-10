scnShortcodeMeta = {
	attributes : [ {
		label : "Style",
		id : "type",
		help : "Select which type of iconbox you would like to use.",
		controlType : "select-control",
		selectValues : [ 'type1', 'type2', 'type3', 'type4', 'type5', 'type6', 'type7', 'type8', 'type9', 'type10' ],
		defaultValue : 'type1',
		defaultText : 'type1'
	}, {
		label : "Columns",
		id : "content",
		controlType : "column-control"
	} ],
	customMakeShortcode : function(b) {
		var a = b.data, type = b.type, ctype = type;

		type = ' type =" '+type+'"';
		
		var icons = ["bell","cogs","leaf","trophy","flag","home","key"];

		if (!a)
			return "";
		b = a.numColumns;
		var c = a.content;
		a = [ "0", "one", "two", "three", "four", "five", 'six' ];
		var x = [ "0", "0", "half", "third", "fourth", "fifth", 'sixth' ];
		var f = x[b];
		c = c.split("|");
		var g = "";
		for ( var h in c) {
			var d = jQuery.trim(c[h]);
			if (d.length > 0) {
				var e = a[d.length] + '_' + f;
				if (b == 4 && d.length == 2)
					e = "one_half";

				var z = e;
				var selected = "";
				if (h == 0) {
					e += " first";
				}
				
			var current_icon = icons[Math.floor(Math.random() * icons.length)];
	
			if( ctype === "type6") {
			g += "[dt_sc_"
				+ e
				+ "] <br/>"
				+ "[dt_sc_icon_box_with_image " + type + " image_url='http://dummyimage.com/100X100' image_alt='' image_title='' title='Well Trained Professionals' link='#' target='_blank' description='Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.' ]<br>";
			}else if( ctype === "type7" ){
			g += "[dt_sc_"
				+ e
				+ "] <br/>"
				+ "[dt_sc_icon_box_process " + type + " value='1' title='Well Trained Professionals' link='#' target='_blank' ]<br>"
				+ ' <p> Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit. </p>';
			}else {
			g += "[dt_sc_"
				+ e
				+ "] <br/>"
				+ "[dt_sc_icon_box " + type + " fontawesome_icon='"+current_icon +"' title='Well Trained Professionals' link='#' target='_blank' ]<br>"
				+ ' <p> Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit. </p>';
			}
				if( ctype === "type2" || ctype === "type4" ){
					g += '[dt_sc_button link="#" target="_self" size="small" target="_blank"]Know More[/dt_sc_button]<br>';
				}
			if( ctype === "type6" ){
				g += " [/dt_sc_icon_box_with_image]"
				+" <br> [/dt_sc_" + z
				+ "] <br/>";
			}else if( ctype === "type7" ){
				g += " [/dt_sc_icon_box_process]"
				+" <br> [/dt_sc_" + z
				+ "] <br/>";
			}else {
			g += " [/dt_sc_icon_box]"
				+" <br> [/dt_sc_" + z
				+ "] <br/>";
			}
			
			}
		}

		return g;
	}
};