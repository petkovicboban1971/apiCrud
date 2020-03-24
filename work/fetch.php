<?php

//fetch.php

$api_url = "http://localhost/apiCrud/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->first_name.'</td>
			<td>'.$row->last_name.'</td>
			<td><center><a href="#" name="edit" class="edit" id="'.$row->id.'"><i class="fa fa-edit" style="color: #00cc00;"></i></a></center></td>
			<td><center><a href="#" name="delete" class="delete" id="'.$row->id.'"><i class="fa fa-close" style="color: red";></i></a></center></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">U bazi ne postoje podaci...</td>
	</tr>
	';
}

echo $output;

?>