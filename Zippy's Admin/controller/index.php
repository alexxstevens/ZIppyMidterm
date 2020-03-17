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
    } else if ($action == 'list_types') {
            $types = get_types();
            include('../view/type_list.php');
    } else if ($action == 'list_classes') {
            $classes = get_classes();
            include('../view/class_list.php');  }        
        // } else if ($action == 'delete_item') {
        //     $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
        //     if ($item_id == NULL || $item_id == FALSE) {
        //         $error = "Missing or incorrect item id.";
        //         include('errors/error.php');
        //     } else {
        //         delete_item($item_id);
        //         header("Location: .?category_id=$category_id");
        //     }
        // } else if ($action == 'delete_category') {
        //     $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        //     if ($category_id == NULL || $category_id == FALSE) {
        //         $error = "Missing or incorrect category id.";
        //         include('errors/error.php');
        //     } else {
        //         delete_category($category_id);
        //         header("Location: .?action=list_categories");
        //     }
        // } else if ($action == 'show_add_form') {
        //     $categories = get_categories();
        //     include('add_item_form.php');
        // } else if ($action == 'add_item') {
        //     $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        //     $title = filter_input(INPUT_POST, 'title');
        //     $description = filter_input(INPUT_POST, 'description');
        //     if ($category_id == NULL || $category_id == FALSE || $title == NULL || $description == NULL) {
        //         $error = "Invalid item data. Check all fields and try again.";
        //         include('errors/error.php');
        //     } else {
        //         add_item($category_id, $title, $description);
        //         header("Location: .?category_id=$category_id");
        //     }
        // } else if ($action == 'add_category') {
        //     $category_name = filter_input(INPUT_POST, 'category_name');
        //     add_category($category_name);
        //     header("Location: .?action=list_categories");
        // }
?>

    


        


