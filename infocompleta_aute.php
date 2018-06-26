	<?php

/*
 *  El siguiente codigo sirve para que de una caracteristica que se seleccione
* me de todas las informacion completa que hay de ese objeto seleccionado
 */

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__ . '/db_connect_aute.php';
require_once __DIR__ . '/db_config_aute.php';

// connecting to db
$db = new DB_CONNECT();

// connecting to db
    //$db = new DB_CONNECT();
	 $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

// check for post data(revisar si hay datos posteriores)
if (isset($_GET['idelemento'])) {
    $pid = $_GET['idelemento'];

    // obtener de elemento (idelemento =pid) de ese elemento N traigame los elementos que tiene
    $result = 	mysqli_query($mysqli,"SELECT e.nom_elem, e.ape_elem,e.cargo_elem,e.area_elem, m.nom_empr FROM elemento e, empresa m WHERE e.idempresa = m.idempresa	 AND e.idelemento = '".$pid."'");



    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {

            

                $fila = mysqli_fetch_array($result);
                
                
			    $response['nom_elem']= $fila['nom_elem'];
			    $response['ape_elem']=$fila['ape_elem'];
			    $response['cargo_elem']= $fila['cargo_elem'];
				$response['area_elem']= $fila['area_elem'];
				$response['nom_empr']= $fila['nom_empr'];
			   
			   


            // success
            $response["success"] = 1;

            // user node
          

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No codigo found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No codigo found";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
