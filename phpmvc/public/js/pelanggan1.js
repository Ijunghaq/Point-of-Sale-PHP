$(function(){
	
	// SEMBUNYIKAN LOADER
	$('#loader').hide();
	//TOMBOL TAMBAH
	$('.tbTambahPel').on('click',function(){
		$('#labelModal').html('Tambah Data');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/pelanggan/tambah');
		$('.form-kode').show();
		
		$('#id').val('');
		$('#nama').val('');
		$('#telp').val('');
		$('#alamat').val('');
		
		
	});
	// TOMBOL EDIT
	$('.tambahModalEditPel').on('click',function(){
		$('#labelModal').html('Edit Data');
		$('.modal-footer button[type=submit]').html('Simpan Update');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/pelanggan/ubah');
		$('.form-kode').hide();
		
		const kode = $(this).data('id')
		
		$.ajax({
			url: 'http://localhost/phpmvc/public/pelanggan/getubah',
			data: {kode : kode},
			method: 'post',
			dataType: 'json',
			success: function(data){
				console.log(data.jenis_kelamin);
				$('#id').val(data.id);
				$('#nama').val(data.nama);
				if(data.jenis_kelamin == 'L'){
					$('#jenis_kelamin1').prop('checked',true);
				}else{
					$('#jenis_kelamin2').prop('checked',true);
				}
				
				
				$('#telp').val(data.telp);
				$('#alamat').val(data.alamat);
				
			}
		})
	});
	// CARI DATA
	$('.txtCariPel').on('change',function(){
		
		  
		  var query = $(this).val();
		  
		  
			
			 if (query !== "") {
				$.ajax({
					url: 'http://localhost/phpmvc/public/pelanggan/getCari',
					data: {query : query},
					method: 'post',
					dataType: 'json',
					success: function(data){
						  $('#cari-ul').hide();
						  	$('#loader').hide();
						  let content = '';
						 $('.txtCariPel').html('');
						    $.each(data, function (i, a) {
							 
								a = data[i];

								 console.log(a.nama);
								 // $('.txtCariPel').html('');
								 $('.txtCariPel').append(`	<ul class="list-group" id="cari-ul">
															<li class="list-group-item"> ` + a.nama + 
															` <a href="http://localhost/phpmvc/public/pelanggan/hapus/` + a.id + 
															`"  class="badge rounded-pill text-bg-danger float-end ms-1" onclick="return confirm("Apakah Anda yakin ingin menghapus data ini..?")" >hapus</a>
															<a href="http://localhost/phpmvc/public/pelanggan/edit/` + a.id + `"  class="badge rounded-pill text-bg-warning float-end ms-1 tambahModalEditPel" data-bs-toggle="modal" data-bs-target="#forModal" data-id="` + a.id + `">edit</a></li>
															</ul>`);
															
							});
						 
						 
						 }
				
				})
			}else{
				$('#cari-ul').text('Data tidak ditemukan');
				
			}
			
			
	});
		
		
		
	});
