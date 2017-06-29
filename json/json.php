<?php

/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();
    // get a all from all table
     $query = '
    SELECT k.id_kategori,k.nama_kategori,d.id_detail,d.nama_detail,d.alamat_detail,d.jam_opr_detail,d.lat_detail,d.long_detail,d.no_telepon,i.id_info,i.nama_info
    FROM `detail` d
        INNER JOIN `info` i ON d.id_info=i.id_info
        INNER JOIN `kategori` k ON i.id_kategori=k.id_kategori
    ORDER BY k.id_kategori ASC
';

//get the results
$result = mysql_query($query);

//setup array to hold information
$details = array();

//setup holders for the different types so that we can filter out the data
$detailID = 0;
$infoID = 0;

//setup to hold our current index
$detaiIndex = -1;
$infoIndex = -1;

//go through the rows
while($row = mysql_fetch_assoc($result)){
    if($detailID != $row['id_kategori']){
        $detaiIndex++;
        $infoIndex = -1;
        $detailID = $row['id_kategori'];

        //add the console
        $consoles[$detaiIndex]['id_kategori'] = $row['id_kategori'];
		$consoles[$detaiIndex]['nama_kategori'] = $row['nama_kategori'];
    }

    if($infoID != $row['id_info']){
        $infoIndex++;

        //add the model to the console
        $consoles[$detaiIndex]['info'][$infoIndex]['id_info'] = $row['id_info'];
		$consoles[$detaiIndex]['info'][$infoIndex]['nama_info'] = $row['nama_info'];
        //setup the title array
    }

    //add the game to the current console and model
    $consoles[$detaiIndex]['info'][$infoIndex]['detail'] = array(
        'id_detail'      => $row['id_detail'],
        'nama_detail' => $row['nama_detail'],
		'alamat_detail' => $row['alamat_detail'],
		'jam_opr_detail' => $row['jam_opr_detail'],
		'lat_detail' => $row['lat_detail'],
		'long_detail' => $row['long_detail']
    );
}
$data = "{'data':".json_encode($consoles)."}";
echo $data;
        
    
?>