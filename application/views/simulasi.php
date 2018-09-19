<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
<body>
		<table>
			<tr>
				<td>Harga Rumah</td>
				<td>:</td>
				<td colspan="2"><input type="number" id="harga_rumah" name=""></td>
			</tr>
			<tr>
				<td>Uang Muka</td>
				<td>:</td>
				<td colspan="2"><input type="number" id="uangmuka" name=""></td>
			</tr>
			<tr>
				<td>Palfond</td>
				<td>:</td>
				<td colspan="2"><input type="number" disabled="" id="palfond" name=""></td>
			</tr>
			<tr>
				<td>Jangka Waktu</td>
				<td>:</td>
				<td><input type="number" id="jangkawaktu" name=""></td>
				<td>(12-360)bulan</td>
			</tr>
			<tr>
				<td>Suku Bunga</td>
				<td>:</td>
				<td><input max="100" min="1" value="100" style="width: 163px;" type="number" id="sukubunga" name=""></td>
				<td>%</td>
			</tr>
			<tr>
					<td colspan="2"></td>
					<td colspan="2"><button onclick="hitung()">Calculate</button></td>
			</tr>
			<tr>
				<td>Angsuran</td>
				<td>:</td>
				<td><input type="number" id="angsuran" name=""></td>
				<td>/Bulan</td>
			</tr>
		</table>
</body>
</html>
<script>
	function hitung(){
		var harga_rumah = parseInt($("#harga_rumah").val());
		var sukubunga = parseInt($("#sukubunga").val());
		var jangkawaktu = parseInt($("#jangkawaktu").val());
		var uangmuka = parseInt($("#uangmuka").val());
		var selisih ;
		var angsuran
		var perbulan;
		var bunga;
		if (harga_rumah < uangmuka) {
			alert(harga_rumah +" "+ uangmuka);
		}else{	
		selisih = harga_rumah - uangmuka;
		perbulan = selisih / jangkawaktu;
		bunga 	= selisih /sukubunga * 100;
		angsuran = perbulan + bunga;
		$("#angsuran").val(angsuran);
		$("#palfond").val(selisih);
		}
	}
</script>