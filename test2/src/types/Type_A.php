<?php

class Type_A extends Type_Base implements Type_Interface {

    private $columnRules = [ 'Field_A*', '#Field_B', 'Field_C', 'Field_D*', 'Field_E*' ];

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