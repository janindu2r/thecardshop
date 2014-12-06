
<form name=" addproduct " method="POST" action= " /scripts/addtoproduct.php " enctype="multipart/form-data" > 
Product ID <input type="text" name="prod_ID" /><br /><br />
Shop ID <input type="text" name="shop_ID" /><br /><br />
Product Title<input type="text" name="pro_name" /><br /><br />
Product Tag<input type="text" name="pro_tag" /><br /><br />
Category ID<input type="text" name="CatId" /><br /><br />
Variations <input type="radio" name="var" value="Yes" checked="checked" />Yes
<input type="radio" name="var" value="No"  />No<br /><br />
Virtual <input type="radio" name="vir" value="Vyes" checked="checked" />Yes
<input type="radio" name="vir" value="Vno"  />No<br /><br />

Product description<textarea name="description" rows="3" cols="35"></textarea><br /><br />
Product price<input type="text" name="pro_price" /><br /><br />
Selling unit<input type="text" name="sel_unit" /><br /><br />
Positive Reputation Points<input type="number" name="pPoints" /><br /><br />
Negative Reputation Points<input type="number" name="nPoints" /><br /><br />
Initial Stock<input type="number" name="iStock" /><br /><br />
Current Stock<input type="number" name="cStock" /><br /><br />
Date Added <input type="date" name="pDate" /><br />
upload Image<input type="file" name="fileToUpload" id="fileToUpload" /><br /><br />

<input type="submit" name="submit" value="add product" />
<input type="reset" name="reset" value="back" /><br /><br />

</form>
