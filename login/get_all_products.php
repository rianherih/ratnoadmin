<?php
include("../include/lib_func.php");
/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

// get all products from products table
$result = mysql_query("SELECT * FROM tb_history") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
      // success
    $response["success"] = 1;
    $response["products"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["id_history"] = $row["id_history"];
        $product["no_kerjaan"] = $row["no_kerjaan"];
        $product["kode_users"] = $row["kode_users"];
        $product["waktu_mulai"] = $row["waktu_mulai"];
        $product["waktu_selesai"] = $row["waktu_selesai"];



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
