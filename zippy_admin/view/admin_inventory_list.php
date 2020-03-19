<?php include 'header.php';     ?>
   
<br>
<section id="dropdowns">
  <div class="dropdown">
    <form action="." method="GET" id="inventory_selection">
      <div id="make_dropdown">
        <select name="make_id" class="custom-select my-1    mr-sm-2" >
          <option  value="" selected>View a Make of Vehicle</option>
          <?php foreach ($makes as $make) : ?>
          <option value="<?php echo $make['make'];?>"><?php echo $make['make']; ?></option>
          <?php endforeach; ?>
          <div class="dropdown-divider"></div>
          <option value="0">View All Makes</option>
        </select>
      </div>
      
      <div id="type_dropdown">
        <select name="type_id" class="custom-select my-1 mr-sm-2">
          <option value="" selected>View a Type of Vehicle</option>
          <?php foreach ($types as $type) : ?>
          <option value="<?php echo $type['type_code'];?>"><?php echo $type['type_name']; ?></option>
          <?php endforeach; ?>
          <div class="dropdown-divider"></div>
          <option value="0">View All Types</option>
        </select>
      </div>

      <div id="class_dropdown">
        <select name="class_id" class="custom-select my-1 mr-sm-2">
          <option  value="" selected>View a Class of Vehicle</option>
          <?php foreach ($classes as $class) : ?>
          <option value="<?php echo $class['class_code'];?>"><?php echo $class['class_name']; ?></option>
          <?php endforeach; ?>
          <div class="dropdown-divider"></div>
          <option value="0">View All Classes</option>
        </select>
      </div>
      <br>
        <div id="sort_by">
          <p>Sort Inventory By:  
          <label class="radio-inline"><input type="radio" name="sort" value="price">  Price</label>
          <label class="radio-inline"><input type="radio" name="sort" value="year">  Year</label></p>
        </div>
        <div id="submit">
          <input class="btn btn-primary " type="submit" value="Submit">
        </div>
    </form>
  </div>
</section>
            <br>
            <h3 id="no_search"><?php global $message; echo $message;?></h3>
            

<section>
        
        <div id="table-overflow">
   
                    <table>
                        <thead>
                            <tr>
                                <th class="product_id_hidden">Product ID</th>
                                <th>Year</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Remove Item</th>
                            </tr>
                        </thead>
                        <tbody>

                           <?php if (isset($dvehicles)) { 
                                foreach ($dvehicles as $dvehicle) : ?>
                            <tr>
                              <td class="product_id_hidden"><?php echo $dvehicle['product_id']; ?></td>
                              <td class="main"><?php echo $dvehicle['year']; ?></td>
                              <td class="main"><?php echo $dvehicle['make']; ?></td>
                              <td class="main"><?php echo $dvehicle['model']; ?></td>
                              <td class="main"><?php echo $dvehicle['price']; ?></td>
                              <td class="main"><?php echo $dvehicle['type_name']; ?></td>
                              <td class="main"><?php echo $dvehicle['class_name']; ?></td>
                              <td class="main">
                                    <form action="." method="get">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="product_id"
                                            value="<?php echo $dvehicle['product_id']; ?>">
                                        <input type="submit" value="Remove">
                                    </form>
                              </td>
                            </tr>
                          <?php endforeach;} ?>

                         <?php if (isset($avehicles)) { 
                                foreach ($avehicles as $avehicle) : ?>
                            <tr>
                              <td class="product_id_hidden"><?php echo $avehicle['product_id']; ?></td>
                              <td class="main"><?php echo $avehicle['year']; ?></td>
                              <td class="main"><?php echo $avehicle['make']; ?></td>
                              <td class="main"><?php echo $avehicle['model']; ?></td>
                              <td class="main"><?php echo $avehicle['price']; ?></td>
                              <td class="main"><?php echo $avehicle['type_name']; ?></td>
                              <td class="main"><?php echo $avehicle['class_name']; ?></td>
                              <td class="main">
                                    <form action="." method="get">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="product_id"
                                            value="<?php echo $avehicle['product_id']; ?>">
                                        <input type="submit" value="Remove">
                                    </form>
                              </td>
                            </tr>
                          <?php endforeach;} ?>

                          <?php if (isset($mvehicles)) { 
                                foreach ($mvehicles as $mvehicle) : ?>
                            <tr>
                              <td class="product_id_hidden"><?php echo $mvehicle['product_id'];?></td>                            
                              <td class="main"><?php echo $mvehicle['year']; ?></td>
                              <td class="main"><?php echo $mvehicle['make']; ?></td>
                              <td class="main"><?php echo $mvehicle['model']; ?></td>
                              <td class="main"><?php echo $mvehicle['price']; ?></td>
                              <td class="main"><?php echo $mvehicle['type_name']; ?></td>
                              <td class="main"><?php echo $mvehicle['class_name']; ?></td>
                              <td class="main">
                                    <form action="." method="get">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="product_id"
                                            value="<?php echo $mvehicle['product_id']; ?>">
                                        <input type="submit" value="Remove" class="button red">
                                    </form>
                              </td>                              
                            </tr>
                          <?php endforeach;} ?>
                            
                          <?php if (!isset($mvehicle)) { 
                                foreach ($tvehicles as $tvehicle) : ?>
                            <tr>
                              <td class="product_id_hidden"><?php echo $tvehicle['product_id'];?></td>                                 
                              <td class="main"><?php echo $tvehicle['year']; ?></td>
                              <td class="main"><?php echo $tvehicle['make']; ?></td>
                              <td class="main"><?php echo $tvehicle['model']; ?></td>
                              <td class="main"><?php echo $tvehicle['price']; ?></td>
                              <td class="main"><?php echo $tvehicle['type_name']; ?></td>
                              <td class="main"><?php echo $tvehicle['class_name']; ?></td>
                              <td class="main">
                                    <form action="." method="get">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="product_id"
                                            value="<?php echo $tvehicle['product_id']; ?>">
                                        <input type="submit" value="Remove" class="button red">
                                    </form>
                              </td>                              
                            </tr>
                          <?php endforeach;} ?>

                            <?php if (!isset($mvehicle, $tvehicle)) { 
                                foreach ($cvehicles as $cvehicle) : ?>
                            <tr>
                              <td class="product_id_hidden"><?php echo $cvehicle['product_id'];?></td>                                 
                              <td class="main"><?php echo $cvehicle['year']; ?></td>
                              <td class="main"><?php echo $cvehicle['make']; ?></td>
                              <td class="main"><?php echo $cvehicle['model']; ?></td>
                              <td class="main"><?php echo $cvehicle['price']; ?></td>
                              <td class="main"><?php echo $cvehicle['type_name']; ?></td>
                              <td class="main"><?php echo $cvehicle['class_name']; ?></td>
                              <td class="main">
                                    <form action="." method="get">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="product_id"
                                            value="<?php echo $cvehicle['product_id']; ?>">
                                        <input type="submit" value="Remove" class="button red">
                                    </form>
                              </td>
                            </tr>
                          <?php endforeach;} ?>                             
                        </tbody>
                    </table>
           
                </div>
                  
                <div id="links">
                  <h5>Manage Inventory</h5>
                  <p><a href="?action=show_add_form">Click here</a> to add a new vehicles to the inventory.</p>  
                  <p><a href="index.php?action=list_types">View/Edit vehicle types</a></p>
                  <p><a href="index.php?action=list_classes">View/Edit vehicle classes</a></p>
                </div>
                 
                                  
        </section>


<br>
<?php include 'footer.php'; ?>