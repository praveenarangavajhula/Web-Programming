
<form action="" method="POST">
Search: <input type="text" name="name">
<input type="submit" name='submit'>
</form>

<?php
if (!empty($_POST['name']))
{
$keyword = $_POST["name"];
echo "<p style='text-align: center;font-size: 30px;'>".$keyword."</p>";
require_once('flickr.php'); 
$Flickr = new Flickr('78dc2b13d9cc1127139a1aa12bf9fcc6'); 
$data = $Flickr->search($keyword); 
foreach($data['photos']['photo'] as $photo) { 
	// the image URL becomes something like 
	// http://farm{farm-id}.static.flickr.com/{server-id}/{id}_{secret}.jpg  
	echo '<a href ="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg"><img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '_t.jpg"></a>'; 
} 
}
?>