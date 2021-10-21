<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wpruby.com
 * @since      1.0.0
 *
 * @package    Controlled_Admin_Access
 * @subpackage Controlled_Admin_Access/admin/partials
 */
?>
<div class="wrap">
<?php include plugin_dir_path(__FILE__).'menu.php'; ?>
<?php if(!empty($errors)): ?>
	<div class="error">
		<p>
			<?php foreach($errors as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</p>
	</div>
<?php endif; ?>
<?php if($saved === TRUE): ?>
	<div class="updated">
		<p> <?php _e('The user has been added successfully','controlled-admin-access'); ?>
			<ul id="caa_user_info">
				<li><strong><?php _e('Username','controlled-admin-access'); ?>:</strong> <?php echo $user_login; ?></li>
				<li><strong><?php _e('Password','controlled-admin-access'); ?>:</strong> <?php echo $user_password; ?></li>
				<li><strong><?php _e('Admin Login Page','controlled-admin-access'); ?>:</strong> <a href="<?php echo wp_login_url(); ?>"><?php echo wp_login_url(); ?></a></li>
			</ul>
		</p>
	</div>
<?php endif; ?>
<form method="post" name="createuser" id="createuser" class="validate" novalidate="novalidate" _lpchecked="1">
	<input type="hidden" name="_caa_create_user_nonce" value="<?php echo $caa_create_user_nonce; ?>" />
	<table class="form-table">
		<tbody>
			<tr class="form-field form-required">
				<th scope="row"><label for="user_login"><?php _e('Username','controlled-admin-access'); ?> <span class="description">(<?php _e('required','controlled-admin-access'); ?>)</span></label></th>
				<td><input name="user_login" type="text" class="caa_field caa_small_field" id="user_login" value="<?php $this->_('user_login', $saved); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60">
				</td>
			</tr>
			<tr class="form-field form-required">
				<th scope="row"><label for="user_email"><?php _e('Email','controlled-admin-access'); ?> <span class="description">(<?php _e('required','controlled-admin-access'); ?>)</span></label></th>
				<td><input name="user_email" type="text" class="caa_field" id="user_email" value="<?php $this->_('user_email', $saved); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" ></td>
			</tr>
			<tr class="form-field form-required">
				<th scope="row"><label for="user_menu_access"><?php _e('Menu Access','controlled-admin-access'); ?> <span class="description">(required)</span></label></th>
				<td>
				<p class="description"><?php _e('Select the dashboard pages which the user is NOT ALLOWED to visit.','controlled-admin-access'); ?></p>
				<?php $c = 1; foreach($caa_menu as $part): ?>
									<div class="caa_menuitems">
										<ul>
											<?php   foreach($part as $item): ?>
												  <li>
												  	<?php if(isset($item['sub_items'] )): ?>
												  		<span class="dashicons dashicons-arrow-right-alt2 caa_arrow" data-id="<?php echo $c; ?>"></span>
												  	<?php else: ?>
												  		<span class="dashicons dashicons-menu"></span>
												  	<?php endif; ?>
												    <input type="checkbox" name="main_items[]" value="<?php echo $item['slug']; ?>" id="<?php echo $item['slug']; ?>" <?php $this->is_disabled($item['slug']); ?> >
												    <label for="<?php echo $item['slug']; ?>"><?php echo $this->prepare_title($item['title']); ?></label>
												    <?php if(isset($item['sub_items'] )): ?>
														    <ul class="subitem_menu" id="subitem_menu_<?php echo $c; ?>">
															<?php foreach($item['sub_items'] as $sub_item):
                                                                if (isset($sub_item[4]) && $sub_item[4] === 'hide-if-no-customize') continue; ?>
															      <li>
															        <input type="checkbox" name="sub_items[]" value="<?php echo $sub_item[2]; ?>" id="<?php echo $sub_item[1]; ?>" <?php $this->is_disabled($item['slug'], $sub_item[2]); ?> >
															        <label for="<?php echo $sub_item[1]; ?>"><?php echo $sub_item[0]; ?></label>
															      </li>
															<?php endforeach; ?>
														    </ul>
													<?php endif; ?>
												  </li>
											<?php $c++; endforeach; ?>
										</ul>
									</div>
				<?php endforeach; ?>
				</td>
			</tr>
			<tr class="form-field form-required">
				<th scope="row"><label for="user_password"><?php _e('Password','controlled-admin-access'); ?>  <span class="description">(<?php _e('required','controlled-admin-access'); ?> )</span></label></th>
				<td><input name="user_password" type="text" class="caa_field caa_small_field" id="user_password" value="<?php $this->_('user_password', $saved); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" />
						<button type="button" id="caa_gen_password" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Show password">
							<span class="text"><?php _e('Generate','controlled-admin-access'); ?> </span>
						</button>
				</td>
			</tr>
			<tr class="form-field form-required">
				<th scope="row"><label for="user_expiring"><?php _e('Expiring in','controlled-admin-access'); ?></label></th>
				<td>
					<select name="user_expiring" <?php if(isset($_POST['user_expiring'])){ selected(intval($_POST['user_expiring'])); } ?>>
						<option value="-1"><?php _e('Non Expiring','controlled-admin-access'); ?></option>
						<option value="1"><?php _e('1 Day','controlled-admin-access'); ?></option>
						<option value="3"><?php _e('3 Days','controlled-admin-access'); ?></option>
						<option value="15"><?php _e('15 Days','controlled-admin-access'); ?></option>
					</select>
					<p class="description"><?php _e('The account will be deleted automatically after the expiration time ended','controlled-admin-access'); ?></p>
				</td>
                <tr class="form-field form-required">
                    <th scope="row"><label for="user_expiring"><?php _e('Hide Admin Bar?','controlled-admin-access'); ?></label></th>
                    <td>
                        <input style="width: auto !important;" id="hide_admin_bar" name="hide_admin_bar" type="checkbox" <?php if(isset($_POST['hide_admin_bar'])){  checked(intval($_POST['hide_admin_bar'])); } ?> />
                        <p class="description"><?php _e('If checked the admin bar at the top of the page will be hidden.','controlled-admin-access'); ?></p>
                    </td>
                </tr>
			</tr>
		</tbody>
	</table>
<p class="submit">
	<input type="submit" name="createuser" id="createusersub" class="button button-primary" value="<?php _e('Create New User','controlled-admin-access'); ?>">
</p>
</form>
</div>
