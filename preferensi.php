<?php include 'header.php'; ?>
	<div class="container mt-5 table-dark">		
		<h1><center>Data Calon Mahasiswa</center></h1>
		<?php 
		include 'koneksi.php';
		$no = 1; ?>

		<table class='table'>
			<thead>
				<tr>
					<th scope='col'>No</th>
					<th scope='col'>Nama</th>
					<th scope='col'>No Pendaftaran</th>				
					<th scope='col'>Penghasilan Ortu</th>				
					<th scope='col'>Status Rumah</th>				
					<th scope='col'>Keadaan Ortu</th>				
					<th scope='col'>Jumlah Tanggungan</th>
					<th scope='col'>Pemakaian Listrik</th>			
					<th scope='col'>Sumber Air</th>			
					<th scope='col'>Status Keluarga</th>			
				</tr>
			</thead>
			<tbody>
				<?php

				$costbenefitview = array("cost","benefit","benefit","benefit","benefit","benefit","benefit");
				$costbenefit = array(-1,1,1,1,1,1,1);
	  	//BOBOT=[Nama|No Pendaftaran|Penghasilan Ortu|Status Rumah|Keadaan Ortu|Jumlah Tanggungan|Pemakaian Listrik|Sumber Air|Status Keluarga]
				$bobot=array(0,0,15,10,25,15,10,10,15);
				$data = mysqli_query($koneksi,"select * from mahasiswa");
				$numrow = mysqli_num_rows($data);
				$data_awal = new SplFixedArray($numrow);
				$data_normalisasi = new SplFixedArray($numrow);

				while($d = mysqli_fetch_array($data)){
					$index = $no-1;
					$data_awal[$index]= new SplFixedArray(9);
					$data_normalisasi[$index]= new SplFixedArray(9);

					?>
					<tr>			
						<td><?php echo $no++; ?></td>

						<td><?php echo $d['nama_mahasiswa']; ?></td>
						<?php $data_awal[$index][0]=$d['nama_mahasiswa']; ?>

						<td><?php echo $d['no_pendaftaran']; ?></td>
						<?php $data_awal[$index][1]=$d['no_pendaftaran']; ?>

						<th><?php echo $d['penghasilan_ot']; ?></th>
						<?php $data_awal[$index][2]=$d['penghasilan_ot']; ?>

						<th><?php echo $d['status_rumah']; ?></th>	
						<?php $data_awal[$index][3]=$d['status_rumah']; ?>

						<th><?php echo $d['keadaan_ot']; ?></th>
						<?php $data_awal[$index][4]=$d['keadaan_ot']; ?>

						<th><?php echo $d['jumlah_tanggungan']; ?></th>
						<?php $data_awal[$index][5]=$d['jumlah_tanggungan']; ?>

						<th><?php echo $d['pemakaian_listrik']; ?></th>	
						<?php $data_awal[$index][6]=$d['pemakaian_listrik']; ?>

						<th><?php echo $d['sumber_air']; ?></th>
						<?php $data_awal[$index][7]=$d['sumber_air']; ?>

						<th><?php echo $d['status_keluarga']; ?></th>
						<?php $data_awal[$index][8]=$d['status_keluarga']; ?>
					</tr>

					<?php 
				}
		//hitung penyebut
				?>

				<tr>
					<td><?php echo ""; ?></td>
					<td><?php echo ""; ?></td>
					<td><?php echo "Cost/Benefit"; ?></td>
					<th><?php echo $costbenefitview[0]; ?></th>
					<th><?php echo $costbenefitview[1]; ?></th>				
					<th><?php echo $costbenefitview[2]; ?></th>				
					<th><?php echo $costbenefitview[3]; ?></th>
					<th><?php echo $costbenefitview[4]; ?></th>			
					<th><?php echo $costbenefitview[5]; ?></th>
					<th><?php echo $costbenefitview[6]; ?></th>
				</tr>

				<?php 
				$min0= mysqli_query($koneksi,"select min(penghasilan_ot) from mahasiswa");
				$min0 = mysqli_fetch_row($min0);
				$min0 = $min0['0'];

				$min1= mysqli_query($koneksi,"select min(status_rumah) from mahasiswa");
				$min1 = mysqli_fetch_row($min1);
				$min1 = $min1['0'];

				$min2= mysqli_query($koneksi,"select min(keadaan_ot) from mahasiswa");
				$min2 = mysqli_fetch_row($min2);
				$min2 = $min2['0'];

				$min3= mysqli_query($koneksi,"select min(jumlah_tanggungan) from mahasiswa");
				$min3 = mysqli_fetch_row($min3);
				$min3 = $min3['0'];

				$min4= mysqli_query($koneksi,"select min(pemakaian_listrik) from mahasiswa");
				$min4 = mysqli_fetch_row($min4);
				$min4 = $min4['0'];

				$min5= mysqli_query($koneksi,"select min(sumber_air) from mahasiswa");
				$min5 = mysqli_fetch_row($min5);
				$min5 = $min5['0'];

				$min6= mysqli_query($koneksi,"select min(status_keluarga) from mahasiswa");
				$min6 = mysqli_fetch_row($min6);
				$min6 = $min6['0'];

				$min = array($min0, $min1, $min2, $min3, $min4, $min5, $min6);

				$max0= mysqli_query($koneksi,"select max(penghasilan_ot) from mahasiswa");
				$max0 = mysqli_fetch_row($max0);
				$max0 = $max0['0'];

				$max1= mysqli_query($koneksi,"select max(status_rumah) from mahasiswa");
				$max1 = mysqli_fetch_row($max1);
				$max1 = $max1['0'];

				$max2= mysqli_query($koneksi,"select max(keadaan_ot) from mahasiswa");
				$max2 = mysqli_fetch_row($max2);
				$max2 = $max2['0'];

				$max3= mysqli_query($koneksi,"select max(jumlah_tanggungan) from mahasiswa");
				$max3 = mysqli_fetch_row($max3);
				$max3 = $max3['0'];

				$max4= mysqli_query($koneksi,"select max(pemakaian_listrik) from mahasiswa");
				$max4 = mysqli_fetch_row($max4);
				$max4 = $max4['0'];

				$max5= mysqli_query($koneksi,"select max(sumber_air) from mahasiswa");
				$max5 = mysqli_fetch_row($max5);
				$max5 = $max5['0'];

				$max6= mysqli_query($koneksi,"select max(status_keluarga) from mahasiswa");
				$max6 = mysqli_fetch_row($max6);
				$max6 = $max6['0'];

				$max = array($max0, $max1, $max2, $max3, $max4, $max5, $max6);

				$penyebut = new SplFixedArray(9);



				for($i=0; $i<7;$i++){
					if($costbenefit[$i]==-1){
						$penyebut[2+$i]=$min[$i];
					}else{
						$penyebut[2+$i]=$max[$i];
					}
				}

				?>

				<tr>
					<td><?php echo ""; ?></td>
					<td><?php echo ""; ?></td>
					<td><?php echo "Max/Min"; ?></td>
					<th><?php echo $penyebut[2]; ?></th>
					<th><?php echo $penyebut[3]; ?></th>				
					<th><?php echo $penyebut[4]; ?></th>				
					<th><?php echo $penyebut[5]; ?></th>
					<th><?php echo $penyebut[6]; ?></th>			
					<th><?php echo $penyebut[7]; ?></th>
					<th><?php echo $penyebut[8]; ?></th>
				</tr>

			</tbody><table>
			</div>

			<!--NORMALISASI-->
			<?php 
			for($i=0;$i<$numrow;$i++){
				$data_normalisasi[$i][0]=$data_awal[$i][0];
				$data_normalisasi[$i][1]=$data_awal[$i][1];
				for($j=2;$j<=8;$j++){
				//harus ditinjau ulang
					if($costbenefit[$j-2]==-1){
					//cost
						$pembilang = $penyebut[$j];
						$data_normalisasi[$i][$j]=$pembilang/$data_awal[$i][$j];
					}else{
					//benefit
						$data_normalisasi[$i][$j]=$data_awal[$i][$j]/$penyebut[$j];
					}



				}
			}
			?>

			<div class="container mt-5 table-dark">

				<h1><center>Data Normalisasi</center></h1>
				<?php 	
				$no = 1; 
				?>

				<table class='table'>
					<thead>
						<tr>
							<th scope='col'>No</th>
							<th scope='col'>Nama</th>
							<th scope='col'>No Pendaftaran</th>				
							<th scope='col'>Penghasilan Ortu</th>				
							<th scope='col'>Status Rumah</th>				
							<th scope='col'>Keadaan Ortu</th>				
							<th scope='col'>Jumlah Tanggungan</th>
							<th scope='col'>Pemakaian Listrik</th>			
							<th scope='col'>Sumber Air</th>			
							<th scope='col'>Status Keluarga</th>			
						</tr>
					</thead>
					<tbody>

						<?php 
						for($i=0;$i<$numrow;$i++){
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data_normalisasi[$i][0]; ?></td>
								<td><?php echo $data_normalisasi[$i][1]; ?></td>
								<th><?php echo $data_normalisasi[$i][2]; ?></th>		
								<th><?php echo $data_normalisasi[$i][3]; ?></th>				
								<th><?php echo $data_normalisasi[$i][4]; ?></th>				
								<th><?php echo $data_normalisasi[$i][5]; ?></th>
								<th><?php echo $data_normalisasi[$i][6]; ?></th>			
								<th><?php echo $data_normalisasi[$i][7]; ?></th>
								<th><?php echo $data_normalisasi[$i][8]; ?></th>
							</tr>

							<?php
						}
						?>
					</tbody><table>
					</div>

					<!--HITUNG PREFERENSI-->
					<?php
					$preferensi = new SplFixedArray($numrow);
					for($i=0;$i<$numrow;$i++){
						$sum = 0;
						for($j=2;$j<=8;$j++){
							$hasilKali = $data_normalisasi[$i][$j] * $bobot[$j];
							$sum = $sum + $hasilKali;
						}
						$preferensi[$i]=$sum;
					}
					?>

					<div class="container mt-5 table-dark">

						<h1><center>Hasil Hitung Preferensi</center></h1>
						<?php 	
						$no = 1; 
						?>

						<table class='table'>
							<thead>
								<tr>
									<th scope='col'>No</th>
									<th scope='col'>Nama</th>
									<th scope='col'>No Pendaftaran</th>				
									<th scope='col'>Penghasilan Ortu</th>				
									<th scope='col'>Status Rumah</th>				
									<th scope='col'>Keadaan Ortu</th>				
									<th scope='col'>Jumlah Tanggungan</th>
									<th scope='col'>Pemakaian Listrik</th>			
									<th scope='col'>Sumber Air</th>			
									<th scope='col'>Status Keluarga</th>	
									<th scope='col'>Preferensi</th>			
								</tr>
							</thead>
							<tbody>

								<?php 
								for($i=0;$i<$numrow;$i++){
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $data_normalisasi[$i][0]; ?></td>
										<td><?php echo $data_normalisasi[$i][1]; ?></td>
										<th><?php echo $data_normalisasi[$i][2]; ?></th>		
										<th><?php echo $data_normalisasi[$i][3]; ?></th>				
										<th><?php echo $data_normalisasi[$i][4]; ?></th>				
										<th><?php echo $data_normalisasi[$i][5]; ?></th>
										<th><?php echo $data_normalisasi[$i][6]; ?></th>			
										<th><?php echo $data_normalisasi[$i][7]; ?></th>
										<th><?php echo $data_normalisasi[$i][8]; ?></th>
										<th><?php echo $preferensi[$i]; ?></th>
									</tr>

									<?php
								}
								?>
							</tbody><table>
							</div>

<?php include 'footer.php'; ?>
