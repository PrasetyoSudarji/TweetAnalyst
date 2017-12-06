
<div class="col-md-2">
	
	<ul class="pager">
		<div id = "submenu">
		<?php 
			$submenu = $this->Model->getSubMenu("1");
			foreach ($submenu->result_array() as $data){
				if ($data['status']== "1"){
					echo "<div class='table-responsive'>";
					echo "<table class='table'>";
					echo "<thead><tr><td colspan=2>";
					echo "<li><a href='#' onclick='submenu_prev(".$data['id'].");'><</a></li>&nbsp&nbsp" ;
					echo "<label>".$data['name']."</label>";
					echo "&nbsp&nbsp<li><a href='#' onclick='submenu_next(".$data['id'].");'>></a></li>";
					echo "</td></tr></thead>";
				}
				
				if ($data['status'] == "1" && $data['id']==1){
					
					echo "<tbody>";
					echo "<tr>";
					echo "<td><input type='checkbox' value='sumur' id='lyr_smr_all_2015_maret11' checked> </input></td><td>Sumur</td></tr>";
					echo "<tr><td><input type='checkbox' value='Persil all' id='lyr_Persil_All10' checked> </input></td><td>Persil All</td></tr>";
					echo "<tr><td><input type='checkbox' value='Persil pemilik' id='lyr_Persil_pemilik9' checked></input></td><td>Persil Pemilik</td></tr>";
					echo "<tr><td><input type='checkbox' value='patok' id='lyr_Koord_patok_As_Built_All8' checked></input></td><td>Patok</td></tr>";
					echo "<tr><td><input type='checkbox' value='keamanan' id='lyr_keamanan_lokasi_pgdp7' checked></input></td><td>Keamanan</td></tr>";
					echo "<tr><td><input type='checkbox' value='jalanpro' id='lyr_jln_pro6' checked></input></td><td>Jalan Provinsi</td></tr>";
					echo "<tr><td><input type='checkbox' value='jalanbesar' id='lyr_JalanBesar5' checked></input></td><td>Jalan Besar</td></tr>";
					echo "<tr><td><input type='checkbox' value='pipeline' id='lyr_Pipeline_PGDP_20164' checked></input></td><td>Pipeline</td></tr>";
					echo "<tr><td><input type='checkbox' value='pipappgs' id='lyr_PIPAPPGS3' checked></input></td><td>Pi PPGS</td></tr>";
					echo "<tr><td><input type='checkbox' value='pipappgs' id='lyr_PIPAGASPGN2' checked></input></td><td>PipaGAS PGN</td></tr>";
					echo "<tr><td><input type='checkbox' value='medco_singaPpagardewa1' id='lyr_medco_singaPpagardewa1' checked> </input></td><td>Medco</td></tr>";
					echo "<tr><td><input type='checkbox' value='hutan' id='lyr_hutan_pgdp0' checked></input></div></td><td>Hutan</td></tr>";
					echo "<tr><td colspan=2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button onclick='view_layer();' class='btn btn-info'>Save</button> </td></tr>";	
					echo "</tbody>";
					echo "</table>"	;
					
				}else if ($data['status'] == "1" && $data['id']==2){
					echo "<div class='table-responsive'>";
					echo "<table class='table'>";
					echo "<tbody>";
					echo "<tr><td colspan=2>";
					echo "Lorem Ipsum</td></tr>";
					echo "</tbody>";
					echo "</table>"	;
				}
			}
		echo "</div>";
	echo "</ul>";
	?>
</div>







