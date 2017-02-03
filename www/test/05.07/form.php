<?php 
use foundationphp\UploadFile;

session_start();
require_once 'src/foundationphp/UploadFile.php';
if (!isset($_SESSION['subm_
'])) {
	$_SESSION['subm_maxfiles'] = 1;
	$_SESSION['postmax'] = UploadFile::convertToBytes(ini_get('post_max_size'));
	$_SESSION['displaymax'] = UploadFile::convertFromBytes($_SESSION['postmax']);
}
$max = 5*1024*1024;
$result = array();
if (isset($_POST['upload'])) {
	
	$destination = __DIR__ . '/uploaded/';
    try {
    	$upload = new UploadFile($destination);
    	$upload->setMaxSize($max);
    	//$upload->allowAllTypes();
    	$upload->upload();
    	$result = $upload->getMessages();
    } catch (Exception $e) {
    	$result[] = $e->getMessage();
    }
}
$error = error_get_last();
?>

<body>
<?php if ($result || $error) { ?>
<ul class="result">
<?php 
if ($error) {
   alert($error['message']);
}
if ($result) {
	foreach ($result as $message) {
	    echo "<li>$message</li>";
	}
}?>
</ul>
<?php } ?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<p>
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max;?>">
<label for="filename">Select File:</label>
<input type="file" name="filename" id="filename" 
data-maxfiles="<?php echo $_SESSION['subm_maxfiles'];?>"
data-postmax="<?php echo $_SESSION['postmax'];?>"
data-displaymax="<?php echo $_SESSION['displaymax'];?>">
</p>
<ul>
    <li>File should be no more than <?php echo UploadFile::convertFromBytes($max);?>.</li>
    </ul>
<p>
<input type="submit" name="upload" value="Upload File">
</p>
</form>

<script src="js/checkmultiple.js"></script>
</body>
</html>