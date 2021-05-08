<?php

class Type_Base {

    /**
     * @param array $columnRules
     * @param array $sheetData
     * @return string
     */
    protected function check($columnRules, $sheetData)
    { 
        
        if (!$this->validateColumn($columnRules, $sheetData[1])) {

            return 'Invalid columns, please make sure your rules is valid';

        }
        
        $table = '<tr>
            <td>Row</td>
            <td>Error</td>
        </tr>';

        foreach ($sheetData as $key1 => $arrData) {

            if ($key1 === 1) continue;

            $table .= '<tr>';

            $errors = [];

            foreach ($arrData as $key2 => $value) {

                $column = $sheetData[1][$key2];

                $valueStr = strval($value);

                $error = $this->validate($column, $valueStr);

                if ($error) array_push($errors, $error);

            }

            if (count($errors)) {

                $errorString = implode(',', $errors);

                $table .= '<td>'.$key1.'</td>';

                $table .= '<td>'.$errorString.'</td></tr>';

            }
            
        }

        return '<table border=1>'.$table.'</table';
    }

    /**
     * @param string $column
     * @param string $value
     * @return mixed
     */
	private function validate($column, $value)
	{

		if (($column[0] === '#') && strpos($value, ' ')) {

            return $column." should not contain any space";

        } else if ((substr($column, -1) === '*') && ($value === '')) {

            return "Missing value in  ".$column;

        }

        return;
    }

     /**
     * @param array $columnRules
     * @param array $sheetData
     * @return boolean
     */
    private function validateColumn($columnRules, $sheetData)
    {

        $sanitizedColumn = [];

        foreach ($sheetData as $key => $value) {

            if ($value !== NULL) $sanitizedColumn[] = $value;

        }

        return $columnRules !== $sanitizedColumn ? false : true;

    }


}