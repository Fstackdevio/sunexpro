<?php 
	session_start();
	require('functions.php');
	$utility = new Utility();
	$Mailing = new Mailing();
	$auth = new Auth();
	$unitTest = $utility->getref('1231');
	$rfcode = '1231';
	

	$firstgen = $unitTest[0];
	$secondgen = $unitTest[1];
	$thirdgen = $unitTest[2];
	$forthgen = $unitTest[3];
	$amount_of_dr = count($firstgen);
	$amount_of_idr = count($secondgen) + count($thirdgen) + count($forthgen);

	$cash1 = array();
	$cash2 = array();
	$cash3 = array();
	
	foreach ($secondgen as $secondgenid) {
		$dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
	    $amount1 = $dl['subamount'];
	    array_push($cash1, $amount1);
	}

	foreach ($thirdgen as $thirdgenid) {
		$dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
	    $amount2 = $dl['subamount'];
	    array_push($cash2, $amount2);
	}

	foreach ($forthgen as $forthgenid) {
		$dl  = $utility->getOneRecord("SELECT * FROM customers WHERE referal_code = '$param'");
	    $amount3 = $dl['subamount'];
	    array_push($cash3, $amount3);
	}

	$sumcash1 = array_sum($cash1);
	$sumcash2 = array_sum($cash2);
	$sumcash3 = array_sum($cash3);

	$total_idr = $sumcash1 + $sumcash2 + $sumcash3;

	print_r($total_idr);
	