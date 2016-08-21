<?php
    $css = $this->element('pdf/style');

    // $barcode = $this->Html->url(array('controller'=>'planillas','action'=>'verificar','001',$verificacion),true);

    $html = $this->fetch('content');

    debug($html);

    //$this->Pdf->init();

    ////$this->Pdf->core->setBarcode( $barcode );

    ////$html .= $barcode;

    //// set font
    ////debug($proyecto); exit();

    //$this->Pdf->SetFont('freesans', '', 8);
    //$this->Pdf->AddPage();
    //$this->Pdf->writeHTML($css.$html);
    //$this->Pdf->lastPage();
    //$this->Pdf->Output($title_for_layout.'.pdf', 'I');

?>
