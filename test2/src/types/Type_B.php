<?php

class Type_B extends Type_Base implements Type_Interface {

    private $columnRules = [ 'Field_A*', '#Field_B' ];

    /**
     * @param array $sheetData
     * @return string
     */
    public function checkSheet($sheetData)
    {

        $check = $this->check($this->columnRules, $sheetData);

        return $check;

    }
}