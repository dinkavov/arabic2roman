<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function index()
    {
    	return view('converter.index');
    }

    public function convert(Request $request)
    {
    	$number = $request->number;


    	$string = $this->checkNumber($number);
    	
    	return response()->json([
    		'result' => $string
    	], 200);
    }

    private function checkNumber($number)
    {
    	if (is_numeric($number)) {
    		return $this->romanize((int)$number);
    	}

    	return $this->deromanize((string)$number);
    }


    private function deromanize(String $number)
	{
		$number = str_replace(" ", "", strtoupper($number));
		$numerals = array( "M"=>1000, "CM"=>900, "D"=>500, "CD"=>400, "C"=>100, "XC"=>90, "L"=>50, "XL"=>40, "X"=>10, "IX"=>9, "V"=>5, "IV"=>4, "I"=>1 );	
		$result = 0;
		foreach ($numerals as $key=>$value) {
			while (strpos($number, $key) === 0) {
				$result += $value;
				$number = substr($number, strlen($key));
			}
		}
		return $result;
	}

	private function romanize($number)
	{
		$numerals = array( "M"=>1000, "CM"=>900, "D"=>500, "CD"=>400, "C"=>100, "XC"=>90, "L"=>50, "XL"=>40, "X"=>10, "IX"=>9, "V"=>5, "IV"=>4, "I"=>1 );	
		$result = "";
		foreach ($numerals as $key=>$value) {
			$result .= str_repeat($key, $number / $value);
			$number %= $value;
		}
		return $result;
	}
}
