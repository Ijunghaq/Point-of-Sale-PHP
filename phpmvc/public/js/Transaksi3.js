$(function(){
	//let items = [],
		//total=0,
		//qty=0;
		
		let items=[];
		let a=items.length;
		let total=0; 
		let grandTotal=0; 
	
	function tambahItems(id,nama, qty, harga) {
		 var item = items.find(item => item.nama === nama);
		 if(item){
			 //jika data sudah ada, cukup ubah qty dan total harga saja
			 item.qty += qty;
			 item.totalHarga =  item.qty * item.harga;
		 }else{
			 //jika data belum ada, maka masukkan data baru
			items.push({
				id: id,
				nama: nama,
				harga: harga,
				qty: qty,
				totalHarga: qty * harga
			})
		 }
		 updateItems();
	//	 a+=1;
	}
	function updateItems(){
		$('.tableItem').empty();
		
		// a++
		items.forEach(function(item,index){
			$('.tableItem').append(`
																	<tr>
																		<td>`+ (index+1)  +`</td>
																		<td>`+ item.nama +`</td>
																		<td class="tdQty">`+ item.qty +`</td>
																		<td>`+ item.harga  +`</td>
																		<td class="tdTotal">`+ item.totalHarga +`</td>
																		<td id="hps">
																			<button id="tbHapus" data-index="`+ index +`" class="tbHapus">
																				hapus
																			</button>
																		</td>
																	</tr>
																
															
																 `);
			
			total += item.totalHarga;
			
		});
		$('#subTotal').val(total);
		grandTotal= total - parseInt($('#discount').val());
		$('#grandTotal').val(grandTotal);
		total=0;
		//a+=1;
	}
	
		
		
	// CARI DATA
	$('.txtCariTran').on('change',function(){
		
		  
		  var query = $(this).val();
		  
		  
				$.ajax({
					url: 'http://localhost/phpmvc/public/Transaksi/getCari',
					data: {query : query},
					method: 'post',
					dataType: 'json',
					success: function(data){
						 
						  let content = '';
						   $('.txtCariTran').html('');
						    $.each(data, function (i, a) {
								//a = data[i].Tranegori;
								a = data[i];

								// console.log(a);
								// $('.txtCariTran').val('');
								 $('.nmProd').html(a.nama_barang);
								 $('.hrgProd').html(a.harga);
															
							});
						 
						 
						 }
				
				})
			
			$('.qty').focus();
			
	});
	
	
	//TOMBOL TAMBAH
	$('.tbTambahItem').on('click',function(){
		let nmProd = $('.nmProd').html(),
			qty = parseInt($('.qty').val()),
			hrgProd = parseInt($('.hrgProd').html());
			
		if(nmProd && !isNaN(hrgProd) && hrgProd > 0 && !isNaN(qty) && qty > 0){
			tambahItems(null,nmProd, qty, hrgProd);
		}else{
			alert("Mohon masukkan Nama barang dan jumlahnya");
		}
		
		
		
		$('.txtCariTran').val('');
		$('.qty').val('');
		$('.txtCariTran').focus();
		
	});
	

		
	//TOMBOL HAPUS
	$('.tableItem').on('click','.tbHapus',function(){ alert('Yakin barang ini batal dibeli ?');
		var index = $(this).data('index');
		items.splice(index,1);
		updateItems();
	});
		
	//TOMBOL BATAL TREANSAKSI
	$('#tbBatal').on('click',function(){ alert('Yakin ingin batalkan transaksi ini ?');
		$('#subTotal').val('');
		$('#discount').val('');
		$('#grandTotal').val('');
		items.length=0;
		updateItems();
		
		
	});
	
	// TEXT DISCOUNT
	$('#discount').on('change',function(){ 
		
		grandTotal= parseInt($('#subTotal').val()) - parseInt($('#discount').val());
		$('#grandTotal').val(grandTotal);
		
	});
		
});
