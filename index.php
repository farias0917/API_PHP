<?php
    require_once 'config/Conexion.php';
    require_once 'models/Category.php';
    $category = new category();
    $categories = $category->getCategories();

    // header('Content-Type: application/json');

    if ($categories->rowCount() > 0) {
        $response = array("message" => "Ok", "data" => array()); 
        foreach ($categories->fetchAll(PDO::FETCH_ASSOC) as $category) {
            $response["data"][] = array(
                "id" => $category["id_category"],
                "nombre_caegoria" => $category["name"],
            );
        }
        http_response_code(200);
        echo json_encode($response);
    }else{
        http_response_code(404);
        echo json_encode(array("Message" => "Usuarios no encotrados"));
    }
    
?>