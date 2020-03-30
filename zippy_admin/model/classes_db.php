<?php
// dropdown display
    function get_classes() {
        global $db;
        $query_ = 'SELECT * FROM classes ORDER BY class_code';
        $statement = $db->prepare($query_);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    //display filtered inventory
   function get_inventory_by_class() {
        global $db;
        global $class_id;
        global $sort;
            if ($sort == 'price') {
                $query = 'SELECT 
                V.product_id 
                , V.year
                , V.make
                , V.model
                , V.price 
                ,T.type_name
                ,C.class_name
                FROM vehicles V 
                LEFT JOIN types T ON V.type_code = T.type_code 
                LEFT JOIN classes C ON V.class_code = C.class_code 
                WHERE V.class_code = :class_code ORDER BY V.price'; 
                $statement = $db->prepare($query);
                $statement->bindValue(':class_code', $class_id);
                $statement->execute();
                $cvehicles = $statement->fetchAll();
                $statement->closeCursor();
                return $cvehicles;
            } else if ($sort == 'year') {
                $query = 'SELECT 
                V.product_id 
                , V.year
                , V.make
                , V.model
                , V.price 
                ,T.type_name
                ,C.class_name
                FROM vehicles V 
                LEFT JOIN types T ON V.type_code = T.type_code 
                LEFT JOIN classes C ON V.class_code = C.class_code 
                WHERE V.class_code = :class_code ORDER BY V.year'; 
                $statement = $db->prepare($query);
                $statement->bindValue(':class_code', $class_id);
                $statement->execute();
                $cvehicles = $statement->fetchAll();
                $statement->closeCursor();
                return $cvehicles;
            } else {
                $query = 'SELECT 
                V.product_id 
                , V.year
                , V.make
                , V.model
                , V.price 
                ,T.type_name
                ,C.class_name
                FROM vehicles V 
                LEFT JOIN types T ON V.type_code = T.type_code 
                LEFT JOIN classes C ON V.class_code = C.class_code 
                WHERE V.class_code = :class_code ORDER BY V.price DESC'; 
                $statement = $db->prepare($query);
                $statement->bindValue(':class_code', $class_id);
                $statement->execute();
                $cvehicles = $statement->fetchAll();
                $statement->closeCursor();
                return $cvehicles;
            }}

                //delete vehicle
    function delete_class($class_code) {
        global $db;
        global $class_code;
        $query = 'DELETE FROM classes WHERE class_code = :class_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $statement->closeCursor();
    }

    //add class
    function add_class($class_name) {
        global $db;
        $query = 'INSERT INTO classes (class_name)
              VALUES
                 (:class_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }
       ?>
