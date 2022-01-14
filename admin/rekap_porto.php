<?php
 include '../api/config.php';
 
 //dynamic
 $sql_dinamis="SELECT
    GROUP_CONCAT( DISTINCT
        CONCAT('MIN(Case When idsiswa='''
        , idsiswa
        , ''' THEN nilai_kd END)AS '
        , idsiswa
        )
    )
    FROM tbnilaikd
    WHERE idkelas=1";
                                                            
    //static
    $static="CONCAT('SELECT tbpilar.kd as kd, ',
                        $sql_dinamis, ' 
                        FROM tbnilaikd
                        LEFT JOIN tbpilar ON tbnilaikd.idpilar = tbpilar.idpilar
                        WHERE tbnilaikd.idkelas=1
                        Group By tbnilaikd.idpilar'
                        )";
                        
    $static1="Select tbpilar.kd as kd,
         Min(Case nama_siswa When 'Muhammad Yahya Dimas' Then nilai_kd End) Muhammad_Yahya_Dimas,
         Min(Case nama_siswa When 'Ibrahim Shadiq Ruslan' Then nilai_kd End) Ibrahim_Shadiq_Ruslan
       From tbnilaikd
    LEFT JOIN tbpilar ON tbnilaikd.idpilar = tbpilar.idpilar
    LEFT JOIN tbsiswa ON tbnilaikd.idsiswa = tbsiswa.idsiswa
    WHERE tbnilaikd.idkelas=1
       Group By tbnilaikd.idpilar";
       
    $data=mysqli_query($con,$static1);
    $result=mysqli_fetch_all($data,MYSQLI_ASSOC);
    
    echo '<html>
		<head>
			<title>Rekap Nilai/title>
			<style>
				body {font-family:"open sans", "segoe ui", tahoma, arial}
				table {border-collapse: collapse}
	
				
				.total td {background-color: #f5f5f5 !important;}
				.right{text-align: right}
				table tr:nth-child(odd) td {
					background-color: #fbfbfb;
					border-bottom: 1px solid #efefef;
					border-top: 1px solid #ececec;
				}
				table th {
					color: #616161;
					margin: 0;
					padding: 10px 10px;
					border: 1px solid #e4e4e4;
					text-align: center;
					font-size: 14px;
					text-transform: uppercase;
					background: #efefef;
				}
				table td {
					border-right: 1px solid #ececec;
					border-left: 1px solid #ececec;
					padding: 7px 15px;
					color: #676767;
					font-size: 14px;
				}
				table td:nth-child(n+3) {
					text-align: right;
				}
			</style>
		</head>
		<body>';
		
		
		echo '<table>
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Kompetensi Dasar</th>'
				. $header_row1 .'
			</tr>
		</thead>
		<tbody>';
		
		$no = 1;
	
	echo  '<tr'.$class.'>
			<td>' . $print_no . '</td>';
		
    while ($row = mysqli_fetch_array($data)) {
                $kd[]  = $row['kd'];
                $nilai_kd[] = $row['nilai_kd'];
            }
    	echo '</tr>';

echo '
	</tbody>
</table>
</body>
</html>';
    

?>