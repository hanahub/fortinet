<?php
	
	$countries = '
		<select id="field-country" name="country" aria-invalid="false" class="chosen-select" required="">
			<option value="AF">Afghanistan</option>
			<option value="AX">Åland Islands</option>
			<option value="AL">Albania</option>
			<option value="DZ">Algeria</option>
			<option value="AS">American Samoa</option>
			<option value="AD">Andorra</option>
			<option value="AO">Angola</option>
			<option value="AI">Anguilla</option>
			<option value="AQ">Antarctica</option>
			<option value="AG">Antigua and Barbuda</option>
			<option value="AR">Argentina</option>
			<option value="AM">Armenia</option>
			<option value="AW">Aruba</option>
			<option value="AU">Australia</option>
			<option value="AT">Austria</option>
			<option value="AZ">Azerbaijan</option>
			<option value="BS">Bahamas</option>
			<option value="BH">Bahrain</option>
			<option value="BD">Bangladesh</option>
			<option value="BB">Barbados</option>
			<option value="BY">Belarus</option>
			<option value="BE">Belgium</option>
			<option value="BZ">Belize</option>
			<option value="BJ">Benin</option>
			<option value="BM">Bermuda</option>
			<option value="BT">Bhutan</option>
			<option value="BO">Bolivia, Plurinational State of</option>
			<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
			<option value="BA">Bosnia and Herzegovina</option>
			<option value="BW">Botswana</option>
			<option value="BV">Bouvet Island</option>
			<option value="BR">Brazil</option>
			<option value="IO">British Indian Ocean Territory</option>
			<option value="BN">Brunei Darussalam</option>
			<option value="BG">Bulgaria</option>
			<option value="BF">Burkina Faso</option>
			<option value="BI">Burundi</option>
			<option value="KH">Cambodia</option>
			<option value="CM">Cameroon</option>
			<option value="CA">Canada</option>
			<option value="CV">Cape Verde</option>
			<option value="KY">Cayman Islands</option>
			<option value="CF">Central African Republic</option>
			<option value="TD">Chad</option>
			<option value="CL">Chile</option>
			<option value="CN">China</option>
			<option value="CX">Christmas Island</option>
			<option value="CC">Cocos (Keeling) Islands</option>
			<option value="CO">Colombia</option>
			<option value="KM">Comoros</option>
			<option value="CG">Congo</option>
			<option value="CD">Congo, the Democratic Republic of the</option>
			<option value="CK">Cook Islands</option>
			<option value="CR">Costa Rica</option>
			<option value="CI">Côte d\'Ivoire</option>
			<option value="HR">Croatia</option>
			<option value="CU">Cuba</option>
			<option value="CW">Curaçao</option>
			<option value="CY">Cyprus</option>
			<option value="CZ">Czech Republic</option>
			<option value="DK">Denmark</option>
			<option value="DJ">Djibouti</option>
			<option value="DM">Dominica</option>
			<option value="DO">Dominican Republic</option>
			<option value="EC">Ecuador</option>
			<option value="EG">Egypt</option>
			<option value="SV">El Salvador</option>
			<option value="GQ">Equatorial Guinea</option>
			<option value="ER">Eritrea</option>
			<option value="EE">Estonia</option>
			<option value="ET">Ethiopia</option>
			<option value="FK">Falkland Islands (Malvinas)</option>
			<option value="FO">Faroe Islands</option>
			<option value="FJ">Fiji</option>
			<option value="FI">Finland</option>
			<option value="FR">France</option>
			<option value="GF">French Guiana</option>
			<option value="PF">French Polynesia</option>
			<option value="TF">French Southern Territories</option>
			<option value="GA">Gabon</option>
			<option value="GM">Gambia</option>
			<option value="GE">Georgia</option>
			<option value="DE">Germany</option>
			<option value="GH">Ghana</option>
			<option value="GI">Gibraltar</option>
			<option value="GR">Greece</option>
			<option value="GL">Greenland</option>
			<option value="GD">Grenada</option>
			<option value="GP">Guadeloupe</option>
			<option value="GU">Guam</option>
			<option value="GT">Guatemala</option>
			<option value="GG">Guernsey</option>
			<option value="GN">Guinea</option>
			<option value="GW">Guinea-Bissau</option>
			<option value="GY">Guyana</option>
			<option value="HT">Haiti</option>
			<option value="HM">Heard Island and McDonald Islands</option>
			<option value="VA">Holy See (Vatican City State)</option>
			<option value="HN">Honduras</option>
			<option value="HK">Hong Kong</option>
			<option value="HU">Hungary</option>
			<option value="IS">Iceland</option>
			<option value="IN">India</option>
			<option value="ID">Indonesia</option>
			<option value="IR">Iran, Islamic Republic of</option>
			<option value="IQ">Iraq</option>
			<option value="IE">Ireland</option>
			<option value="IM">Isle of Man</option>
			<option value="IL">Israel</option>
			<option value="IT">Italy</option>
			<option value="JM">Jamaica</option>
			<option value="JP">Japan</option>
			<option value="JE">Jersey</option>
			<option value="JO">Jordan</option>
			<option value="KZ">Kazakhstan</option>
			<option value="KE">Kenya</option>
			<option value="KI">Kiribati</option>
			<option value="KP">Korea, Democratic People\'s Republic of</option>
			<option value="KR">Korea, Republic of</option>
			<option value="KW">Kuwait</option>
			<option value="KG">Kyrgyzstan</option>
			<option value="LA">Lao People\'s Democratic Republic</option>
			<option value="LV">Latvia</option>
			<option value="LB">Lebanon</option>
			<option value="LS">Lesotho</option>
			<option value="LR">Liberia</option>
			<option value="LY">Libya</option>
			<option value="LI">Liechtenstein</option>
			<option value="LT">Lithuania</option>
			<option value="LU">Luxembourg</option>
			<option value="MO">Macao</option>
			<option value="MK">Macedonia, the former Yugoslav Republic of</option>
			<option value="MG">Madagascar</option>
			<option value="MW">Malawi</option>
			<option value="MY">Malaysia</option>
			<option value="MV">Maldives</option>
			<option value="ML">Mali</option>
			<option value="MT">Malta</option>
			<option value="MH">Marshall Islands</option>
			<option value="MQ">Martinique</option>
			<option value="MR">Mauritania</option>
			<option value="MU">Mauritius</option>
			<option value="YT">Mayotte</option>
			<option value="MX">Mexico</option>
			<option value="FM">Micronesia, Federated States of</option>
			<option value="MD">Moldova, Republic of</option>
			<option value="MC">Monaco</option>
			<option value="MN">Mongolia</option>
			<option value="ME">Montenegro</option>
			<option value="MS">Montserrat</option>
			<option value="MA">Morocco</option>
			<option value="MZ">Mozambique</option>
			<option value="MM">Myanmar</option>
			<option value="NA">Namibia</option>
			<option value="NR">Nauru</option>
			<option value="NP">Nepal</option>
			<option value="NL">Netherlands</option>
			<option value="NC">New Caledonia</option>
			<option value="NZ">New Zealand</option>
			<option value="NI">Nicaragua</option>
			<option value="NE">Niger</option>
			<option value="NG">Nigeria</option>
			<option value="NU">Niue</option>
			<option value="NF">Norfolk Island</option>
			<option value="MP">Northern Mariana Islands</option>
			<option value="NO">Norway</option>
			<option value="OM">Oman</option>
			<option value="PK">Pakistan</option>
			<option value="PW">Palau</option>
			<option value="PS">Palestinian Territory, Occupied</option>
			<option value="PA">Panama</option>
			<option value="PG">Papua New Guinea</option>
			<option value="PY">Paraguay</option>
			<option value="PE">Peru</option>
			<option value="PH">Philippines</option>
			<option value="PN">Pitcairn</option>
			<option value="PL">Poland</option>
			<option value="PT">Portugal</option>
			<option value="PR">Puerto Rico</option>
			<option value="QA">Qatar</option>
			<option value="RE">Réunion</option>
			<option value="RO">Romania</option>
			<option value="RU">Russian Federation</option>
			<option value="RW">Rwanda</option>
			<option value="BL">Saint Barthélemy</option>
			<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
			<option value="KN">Saint Kitts and Nevis</option>
			<option value="LC">Saint Lucia</option>
			<option value="MF">Saint Martin (French part)</option>
			<option value="PM">Saint Pierre and Miquelon</option>
			<option value="VC">Saint Vincent and the Grenadines</option>
			<option value="WS">Samoa</option>
			<option value="SM">San Marino</option>
			<option value="ST">Sao Tome and Principe</option>
			<option value="SA">Saudi Arabia</option>
			<option value="SN">Senegal</option>
			<option value="RS">Serbia</option>
			<option value="SC">Seychelles</option>
			<option value="SL">Sierra Leone</option>
			<option value="SG">Singapore</option>
			<option value="SX">Sint Maarten (Dutch part)</option>
			<option value="SK">Slovakia</option>
			<option value="SI">Slovenia</option>
			<option value="SB">Solomon Islands</option>
			<option value="SO">Somalia</option>
			<option value="ZA">South Africa</option>
			<option value="GS">South Georgia and the South Sandwich Islands</option>
			<option value="SS">South Sudan</option>
			<option value="ES">Spain</option>
			<option value="LK">Sri Lanka</option>
			<option value="SD">Sudan</option>
			<option value="SR">Suriname</option>
			<option value="SJ">Svalbard and Jan Mayen</option>
			<option value="SZ">Swaziland</option>
			<option value="SE">Sweden</option>
			<option value="CH">Switzerland</option>
			<option value="SY">Syrian Arab Republic</option>
			<option value="TW">Taiwan, Province of China</option>
			<option value="TJ">Tajikistan</option>
			<option value="TZ">Tanzania, United Republic of</option>
			<option value="TH">Thailand</option>
			<option value="TL">Timor-Leste</option>
			<option value="TG">Togo</option>
			<option value="TK">Tokelau</option>
			<option value="TO">Tonga</option>
			<option value="TT">Trinidad and Tobago</option>
			<option value="TN">Tunisia</option>
			<option value="TR">Turkey</option>
			<option value="TM">Turkmenistan</option>
			<option value="TC">Turks and Caicos Islands</option>
			<option value="TV">Tuvalu</option>
			<option value="UG">Uganda</option>
			<option value="UA">Ukraine</option>
			<option value="AE">United Arab Emirates</option>
			<option value="GB">United Kingdom</option>
			<option value="US">United States</option>
			<option value="UM">United States Minor Outlying Islands</option>
			<option value="UY">Uruguay</option>
			<option value="UZ">Uzbekistan</option>
			<option value="VU">Vanuatu</option>
			<option value="VE">Venezuela, Bolivarian Republic of</option>
			<option value="VN">Viet Nam</option>
			<option value="VG">Virgin Islands, British</option>
			<option value="VI">Virgin Islands, U.S.</option>
			<option value="WF">Wallis and Futuna</option>
			<option value="EH">Western Sahara</option>
			<option value="YE">Yemen</option>
			<option value="ZM">Zambia</option>
			<option value="ZW">Zimbabwe</option>
		</select>
	';

	(isset($id) && ($address->type == 'fqdn')) ? $fqdn = '<input id="field-fqdn" class="form-control" name="fqdn" type="text" value="' . $address->fqdn . '" maxlength="100" required="">'
		: $fqdn = '<input id="field-fqdn" class="form-control" name="fqdn" type="text" value="" maxlength="100" required="">';
	
	(isset($id) && ($address->type == 'ipmask')) ? $ipmask = '<input id="field-subnet" class="form-control" name="subnet" type="text" value="' . $address->subnet . '" maxlength="100" required="">'
		: $ipmask = '<input id="field-subnet" class="form-control" name="subnet" type="text" value="" maxlength="100" required="">';

	(isset($id) && ($address->type == 'iprange')) ? $iprange = '<input id="field-start-ip" class="form-control field-ip" name="start_ip" type="text" value="' . $address->{'start-ip'} . '" maxlength="100" required=""> - <input id="field-end-ip" class="form-control field-ip" name="end_ip" type="text" value="' . $address->{'end-ip'} . '" maxlength="100" required="">'
		: $iprange = '<input id="field-start-ip" class="form-control field-ip" name="start_ip" type="text" value="" maxlength="100" required=""> - <input id="field-end-ip" class="form-control field-ip" name="end_ip" type="text" value="" maxlength="100" required="">';

	(isset($id) && ($address->type == 'wildcard-fqdn')) ? $wildcard_fqdn = '<input id="field-wildcard-fqdn" class="form-control" name="wildcard_fqdn" type="text" value="' . $address->{'wildcard-fqdn'} . '" maxlength="100" required="">'
		: $wildcard_fqdn = '<input id="field-wildcard-fqdn" class="form-control" name="wildcard_fqdn" type="text" value="" maxlength="100" required="">';


	$details = array(
		'fqdn' => array("label" => "FQDN", "input" => $fqdn),
		'geography' => array("label" => "Country", "input" => $countries),
		'ipmask' => array("label" => "Subnet / IP Range", "input" => $ipmask),
		'iprange' => array("label" => "Subnet / IP Range", "input" => $iprange),
		'wildcard-fqdn' => array("label" => "Wildcard FQDN", "input" => $wildcard_fqdn)
	);

?>
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

						<div class="form-field-box even" id="type_field_box">
							<div class="form-display-as-box" id="type_display_as_box"> Type<span class="required">*</span>  :</div>
							<div class="form-input-box" id="type_input_box">
								<select id="addr_type" name="type" aria-invalid="false" class="addr_type_select" required="" <?= (isset($id)) ? "disabled" : ''; ?>>
						            <option value="fqdn" <?= (isset($id) && $address->type == "fqdn") ? "selected" : ''; ?>>FQDN</option>
						            <option value="geography" <?= (isset($id) && $address->type == "geography") ? "selected" : ''; ?>>Geography</option>
						            <option value="iprange" <?= (isset($id) && $address->type == "iprange") ? "selected" : ''; ?>>IP Range</option>
						            <option value="ipmask" <?= (isset($id) && $address->type == "ipmask") ? "selected" : ''; ?>>IP/Netmask</option>
						            <option value="wildcard-fqdn" <?= (isset($id) && $address->type == "wildcard-fqdn") ? "selected" : ''; ?>>Wildcard FQDN</option>
						        </select>
						        <?= (isset($id)) ? '<input type="hidden" name="type" value="' . $address->type . '">' : '' ?>
							</div>
							<div class="clear"></div>
						</div>

						<div class="form-field-box odd" id="details_field_box">
							<div class="form-display-as-box" id="details_display_as_box"> <span id="details_label"><?php
								if (isset($id)) {
									echo $details[$address->type]["label"];
								} else {									
									echo $details["fqdn"]["label"];
								}
							?></span><span class="required">*</span>  :</div>
							<div class="form-input-box" id="details_input_box">
							<?php
								if (isset($id)) {
									echo $details[$address->type]["input"];
								} else {
									echo $details["fqdn"]["input"];
								}
							?>
							</div>
							<div class="clear"></div>
						</div>

						<div class="form-field-box even" id="interface_field_box">
							<div class="form-display-as-box" id="interface_display_as_box"> Interface<span class="required">*</span>  :</div>
							<div class="form-input-box" id="interface_input_box">
								<select id="interface" name="interface" aria-invalid="false" class="interface_select" <?= (isset($id)) ? "readonly" : ''; ?>>
						            <option value="" <?= (isset($id) && $address->{'associated-interface'} == "") ? "selected" : ''; ?>>any</option>
						            <option value="lan" <?= (isset($id) && $address->{'associated-interface'} == "lan") ? "selected" : ''; ?>>lan</option>
						            <option value="SSL-VPN tunnel interface (ssl.root)" <?= (isset($id) && $address->{'associated-interface'} == "SSL-VPN tunnel interface (ssl.root)") ? "selected" : ''; ?>>SSL-VPN tunnel interface (ssl.root)</option>
						            <option value="wan1" <?= (isset($id) && $address->{'associated-interface'} == "wan1") ? "selected" : ''; ?>>wan1</option>
						            <option value="dmz" <?= (isset($id) && $address->{'associated-interface'} == "dmz") ? "selected" : ''; ?>>dmz</option>
						            <option value="ha" <?= (isset($id) && $address->{'associated-interface'} == "ha") ? "selected" : ''; ?>>ha</option>
						            <option value="wan2" <?= (isset($id) && $address->{'associated-interface'} == "wan2") ? "selected" : ''; ?>>wan2</option>
						            <option value="npu0_vlink0" <?= (isset($id) && $address->{'associated-interface'} == "npu0_vlink0") ? "selected" : ''; ?>>npu0_vlink0</option>
						            <option value="npu0_vlink1" <?= (isset($id) && $address->{'associated-interface'} == "npu0_vlink1") ? "selected" : ''; ?>>npu0_vlink1</option>
						      	</select>
							</div>
							<div class="clear"></div>
						</div>

						
						<div class="form-field-box odd" id="visibility_field_box">
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
		//$(".chosen-multiple-select").chosen({allow_single_deselect:true, width: "500px"});

		var details =<?php echo json_encode($details ); ?>;
		var id = '<?php echo @$id; ?>';
		var type = '<?php echo @$address->type; ?>';
		

		if (id != '' && type == 'geography') {
			$("#field-country").val('<?php echo @$address->country ?>');
			$("#field-country").chosen({allow_single_deselect:true, width: "400px"});
		}

		$("#addr_type").change(function(e) {
			var current = $(this).val();
			$("#details_input_box").html(details[current]["input"]);
			$("#details_label").text(details[current]["label"]);
			if (current == "geography") {
				$("#field-country").chosen({allow_single_deselect:true, width: "400px"});
			}
		})
	});
</script>

