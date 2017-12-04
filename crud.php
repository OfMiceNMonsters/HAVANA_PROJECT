<!--SYARIFAH-->
<html>
<form method="post" action="index.php">
<table align="center" border="0">
<tr>
<!-- making a table view to search-->
<td>description:</td>
<td><input type="text" name="description" value="<?php echo $_GET['description']; ?>" /></td>
</tr>
<tr>
<td>size:</td>
<td><input type="text" name="size" value="<?php echo $_GET['size']; ?>"/></td>
</tr>
<tr>
<td>price:</td>
<td><input type="text" name="price" value="<?php echo $_GET['price']; ?>"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="listing_id" value="<?php echo $_GET['listing_id'] ?>" />
<input type="hidden" name="update" value="yes" />
<input type="submit" value="update Record"/>
</td>
</tr>
</table>
</form>
<html>