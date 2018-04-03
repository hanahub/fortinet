<div class="mainpanel">

    <?php $this->load->view('page_header', array("page_title" => $page_title, "controller" => $controller)); ?>

    <div class="contentpanel">

        <?php $this->load->view('notification_header', isset($msg) ? array("msg" => $msg) : array()); ?>

        <div class="ui-widget-content ui-corner-all datatables">
			<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
				<div class="floatL form-title-left">
					<?php if (isset($id)) : ?>
						<a href="#">Edit Address</a>
					<?php else : ?>
						<a href="#">Create Address</a>
					<?php endif; ?>
				</div>
				<div class="clear"></div>
			</h3>

			<div class="form-content form-div">
				<?php if (isset($id)) : ?>
				<form action="<?= base_url() . "addresses/edit/{$id}"; ?>" method="post" id="crudForm">
				<?php else : ?>
				<form action="<?= base_url() . "addresses/add"; ?>" method="post" id="crudForm">
				<?php endif; ?>

					<div>
						<div class="form-field-box odd" id="name_field_box">
							<div class="form-display-as-box" id="name_display_as_box"> Name<span class="required">*</span>  :</div>
							<div class="form-input-box" id="name_input_box">
								<input id="field-name" class="form-control" name="name" type="text" value="<?= (isset($id)) ? $address->name : ''; ?>" maxlength="100" required="">
							</div>
							<div class="clear"></div>
						</div>

						<div class="form-field-box even hidden" id="type_field_box">
							<div class="form-display-as-box" id="type_display_as_box"> Type<span class="required">*</span>  :</div>
							<div class="form-input-box" id="type_input_box">
								<select id="addr_type" name="type" aria-invalid="false" class="addr_type_select" required="">
						            <option value="ipmask">IP/Netmask</option>
						        </select>
							</div>
							<div class="clear"></div>
						</div>

						<div class="form-field-box odd" id="details_field_box">
							<div class="form-display-as-box" id="details_display_as_box"> <span id="details_label">IP Address</span><span class="required">*</span>  :</div>
							<div class="form-input-box" id="details_input_box">
								<input id="field-subnet" class="form-control" name="subnet" type="text" value="<?= (isset($id)) ? str_replace(" 255.255.255.255", "", $address->subnet) : ''; ?>" maxlength="100" required="">
							</div>
							<div class="clear"></div>
						</div>

						<div class="form-field-box even hidden" id="interface_field_box">
							<div class="form-display-as-box" id="interface_display_as_box"> Interface<span class="required">*</span>  :</div>
							<div class="form-input-box" id="interface_input_box">
								<select id="interface" name="interface" aria-invalid="false" class="interface_select" <?= (isset($id)) ? "readonly" : ''; ?>>
						            <option value="">any</option>

						      	</select>
							</div>
							<div class="clear"></div>
						</div>

						<div class="form-field-box odd hidden" id="visibility_field_box">
							<div class="form-display-as-box" id="visibility_display_as_box"> Show in Address List<span class="required">*</span>  :</div>
							<div class="form-input-box" id="visibility_input_box">
								<div class="rdio rdio-primary" style="margin-right: 20px;">
                                    <input type="radio" name="visibility" value="enable" id="radio_enable" checked>
                                    <label for="radio_enable">Yes</label>
                                </div>
                                <div class="rdio rdio-primary">
                                    <input type="radio" name="visibility" value="disable" id="radio_disable" <?= (isset($id) && ($address->visibility == 'disable')) ? "checked" : ''; ?>>
                                    <label for="radio_disable">No</label>
                                </div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="form-field-box even" id="comment_field_box">
							<div class="form-display-as-box" id="comment_display_as_box"> Comment<span class="required"></span>  :</div>
							<div class="form-input-box" id="name_input_box">
								<textarea id="field-comment" class="form-control" name="comment"><?= (isset($id)) ? $address->comment : ''; ?></textarea>
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
							<input type="button" value="Cancel" class="btn btn-warning" id="cancel-button" onclick="location.href='<?= base_url() . "addresses"; ?>'">
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
		$("#form-button-save").click(function(e) {
			ip = $("#field-subnet").val();
			if (!ValidateIPaddress(ip)) {
				e.preventDefault();
			}
		})
	});
</script>
