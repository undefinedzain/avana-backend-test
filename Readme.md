# Avana Backend Test
## Test 1

### How to:
- `cd test1`
- run `php getCloseParenthesisIndex.php`

## Test 2
Create a PSR-4 package that support both `xlsx` & `xls`

### How to:
- `cd test2`
- run `composer install`
- If you want to try this package, you can open `test.php` or create new file

```php
<?php
require './vendor/autoload.php';

$inputFileName = 'Type_A.xlsx';

$validationResult = \Src\ValidateSheet::validate($inputFileName);

echo $validationResult;
```
- Test on Terminal/Git Bash using command `php test.php`

### How to support other Type_*.xlsx?
- For example, create file `Type_C.php` in directory `src/types`
- Create class `Type_C` in `Type_C.php`
```php
<?php

class  Type_C  extends  Type_Base  implements  Type_Interface  {

	// define your column rule here
	private $columnRules  =  [
		'Field_A*',
		'#Field_B',
		'Field_C'
	];

	/**
	* @param  array $sheetData
	* @return  string
	*/
	public  function  checkSheet($sheetData)
	{
		$check  =  $this->check($this->columnRules,  $sheetData);
		return  $check;
	}
}
```
- Last step, run `composer dump-autoload`
