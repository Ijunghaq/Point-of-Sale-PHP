	<?php
	//Tanggal

	$t=time();

	$tgl=date("d-m-Y",$t);
	?>


	<div class='container mt-2'>
		<div class="row">
			<div class='col-lg-6'>
				<?php Flasher::flash(); ?>
			</div>
			
		</div>
		
		
		
		<!-- Searching data  -->
		<div class="row mb-3 div-cari">
			<div class='col-lg-8'>
						<label for="keyword" class="form-label">Cari data Produk</label>
						<input class="form-control  txtCariTran" list="listCari" name="keyword" id="keyword" autocomplete="off"  autofocus="autofocus" placeholder="Cari Produk..." aria-label="Username" aria-describedby="basic-addon1">
						
						<datalist id="listCari">
						  <?php foreach($data['Tran'] as $p) :  $p['nama_barang'] ;?>
						  <option value="<?= $p['nama_barang'];?>">
						  
						  <?php endforeach;?>
						</datalist>
						<h5 class="mt-3">Nama Produk : <b class="nmProd">ABC</b> </h5>
						<h5 >Harga Satuan : <b class="hrgProd">123</b> </h5>
						<hr>
						<!-- End Searching data  -->
						
						<!-- input data  -->
					  
					<div class="row mb-1 div-cari">
							<div class='col-lg-12'>
									<div class="input-group mb-3 ms-3">
									  <input type="number" class="form-control qty" placeholder="Jumlah.." aria-label="Recipient's username" aria-describedby="tbTambahItem">
									  <button class="btn btn-success tbTambahItem" type="button" id="tbTambahItem">Tambah</button>
									</div>
									
							</div>
					</div>
					<!-- end input data  -->
					
					
			</div>
			
		 
			<div class='col-lg-4'>
						<div class="container">
				
					<div class="mb-2">
					  <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi:</label>
					  <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value=<?= $tgl; ?> disabled>
					</div>

					<div class="mb-2">
					  <label for="id_Transaksi" class="form-label">Pelanggan:</label>
					   <select class="form-control" id="id" name="id" >
							<option value='UMUM'> UMUM </option>
							<option value='MEMBER'> MEMBER </option>
						  </select>
					</div>

					<div class="mb-2">
					  <label for="total_transaksi" class="form-label">Total Transaksi:</label>
					  <h2 class="" id="total_transaksi" name="total_transaksi"> 30.000 </h2>
					</div>


					<!--	
					<button type="submit" class="btn btn-primary">Submit</button>
				  </form> -->
				</div>
			</div>
			
		</div>
		<div class="container ">
				<!-- table data  -->
						<table class="table table-striped ">
							<thead>	
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Qty</th>
									<th>Harga Satuan</th>
									<th>Jumlah</th>
									<th>Aksi</th>
								</tr>
							 </thead>
							<tbody class="tableItem"> <!--
								<tr>
									<td>1</td>
									<td>Soklin</td>
									<td>2</td>
									<td>5000</td>
									<td>10000</td>
									<td>
										<div class="badge bg-danger text-wrap tblHapus" style="width: 3rem;">
										  hapus
										</div>
									
									</td>
								</tr> -->
							<tbody>
						</table>
					<!-- end table data  -->
		</div>
		<!-- payment -->
			<div class="row mb-3">
				<div class="col-lg-4">
					<div class="mb-1">
						<label for="subTotal" class="form-label  mt-1">Total :</label>
						<input type="number" class="form-control" id="subTotal" name="subTotal" disabled >
					</div>
					<div class="mb-1">
						<label for="discount" class="form-label  mt-1 " >Discount (Rp.) :</label>
						<input type="number" class="form-control" id="discount" name="discount" value="0" >
					</div>
					<div class="mb-1">
						<label for="grandTotal" class="form-label  mt-1">Grand Total :</label>
						<input type="number" class="form-control" id="grandTotal" name="grandTotal" disabled >
					</div>
				</div>
				
				<div class="col-lg-3">
					<div class="mb-1">
						<label for="cash" class="form-label  mt-1">Cash :</label>
						<input type="number" class="form-control" id="cash" name="cash"  required>
					</div>
					<div class="mb-1">
						<label for="change" class="form-label  mt-1">Change :</label>
						<input type="number" class="form-control" id="change" name="change" disabled >
					</div>
				</div>
				
				<div class="col-lg-3">
					<div class="mb-3">
						<button class="btn btn-warning ms-5" type="button" id="tbBatal">Batal</button>
					</div>
					<div class="mb-3">
						<button class="btn btn-primary btn-lg ms-5" type="button" id="button-addon2">Pembayaran</button>
					</div>
				</div>
			</div>
		<!-- end payment -->
	<br>
	
