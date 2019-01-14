$(document).ready(function() {
    $('#datatable').dataTable({
        "oLanguage": {
            "sStripClasses": "",
            "sSearch": "",
            "sSearchPlaceholder": "Masukan Kata Di sini",
            "sInfo": "_START_ -_END_ of _TOTAL_",
            "sLengthMenu": '<span>Baris per halaman:</span><select class="browser-default">' +
                '<option value="10">10</option>' +
                '<option value="20">20</option>' +
                '<option value="30">30</option>' +
                '<option value="40">40</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
            '</select></div>'
        },
        bAutoWidth: false
    });
    $('.btn-edit').on('click', function(e) {
        var id     = $(this).data('id'),
            name   = $(this).data('name'),
            price  = $(this).data('price'),
            status = $(this).data('status');

        $('#id').val(id);
        $('#name').val(name);
        $('#price').val(price);
        $('#modal-edit').modal('open');

        if (status == 1) {
            $('#status-l').attr('checked', '');
            $('#status-p').removeAttr('checked', '');
            $('#status-u').removeAttr('checked', '');
        } else if (status == 2) {
            $('#status-p').attr('checked', '');
            $('#status-l').removeAttr('checked', '');
            $('#status-u').removeAttr('checked', '');
        } else {
            $('#status-u').attr('checked', '');
            $('#status-l').removeAttr('checked', '');
            $('#status-p').removeAttr('checked', '');
        }
    });
});