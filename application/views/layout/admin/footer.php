</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; PT. Angkasa Pura Solusi | 2022</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Logout</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Yakin kamu mau keluar? tidak ingin didalam saja...</div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
				<a class="btn btn-sm btn-primary" href="<?=base_url('logout')?>"><i class="fas fa-sign-out-alt"></i> Yakin Dong</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/template/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/template/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/template/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/template/') ?>vendor/chart.js/Chart.min.js"></script>

<!-- Datatables JS -->
<script src="<?= base_url('assets/template/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/') ?>js/demo/datatables-demo.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url('assets/template/') ?>js/demo/chart-area-demo.js"></script> -->
<!-- <script src="<?= base_url('assets/template/') ?>js/demo/chart-pie-demo.js"></script> -->

<!-- Datepicker -->
<script src="<?= base_url('assets/template/') ?>vendor/moment/moment.min.js"></script>
<script src="<?= base_url('assets/template/') ?>vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Custom.js -->
<script src="<?= base_url('assets/template/') ?>js/custom.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		setDatePicker("#datepicker")
		setDateRangePicker("#startdate", "#enddate")
		setMonthPicker("#monthpicker")
		setYearPicker("#yearpicker")
		setYearRangePicker("#startyear", "#endyear")
	});

	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})

	$('input[type="file"]').change(function(e) {
		var fileName = e.target.files[0].name;
		$('.custom-file-label').html(fileName);
	});

	ClassicEditor
		.create(document.querySelector('#editor'))
		.catch(error => {
			console.error(error);
		});
</script>
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(800, 2).slideUp(800, function() {
			$(this).remove();
		});
	}, 3000);
</script>
</body>

</html>
