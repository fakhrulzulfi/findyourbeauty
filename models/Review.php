<?php 

    class Review {
        public static function get($id = null)
        {
            global $conn;
            $id_product = stripslashes(htmlspecialchars($id));
            $sql = "SELECT 
                        riviews.id AS riviews_id,
                        riviews.text,
                        riviews.skin,
                        riviews.usage_periode,
                        riviews.rating,
                        riviews.created_at,
                        tb_products.id AS product_id,
                        tb_products.name AS product_name,
                        tb_products.image,
                        product_brands.name AS brand_name,
                        product_categories.name AS category_name,
                        tb_users.name AS user_name
                    FROM 
                        riviews
                    INNER JOIN 
                        tb_users
                        ON tb_users.id = riviews.user_id
                    INNER JOIN
                        tb_products
                        ON tb_products.id = riviews.product_id
                    INNER JOIN
                        product_brands
                        ON product_brands.id = tb_products.brand_id
                    INNER JOIN
                        product_categories
                        ON product_categories.id = tb_products.category_id";
            
            if( !is_null($id) ) {
                $sql .= " WHERE tb_products.id = {$id_product}";
            }

            $query = mysqli_query($conn, $sql);

            $review = mysqli_fetch_all($query, MYSQLI_ASSOC);

            $review_found = [];

            for( $i = 0; $i < count($review); $i++ ) {
                    $review_found[] = $review[$i];
                }

            return $review_found;
        }

        public static function add($data)
        {
            global $conn;

            $id_user = $data['id_user'];
            $id_product = $data['select_product'];
            $usage_periode = $data['usage_periode'];
            $skin = $data['skin'];
            $text_review = $data['text_review'];
            $rating = $data['rating'];

            $sql = "INSERT INTO 
                        riviews(text, 
                                skin, 
                                usage_periode, 
                                rating, 
                                product_id, 
                                user_id) 
                    VALUES (
                        '$text_review',
                        '$skin',
                        '$usage_periode',
                        $rating,
                        $id_product,
                        $id_user
                    )";
            
            $query = mysqli_query($conn, $sql);
            
            return $query;
        }

    }