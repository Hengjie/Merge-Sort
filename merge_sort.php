<?php

/*

Hengjie (C) 2011

TODO: More elegant method using queues

*/

// merge sort
error_reporting(0);

// Example data to be sorted
$example_data = array(2,4,5,7,8,4,3,2,2,45,6,8,8,234,2,4,43,55,322);
print_r("Count: " . count($example_data) . "\n");
print_r(merge_sort($example_data));

function merge_sort($data)
{
	if ( empty($data) )
	{
		return array();
	}

	$n = count($data);
	$left = array_slice($data, 0, (int) ($n/2));
	$right = array_slice($data, (int) ($n/2), $n);
	
	if ( count($left) == 0 && count($right) != 0 )
	{
		return $right;
	}

	if ( count($left) != 0 && count($right) == 0 )
	{
		return $left;
	}

	$t = merge(merge_sort($left), merge_sort($right));
	
	return $t;
}

//print_r(merge(array(1,3,5,7,9,11), array(2,4,6,12) ));

function merge($left, $right)
{
	$l_pt = 0;
	$r_pt = 0;
	
	$m = array();
	
	for ( $l_pt = 0; $l_pt < count($left); $l_pt++ )
	{
		if ( $left[$l_pt] < $right[$r_pt] )
		{
			$m[] = $left[$l_pt];
			continue;
		}
		
		while ( $left[$l_pt] > $right[$r_pt] ) 
		{		
			if ( $right[$r_pt] == null )
			{
				break;
			}
			
			$m[] = $right[$r_pt];
			$r_pt++;
		}
	
		$m[] = $left[$l_pt];
	}

	// Add the remainder if left is a smaller list than right
	if ( $r_pt < count($right) )
	{
		for ( $j = $r_pt; $j < count($right); $j++ )
		{
			$m[] = $right[$j];	
		}
	}
	
	return $m;
}

?>