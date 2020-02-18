<?php

if ( ! function_exists('byte_format'))
{
	/**
	 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
	 *
	 * @param	mixed	will be cast as int
	 * @param	int
	 * @return	string
	 */
	function byte_format($num, $precision = 1)
	{
		$CI =& get_instance();
		$this -> load -> helper ( ' number ' );

		if ($num >= 1000000000000)
		{
			$num = round($num / 1099511627776, $precision);
			$unit = $CI->lang->line('terabyte_abbr');
		}
		elseif ($num >= 1000000000)
		{
			$num = round($num / 1073741824, $precision);
			$unit = $CI->lang->line('gigabyte_abbr');
		}
		elseif ($num >= 1000000)
		{
			$num = round($num / 1048576, $precision);
			$unit = $CI->lang->line('megabyte_abbr');
		}
		elseif ($num >= 1000)
		{
			$num = round($num / 1024, $precision);
			$unit = $CI->lang->line('kilobyte_abbr');
		}
		else
		{
			$unit = $CI->lang->line('bytes');
			return number_format($num).' '.$unit;
		}

		return number_format($num, $precision).' '.$unit;
		echo  byte_format ( 456 );  // Mengembalikan 456 Bytes 
		echo  byte_format ( 4567 );  // Mengembalikan 4,5 KB 
		echo  byte_format ( 45678 );  // Mengembalikan 44,6 KB 
		echo  byte_format ( 456789 );  // Mengembalikan 447,8 KB 
		echo  byte_format ( 3456789 );  // Mengembalikan 3,3 MB 
		echo  byte_format ( 12345678912345 );  // Mengembalikan 1,8 GB 
		echo  byte_format ( 123456789123456789 );  // Mengembalikan 11.228,3 TB

		echo  byte_format ( 45678 ,  2 );
	}
}

?>