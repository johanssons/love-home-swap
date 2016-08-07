<?php 

namespace App\Dates;
use Carbon\Carbon;

class Dates {

	/**
    * Format
    */
	protected $format = 'Y-m-d';

	/**
	* Get payroll dates
	*
	* @param string $year
	* @return array $collection
	*/
	public function getPayrollDates($year='')
	{
		// Set year if not present
		$year == '' ? $year = Carbon::now()->year : $year = $year;

		// Set collection as array 
		$collection = array();

		// Get an array of months
		for ($m=1; $m<=12; $m++) {
			$months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
	    }

	    // Get dates for each month
	    foreach ($months as $key => $value) {
	    	$collection[] = [
	    		'month' => $value,
	    		'1st_expensses_date' => $this->getExpenssesDay(1, $key+1, $year),
	    		'2nd_expensses_date' => $this->getExpenssesDay(15, $key+1, $year),
	    		'salary_day' => $this->getSalaryDay($value, $year)
	    	];
	    }

	    return $collection;
	}

	/**
	* Get expensses day
	*
	* @param string $day
	* @param string $month
	* @param string $year
	* @return string $date
	*/
	public function getExpenssesDay($day, $month, $year)
	{
		// Set date
		$date = Carbon::createFromDate($year, $month, $day);

		// Check if date is Saturday
		if(date('l', strtotime($date)) == 'Saturday') {
			// If Saturday then add 2 days to date
			return $date->addDays(2)->format($this->format);
		}

		// Check if date is Sunday
		if(date('l', strtotime($date)) == 'Sunday') {
			// If Sunday then add 1 day to date
			return $date->addDays(1)->format($this->format);
		}

		return $date->format($this->format);
	}

	/**
	* Get salary date
	*
	* @param string $month
	* @param string $year
	* @return string date
	*/
	public function getSalaryDay($month, $year)
	{
		// Get last day of the month
		$lastDay = date('jS F Y', strtotime('last day of '.$month.' '.$year));

		// Return last weekday of the month
		return date($this->format, strtotime('last weekday '.$lastDay));
	}
}