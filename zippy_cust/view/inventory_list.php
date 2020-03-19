<?php include 'header.php';?>
   
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
      
            
<section>
         
                <div id="table-overflow">
                    <table>
                        <thead>
                            <tr> 
                                <th>Year</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Class</th>
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
                            </tr>
                          <?php endforeach;} ?>

                         <?php if (isset($avehicles)) { 
                                foreach ($avehicles as $avehicle) : ?>
                            <tr>
                              <td class="mainc"><?php echo $avehicle['year']; ?></td>
                              <td class="mainc"><?php echo $avehicle['make']; ?></td>
                              <td class="mainc"><?php echo $avehicle['model']; ?></td>
                              <td class="mainc"><?php echo $avehicle['price']; ?></td>
                              <td class="mainc"><?php echo $avehicle['type_name']; ?></td>
                              <td class="mainc"><?php echo $avehicle['class_name']; ?></td>
                            </tr>
                          <?php endforeach;} ?>

                          <?php if (isset($mvehicles)) { 
                                foreach ($mvehicles as $mvehicle) : ?>
                            <tr>
                              <td class="mainc"><?php echo $mvehicle['year']; ?></td>
                              <td class="mainc"><?php echo $mvehicle['make']; ?></td>
                              <td class="mainc"><?php echo $mvehicle['model']; ?></td>
                              <td class="mainc"><?php echo $mvehicle['price']; ?></td>
                              <td class="mainc"><?php echo $mvehicle['type_name']; ?></td>
                              <td class="mainc"><?php echo $mvehicle['class_name']; ?></td>
                            </tr>
                          <?php endforeach;} ?>
                            
                          <?php if (!isset($mvehicle)) { 
                                foreach ($tvehicles as $tvehicle) : ?>
                            <tr>
                              <td class="mainc"><?php echo $tvehicle['year']; ?></td>
                              <td class="mainc"><?php echo $tvehicle['make']; ?></td>
                              <td class="mainc"><?php echo $tvehicle['model']; ?></td>
                              <td class="mainc"><?php echo $tvehicle['price']; ?></td>
                              <td class="mainc"><?php echo $tvehicle['type_name']; ?></td>
                              <td class="mainc"><?php echo $tvehicle['class_name']; ?></td>
                            </tr>
                          <?php endforeach;} ?>

                            <?php if (!isset($mvehicle, $tvehicle)) { 
                                foreach ($cvehicles as $cvehicle) : ?>
                            <tr>
                              <td class="mainc"><?php echo $cvehicle['year']; ?></td>
                              <td class="mainc"><?php echo $cvehicle['make']; ?></td>
                              <td class="mainc"><?php echo $cvehicle['model']; ?></td>
                              <td class="mainc"><?php echo $cvehicle['price']; ?></td>
                              <td class="mainc"><?php echo $cvehicle['type_name']; ?></td>
                              <td class="mainc"><?php echo $cvehicle['class_name']; ?></td>
                            </tr>
                          <?php endforeach;} ?>
                                          
                        </tbody>
                    </table>
                </div>
                                
                 
                                  
        </section>


<br>
<?php include 'footer.php'; ?>