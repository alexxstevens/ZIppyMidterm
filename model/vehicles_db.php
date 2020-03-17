

<?php
// dropdown display
    function get_makes() {
        global $db;
        $query_ = 'SELECT make FROM vehicles GROUP BY make ORDER BY product_id';
        $statement = $db->prepare($query_);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    //display all
    function display_all() { 
        global $db;
        global $type_id;
        global $make_id;
        global $class_id;
        global $sort;
        if ($type_id == FALSE || $make_id == FALSE || $class_id == FALSE) {
            $query = 
            'SELECT 
            V.year
            , V.make
            , V.model
            , V.price 
            ,T.type_name
            ,C.class_name
            FROM vehicles V 
            LEFT JOIN types T ON V.type_code = T.type_code 
            LEFT JOIN classes C ON V.class_code = C.class_code';
            // sort inventory if selected
                if ($sort = 'price') {
                    $query = 'SELECT 
                    V.year
                    , V.make
                    , V.model
                    , V.price 
                    ,T.type_name
                    ,C.class_name
                    FROM vehicles V 
                    LEFT JOIN types T ON V.type_code = T.type_code 
                    LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.price';
                } else if ($sort = 'year') {
                    $query = 'SELECT 
                    V.year
                    , V.make
                    , V.model
                    , V.price 
                    ,T.type_name
                    ,C.class_name
                    FROM vehicles V 
                    LEFT JOIN types T ON V.type_code = T.type_code 
                    LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.year'; }}
            $statement = $db->prepare($query);
            $statement->execute();
            $avehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $avehicles; }
        
    //display inventory by make
    function get_inventory_by_make() {
        global $db;
        global $make_id;
        global $sort;
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
            WHERE V.make = :make_id';
                if ($sort = 'price') {
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
                    WHERE V.make = :make_id ORDER BY V.price';}
                if ($sort = 'year') {
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
                    WHERE V.make = :make_id ORDER BY V.year';}
            $statement = $db->prepare($query);
            $statement->bindValue(':make_id', $make_id);
            $statement->execute();
            $mvehicles = $statement->fetchAll();
            $statement->closeCursor();
            return $mvehicles; }

?>