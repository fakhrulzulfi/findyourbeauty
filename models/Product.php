<?php 

    class Product {
        private $name;
        private $image;
        private $price;

        function __construct($name, $image, $price) {
            $this->name = $name;
            $this->image = $image;
            $this->price = $price;
        }

        public static function get( int $id_product = null) {
            global $conn;
            $id_product = stripslashes(htmlspecialchars($id_product));
            $sql = "SELECT
                        tb_products.id AS product_id,
                        tb_products.name AS product_name,
                        tb_products.image,
                        tb_products.created_at,
                        product_brands.name AS brand_name,
                        product_categories.name AS category_name
                    FROM 
                        tb_products
                    INNER JOIN 
                        product_brands
                        ON product_brands.id = tb_products.brand_id
                    INNER JOIN 
                        product_categories
                        ON product_categories.id = tb_products.category_id";
            
            if( $id_product != null ) {
                $sql .= " WHERE tb_articles.id = {$id_product}";
            }
    
            $query = mysqli_query($conn, $sql);
            $product = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $product_found = [];
    
            for( $i = 0; $i < count($product); $i++ ) {
                $product_found[]["product"] = $product[$i];
            }
            return $product_found;
        }

        public function add($data) {
            global $conn;
            $name = $this->name;
            $image = $this->image;
            $price = $this->price;
            $brand_id = $data["brand"];
            $category_id = $data["category"];

            $sql = "INSERT 
                    INTO tb_products(
                            name,
                            image,
                            price,
                            brand_id,
                            category_id
                        )
                    VALUES(
                            '$name',
                            '$image',
                            $price,
                            $brand_id,
                            $category_id)";

            $query = mysqli_query($conn, $sql);
            
            return $query;
        }

    }

    class Category {
        public static function get() {
            global $conn;
            $sql = "SELECT
                        *
                    FROM 
                        product_categories";
    
            $query = mysqli_query($conn, $sql);
            $category = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $category_found = [];
    
            for( $i = 0; $i < count($category); $i++ ) {
                $category_found[] = $category[$i];
            }
            
            return $category_found;
        }
    }

    class Brand {
        public static function get($id=null) {
            global $conn;
            $sql = "SELECT
                        *
                    FROM 
                        product_brands";

            if( !is_null($id) ) {
                $sql .= " WHERE product_brands.id = {$id}";
            }
    
            $query = mysqli_query($conn, $sql);
            $brand = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $brand_found = [];
    
            for( $i = 0; $i < count($brand); $i++ ) {
                $brand_found[] = $brand[$i];
            }
            
            return $brand_found;
        }

        public static function getProductByBrand($id_brand) 
        {
            global $conn;

            $sql = "SELECT * FROM product_brands INNER JOIN tb_products ON tb_products.brand_id = product_brands.id WHERE product_brands.id = {$id_brand} ";

            $query = mysqli_query($conn, $sql);

            $product = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
            $product_found = [];
    
            for( $i = 0; $i < count($product); $i++ ) {
                $product_found[] = $product[$i];
            }
            
            return $product_found;
            
        }

        public static function getAverageRating($id_product) {
            global $conn;

            $sql = "SELECT 
                        AVG(riviews.rating) 
                    FROM 
                        riviews 
                    WHERE 
                        product_id = {$id_product}";

            $query = mysqli_query($conn, $sql);
            $rating = mysqli_fetch_row($query);

            return $rating;
        }
    }