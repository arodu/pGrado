<?php


$json = array(
	'files' => array(
		array(
			'name' => $uploaded['file']['name'],
			'size' => $uploaded['file']['size'],
			'url' => $this->Html->url(array('controller'=>'pages','action'=>'download',$uploaded['file']['name'])),
			//'deleteUrl' => 'http://127.0.0.1/libs/jQuery-File-Upload-9.9.3/server/php/?file=ALGORITHM%20The%20Hacker%20Movie.es.srt',
			//'deleteType' => 'DELETE'
		)
	)
);


$size = $uploaded['file']['size'];
if($uploaded['file']['size'] > 1024000000){
	$size = round($size / 1024000000, 1); ;
	$ext = 'GB';
}else if($uploaded['file']['size'] > 1024000){
	$size = round($size / 1024000, 1); ;
	$ext = ' MB';
}else if($uploaded['file']['size'] > 1024){
	$size = round($size / 1024, 1); ;
	$ext = ' KB';
}else{
	$ext = ' bytes';	
}










echo $this->Html->link($uploaded['file']['name'].' / '.$size.$ext, array('controller'=>'pages','action'=>'download',$uploaded['file']['name']));


debug($this->params);


?>

