<script src="{{ asset('adm/js/plugins/popper.min.js') }}"></script>
{{-- <!-- <script src="assets/js/plugins/perfect-scrollbar.min.js"></script> --> --}}
<script src="{{ asset('adm/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('adm/js/pcoded.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- <!-- <script src="assets/js/plugins/apexcharts.min.js"></script> --> --}}
{{-- <!-- <script src="assets/js/menu-setting.js"></script> --> --}}
<script src="{{ asset('adm/js/plugins/simple-datatables.js') }}"></script>

 <script src="{{ asset('adm/js/pages/dashboard-main.js') }}"></script>
 <script>
    const dataTable = new simpleDatatables.DataTable("#pc-dt-simple");
</script>
<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })
</script>
</body>

</html>
