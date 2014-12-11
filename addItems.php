<?php

$sql = "SELECT c.category_id AS id, c.category_name AS name FROM categories c JOIN shop_categories s ON s.category_id = c.category_id WHERE s.shop_id = ";
$sql .=  $user->getRegID();

$db = new DbCon();
$arr = $db->getSelectTable($sql); //getting category ids


?>
<form name=" addproduct " method="POST" action= " /scripts/addtoproduct.php " enctype="multipart/form-data" > 

Shop ID
<br />
Product Title<input type="text" name="pro_name" /><br /><br />
Product Tag<input type="text" name="pro_tag" /><br /><br />
Category ID<select name="category">
<option value="0">select category id</option>

<!-- $array = explode(",",$categoryId); -->

        <?php if($arr) {
            foreach ($arr as $row) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
             <?php }
        } ?>
</select>


Variations <input type="radio" name="var" value="1" checked="checked" />Yes
<input type="radio" name="var" value="0"  />No<br /><br />
Virtual <input type="radio" name="vir" value="1" checked="checked" />Yes
<input type="radio" name="vir" value="0"  />No<br /><br />

Product description<textarea name="description" rows="3" cols="35"></textarea><br /><br />
Product price<input type="text" name="pro_price" /><br /><br />
Selling unit<input type="text" name="sel_unit" /><br /><br />

Initial Stock<input type="number" name="iStock" /><br /><br />
Current Stock<input type="number" name="cStock" /><br /><br />
Date Added <input type="date" name="pDate" /><br />
upload Image<input type="file" name="img" id="fileToUpload" /><br /><br />

<input type="submit" name="submit" value="add product" />
<input type="reset" name="reset" value="back" /><br /><br />

</form>

