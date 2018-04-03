<div class="mainpanel">
    
    <?php $this->load->view('page_header', array("page_title" => $page_title)); ?>
    
    <div class="contentpanel">
        
        <div class="fb-add-button">
			<a class="btn btn-primary add_button" role="button" href="<?= base_url() . "address_groups/add"; ?>">
				<span class="glyphicon glyphicon-plus"></span>
				<span class="ui-button-text">Create Address Group</span>
			</a>
		</div>

        <div id="tableResults" class="fb_table_wrap row-fluid">
            <table class="table" id="fb_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($items)) {
                    	foreach ($items as $item) : ?>
                    <tr>                        
                        <td><?= $item->name; ?></td>
                        <td>
                        <?php
                        	if (!empty($item->member)) {
                        		echo '<ul class="members_ul">';
                        		foreach ($item->member as $member) :
                        			echo "<li>{$member->name}</li>";
                        		endforeach;
                        		echo '</ul>';
                        	}
                        ?>
                        </td>                        
                        <td class="actions">
                        	<a href="<?= base_url() . "address_groups/edit/{$item->name}"; ?>" class="btn btn-primary btn-xs edit_button" role="button">
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
                    { 'bSortable': false, 'aTargets': [2] }
                ]
    	});
	});
    
</script>