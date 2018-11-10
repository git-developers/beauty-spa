jQuery(document).ready(function($){

	$(".dt-select-service").change(function(){
		var $id = $(this).val();
		$.ajax({
			method:'POST',
			url: mytheme_urls.ajaxurl,
			type: 'html',
			data:{ action: 'dt_fill_staffs', service_id :$id },
			complete: function(response){
				if( response.status === 200 ) {
					var $append = "";
					if( $.trim(response.responseText).length > 0 ) {
						$append += response.responseText;
						$(".dt-select-staff").empty().append($append);
					}
				}
			}
		});
	});

	$('#datepicker').datepicker({
		minDate: 0,
		dateFormat : 'yy-mm-dd'
	})

	$(".start-time").change(function(){
		var $s_time = $(this).val(),
		$last = $('option:last', $(this));
		
		$(".end-time").empty();

		if($(this)[0].selectedIndex < $last.index() ){
			$('option', this).each(function () {
				if ($(this).val() > $s_time) {
					$(".end-time").append($(this).clone());
                }
            });
		} else {
			$(".end-time").append($last.clone()).val($last.val());
		}
	});
	
	/* V */
	$(".show-time-shortcode").click(function(e){
		$date = $("*[name=date]").val();
		$stime = $('*[name=start-time]').val();
		$etime = $('*[name=end-time]').val();
		$staff = $('*[name=staff]').val();
		$service = $('*[name=services]').val();
		
		if( $staff.length > 0 || $service.length > 0 ) {
			$(".dt-sc-reservation-form").submit();
		}else{
			alert("Please choose Service");
		}	
		e.preventDefault();
	});
	
	function staff_reservation(){
		$date = $("*[name=date]").val();
		$stime = $('*[name=start-time]').val();
		$etime = $('*[name=end-time]').val();
		$staff = $('*[name=staff]').val();
		$service = $('*[name=services]').val();

		if( $staff.length > 0 || $service.length > 0 ) {
				$.ajax({
					method:'POST',
					url: mytheme_urls.ajaxurl,
					type: 'html',
					data:{ action: 'dt_available_times', 
						date :$date,
						stime:$stime,
						etime:$etime,
						staffid:$staff,
						staff: $('*[name=staff] :selected').text(),
						serviceid:$service,
						service:$('*[name=services] :selected').text()
					},
					complete: function(response){
						if( response.status === 200 ) {
							var $append = "";
							if( $.trim(response.responseText).length > 0 ) {
								$append += response.responseText;
								$(".available-times").empty().append($append);
							}
						}
					}
				});
		}else{
			alert("Please choose Service");
		}	
	}
	
	$(".start-time").each(function(){
		var $s_time = $(this).val(),
		$last = $('option:last', $(this));
		
		$(".end-time").empty();
		
		$etime = $('*[name=hidden-end-time]').val();
		if($(this)[0].selectedIndex < $last.index() ){
			$('option', this).each(function () {
				if ($(this).val() > $s_time) {
					$(".end-time").append($(this).clone());
                }
            });
		} else {
			$(".end-time").append($last.clone()).val($last.val());
		}
		$(".end-time option[value='" + $etime + "']").attr("selected", "selected");
		
		$service = $('*[name=services]').val();
		if( $service.length > 0 ) {
			staff_reservation();
		}
	});
	/* V */
	
	$(".show-time").click(function(e){
		staff_reservation();
		e.preventDefault();
	});
	
	/* Time Slot Click */
	$("body").delegate("a.time-slot","click",function(e){
		e.preventDefault();
		$("div.personal-info").show();
		$('html, body').animate({
			scrollTop: $("#personalinfo").offset().top-100
		}, 2000);
		$("div.choose-payment").show();
		$("a.time-slot").removeClass('selected');
		$(this).addClass('selected');
		
		$("ul.time-table").find('li,ul.time-slots').removeClass('selected');
        $(this).parentsUntil("ul.time-table").addClass('selected');
	});
	
	$("body").delegate("select[name='payment_type']",'change',function(e){
		$val = $(this).val();
		if( $val.length > 0 ) {
			$("a.schedule-it").show();
		} else {
			$("a.schedule-it").hide();
		}
	});

	/* Book Schedule */
	$("a.schedule-it").click(function(e){ 
		e.preventDefault();

		//$staff = $('*[name=staff]').val();
		$staff = $('a.time-slot.selected').data('sid');
		$service = $('*[name=services]').val();
		$start = $('a.time-slot.selected').data('start');
		$end = $('a.time-slot.selected').data('end');
		$date = $('a.time-slot.selected').data('date');
		$time = $('a.time-slot.selected').data('time');

		$name = $("div.personal-info").find('input[name=name]').val();
		$email = $("div.personal-info").find('input[name=email]').val();
		$phone = $("div.personal-info").find('input[name=phone]').val();
		$body = $("div.personal-info").find('textarea[name=note]').val();
		
		$captcha = $("div.personal-info").find('input[name=captcha]').val();
		$hcaptcha = $("div.personal-info").find('input[name=hiddencaptcha]').val();
		
		
		
		if( $name.length == "" ){
			alert("Please enter name");
			return false;
		}
		
		if( $email.length == "" ){ 
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if( emailReg.test( $email ) ) { 
                alert('Please enter valid email');
				return false;
            } 
		}
		
		if( $phone.length < 5 ){
			alert("Please enter Phone number");
			return false;
		}
		
		if( $captcha.length <= 0 ){
			alert("Please enter captcha");
			return false;
		}
		
		if( $captcha !== $hcaptcha){
			alert("Please verify entered captcha");
			return false;
		}
		
		$payment = $("select[name='payment_type']").val();

		$action  = ( $payment === "paypal" ) ? "dt_paypal_request" : "dt_new_reservation";

		if( typeof($start) != 'undefined' ) {
			$.ajax({
				method: 'POST',
				url: 	mytheme_urls.ajaxurl,
				data: 	{ 
					action: $action,
					staff: 	$staff,
					service:$service,
					start: 	$start,
					end: 	$end,
					name: 	$name,
					email: 	$email,
					phone: 	$phone,
					body: 	$body,
					date:  $date,
					time:  $time
				},
				dataType: 'json',
				success: function( response ){
					window.location = response.url;
				}
			});
		} else {
			$("a.schedule-it").hide();
		}

	});
	/* Book Schedule */
});