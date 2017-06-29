<?php
include("../include/lib_func.php");
$id_barcode = $_GET['id_barcode'];
/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

// get all products from products table
$result = mysql_query("select a.nama_barang from tb_barang a,tb_listkerjaan b ,tb_kerjaan c
    WHERE  c.id_barcode like '$id_barcode' AND b.id_listkerjaan = a.id_listkerjaan AND b.no_kerjaan=c.no_kerjaan
    ") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
      // success
    $response["success"] = 1;
    $response["products"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product["nama_barang"] = $row["nama_barang"];

        // push single product into final response array
        array_push($response["products"], $product);
    }
  

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
?>
