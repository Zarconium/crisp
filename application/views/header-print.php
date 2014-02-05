<!DOCTYPE html>
<HTML>
<head>
	<title>CRISP</title>
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/customize.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('js/jquery.js'); ?>"></script>
	<script type="text/javascript" charset="utf-8" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" src="http://datatables.net/release-datatables/extras/FixedColumns/media/js/FixedColumns.js"></script>
	<script>
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
	</script>
</head>

<body>
	<div class="wrapper">
	