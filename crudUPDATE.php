<html>
<form method="post" action="crudINDEX.php">
<table align="center" border="0">
<tr>
<td>Name:</td>
<td><input type="text" name="name" value="<?php echo $_GET['name']; ?>" /></td>
</tr>
<tr>
<td>Image URL:</td>
<td><input type="text" name="image" value="<?php echo $_GET['image']; ?>"/></td>
</tr>
<tr>
<td>Price:</td>
<td><input type="text" name="price" value="<?php echo $_GET['price']; ?>"/></td>
</tr>
<tr>
<td>Size:</td>
<td><input type="text" name="size" value="<?php echo $_GET['size']; ?>"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
<input type="hidden" name="update" value="yes" />
<input type="submit" value="update Record"/>
</td>
</tr>
</table>
</form>
<html>