$(function(){
	let items = [],
		total=0,
		qty=0;
		
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
			
			
			
	});
	
	
	//TOMBOL TAMBAH
	$('.tbTambahItem').on('click',function(){
		
		items.push( $('.nmProd').html());
		items.push( $('.qty').val());
		items.push( $('.hrgProd').html());
				
		console.log(items);
		 $('.txtCariTran').val(``);
		 $.each(items, function (i, a) {
			 console.log(items);
								 a = i+1;
								 qty = items[1];
								 total = qty * items[2];
								// let tabel = $('#tableItem tbody');
								 
								/*	let row = $('<tr>');
									row.append($('<td>').text(i));
								  row.append($('<td>').text(a[0]));
								  row.append($('<td>').text(a[1]));
								  row.append($('<td>').text(a[2]));
								  row.append($('<td>').text(a[1]*a[2]));
								  tabel.append(row); */
								  $('.tableItem').append(`
																<tr>
																	<td>`+ a  +`</td>
																	<td>`+ items[0] +`</td>
																	<td>`+ qty +`</td>
																	<td>`+ items[2]  +`</td>
																	<td>`+ total +`</td>
																	<td>
																		<div class="badge bg-danger text-wrap tblHapus" style="width: 3rem;">
																		  hapus
																		</div>
																	
																	</td>
																</tr>
															
														
															 `
															 
															 );
								  
						 	//console.log(qty);		
		});
	});
	

		
		
		
});
