<!--Khairunnisa-->


<!-- This is to include the header.php into the main catalogue page-->
<?php
	include_once 'header.php';
?>

<!DOCTYPE html>
<html>
<title>HAVANA</title>
<section class="container"> <!-- I used a container to place the main content inside it -->

		<div class="content">

			<br>
			<br>
			<br>
			<div class="row"> <!-- In order to make a "table" of the catalogue, i used rows and columns to store the listings in -->
				<div class="column" style="background-color: white;"> <!-- Initially, i made a filled border to be in the container to have a white background but found that an easier way to achieve that is to utilize the column background instead-->
					<div class="container2">
  					<img src="https://i.pinimg.com/736x/60/2b/2d/602b2d86f845d4bef68bb85d31592576--vintage-nike-windbreaker-nike-windbreaker-jacket.jpg" alt="Avatar" class="image" style="width:100%">
  					<div class="middle">
    			<div class="text">Size: L // $43.00</a></div> <!-- When the user hovers over the photo, the details of the listing will appear -->
  				</div>
				</div>
				<br>
				<p>Vintage Nike Windbreaker</p>
				<br>
				<div class="button2"><div class="text2">Add to Cart</div></div> <!-- This buttons allows the user to add this certain listing into their cart-->
				</div>
				<div class="column" style="background-color: white;">
					<div class="container2">
  					<img src="https://i.pinimg.com/736x/d3/12/8d/d3128d2870cdf43d064285174582c9b3--vintage-nike-windbreaker-nike-windbreaker-jacket.jpg" alt="Avatar" class="image" style="width:100%">
  					<div class="middle">
    			<div class="text">Size: M // $49.00</a></div>
  				</div>
				</div>
				<br>
				<p>Vintage Nike Windbreaker</p>
				<br>
				<div class="button2"><div class="text2">Add to Cart</div></div>
				</div>
				<div class="column" style="background-color: white;">
					<div class="container2">
  					<img src="https://i.pinimg.com/736x/0e/bd/ba/0ebdba406d4071dff993ae5b9ea48f72--black-nike-windbreaker-nike-vintage-windbreaker.jpg" alt="Avatar" class="image" style="width:100%">
  					<div class="middle">
    			<div class="text">Size: S // $45.00</a></div>
  				</div>
				</div>
				<br>
				<p>Vintage Nike Windbreaker</p>
				<br>
				<div class="button2"><div class="text2">Add to Cart</div></div>
				</div>

				<br>
				<br>
				<br>
				<div class="column" style="background-color: white;">
					<div class="container2">
  					<img src="https://i.pinimg.com/originals/64/6b/da/646bda5ad35d6a050f9a287547944f40.jpg" alt="Avatar" class="image" style="width:100%">
  					<div class="middle">
    			<div class="text">Size: L // $50.00</a></div>
  				</div>
				</div>
				<br>
				<p>Vintage Nike Windbreaker</p>
				<br>
				<div class="button2"><div class="text2">Add to Cart</div></div>
				</div>
				<div class="column" style="background-color: white;">
					<div class="container2">
  					<img src="http://picture-cdn.wheretoget.it/rk09yf-i.jpg" alt="Avatar" class="image" style="width:100%">
  					<div class="middle">
    			<div class="text">Size: S // $33.00</a></div>
  				</div>
				</div>
				<br>
				<p>Vintage Nike Windbreaker</p>
				<br>
				<div class="button2"><div class="text2">Add to Cart</div></div>
				</div>
				<div class="column" style="background-color: white;">
					<div class="container2">
  					<img src="https://i.pinimg.com/736x/a5/03/17/a5031783c69fc708c5d4da45e45a3083.jpg" alt="Avatar" class="image" style="width:100%">
  					<div class="middle">
    			<div class="text">Size: M // $48.00</a></div>
  				</div>
				</div>
				<br>
				<p>Vintage Vans Sweatshirt</p>
				<br>
				<div class="button2"><div class="text2">Add to Cart</div></div>
				</div>

			</div>


		</div>
		</div>

		<?php
			if (isset($_SESSION['u_id'])) {
				echo "You are logged in!";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>