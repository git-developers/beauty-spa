<div clss="wrap">
	<h2><?php _e('Calender','dt_themes');?></h2>
	<span><?php _e('Reservation System','dt_themes');?></span>

	<div id="dt-calendar-wrapper"><?php
		$cp_members = get_posts( array('post_type'=>'dt_staffs','posts_per_page'=>'-1', 'orderby'=>'title' , 'order'=>'asc' ) );
		if( $cp_members ){ ?>
			<ul id="dt-members-list"><?php
				foreach( $cp_members as $i => $cp_member ) {
					$id = $cp_member->ID; 
					$name = $cp_member->post_title;
					$class = ( $i == 0 ) ? 'active' : '';?>
					<li><a href="#" data-memberid="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php echo $name;?></a></li><?php
				}?>
			</ul><?php
		}?>

		<!-- Calender -->
		<div class="dt-calendar">
		</div><!-- Calender End -->

		<!-- Event Add Form -->
		<div id="event_edit_container">
			<form>
				<input type="hidden" name="member_id" />
				<ul>
					<li>
						<span><?php _e('Date','dt_themes');?></span>
						<span class="date_holder"></span>
					</li>

					<li>
						<label for="start"><?php _e('Start Time','dt_themes');?></label>
						<select name="start">
							<option value=""><?php _e('Select Start Time','dt_themes');?></option>
						</select>
					</li>

					<li>
						<label for="end"><?php _e('End Time','dt_themes');?></label>
						<select name="end">
							<option value=""><?php _e('Select End Time','dt_themes');?></option>
						</select>
					</li>

					<li>
						<label for="services"><?php _e('Service','dt_themes');?></label>
						<select name="service"></select>
					</li>

					<li>
						<label for="customer"><?php _e('Customer','dt_themes');?></label>
						<select name="customer">
							<option value=""><?php _e('Select','dt_themes');?></option><?php
							$cp_customers = get_posts( array('post_type'=>'dt_customers','posts_per_page'=>'-1', 'orderby'=>'title' , 'order'=>'asc' ) );
							if( $cp_customers ){
								foreach( $cp_customers as $i => $cp_customer ){
									$id = $cp_customer->ID; 
									$name = $cp_customer->post_title;
									echo "<option value='{$id}'>{$name}</option>";
								}
							}?></select>
					</li>

					<li>
						<label for="title"><?php _e('Title','dt_themes');?></label>
						<input type="text" name="title" />
					</li>

					<li>
						<label for="body"><?php _e('Body','dt_themes');?></label>
						<textarea name="body"></textarea>
					</li>
				</ul>
			</form>
		</div><!-- Event Add Form End -->
	</div>
</div>