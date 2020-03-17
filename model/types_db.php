<?php
// dropdown display
    function get_types() {
        global $db;
        $query_ = 'SELECT * FROM types ORDER BY type_code';
        $statement = $db->prepare($query_);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

  //display filtered inventory
    function get_inventory_by_type() {
        global $db;
        global $type_id;
        global $sort;
            if ($sort == 'price') {
                $query = 'SELECT 
                V.year
                , V.make
                , V.model
                , V.price 
                ,T.type_name
                ,C.class_name
                FROM vehicles V 
                LEFT JOIN types T ON V.type_code = T.type_code 
                LEFT JOIN classes C ON V.class_code = C.class_code 
                WHERE V.type_code = :type_code ORDER BY V.price'; }
            else if ($sort == 'year') {
                $query = 'SELECT 
                V.year
                , V.make
                , V.model
                , V.price 
                ,T.type_name
                ,C.class_name
                FROM vehicles V 
                LEFT JOIN types T ON V.type_code = T.type_code 
                LEFT JOIN classes C ON V.class_code = C.class_code 
                WHERE V.type_code = :type_code ORDER BY V.year';}
            $statement = $db->prepare($query);
            $statement->bindValue(':type_code', $type_id);
            $statement->execute();
            $tvehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $tvehicles; 
         }
        
       ?>
