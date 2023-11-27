<script src="<?= BASE_URL ?>/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/vendor/ckeditor/ckeditor/ckeditor.js"></script>
<script src="<?= BASE_URL ?>/vendor/components/jquery/jquery.min.js"></script>
<script src="<?= BASE_URL ?>/vendor/datatables.net/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL ?>/vendor/datatables.net/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= BASE_URL ?>/assets/plugin/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>