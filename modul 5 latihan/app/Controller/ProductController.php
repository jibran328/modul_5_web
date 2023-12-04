<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController {
    // pakai trait yang sudah dibuat
    use ApiResponseFormatter;

    public function index() {

        $productmodel = new Product();

        $response = $productmodel->findALL();

        return $this->apiresponse(200, "success", $response);
    }

    public function getById($id) {
        $productmodel = new Product();
        $response = $productmodel->findById($id);
        return $this->apiresponse(200,"succes", $response);
    }
    public function insert() {
        // tangkap input json
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        // validasi apakah input valid
        if (json_last_error()) {
            return $this->apiresponse(400,"error invalid input", null);
        }

        $productmodel = new Product();
        $response = $productmodel->create([
            "product_name" => $inputData['product_name']
        ]);

        return $this->apiresponse(200, "succes", $response);
    }

    public function update($id) {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        // validasi apakah input valid
        if (json_last_error()) {
            return $this->apiresponse(400,"error invalid input", null);
        }

        $productmodel = new Product();
        $response = $productmodel->update([
            "product_name" => $inputData['product_name']
        ], $id);

        return $this->apiresponse(200, "succes", $response);
    }

    public function delete($id) {
        $productmodel = new Product();
        $response = $productmodel->destroy($id);    
        return $this->apiresponse(200, "succes", $response);
    }

}