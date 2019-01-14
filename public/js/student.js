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
    $('.btn-edit').click(function() {
        var id    = $(this).data('id'),
            name  = $(this).data('name'),
            jk    = $(this).data('jk'),
            agama = $(this).data('agama'),
            smp   = $(this).data('smp');

        $('#no_daftar').val(id);
        $('#nama').val(name);
        $('#asal_smp').val(smp);
        $('#modal-edit').modal('open');

        if (jk == 1) {
            $('#jk-edit-1').attr('checked', '');
            $('#jk-edit-2').removeAttr('checked', '');
        } else {
            $('#jk-edit-2').attr('checked', '');
            $('#jk-edit-1').removeAttr('checked', '');
        }

        if (agama == 1) {
            $('#religion-edit-1').attr('checked', '');
            $('#religion-edit-2').removeAttr('checked', '');
            $('#religion-edit-3').removeAttr('checked', '');
            $('#religion-edit-4').removeAttr('checked', '');
            $('#religion-edit-5').removeAttr('checked', '');
        } else if (agama == 2) {
            $('#religion-edit-2').attr('checked', '');
            $('#religion-edit-1').removeAttr('checked', '');
            $('#religion-edit-3').removeAttr('checked', '');
            $('#religion-edit-4').removeAttr('checked', '');
            $('#religion-edit-5').removeAttr('checked', '');
        } else if (agama == 3) {
            $('#religion-edit-3').attr('checked', '');
            $('#religion-edit-2').removeAttr('checked', '');
            $('#religion-edit-1').removeAttr('checked', '');
            $('#religion-edit-4').removeAttr('checked', '');
            $('#religion-edit-5').removeAttr('checked', '');
        } else if (agama == 4) {
            $('#religion-edit-4').attr('checked', '');
            $('#religion-edit-2').removeAttr('checked', '');
            $('#religion-edit-3').removeAttr('checked', '');
            $('#religion-edit-1').removeAttr('checked', '');
            $('#religion-edit-5').removeAttr('checked', '');
        } else {
            $('#religion-edit-5').attr('checked', '');
            $('#religion-edit-2').removeAttr('checked', '');
            $('#religion-edit-3').removeAttr('checked', '');
            $('#religion-edit-4').removeAttr('checked', '');
            $('#religion-edit-1').removeAttr('checked', '');
        }
    });
});