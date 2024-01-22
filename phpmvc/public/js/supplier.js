$(function(){
	
	// SEMBUNYIKAN LOADER
	$('#loader').hide();
	//TOMBOL TAMBAH
	$('.tbTambahSup').on('click',function(){
		$('#labelModal').html('Tambah Data');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/supplier/tambah');
		$('.form-kode').show();
		
		$('#kode_barang').val('');
				$('#nama_barang').val('');
				$('#harga').val('');
				$('#stok').val('');
				$('#supplier_id').val('');
				
	});
	// TOMBOL EDIT
	$('.tambahModalEditSup').on('click',function(){
		$('#labelModal').html('Edit Data');
		$('.modal-footer button[type=submit]').html('Simpan Update');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/supplier/ubah');
		$('.form-kode').hide();
		
		const kode = $(this).data('id')
		
		$.ajax({
			url: 'http://localhost/phpmvc/public/supplier/getubah',
			data: {kode : kode},
			method: 'post',
			dataType: 'json',
			success: function(data){
				
				$('#nama_sup').val(data.nama_sup);
				$('#alamat_sup').val(data.alamat_sup);
				$('#telp_sup').val(data.telp_sup);
				 $('#supplier_id').val(data.supplier_id);
			}
		})
	});
	// CARI DATA
	$('.txtCariSup').on('change',function(){
		
		   $('#loader').show();
		  var query = $(this).val();
		  
		  
			
			 if (query !== "") {
				$.ajax({
					url: 'http://localhost/phpmvc/public/supplier/getCari',
					data: {query : query},
					method: 'post',
					dataType: 'json',
					success: function(data){
						 
						//$('#cari-ul').text(data);
						window.location.href = 'http://localhost/phpmvc/public/supplier/cari/' + query;
					//console.log(data);
					 $('.textCari').html(query);
					}
				})
			}else{
				$('#cari-ul').text('Data tidak ditemukan');
				
			}
	});
		
		
		
	});
