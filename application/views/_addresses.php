<div class="mainpanel">
    
    <?php $this->load->view('page_header', array("page_title" => $page_title)); ?>
    
    <div class="contentpanel">
        
        <div class="fb-add-button">
			<a class="btn btn-primary add_button" role="button" href="<?= base_url() . "addresses/add"; ?>">
				<span class="glyphicon glyphicon-plus"></span>
				<span class="ui-button-text">Create Address</span>
			</a>
		</div>

        <div id="tableResults" class="fb_table_wrap row-fluid">
            <table class="table" id="fb_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Details</th>
                        <th>Interface</th>
                        <th>Visibility</th>
                        <th>Ref.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($items)) {
                    	foreach ($items as $item) : ?>
                    <tr>
                        <td><?= $item->name; ?></td>
                        <td><?= $item->type; ?></td>
                        <td>
                        <?php 
                            if ($item->type == "wildcard-fqdn") {
                                echo $item->{'wildcard-fqdn'};
                            } else if ($item->type == "ipmask") {
                                echo $item->subnet;
                            } else if ($item->type == "fqdn") {
                                echo $item->fqdn;
                            } else if ($item->type == "iprange") {
                                echo $item->{'start-ip'} . " - " . $item->{'end-ip'}; 
                            } else if ($item->type == "geography") {
                                echo $item->country; 
                            }
                        ?>
                        </td>
                        <td><?= ($item->{'associated-interface'} == '') ? 'any' : $item->{'associated-interface'}; ?></td>
                        <td><?= ($item->visibility == "enable") ? "Yes" : "No"; ?></td>
                        <td><?= $item->q_ref; ?></td>
                        
                        <td class="actions">
                        	<a href="<?= base_url() . "addresses/edit/{$item->name}"; ?>" class="btn btn-primary btn-xs edit_button" role="button">
								<span class="glyphicon glyphicon-edit"></span>
								<span class="ui-button-text">&nbsp;Edit</span>
							</a>
                        </td>
                    </tr>
                    <?php endforeach; } ?>
                </tbody>
            </table>
        </div>
    
    </div><!-- contentpanel -->

</div>

<script>
	jQuery(document).ready(function($) {
		table = $("#fb_table").DataTable({
                "bLengthChange": true,
                "dom": "lftip",
                "searching": true,
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, 100, 200, 500, -1], [10, 25, 50, 100, 200, 500, "All"]],
                "aaSorting": [],
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [6] }
                ]
    	});
	});
    
</script>