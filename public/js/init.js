$(document).ready(function() {
    $('.modal').modal();
    $('ul.tabs').tabs();
    $('.button-collapse').sideNav({
        menuWidth: 225
    });
    $('select').material_select();
    $('.dropdown-button').dropdown();
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15
    });
    $('.hide-show i.material-icons').click(function() {
        if( $(this).hasClass('show') ) {
            $(this).text('visibility');
            $('#password').attr('type', 'text');
            $(this).removeClass('show');
        } else {
            $(this).text('visibility_off');
            $('#password').attr('type', 'password');
            $(this).addClass('show');
        }
    });
});

function swalDelete(index, text = null, title = null) {
    if (title == null) { title = 'Yakin menghapus data?'; }
    if (text == null) { text = 'Data akan di hapus secara permaen'; }
    swal({
      title: title,
      text: text,
      type: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
    })
    .then((result) => {
      if (result) {
        $('#form-delete-' + index).submit();
      }
    });
}

function addDot(event) {
    var _minus = false;
    if (event < 0) _minus = true;
    event = event.toString();
    event = event.replace(".","");
    event = event.replace("-","");
    x = "";
    z = 0;
    l = event.length;
    for (i = l; i > 0; i--){
        z = z + 1;
        if (((z % 3) == 1) && (z != 1)){
            x = event.substr(i-1,1) + "." + x;
        } else {
            x = event.substr(i-1,1) + x;
        }
    }
    if (_minus) x = "-" + x ;
    return x;
}

function numberWithDot(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}