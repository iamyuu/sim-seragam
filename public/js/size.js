$(document).ready(function() {
    $('#btn-search').on('click', function() {
    	var input = $('#search').val(),
    		link  = 'api/size/search/student';
    	if (input.length >= 3) {
    		$.ajax({
    			url: link,
        		type: 'get',
        		data: {search: input},
        		success: function(data) {
        			if (data == 'null') {
        				$('#name').val('');
        				$('#student_id').val('');
        				$('#school_origin').val('');
        				$('#load-uniform').html('');
        				$('#hide-card').addClass('hide');
        				Materialize.toast('Data siswa tidak ada', 2500);
        			} else if (data == 'siswa sudah ada') {
        				$('#name').val('');
        				$('#student_id').val('');
        				$('#school_origin').val('');
        				$('#load-uniform').html('');
        				$('#hide-card').addClass('hide');
        				Materialize.toast('Siswa sudah melakukan pengukuran', 2500);
        			} else {
        				$('#load-uniform').html('');
        				$('#name').val(data.student.nama_lengkap);
        				$('#student_id').val(data.student.no_daftar);
        				$('#school_origin').val(data.student.asal_smp);
        				$('#hide-card').removeClass('hide');

        				for (var i = 0; i < data.uniform.length; i++) {
	        				var s = data.uniform[i];
	        				$('table').find('tbody').append([
	                            '<tr>',
	                                // '<td><input type="checkbox" name="chk" onclick="totalIt()" value="' + harga + '"></td>',
	                                '<td>'+ s.name +'</td>',
	                                '<td>',
		                                '<input type="hidden" name="uniform[]" value="'+ s.id +'">',
		                                '<input type="text" name="size[]" class="size" placeholder="Ukuran" autocomplete="off" required>',
	                                '</td>',
	                            '</tr>'
                        	].join(''));
                        }
 	       			}
        		}
        	});
    	} else {
    		$('#name').val('');
			$('#student_id').val('');
			$('#school_origin').val('');
			$('#load-uniform').html('');
			$('#hide-card').addClass('hide');
			Materialize.toast('Masukan minimal 3 angka', 2500);
    	}
    });
    $('.size').on('blur', function() {
        var v  = $(this).val(),
            uc = v.toUpperCase();
        $(this).val(uc);
  	});
});