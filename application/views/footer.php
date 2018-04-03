	
	<?php if (!empty($login) && $login["status"] == 1) : ?>
			</div><!-- mainwrapper -->
		</section><!-- section -->

	<?php endif; ?>

</div><!-- container -->

<script src="<?php echo base_url(); ?>application/views/chain/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>application/views/chain/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>application/views/chain/js/modernizr.min.js"></script>
<script src="<?php echo base_url(); ?>application/views/chain/js/pace.min.js"></script>
<script src="<?php echo base_url(); ?>application/views/chain/js/retina.min.js"></script>
<script src="<?php echo base_url(); ?>application/views/chain/js/jquery.cookies.js"></script>

<?php if (!empty($js_files)) : ?>        
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

<?php else: ?>
	<script src="<?php echo base_url(); ?>assets/grocery_crud/js/jquery_plugins/jquery.chosen.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
<?php endif; ?>

<script src="<?php echo base_url(); ?>application/views/chain/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/custom.js"></script>


</body>
</html>