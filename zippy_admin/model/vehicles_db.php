

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

    // function no_search() {
    //     global $db;
    //     global $type_id;
    //     global $make_id;
    //     global $class_id; 
    //     if ($type_id=="" && $make_id == "" && $class_id == "") {
    //         $message = "Please select search criteria to view inventory.";
    //         return $message;}
    // }

        //default view
    function default_list() {
        global $db;
        global $type_id;
        global $make_id;
        global $class_id;
        if ($type_id == NULL && $make_id == NULL && $class_id == NULL) { 
                    $query =  'SELECT 
                    V.product_id
                    , V.year
                    , V.make
                    , V.model
                    , V.price 
                    ,T.type_name
                    ,C.class_name
                    FROM vehicles V 
                    LEFT JOIN types T ON V.type_code = T.type_code 
                    LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.price DESC';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $dvehicles = $statement->fetchAll();
                    $statement->closeCursor();
                    return $dvehicles; 
    }}

    //display all
    function display_all() { 
        global $db;
        global $type_id;
        global $make_id;
        global $class_id;
        global $sort;
        if ($type_id == "0" || $make_id == "0" || $class_id == "0") {
            // sort inventory if selected
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
                    LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.price DESC';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $avehicles = $statement->fetchAll();
                    $statement->closeCursor();
                    return $avehicles;
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
                    LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.year';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $avehicles = $statement->fetchAll();
                    $statement->closeCursor();
                    return $avehicles; 
                } else { $query = 'SELECT 
                    V.product_id
                    , V.year
                    , V.make
                    , V.model
                    , V.price 
                    ,T.type_name
                    ,C.class_name
                    FROM vehicles V 
                    LEFT JOIN types T ON V.type_code = T.type_code 
                    LEFT JOIN classes C ON V.class_code = C.class_code ORDER BY V.price DESC';
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $avehicles = $statement->fetchAll();
                    $statement->closeCursor();
                    return $avehicles;
                  }}}
        
    //display inventory by make
    function get_inventory_by_make() {
        global $db;
        global $make_id;
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
                    WHERE V.make = :make_id ORDER BY V.price';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':make_id', $make_id);
                    $statement->execute();
                    $mvehicles = $statement->fetchAll();
                    $statement->closeCursor();
                    return $mvehicles;
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
                    WHERE V.make = :make_id ORDER BY V.year';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':make_id', $make_id);
                    $statement->execute();
                    $mvehicles = $statement->fetchAll();
                    $statement->closeCursor();
                    return $mvehicles;
                } else  {
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
                    WHERE V.make = :make_id ORDER BY V.product_id ORDER BY V.price DESC';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':make_id', $make_id);
                    $statement->execute();
                    $mvehicles = $statement->fetchAll();
                    $statement->closeCursor();
                    return $mvehicles;}}

    //delete vehicle
    function delete_vehicle($product_id) {
        global $db;
        $query = 'DELETE FROM vehicles WHERE product_id = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    }


    function add_vehicle($year, $make, $model, $price, $type_code, $class_code) {
        global $db;
        $query = 'INSERT INTO vehicles (year, make, model, price, type_code, class_code)
              VALUES
                 (:year, :make, :model, :price, :type_code, :class_code)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_code', $type_code);
        $statement->bindValue(':class_code', $class_code);        
        $statement->execute();
        $statement->closeCursor();
    }

?>