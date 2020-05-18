<?php

/**
 * Perhitungan SAW Method.
 * 
 * PHP Version 7
 * 
 * @category Decision_Support_System
 * @package  None
 * @author   Khoerul Umam <khoerulumam@students.unnes.ac.id>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     true
 */

namespace SAW;

/**
 * Class untuk menghitung cost dan benefit SAW Method
 * 
 * @category Decision_Support_System
 * @package  None
 * @author   Khoerul Umam <khoerulumam@students.unnes.ac.id>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     true
 */

class CostAndBenefit
{
    /**
     * Cost atau benefir Array
     */
    public $costOrBenefit = [];

    /**
     * Menghitung min dan max tiap data dari criteria
     * 
     * @param $criteria menerima data kriteria
     * 
     * @return array
     */
    public function __construct($criteria)
    {
        $this->criteria = $criteria;
        $criteriaTotal = count($this->criteria);
        $costOrBenefit = [];

        for ($dataCriteria = 0; $dataCriteria < $criteriaTotal; $dataCriteria++) {
            $costOrBenefit[] = end($this->criteria[$dataCriteria]);
        }

        $this->costOrBenefit = $costOrBenefit;
    }

    /**
     * Get Data
     * 
     * @return array
     */
    public function get()
    {
        return $this->costOrBenefit;
    }
}
