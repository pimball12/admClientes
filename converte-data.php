<?php
echo '<meta http-equiv="Content-Type" content="text/hmtl; charset=utf-8" />';

function convertedatapratraco($data)
{
	$novadata = explode('/',$data);
	$datacerta = $novadata[2].'-'.$novadata[1].'-'.$novadata[0];
	return $datacerta;
}

function convertedataprabarra($data)
{
	$novadata = explode('-',$data);
	$datacerta = $novadata[2].'/'.$novadata[1].'/'.$novadata[0];
	return $datacerta;
}

function convertebarra($data)
{
	$novadata = explode('-',$data);
	$datacerta = $novadata[1].'/'.$novadata[2].'/'.$novadata[3];
	return $datacerta;
}

?>

<!--echo date('d-m-y h:i:s');-->