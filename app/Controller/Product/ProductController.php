<?php

namespace App\Controller\Product;


class ProductController
{
    public function __construct(
        private ProductGateway $gateway

        )
    {}

    public function processRequest(string $method, ?string $id): void
    {
        if ($id){
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest(string $method, string $id): void 
    {

    }

    private function processCollectionRequest(string $method): void 
    {
        switch ($method) {
            case 'GET':
                    echo json_encode($this->gateway->getAll());
                break;

            case 'POST': 
                    $data = (array) json_decode(file_get_contents("php://input"), true);
                    
                    $errors = $this->getValidationErrors($data);
                    
                    if (! empty($errors)){
                        http_response_code(422);
                        echo json_encode(["errors" => $errors]);
                    }

                    $id = $this->gateway->createProduct($data);
                    
                    http_response_code(201);
                    echo json_encode([
                        "message" => "Product created",
                        "id" => $id
                    ]);
                break;                
        }
    }

    private function getValidationErrors(array $data): array
    {
        $errors = [];

        if (empty($data["name"])) {
            $errors[] = "this is classic, this should be a know";
        }   

        if (array_key_exists("size", $data)){
            if (filter_var($data["size"], FILTER_VALIDATE_INT) === false ){
                $errors[] = "size must be an integer";
            }
        }

        return $errors;
    }
}