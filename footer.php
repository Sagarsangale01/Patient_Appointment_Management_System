<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<!-- <b>Version</b> 2.4.0 -->
	</div>
	<strong>Copyright &copy; 2018.</strong> All rights reserved.&nbsp;&nbsp;&nbsp;
</footer>

<!-- jQuery 3 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
	$( function () {
		$( '#example1' ).DataTable()
		$( '#example2' ).DataTable( {
			'paging': true,
			'lengthChange': true,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true
		} )
		$( '#example3' ).DataTable( {
			'paging': true,
			'lengthChange': true,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true
		} )
		$( '#example4' ).DataTable( {
			'paging': true,
			'lengthChange': true,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true
		} )
	} )
</script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
	$( function () {
		$( 'input' ).iCheck( {
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		} );
	} );
</script>