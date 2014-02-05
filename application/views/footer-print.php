			</div>
		</div>
</div>
<script type="text/javascript" src="<?php echo base_url('js/bootstrap.js'); ?>"></script>
<script>
$(document).ready( function () 
{
	var iStart = new Date().getTime();
	var oTable = $('.tryingThis').dataTable( 
	{
		"sScrollY": "300px",
		"sScrollX": "100%",
		"sScrollXInner": "150%",
		"bScrollCollapse": true,
		"bPaginate": false,
        "bFilter": false
	} );
	new FixedColumns( oTable, 
	{
		"sHeightMatch": "none"
	} );
} );

</script>

</body>
</HTML>