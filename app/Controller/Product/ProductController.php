<?php

namespace App\Controller\Product;

class ProductController
{
    public function processRequest(string $method, string $id): void
    {
        if ($id){
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest(string $method, string $id): void 
    {
        switch ($method) {
            case 'GET':
                echo json_encode(["id" => 123]);
                break;
        }
    }

    private function processCollectionRequest(string $method): void 
    {

    }
}