<h2>Detail Pembelian</h2>
<?php 
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN loginuser 
		ON pembelian.id=loginuser.id 
		WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
 ?>
 <!--<pre>
 	<?php print_r($detail); ?>
 </pre>-->

 <strong><?php echo $detail['nama']; ?></strong><br>
 <p>
 	<?php echo $detail['email']; ?>
 </p>

 <p>
 	Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
 	Total : <?php echo number_format($detail['total_pembelian']); ?><br>
 </p>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk 
 		JOIN produk ON pembelian_produk.id_produk = produk.id_produk
 		WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['namaBRG']; ?></td>
 			<td><?php echo number_format($pecah['hargaBRG']); ?></td>
 			<td><?php echo number_format($pecah['jumlah']); ?></td>
 			<td>
 				<?php echo number_format($pecah['hargaBRG']*$pecah['jumlah']); ?>
 			</td>

 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>