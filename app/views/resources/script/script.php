<script src="/car-shop/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/car-shop/vendor/ckeditor/ckeditor/ckeditor.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>