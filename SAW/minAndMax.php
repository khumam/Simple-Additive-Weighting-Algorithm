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
 * Class untuk menghitung min dan max SAW Method
 * 
 * @category Decision_Support_System
 * @package  None
 * @author   Khoerul Umam <khoerulumam@students.unnes.ac.id>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     true
 */

class MinAndMax
{
    /**
     * Min dan Max Array
     */
    public $minAndMax = [];

    /**
     * Menghitung min dan max tiap data dari criteria
     * 
     * @param $data     menerima data uji
     * @param $criteria menerima data kriteria
     * 
     * @return array
     */
    public function __construct($data, $criteria)
    {
        $minAndMax = [];
        $dataPerCriteria = [];

        for ($criteriaIteration = 0; $criteriaIteration < count($criteria); $criteriaIteration++) {
            for ($dataIteration = 0; $dataIteration < count($data); $dataIteration++) {
                $dataPerCriteria[$criteriaIteration][] = $data[$dataIteration][$criteriaIteration];
            }

            if (end($criteria[$criteriaIteration]) == true) {
                $minAndMax[] = max($dataPerCriteria[$criteriaIteration]);
            } else {
                $minAndMax[] = min($dataPerCriteria[$criteriaIteration]);
            }
        }

        $this->minAndMax = $minAndMax;
    }

    /**
     * Get data
     * 
     * @return array
     */
    public function get()
    {
        return $this->minAndMax;
    }
}
