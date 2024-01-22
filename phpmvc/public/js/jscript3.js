$(function(){
	
	// SEMBUNYIKAN LOADER
	$('#loader').hide();
	//TOMBOL TAMBAH
	$('.tombolTambah').on('click',function(){
		$('#labelModal').html('Tambah Data');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/produk/tambah');
		$('.form-kode').show();
		
		$('#kode_barang').val('');
				$('#nama_barang').val('');
				$('#harga').val('');
				$('#stok').val('');
				$('#supplier_id').val('');
				
	});
	// TOMBOL EDIT
	$('.tambahModalEdit').on('click',function(){
		$('#labelModal').html('Edit Data');
		$('.modal-footer button[type=submit]').html('Simpan Update');
		$('.modal-body form').attr('action','http://localhost/phpmvc/public/produk/ubah');
		$('.form-kode').hide();
		
		const kode = $(this).data('id')
		
		$.ajax({
			url: 'http://localhost/phpmvc/public/produk/getubah',
			data: {kode : kode},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#kode_barang').val(data.kode_barang);
				$('#nama_barang').val(data.nama_barang);
				$('#harga').val(data.harga);
				$('#stok').val(data.stok);
				$('#stok_min').val(data.stok_min);
				$('#supplier_id').val(data.supplier_id);
			}
		})
	});
	// CARI DATA
	$('.textCari').on('change',function(){
		
		   $('#loader').show();
		  var query = $(this).val();
		  
		  
			
			 if (query !== "") {
				$.ajax({
					url: 'http://localhost/phpmvc/public/produk/getCari',
					data: {query : query},
					method: 'post',
					dataType: 'json',
					success: function(data){
						 
						//$('#cari-ul').text(data);
						window.location.href = 'http://localhost/phpmvc/public/produk/cari/' + query;
					//console.log(data);
					 $('.textCari').html(query);
					}
				})
			}else{
				$('#cari-ul').text('Data tidak ditemukan');
				
			}
	});
		
		
		
	});
