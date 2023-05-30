<?php
include 'include/db.php';
if (!$dbcon) {
	die("Connection failed: " . mysqli_connect_error());
}

require_once "Classes/PHPExcel.php";
$path = "files/" . $file_name;
$reader = PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);

//Header
$worksheet = $excel_Obj->getSheet('0');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibtrf (`CAR`, `NoHs`, `SeriTrp`, `KdTrpBm`, `KdSatBm`, `TrpBm`, `KdCuk`, `KdTrpCuk`, `KdSatCuk`, `TrpCuk`, `TrpPpn`, `TrpPbm`, `TrpPph`, `KdTrpBmAD`, `TrpBmAD`, `KdTrpBmTP`, `TrpBmTP`, `KdTrpBmIM`, `TrpBmIM`, `KdTrpBmPB`, `TrpBmPB`, `KDCUKSUB`, `HJECuk`, `KdKmsCuk`, `IsiPerKmsCuk`, `FlagTis`, `FlagLekat`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 1 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// BahanBaku
$worksheet = $excel_Obj->getSheet('1');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibresnpd (`CAR`, `ResTg`, `ResWk`, `Seri`, `UrDok`, `NILAI`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}


// BahanBakuTarif
$worksheet = $excel_Obj->getSheet('2');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibresnpbl (`CAR`, `reskd`, `ResTg`, `ResWk`, `Serial`, `BrgUrai`, `ketentuan`, `Pemberitahuan`, `Penetapan`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// BahanBakuDokumen
$worksheet = $excel_Obj->getSheet('3');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibresbill (`CAR`, `ResTg`, `ResWk`, `Akun`, `NPWP`, `Nilai`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// Barang
$worksheet = $excel_Obj->getSheet('4');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibres (`CAR`, `RESKD`, `RESTG`, `RESWK`, `DOKRESNO`, `DOKRESTG`, `KPBC`, `PIBNO`, `PIBTG`, `KDGUDANG`, `PEJABAT1`, `Nip1`, `JABATAN1`, `PEJABAT2`, `Nip2`, `JATUHTEMPO`, `KOMTG`, `KOMWK`, `DesKripsi`, `dibaca`, `JmKemas`, `NoKemas`, `NPWPImp`, `NamaImp`, `AlamatImp`, `IDPPJK`, `NamaPPJK`, `AlamatPPJK`, `KodeBill`, `TanggalBill`, `TanggalJtTempo`, `TanggalAju`, `TotalBayar`, `Terbilang`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// BarangTarif
$worksheet = $excel_Obj->getSheet('5');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibpgt (`CAR`, `KdBeban`, `KdFasil`, `NilBeban`, `Npwp`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// BarangDokumen
$worksheet = $excel_Obj->getSheet('6');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO plb_barangdokumen (NOMOR_AJU, SERI_BARANG, SERI_DOKUMEN) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// Dokumen
$worksheet = $excel_Obj->getSheet('7');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibnpt (`CAR`, `ResKd`, `RESTG`, `RESWK`, `Asal`, `BM_Asal`, `CUK_Asal`, `PPN_Asal`, `PPNBM_Asal`, `PPH_Asal`, `Ditetapkan`, `BMBYR`, `CUKBYR`, `PPNBYR`, `PPNBMBYR`, `PPHBYR`, `DENDA`, `Kurang`, `BM_Kurang`, `CUK_Kurang`, `PPN_Kurang`, `PPNBM_Kurang`, `PPH_Kurang`, `Lebih`, `BM_Lebih`, `CUK_Lebih`, `PPN_Lebih`, `PPNBM_Lebih`, `PPH_Lebih`, `JenisSalahDll`, `Total_Kurang`, `Total_Lebih`, `S_JnsBrg`, `S_JmlBrg`, `S_Tarif`, `S_NilPab`, `BMAD_Asal`, `BMADBYR`, `BMAD_KURANG`, `BMAD_Lebih`, `BMI_Asal`, `BMIBYR`, `BMI_KURANG`, `BMI_Lebih`, `BMTP_Asal`, `BMTPBYR`, `BMTP_KURANG`, `BMTP_Lebih`, `BMADS_Asal`, `BMADSBYR`, `BMADS_KURANG`, `BMADS_Lebih`, `BMIS_Asal`, `BMISBYR`, `BMIS_KURANG`, `BMIS_Lebih`, `BMTPS_Asal`, `BMTPSBYR`, `BMTPS_KURANG`, `BMTPS_Lebih`, `BMKT_Asal`, `BMKT`, `BMKT_KURANG`, `BMKT_Lebih`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// Kemasan
$worksheet = $excel_Obj->getSheet('8');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibkms (`CAR`, `JnKemas`, `JmKemas`, `merkkemas`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// Kontainer
$worksheet = $excel_Obj->getSheet('9');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibkendaraan (`CAR`, `Serial`, `NoRangka`, `NoMesin`, `Silinder`, `Tahun`, `FlagCbu`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibhdr (`CAR`, `KdKpbc`, `PibNo`, `PibTg`, `JnPib`, `JnImp`, `JkWaktu`, `CrByr`, `DokTupKd`, `DokTupNo`, `DokTupTg`, `PosNo`, `PosSub`, `PosSubSub`, `ImpId`, `ImpNpwp`, `ImpNama`, `ImpAlmt`, `ImpStatus`, `ApiKd`, `ApiNo`, `PpjkId`, `PpjkNpwp`, `PpjkNama`, `PpjkAlmt`, `PpjkNo`, `PpjkTg`, `IndId`, `IndNpwp`, `IndNama`, `IndAlmt`, `PasokNama`, `PasokAlmt`, `PasokNeg`, `PelBkr`, `PelMuat`, `PelTransit`, `TmpTbn`, `Moda`, `AngkutNama`, `AngkutNo`, `AngkutFl`, `TgTiba`, `KdVal`, `Ndpbm`, `NilInv`, `Freight`, `BTambahan`, `Diskon`, `KdAss`, `Asuransi`, `KdHrg`, `Fob`, `Cif`, `Bruto`, `Netto`, `JmCont`, `JmBrg`, `Status`, `Snrf`, `KdFas`, `Lengkap`, `BillNpwp`, `BillNama`, `BillAlmt`, `PenjualNama`, `PenjualAlmt`, `PenjualNeg`, `Pernyataan`, `JnsTrans`, `VD`, `VersiModul`, `NilVd`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}



// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibfas (`CAR`, `Serial`, `KdFasBM`, `FasBM`, `KdFasCuk`, `FasCuk`, `KdFasPpn`, `FasPpn`, `KdFasPph`, `FasPph`, `KdFasPbm`, `FasPbm`, `KdFasBMAD`, `FasBMAD`, `BMADS`, `KdFasBMTP`, `FasBMTP`, `BMTPS`, `KdFasBMIM`, `FasBMIM`, `BMIMS`, `KdFasBMPB`, `FasBMPB`, `BMPBS`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}



// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibdtlvd (`CAR`, `Serial`, `Jenis`, `Nilai`, `TgJatuhTempo`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}



// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibdtlspekkhusus (`CAR`, `Serial`, `CAS1`, `CAS2`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}



// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibdtldok (`CAR`, `NoUrut`, `DokNo`, `DokTg`, `KdGroupDok`, `KdFasDtl`, `Serial`, `DokKd`, `NoSeriBrgSkep`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}



// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibdtl (`CAR`, `Serial`, `NoHs`, `SeriTrp`, `BrgUrai`, `Merk`, `Tipe`, `SpfLain`, `BrgAsal`, `DNilInv`, `DCif`, `KdSat`, `JmlSat`, `KemasJn`, `KemasJm`, `SatBmJm`, `SatCukJm`, `NettoDtl`, `KdFasDtl`, `DtlOk`, `FlBarangBaru`, `FlLartas`, `KatLartas`, `SpekTarif`, `DNilCuk`, `JmPC`, `SaldoAwalPC`, `SaldoAkhirPC`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}



// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibdok (`CAR`, `DokKd`, `DokNo`, `DokTg`, `DokInst`, `NoUrut`, `KdGroupDok`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}



// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibconr (`CAR`, `ResKd`, `CONTNO`, `CONTUKUR`, `CONTTIPE`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

// Respon
$worksheet = $excel_Obj->getSheet('10');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery = 'INSERT INTO tblpibcon (`CAR`, `ContNo`, `ContUkur`, `ContTipe`) VALUES ';
$subquery = '';
for ($row = 2; $row <= $rowcount; $row++) {
	$subquery = $subquery . ' (';
	for ($col = 0; $col < $colomncount_number; $col++) {
		$subquery = $subquery . '\'' . $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue() . '\',';
	}
	$subquery = substr($subquery, 0, strlen($subquery) - 1);
	$subquery = $subquery . ')' . ' , ';
}
$insertquery = $insertquery . $subquery;
$insertquery = substr($insertquery, 0, strlen($insertquery) - 2);

if (mysqli_query($dbcon, $insertquery)) {
	// echo "Sheet 2 Uploaded <br>";
} else {
	echo "Error: " . $insertquery . "<br>" . mysqli_error($dbcon);
}

mysqli_close($dbcon);
