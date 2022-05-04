<?php
namespace Phppot;

use Phppot\CountryState;
if (! empty($_POST["cityID"])) {
    
    $stateId = $_POST["cityID"];
    
    require_once __DIR__ . '/../Model/CountryStateCity.php';
    $countryStateCity = new CountryStateCity();
    $suburbResult = $countryStateCity->getCityByStateId($stateId);
    ?>
<option>Select Suburb</option>
<?php
foreach ($suburbResult as $suburb) {
        ?>
<option value="<?php echo $suburb["suburbID"]; ?>"><?php echo $suburb["suburbName"]; ?></option>
<?php
    }
}
?>