$(function(){
	//let items = [],
		//total=0,
		//qty=0;
		let a=1;
	function items(nama, qty, hrg) {
		  //this.id=0;
		  this.nama = nama;
		  this.qty = qty;
		  this.hrg = hrg;
		  this.total = this.qty * this.hrg;/*function() {
			  jumlah = this.qty * this.hrg;
				return jumlah;
				console.log(jumlah);
			};*/
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
		
		let item = new items ($('.nmProd').html(),
		$('.qty').val(),
		$('.hrgProd').html());
		
		// Memeriksa apakah data barang sudah ada
		if (item.hasOwnProperty('nama') && item.nama === $('.nmProd').html()) {
			// Jika data sudah ada, hanya ubah qty dan total
			item.qty = (item.qty+$('.qty').val());
			item.total = $('.qty').val() * $('.hrgProd').html();
			alert("data lama {"+ item.nama);
			console.log(item);
			//console.log(items);
			$('.tdQty').val(item.qty);
			$('.tdTotal').val(item.total);
		} else {
			// Jika data belum ada, tambahkan data baru
			alert("data baru");
			console.log(item);
			//console.log(items);
						if($('.txtCariTran').val() == '' || $('.qty').val() == ''){
				alert('belum diisi..');
						}		
						else{  $('.tableItem').append(`
																	<tr>
																		<td>`+ a  +`</td>
																		<td>`+ item.nama +`</td>
																		<td class="tdQty">`+ item.qty +`</td>
																		<td>`+ item.hrg  +`</td>
																		<td class="tdTotal">`+ item.total +`</td>
																		<td>
																			<div class="badge bg-danger text-wrap tblHapus" style="width: 3rem;">
																			  hapus
																			</div>
																		
																		</td>
																	</tr>
																
															
																 `
																 
																 );
							a=a+1;
																 }			 
			
			
			
			
		}

															 
															 
															 
															 
															 
															 
		$('.txtCariTran').val('');
		$('.qty').val('');
		$('.txtCariTran').focus();
		
	});
	

		
		
		
});
