<?php

namespace App\Service;

class BageConcatService
{
    private $number;
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function loop()
    {
        $number = $this->number;
        $countCombine = 0;
        $result = [];

        for ($i=1; $i <= $number; $i++) { 
            $res = [];
            if ($countCombine < 2) {
                if ($i % 3 == 0) {
                    $res[] = "Bage";
                } 
                if ($i % 5 == 0) {
                    $res[] = "Concat";
                }
            } else {
                if ($i % 5 == 0) {
                    $res[] = "Bage";
                } 
                if ($i % 3 == 0) {
                    $res[] = "Concat";
                }
            }
            
            $result[$i] = implode(' ', $res);

            if (count($res) > 1) {
                $countCombine++;
            }

            if ($countCombine == 5) {
                $result['selesai'] = '--looping selesai--';
                break;
            }
        }

        return $result;
    }
}
