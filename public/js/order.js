$(document).ready(function() {
	$('#btn-search').on('click', function() {
    	var input = $('#search').val();
        if (input.length >= 3) {
        	$.ajax({
        		url: 'search/student',
        		type: 'get',
        		data: {search: input},
        		success: function(data) {
        			if (data == 'null') {
        				$('#pay').val('');
                        $('.size').val('');
        				$('#name').val('');
                        $('#listSize').html('');
                        $('#student_id').val('');
        				$('#school_origin').val('');
        				$('#hide-card').addClass('hide');
        				Materialize.toast('Data siswa tidak ada', 2500);
                    } else if (data == 'belum diukur') {
                        $('#pay').val('');
                        $('.size').val('');
                        $('#name').val('');
                        $('#load-size').html('');
                        $('#student_id').val('');
                        $('#school_origin').val('');
                        $('#hide-card').addClass('hide');
                        Materialize.toast('Siswa belum melakukan pengukuran', 2500);
        			} else if (data == 'sudah melakukan pemesanan') {
                        $('#pay').val('');
                        $('.size').val('');
                        $('#name').val('');
                        $('#load-size').html('');
                        $('#student_id').val('');
                        $('#school_origin').val('');
                        $('#hide-card').addClass('hide');
                        Materialize.toast('Siswa sudah melakukan pemesanan', 2500);
                    } else {
                        $('#pay').val('');
                        $('#load-size').html('');
        				$('#hide-card').removeClass('hide');
        				$('#name').val(data.student.nama_lengkap);
        				$('#student_id').val(data.student.no_daftar);
        				$('#school_origin').val(data.student.asal_smp);

                        for (var i = 0; i < data.ukuran.length; i++) {
                            var s = data.ukuran[i], u = s.uniform;
                            $('table').find('tbody').append([
                                '<tr>',
                                    '<td>',
                                        '<input type="checkbox" onclick="calculatePriceUniform()" name="chk[]"',
                                            'value="'+ u.id +'-'+ i +'" data-price="'+ u.price +'" id="checkbox-'+ u.id +'">',
                                        '<label for="checkbox-'+ u.id +'"></label>',
                                    '</td>',
                                    '<td>'+ u.name +'</td>',
                                    '<td></td>',
                                    '<td>'+ u.price +'</td>',
                                    '<td>'+ s.size +'</td>',
                                    '<td>',
                                        '<input type="text" value="1" onkeyup="calculateTotal('+ u.price +', '+ i +')"',
                                            'onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="qty-'+ i +'">',
                                    '</td>',
                                    '<td><span id="total-'+ i +'">'+ u.price +'</span></td>',
                                    '<input type="hidden" name="total[]" id="itotal-'+ i +'" value="'+ u.price +'-'+ i +'">',
                                    '<input type="hidden" name="qty[]" id="iqty-'+ i +'" value="1-'+ i +'">',
                                    '<input type="hidden" name="size[]" value="'+ s.id +'-'+ i +'">',
                                '</tr>',
                            ].join(''));
                        }
        			}
        		}
        	});
        } else {
            $('#pay').val('');
            $('.size').val('');
            $('#name').val('');
            $('#load-size').html('');
            $('#student_id').val('');
            $('#school_origin').val('');
            $('#hide-card').addClass('hide');
            Materialize.toast('Masukan minimal 3 angka terakhir no pendaftaran siswa', 2500);
        }
    });
  	$('#selectAll').click(function() {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        if ($('#selectAll').is(':checked')) {
            var total = 0;
            $('#grand-total').html(total);
            $('#grand_total').val(total);
        } else {
            $('#grand-total').html(0);
            $('#grand_total').val(0);
        }
    });
    $(document).on('keyup', '#pay', function() {
        var pay = $(this).val(),
            total = $('#grand-total').html(),
            calculate = pay - total;
        $('#refund').html(calculate);
        $('#irefund').val(calculate);
    });
});

function calculateTotal(price, index) {
    var qty = document.getElementById("qty-" + index).value;
    var calculate = price * qty;
    console.log('qty: ' + qty);
    document.getElementById("iqty" + index).value = qty;
    document.getElementById("total-" + index).innerHTML = calculate;
    document.getElementById("itotal-" + index).value = calculate + '-' + index;
}

function calculatePriceUniform() {
    var total = 0;
    var checkbox  = document.getElementsByName("chk[]");
    var sub_total = document.getElementsByName("total[]");
    for (var i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked) {
            total += parseFloat(sub_total[i].value);
        }
    }
    document.getElementById("grand_total").value = total;
    document.getElementById("grand-total").innerHTML = total;
}