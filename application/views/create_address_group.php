<div class="mainpanel">
    
    <?php $this->load->view('page_header', array("page_title" => $page_title, "controller" => $controller)); ?>
    
    <div class="contentpanel">

        <?php $this->load->view('notification_header', isset($msg) ? array("msg" => $msg) : array()); ?>

        <div class="ui-widget-content ui-corner-all datatables">
			<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
				<div class="floatL form-title-left">
					<?php if (isset($id)) : ?>
						<a href="#">Edit Address Group</a>
					<?php else : ?>
						<a href="#">Create Address Group</a>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</h3>

			<div class="form-content form-div">
				<?php if (isset($id)) : ?>
				<form action="<?= base_url() . "address_groups/edit/{$id}"; ?>" method="post" id="crudForm">
				<?php else : ?>
				<form action="<?= base_url() . "address_groups/add"; ?>" method="post" id="crudForm">
				<?php endif; ?>
				
					<div>
						<div class="form-field-box odd" id="name_field_box">
							<div class="form-display-as-box" id="name_display_as_box"> Address Group Name<span class="required">*</span>  :</div>
							<div class="form-input-box" id="name_input_box">
								<input id="field-name" class="form-control" name="name" type="text" value="<?= (isset($id)) ? $group->name : ''; ?>" maxlength="100" required="" <?= (isset($id)) ? "readonly" : ''; ?>>
							</div>
							<div class="clear"></div>
						</div>
						
						<div class="form-field-box even" id="member_field_box">
							<div class="form-display-as-box" id="member_display_as_box"> Members<span class="required">*</span>  :</div>
							<div class="form-input-box" id="member_input_box">
							<?php
								
								if (isset($id)) $members = json_decode(json_encode($group->member), true);

								echo "<select id='field-member' name='member[]' class='chosen-multiple-select' data-placeholder='Select Members' multiple required=''>";
								if (!empty($addresses)) {
									foreach ($addresses as $address) {
										if ( isset($id) && in_array(array("name" => $address->name, "q_origin_key" => $address->q_origin_key), $members) ) {
											echo "<option value='{$address->q_origin_key}' selected>{$address->name}</option>";
										} else {
											echo "<option value='{$address->q_origin_key}'>{$address->name}</option>";	
										}
										
									}
								}
								echo "</select>";
							?>
							</div>
							<div class="clear"></div>

						</div>
									
						<div class="line-1px"></div>
					</div>
					<div class="buttons-box">
						<div class="form-button-box">
							<input id="form-button-save" type="submit" value="<?= (isset($id)) ? "Update" : "Save"; ?>" class="btn btn-primary">
						</div>						
						<div class="form-button-box">
							<input type="button" value="Cancel" class="btn btn-warning" id="cancel-button" onclick="location.href='<?= base_url() . "address_groups"; ?>'">
						</div>
						<div class="clear"></div>
					</div>
				</form></div>
			</div>
    	</div>
    </div><!-- contentpanel -->

</div>

<script>
	$(function() {
		$(".chosen-multiple-select").chosen({allow_single_deselect:true, width: "500px"});	
	});
</script>
