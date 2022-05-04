<?php
namespace Phppot;

use Phppot\CountryState;
if (! empty($_POST["provID"])) {
    
    $provID = $_POST["provID"];
    
    require_once __DIR__ . '/../Model/CountryStateCity.php';
    $countryStateCity = new CountryStateCity();
    $schoolResult = $countryStateCity->getSchoolByProvID($provID);
    ?>
<option value="">Select School</option>
<?php
    foreach ($schoolResult as $school) {
        ?>
<option value="<?php echo $school["schoolID"]; ?>"><?php echo $school["schoolName"]; ?></option>
<?php
    }
}
?>