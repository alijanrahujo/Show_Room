<?php

use Rmunate\Utilities\SpellNumber;

if (!function_exists('status')) {
    function status($val)
    {
        if ($val == 0) {
            return "Deactivate";
        } else if ($val == 1) {
            return "Activate";
        } else if ($val == 2) {
            return "Sell IN";
        } else if ($val == 3) {
            return "Sell Out";
        } else if ($val == 4) {
            return "Unpaid";
        } else if ($val == 5) {
            return "Partial Paid";
        } else if ($val == 6) {
            return "Paid";
        } else if ($val == 7) {
            return "Complete";
        } else if ($val == 8) {
            return "Inprocess";
        } else if ($val == 9) {
            return "Issued";
        } else if ($val == 10) {
            return "Not Issued";
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


if (!function_exists('num2word')) {
    function num2word($val)
    {
        return SpellNumber::value($val)->toLetters();
    }
}
