<?

require_once("commonfile.php");
$pkgid = 0;

if(isset($_POST['pkgid']) && $_POST['pkgid']!='')
{
	$pkgid = $_POST['pkgid'];	
}
echo "$".getonefielddata("SELECT price from tbldatingpackagemaster WHERE packageid=".$pkgid);	