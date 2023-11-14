<?php 

namespace App\Controller\Product;

use App\Core\Database\Database as DB;
use PDO;

class ProductGateway
{

    public function getAll(): array
    {
        $sql = "SELECT * FROM product";

        $stmt = DB::query($sql);

        $data = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $row["is_available"] = (bool) $row["is_available"];
            $data[] = $row;
        }

        return $data;
    }

    public function createProduct(array $data)
    {
        $sql = "INSERT INTO product (name, size, is_available) values (:name, 
        :size, :is_available)";
        
        $stmt = DB::prepare($sql);

        $stmt->bindValue(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindValue(":size", $data["size"] ?? 0, PDO::PARAM_INT);
        $stmt->bindValue(":is_available", $data["is_available"] ?? false, PDO::PARAM_BOOL);

        $stmt->execute();

        return DB::lastInsertId();
        
    }
}