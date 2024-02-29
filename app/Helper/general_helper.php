<?php

if (!function_exists('status')) {
	function status($val)
	{
		if ($val == 0) {
            return "Deactivate";
		} else if ($val == 1) {
			return "Activate";
		}
        else if ($val == 2) {
			return "Sell IN";
		}
        else if ($val == 3) {
			return "Sell Out";
		}
        else if ($val == 4) {
			return "Unpaid";
		}
        else if ($val == 5) {
			return "Paid";
		}
        else if ($val == 6) {
			return "Complete";
		}
	}
}


if (!function_exists('short_date')) {
	function short_date($val)
	{
		return date('d-m-Y', strtotime($val));
	}
}

if (!function_exists('long_date')) {
	function long_date($val)
	{
		return date('d-m-Y h:i:s A', strtotime($val));
	}
}


