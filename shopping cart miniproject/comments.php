<?=template_header('comments')?>

<style>
h1{
	{
text-align: center;
margin-bottom: 40px;
font-family: Ink Free;
font-size: 60px;
color: morado;
}
</style>
<div class="comments content-wrapper">
    <h1>Thankyou for visiting our site</h1>
    <p><b>See what our clients have said about us:</b></p>
</div>
<?php
 $connection=mysqli_connect('localhost', 'root', '', 'beginning');?>
 <?php 
		  	$comsql = "SELECT * FROM comments ORDER BY time DESC";
		  	$comres = mysqli_query($connection, $comsql);
		  	while($comr = mysqli_fetch_assoc($comres)){
		  ?>
		  		<div class="comments content-wrapper">
		  			<img src=imgs\comment.jpg height=25 width=32>
		  			<p><strong><?php echo $comr['name']; ?>.	(<i><?php echo $comr['time'] ?></i>)</strong> </p>
		  			<p><?php echo $comr['about'] ?></p>
		  			<p><?php echo $comr['subject']; ?></p>
		  		</div>
		  	<br>
		  	<?php } ?>
</div>
</body>
</html>

<?=template_footer()?>