<?php
// echo $this->element('call/warning',array('titulo'=>'Titulo','mensaje'=>'Mensaje'));
$class = 'callout-warning';
echo $this->element('callout/mensaje',compact('class','mensaje','titulo'));?>