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

require 'minAndMax.php';
require 'costAndBenefit.php';

use SAW\MinAndMax;
use SAW\CostAndBenefit;

/**
 * Class utama untuk SAW Method
 * 
 * @category Decision_Support_System
 * @package  None
 * @author   Khoerul Umam <khoerulumam@students.unnes.ac.id>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     true
 */

class SawMethod
{
    /**
     * Data Array
     */
    public $data = [];

    /**
     * Data With Name Array
     */
    public $dataWithName = [];

    /**
     * Data Name Array
     */
    public $dataName = [];

    /**
     * Criteria Array
     */
    public $criteria = [];

    /**
     * Normalize Array
     */
    public $normalizeResult = [];

    /**
     * Final Result Array
     */
    public $finalResult = [];

    /**
     * Construct kelas
     * 
     * @param $data     menerima data yang akan diuji dalam bentuk array
     * @param $criteria menerima data kriteria dalam bentuk array
     */
    public function __construct($data, $criteria, $dataName = null)
    {
        $this->data = $data;
        $this->criteria = $criteria;
        $this->dataName = $dataName;
        $this->_normalize();
        $this->_finalCalculation();
        $this->_assignName();
    }

    /**
     * Fungsi untuk menormalisasi
     * 
     * @return array
     */
    private function _normalize()
    {
        $criteriaTotal = count($this->criteria);
        $dataTotal = count($this->data);
        $criteria = $this->criteria;
        $data = $this->data;
        $minAndMax = new MinAndMax($this->data, $this->criteria);
        $costOrBenefit = new CostAndBenefit($this->criteria);
        $minAndMax = $minAndMax->get();
        $costOrBenefit = $costOrBenefit->get();
        $normalizeResult = [];

        for ($dataIteration = 0; $dataIteration < $dataTotal; $dataIteration++) {
            for ($criteriaIteration = 0; $criteriaIteration < $criteriaTotal; $criteriaIteration++) {
                if ($costOrBenefit[$criteriaIteration] == true) {
                    $normalizeResult[$dataIteration][$criteriaIteration] = $data[$dataIteration][$criteriaIteration] / $minAndMax[$criteriaIteration];
                } else if ($costOrBenefit[$criteriaIteration] == false) {
                    $normalizeResult[$dataIteration][$criteriaIteration] = $minAndMax[$criteriaIteration] / $data[$dataIteration][$criteriaIteration];
                }
            }
        }

        $this->normalizeResult = $normalizeResult;
        return $normalizeResult;
    }

    /**
     * Hitung nilai akhir
     * 
     * @return array
     */
    private function _finalCalculation()
    {
        $normalizedData = $this->normalizeResult;
        $criteriaTotal = count($this->criteria);
        $dataTotal = count($this->data);
        $weightPerCriteria = [];
        $result = [];
        $finalResult = [];

        for ($criteriaIteration = 0; $criteriaIteration < $criteriaTotal; $criteriaIteration++) {
            $weightPerCriteria[] = $this->criteria[$criteriaIteration][1] / 100;
        }

        for ($dataIteration = 0; $dataIteration < $dataTotal; $dataIteration++) {
            for ($criteriaIterationFinal = 0; $criteriaIterationFinal < $criteriaTotal; $criteriaIterationFinal++) {
                $result[$dataIteration][$criteriaIterationFinal] = $weightPerCriteria[$criteriaIterationFinal] * $normalizedData[$dataIteration][$criteriaIterationFinal];
            }
            $finalResult[] = array_sum($result[$dataIteration]);
        }

        $this->finalResult = $finalResult;
    }

    /**
     * Get final result
     * 
     * @return array
     */
    public function getFinalResult()
    {
        $this->sort();
        return $this->finalResult;
    }

    /**
     * Menggabungkan data nama dengan data akhir
     * 
     * @return array
     */
    private function _assignName()
    {
        $dataWithName = [];
        for ($dataIteration = 0; $dataIteration < count($this->data); $dataIteration++) {
            $dataWithName[$this->dataName[$dataIteration]] = $this->finalResult[$dataIteration];
        }

        $this->dataWithName = $dataWithName;
    }

    /**
     * Get data with name
     * 
     * @param $index menerima data index tertentu
     * 
     * @return array
     */
    public function getDataWithName($index = null)
    {
        if ($this->dataName == null) {
            return 'Maaf, tidak ada nama yang diinputkan';
        } else if (count($this->dataName) != count($this->data)) {
            return 'Maaf, jumlah data tidak sesuai';
        } else {
            if ($index == null) {
                return $this->dataWithName;
            } else {
                return $this->dataWithName[$index];
            }
        }
    }

    /**
     * Sort data
     * 
     * @return mixed
     */
    public function sort()
    {
        rsort($this->finalResult);
        arsort($this->dataWithName);
    }

    /**
     * Get single data
     * 
     * @return mixed
     */
    public function getResult()
    {
        $this->sort();
        return $this->finalResult[0];
    }

    /**
     * Get single data name
     * 
     * @return mixed
     */
    public function getResultName()
    {
        $this->sort();
        return array_key_first($this->dataWithName);
    }
}
