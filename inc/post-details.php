<?php

/**
* Adds a subtitle text field below the post title
*/
add_action( 'edit_form_after_title', 'myprefix_edit_form_after_title' );
function myprefix_edit_form_after_title($post) {
	$wpds_stored_meta = get_post_meta( $post->ID );
	echo '<div id="subtitlediv">
		<input type="text" name="subtitle" id="subtitle" placeholder="' . __( 'Subtitle', 'wpds' ) . '" value="' . ( isset ( $wpds_stored_meta['subtitle'] ) ? $wpds_stored_meta['subtitle'][0] : '' ) . '" />
	</div>';
}

/**
 * Adds a meta box to the post editing screen
 */
function wpds_custom_meta() {
	add_meta_box( 'wpds', __( 'Details', 'wpds' ), 'wpds_meta_callback', 'slide' );
    add_meta_box( 'wpds_time_range', __( 'Display settings', 'wpds' ), 'wpds_meta_callback_time_range', 'slide', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'wpds_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function wpds_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'wpds_nonce' );
	$wpds_stored_meta = get_post_meta( $post->ID );
	?>
<table class="colors">
	<tr>
		<td colspan="3">
			<p><?=__('Color reference', 'wpds')?></p>
		</td>
	</tr>
	<tr>
		<td>
			<div class="orange square" title="#ff823c"></div>
		</td>
		<td>
			<div class="red square" title="#e13938"></div>
		</td>
		<td>
			<div class="yellow square" title="#f4cd3c"></div>
		</td>
	</tr>
	<tr>
		<td>
			<?=__('Orange', 'wpds')?>
		</td>
		<td>
			<?=__('Red', 'wpds')?>
		</td>
		<td>
			<?=__('Yellow', 'wpds')?>
		</td>
	</tr>
	<tr>
		<td>
			<div class="blue square" title="#00ccff"></div>
		</td>
		<td>
			<div class="green square" title="#8dc73f"></div>
		</td>
		<td>
			<div class="dark-gray square" title="#898989"></div>
		</td>
	</tr>
	<tr>
		<td>
			<?=__('Blue', 'wpds')?>
		</td>
		<td>
			<?=__('Green', 'wpds')?>
		</td>
		<td>
			<?=__('Dark Gray', 'wpds')?>
		</td>
	</tr>
	<tr>
		<td>
			<div class="black-pearl square" title="#04151A"></div>
		</td>
		<td>
			<div class="light-gray square" title="#ebebeb"></div>
		</td>
		<td>
			<div class="white square" title="#FFFFFF"></div>
		</td>
	</tr>
	<tr>
		<td>
			<?=__('Black Pearl', 'wpds')?>
		</td>
		<td>
			<?=__('Light Gray', 'wpds')?>
		</td>
		<td>
			<?=__('White', 'wpds')?>
		</td>
	</tr>
</table>
	<p>
		<label for="background-color" class="wpds-row-title"><?php _e( 'Background Color', 'wpds' )?></label>
		<select name="background-color" id="background-color">
			<option value="" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], '' ); ?>><?php _e( '(use default)', 'wpds' )?></option>';
			<option value="ff823c" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], 'ff823c' ); ?>><?php _e( 'Orange', 'wpds' )?></option>';
			<option value="e13938" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], 'e12938' ); ?>><?php _e( 'Red', 'wpds' )?></option>';
			<option value="f4cd3c" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], 'f4cd3c' ); ?>><?php _e( 'Yellow', 'wpds' )?></option>';
			<option value="00ccff" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], '00ccff' ); ?>><?php _e( 'Blue', 'wpds' )?></option>';
			<option value="8dc73f" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], '8dc73f' ); ?>><?php _e( 'Green', 'wpds' )?></option>';
			<option value="898989" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], '898989' ); ?>><?php _e( 'Dark Gray', 'wpds' )?></option>';
			<option value="04151A" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], '04151A' ); ?>><?php _e( 'Black Pearl', 'wpds' )?></option>';
			<option value="ebebeb" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], 'ebebeb' ); ?>><?php _e( 'Light Gray', 'wpds' )?></option>';
			<option value="FFFFFF" <?php if ( isset ( $wpds_stored_meta['background-color'] ) ) selected( $wpds_stored_meta['background-color'][0], 'FFFFFF' ); ?>><?php _e( 'White', 'wpds' )?></option>';
		</select>
	</p>
<p>
	<label for="headline-color" class="wpds-row-title"><?php _e( 'Headline Color', 'wpds' )?></label>
	<select name="headline-color" id="headline-color">
		<option value="" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], '' ); ?>><?php _e( '(use default)', 'wpds' )?></option>';
		<option value="ff823c" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], 'ff823c' ); ?>><?php _e( 'Orange', 'wpds' )?></option>';
		<option value="e12938" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], 'e12938' ); ?>><?php _e( 'Red', 'wpds' )?></option>';
		<option value="f4cd3c" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], 'f4cd3c' ); ?>><?php _e( 'Yellow', 'wpds' )?></option>';
		<option value="00ccff" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], '00ccff' ); ?>><?php _e( 'Blue', 'wpds' )?></option>';
		<option value="8dc73f" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], '8dc73f' ); ?>><?php _e( 'Green', 'wpds' )?></option>';
		<option value="898989" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], '898989' ); ?>><?php _e( 'Dark Gray', 'wpds' )?></option>';
		<option value="04151A" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], '04151A' ); ?>><?php _e( 'Black Pearl', 'wpds' )?></option>';
		<option value="ebebeb" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], 'ebebeb' ); ?>><?php _e( 'Light Gray', 'wpds' )?></option>';
		<option value="FFFFFF" <?php if ( isset ( $wpds_stored_meta['headline-color'] ) ) selected( $wpds_stored_meta['headline-color'][0], 'FFFFFF' ); ?>><?php _e( 'White', 'wpds' )?></option>';
	</select>
</p>
<p>
	<label for="subhead-color" class="wpds-row-title"><?php _e( 'Sub-headline Color', 'wpds' )?></label>
	<select name="subhead-color" id="subhead-color">
		<option value="" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], '' ); ?>><?php _e( '(use default)', 'wpds' )?></option>';
		<option value="ff823c" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], 'ff823c' ); ?>><?php _e( 'Orange', 'wpds' )?></option>';
		<option value="e12938" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], 'e12938' ); ?>><?php _e( 'Red', 'wpds' )?></option>';
		<option value="f4cd3c" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], 'f4cd3c' ); ?>><?php _e( 'Yellow', 'wpds' )?></option>';
		<option value="00ccff" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], '00ccff' ); ?>><?php _e( 'Blue', 'wpds' )?></option>';
		<option value="8dc73f" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], '8dc73f' ); ?>><?php _e( 'Green', 'wpds' )?></option>';
		<option value="898989" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], '898989' ); ?>><?php _e( 'Dark Gray', 'wpds' )?></option>';
		<option value="04151A" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], '04151A' ); ?>><?php _e( 'Black Pearl', 'wpds' )?></option>';
		<option value="ebebeb" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], 'ebebeb' ); ?>><?php _e( 'Light Gray', 'wpds' )?></option>';
		<option value="FFFFFF" <?php if ( isset ( $wpds_stored_meta['subhead-color'] ) ) selected( $wpds_stored_meta['subhead-color'][0], 'FFFFFF' ); ?>><?php _e( 'White', 'wpds' )?></option>';
	</select>
</p>
<p>
	<label for="copy-color" class="wpds-row-title"><?php _e( 'Copy Color', 'wpds' )?></label>
	<select name="copy-color" id="copy-color">
		<option value="" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], '' ); ?>><?php _e( '(use default)', 'wpds' )?></option>';
		<option value="ff823c" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], 'ff823c' ); ?>><?php _e( 'Orange', 'wpds' )?></option>';
		<option value="e12938" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], 'e12938' ); ?>><?php _e( 'Red', 'wpds' )?></option>';
		<option value="f4cd3c" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], 'f4cd3c' ); ?>><?php _e( 'Yellow', 'wpds' )?></option>';
		<option value="00ccff" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], '00ccff' ); ?>><?php _e( 'Blue', 'wpds' )?></option>';
		<option value="8dc73f" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], '8dc73f' ); ?>><?php _e( 'Green', 'wpds' )?></option>';
		<option value="898989" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], '898989' ); ?>><?php _e( 'Dark Gray', 'wpds' )?></option>';
		<option value="04151A" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], '04151A' ); ?>><?php _e( 'Black Pearl', 'wpds' )?></option>';
		<option value="ebebeb" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], 'ebebeb' ); ?>><?php _e( 'Light Gray', 'wpds' )?></option>';
		<option value="FFFFFF" <?php if ( isset ( $wpds_stored_meta['copy-color'] ) ) selected( $wpds_stored_meta['copy-color'][0], 'FFFFFF' ); ?>><?php _e( 'White', 'wpds' )?></option>';
	</select>
</p>




	<p id="bgimage">
		<label for="background-image" class="wpds-row-title"><?php _e( 'Upload a background image (if you are using one)', 'wpds' )?></label>
		<input type="text" name="background-image" id="background-image" value="<?php if ( isset ( $wpds_stored_meta['background-image'] ) ) echo $wpds_stored_meta['background-image'][0]; ?>" />
		<input type="button" id="background-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'wpds' )?>" />
	</p>


	<?php
}

function wpds_meta_callback_time_range( $post ) {
    $wpds_stored_meta = get_post_meta( $post->ID );
    ?>
	<input type="hidden" name="time_range_day_option_showed" value="1"/>
    <p><?=__('Only show on certain days', 'wpds')?>:
        <?php
            $selected_days = isset( $wpds_stored_meta['time_range_day'] ) && is_array( $wpds_stored_meta['time_range_day'] ) ? $wpds_stored_meta['time_range_day'] : [];
            $localizes_days = get_localized_days();
            for ($k = 1; $k < 8; $k++) {
              $day = $localizes_days[$k % 7];
              ?>
                <br/><label><input type="checkbox" name="time_range_day[]" value="<?=($k % 7)?>" <?php if ( in_array( $k % 7, $selected_days ) ) { echo ' checked="checked"'; } ?>/> <?=$day?></label>
              <?php
            }
        ?>
    </p>
    <p><?=__('Only show on certain time', 'wpds')?>:<br/>
		<?php
			$time_range_hour_from = isset( $wpds_stored_meta['time_range_hour_from'] ) ? intval($wpds_stored_meta['time_range_hour_from'][0]) : '';
			$time_range_minute_from = isset( $wpds_stored_meta['time_range_minute_from'] ) ? intval($wpds_stored_meta['time_range_minute_from'][0]) : '';
			$time_range_hour_to = isset( $wpds_stored_meta['time_range_hour_to'] ) ? intval($wpds_stored_meta['time_range_hour_to'][0]) : '';
			$time_range_minute_to = isset( $wpds_stored_meta['time_range_minute_to'] ) ? intval($wpds_stored_meta['time_range_minute_to'][0]) : '';
		?>
			<input type="number" name="time_range_hour_from" value="<?=$time_range_hour_from?>" min="0" max="23" style="width: 50px;" /> : <input type="number" name="time_range_minute_from" value="<?=$time_range_minute_from?>" min="0" max="59" size="2"  style="width: 50px;" /> - 
			<input type="number" name="time_range_hour_to" value="<?=$time_range_hour_to?>" min="0" max="23" style="width: 50px;" /> : <input type="number" name="time_range_minute_to" value="<?=$time_range_minute_to?>" min="0" max="59" size="2"  style="width: 50px;" /><br/>
		
	</p>
    <?php
}

/**
 * Saves the custom meta input
 */
function wpds_meta_save( $post_id ) {

	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'wpds_nonce' ] ) && wp_verify_nonce( $_POST[ 'wpds_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'subtitle' ] ) ) {
		update_post_meta( $post_id, 'subtitle', sanitize_text_field( $_POST[ 'subtitle' ] ) );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'background-color' ] ) ) {
		update_post_meta( $post_id, 'background-color', $_POST[ 'background-color' ] );
	}
	if( isset( $_POST[ 'headline-color' ] ) ) {
		update_post_meta( $post_id, 'headline-color', $_POST[ 'headline-color' ] );
	}
	if( isset( $_POST[ 'subhead-color' ] ) ) {
		update_post_meta( $post_id, 'subhead-color', $_POST[ 'subhead-color' ] );
	}
	if( isset( $_POST[ 'copy-color' ] ) ) {
		update_post_meta( $post_id, 'copy-color', $_POST[ 'copy-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'background-image' ] ) ) {
		update_post_meta( $post_id, 'background-image', $_POST[ 'background-image' ] );
	}

    // Time range
	if ( isset( $_POST['time_range_day_option_showed'] ) ) { // solves iussue with quick-edit
		delete_post_meta( $post_id, 'time_range_day' );
		if ( isset( $_POST[ 'time_range_day' ] ) && count( $_POST[ 'time_range_day' ] ) > 0 ) {
			foreach ($_POST[ 'time_range_day' ] as $day) {
				add_post_meta( $post_id, 'time_range_day', $day );
			}
		}
		
		
		if ( isset( $_POST['time_range_hour_from'] ) && is_numeric( $_POST['time_range_hour_from'] ) && $_POST['time_range_hour_from']  >= 0 && $_POST['time_range_hour_from']  < 24 ) {
			$time_range_hour_from = intval($_POST['time_range_hour_from']);
		}
		if ( isset( $_POST['time_range_minute_from'] ) && is_numeric( $_POST['time_range_minute_from'] ) && $_POST['time_range_minute_from']  >= 0 && $_POST['time_range_minute_from']  < 60 ) {
			$time_range_minute_from = intval($_POST['time_range_minute_from']);
		}
		if ( isset( $_POST['time_range_hour_to'] ) && is_numeric( $_POST['time_range_hour_to'] ) && $_POST['time_range_hour_to']  >= 0 && $_POST['time_range_hour_to']  < 24 ) {
			$time_range_hour_to = intval($_POST['time_range_hour_to']);
		}
		if ( isset( $_POST['time_range_minute_to'] ) && is_numeric( $_POST['time_range_minute_to'] ) && $_POST['time_range_minute_to']  >= 0 && $_POST['time_range_minute_to']  < 60 ) {
			$time_range_minute_to = intval($_POST['time_range_minute_to']);
		}
		if ( isset( $time_range_hour_from ) && !isset( $time_range_minute_from ) && isset( $time_range_hour_to ) && !isset( $time_range_minute_to ) ) {
			$time_range_minute_from = 0;
			$time_range_minute_to = 0;			
		}		
		if ( ( isset( $time_range_hour_from ) && isset( $time_range_minute_from ) && isset( $time_range_hour_to ) && isset( $time_range_minute_to ) ) && 
			( $time_range_hour_from < $time_range_hour_to || ( $time_range_hour_from == $time_range_hour_to && $time_range_minute_from < $time_range_minute_to ) )
		) {
			update_post_meta( $post_id, 'time_range_hour_from', $time_range_hour_from );
			update_post_meta( $post_id, 'time_range_minute_from', $time_range_minute_from );
			update_post_meta( $post_id, 'time_range_hour_to', $time_range_hour_to );
			update_post_meta( $post_id, 'time_range_minute_to', $time_range_minute_to );
		} else {
			delete_post_meta( $post_id, 'time_range_hour_from' );
			delete_post_meta( $post_id, 'time_range_minute_from' );
			delete_post_meta( $post_id, 'time_range_hour_to' );
			delete_post_meta( $post_id, 'time_range_minute_to' );
		}

	}
}
add_action( 'save_post', 'wpds_meta_save' );


/**
 * Adds the meta box stylesheet when appropriate
 */
function wpds_admin_styles(){
	global $typenow;
	if( $typenow == 'slide' ) {
		wp_enqueue_style( 'wpds_meta_box_styles', get_template_directory_uri() . '/stylesheets/admin/meta-box-styles.css' );
	}
}
add_action( 'admin_print_styles', 'wpds_admin_styles' );


/**
 * Loads the image management javascript
 */
function wpds_image_enqueue() {
	global $typenow;
	if( $typenow == 'slide' ) {
		wp_enqueue_media();

		// Registers and enqueues the required javascript.
		wp_register_script( 'meta-box-image', get_template_directory_uri() . '/javascripts/admin/meta-box-image.js', array( 'jquery' ) );
		wp_localize_script( 'meta-box-image', 'meta_image',
			array(
				'title' => __( 'Choose or Upload an Image', 'wpds' ),
				'button' => __( 'Use this image', 'wpds' ),
			)
		);
		wp_enqueue_script( 'meta-box-image' );
	}
}
add_action( 'admin_enqueue_scripts', 'wpds_image_enqueue' );
