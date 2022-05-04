<?php
namespace Phppot;

use Phppot\DataSource;

class CountryStateCity
{
    private $ds;
    
    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }
    
    /**
     * to get the country record set
     *
     * @return array result record
     */
    public function getAllProvinces()
    {
        $query = "SELECT * FROM province order by provName";
        $result = $this->ds->select($query);
        return $result;
    }
    
    /**
     * to get the state record based on the country_id
     *
     * @param string $countryId
     * @return array result record
     */
    public function getSchoolByProvID($provID)
    {
        $query = "SELECT * FROM school WHERE provID = ? order by schoolName";
        $paramType = 'd';
        $paramArray = array(
            $provID
        );
        $result = $this->ds->select($query, $paramType, $paramArray);
        return $result;
    }
    
    
}