<?php
    require('../model/database.php');
    require('../model/types_db.php');
    require('../model/vehicles_db.php');
    require('../model/classes_db.php');
   
   $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'show_inventory';
        }
    }

  if ($action == 'show_inventory') {
        //pull data for variables
        if(isset($_GET['make_id'])){
        $make_id = $_GET['make_id'];}
        if(isset($_GET['type_id'])){
        $type_id = $_GET['type_id'];}
        if(isset($_GET['class_id'])){
        $class_id = $_GET['class_id'];}
        if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];}
        // call function to populate dropdowns
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        //no criteria message
        $message = no_search();
        //get sort variables
        if(isset($_GET['sort'])){
        $sort = $_GET['sort'];};
        //call functions to populate inventory table
        $avehicles = display_all();
        $mvehicles = get_inventory_by_make();
        $tvehicles = get_inventory_by_type();
        $cvehicles = get_inventory_by_class();
        include_once('../view/admin_inventory_list.php'); 
        //delete vehicles
    } else if ($action == 'delete_vehicle') {
            $product_id = $_GET['product_id'];
            if ($product_id == NULL || $product_id == FALSE) {
                $error = "Missing or incorrect product code.";
                include('../errors/error.php');
            } else {
                delete_vehicle($product_id);
                header("Location: .?product_id=$product_id");}
        //manage vehicle types
    } else if ($action == 'list_types') {
            $types = get_types();
            include('../view/type_list.php');
        //manage vehicle classes
    } else if ($action == 'list_classes') {
            $classes = get_classes();
            include('../view/class_list.php');  
        //delete vehicle type 
    } else if ($action == 'delete_type') {
            $type_code = $_GET['type_code'];
            if ($type_code == "") {
                $error = "Missing or incorrect type code.";
                include('../errors/error.php');
            } else {
                delete_type($type_code);
                header("Location: .?action=class_list.php"); }
        //delete vehicle class           
    } else if ($action == 'delete_class') {
            $class_code = $_GET['class_code'];
            if ($class_code == "") {
                $error = "Missing or incorrect class code.";
                include('../errors/error.php');
            } else {
                delete_class($class_code);
                header("Location: .?action=list_types");}
        //call add form
    } else if ($action == 'show_add_form') {
            $types = get_types();
            $classes = get_classes();
            include('../view/add_vehicle_form.php');
        //pull add inputs
    } else if ($action == 'add_vehicle') {
            if(isset($_GET['year'])){
            $year = $_GET['year'];};
            if(isset($_GET['make'])){
            $make = $_GET['make'];};            
            if(isset($_GET['model'])){
            $model = $_GET['model'];};
            if(isset($_GET['price'])){
            $price = $_GET['price'];};
            if(isset($_GET['type_code'])){
            $type_code = $_GET['type_code'];};
            if(isset($_GET['class_code'])){
            $class_code = $_GET['class_code'];};
            //invalid inputs
            if ($year == NULL || $make == NULL || $model == NULL || $price == NULL || $type_code == NULL ||         $class_code == NULL) {
                $error = "Invalid item data. Check all fields and try again.";
                include('../errors/error.php');
            //add vehicle
            } else {
                add_vehicle($year, $make, $model, $price, $type_code, $class_code);
                header("Location: .?product_id=$product_id");}
    //add type
    } else if ($action == 'add_type') {
            if(isset($_GET['type_name'])){
            $type_name = $_GET['type_name'];};
            add_type($type_name);
            header("Location: .?action=list_types");
    //add class
    } else if ($action == 'add_class') {
            if(isset($_GET['class_name'])){
            $class_name = $_GET['class_name'];};
            add_class($class_name);
            header("Location: .?action=list_classes");}
?>