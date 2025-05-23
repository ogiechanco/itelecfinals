// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});


<script>
document.addEventListener("DOMContentLoaded", function () {
    const hash = window.location.hash;
    if (hash === "#newsDE") {
        const triggerTab = document.querySelector(`button[data-bs-target="${hash}"]`);
        if (triggerTab) {
            new bootstrap.Tab(triggerTab).show();
        }
    }
});
</script>