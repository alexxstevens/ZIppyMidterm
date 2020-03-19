<?php include 'header.php'; ?>
<br>
<div id="class_list">
    <h2 class="add">Vehicle Classes</h2>
     <div class="list">
        <table>
            <tr>
                <th colspan="2">Class Name</th>
            </tr>        
            <?php foreach ($classes as $class) : ?>
            <tr>
                <td class="table"><?php echo $class['class_name']; ?></td>
                <td class="table">
                    <form action="." method="get">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_code"
                            value="<?php echo $class['class_code']; ?>"/>
                        <input type="submit" value="Remove" class="button red" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
</div>
<br><br>
        <h2 class="add">Add Vehicle Class</h2>
         <div class="list">
        <form action="." method="get" id="add_class_form">
            <input type="hidden" name="action" value="add_class">

            <label class="list">Class Name:</label>
            <input type="text" name="class_name" max="20" required><br>

            <br>
            <input id="add_type_button" type="submit" class="button blue" value="Add Vehicle Class"><br>
        </form>
</div>
<div>
    <br>
        <p class="add"><a href="index.php?action=show_inventory">Click Here to View Inventory</a></p>
    <br>
</div>
<?php include 'footer.php'; ?>
