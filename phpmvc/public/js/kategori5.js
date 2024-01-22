$(function(){
	
	// SEMBUNYIKAN LOADER
	$('#loader').hide();
	//TOMBOL TAMBAH
	$('.tbTambahKat').on('click',function(){
		$('#labelModal').html('Tambah Data');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/kategori/tambah');
		$('.form-kode').show();
		
		$('#id_kategori').val('');
		$('#kategori').val('');
		
				
	});
	// TOMBOL EDIT
	$('.tambahModalEditKat').on('click',function(){
		$('#labelModal').html('Edit Data');
		$('.modal-footer button[type=submit]').html('Simpan Update');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/kategori/ubah');
		$('.form-kode').hide();
		
		const kode = $(this).data('id')
		
		$.ajax({
			url: 'http://localhost/phpmvc/public/kategori/getubah',
			data: {kode : kode},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#id_kategori').val(data.id_kategori);
				$('#kategori').val(data.kategori);
				
				
			}
		})
	});
	// CARI DATA
	$('.txtCariKat').on('change',function(){
		
		  
		  var query = $(this).val();
		  
		  
			
			 if (query !== "") {
				$.ajax({
					url: 'http://localhost/phpmvc/public/kategori/getCari',
					data: {query : query},
					method: 'post',
					dataType: 'json',
					success: function(data){
						  $('#cari-ul').hide();
						  	$('#loader').hide();
						  let content = '';
						   $('.txtCariKat').html('');
						    $.each(data, function (i, a) {
								//a = data[i].kategori;
								a = data[i];

								 console.log(a.kategori);
								//  $('.txtCariKat').val('');
								 $('.txtCariKat').append(`	<ul class="list-group" id="cari-ul">
															<li class="list-group-item"> ` + a.kategori + 
															` <a href="http://localhost/phpmvc/public/kategori/hapus/` + a.id_kategori + 
															`"  class="badge rounded-pill text-bg-danger float-end ms-1" onclick="return confirm("Apakah Anda yakin ingin menghapus data ini..?")" >hapus</a>
															<a href="http://localhost/phpmvc/public/kategori/edit/` + a.id_kategori + `"  class="badge rounded-pill text-bg-warning float-end ms-1 tambahModalEditKat" data-bs-toggle="modal" data-bs-target="#forModal" data-id="` + a.id_kategori + `">edit</a></li>
															</ul>`);
															
							});
						 
						 
						 }
				
				})
			}else{
				$('#cari-ul').text('Data tidak ditemukan');
				
			}
			
			
	});
		
		
		
	});
