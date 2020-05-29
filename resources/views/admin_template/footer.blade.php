<div class="footer">
			<div>
				<strong>Copyright</strong> &copy; 2020 PT. Hana Master Jaya
			</div>
		</div>
	</div>

	<!-- Mainly scripts -->
	<script src="/assets/admin/js/popper.min.js"></script>
	<script src="/assets/admin/js/bootstrap.js"></script>
	<script src="/assets/admin/js/bootstrap.min.js"></script>
	<script src="/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="/assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/assets/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	<script src="/assets/admin/js/plugins/footable/footable.all.min.js"></script>
	<script src="/assets/admin/js/plugins/dataTables/datatables.min.js"></script>
	<script src="/assets/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	
	<!-- Custom and plugin javascript -->
	<script src="/assets/admin/js/inspinia.js"></script>
	<script src="/assets/admin/js/plugins/pace/pace.min.js"></script>
	<!-- Page-Level Scripts -->
	<script src="/assets/admin/ckeditor/ckeditor.js"></script>
	<script>
		let ck_editor_content = document.getElementById("content");
			CKEDITOR.replace(content,{
			language:'en-gb'
		});
		CKEDITOR.config.allowedContent = true;
	</script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
				buttons: []
            });

        });
		var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
        });
    </script>
	
</body>
</html>