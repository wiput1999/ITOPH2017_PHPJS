<?php
function displaydate($x)
  {
    $thai_m=array("มกราคม","กุมภาพันธ","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $date_array=explode("-",$x);
    $y=$date_array[0];
    $m=$date_array[1]-1;
    $d=$date_array[2];

    $m=$thai_m[$m];
    $y=$y+543;

    $displaydate="$d $m $y";
    return $displaydate;
	}

  function checkemail($checkemail)
	{
		if(preg_match("^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|mil|org|edu|int)$",$checkemail))
		{
      return true;
    }

    else
    {
			return false;
	  }
	}
?>
