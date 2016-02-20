<?php
App::import('Vendor','tcpdf/config/tcpdf_config');
App::import('Vendor','tcpdf/tcpdf');

class PdfHelper extends AppHelper {

	public $helpers = array('Html');

	public $core;
	private $url;

	private $opciones = array(
			'tipo'=>'planilla',
		);

	

	public function setCore($tipo = 'planilla'){
		$obj=null;
		if($tipo == 'planilla'){
			$obj = new TipoPlanilla(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		}elseif($tipo == 'memo'){
			$obj = new TipoMemo(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		}else{
			$obj = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		}
		return $obj;
	}

	public function mergeOpciones($opciones){
		$this->opciones = array_merge($this->opciones, $opciones);
	}

	public function init( $opciones = array() ){
		$this->mergeOpciones($opciones);

		
		$this->core = $this->setCore($this->opciones['tipo']);

		if($this->opciones['tipo'] == 'none'){
			$this->core->setPrintHeader(false);
			$this->core->setPrintFooter(false);
		}


		$this->core->SetCreator(PDF_CREATOR);
		$this->core->SetAuthor('');
		$this->core->SetTitle("pGrado");
		$this->core->SetSubject(''); //$this->core->SetSubject('TCPDF Tutorial');
		$this->core->SetKeywords(''); //$this->core->SetKeywords('TCPDF, PDF, example, test, guide');

		$this->core->url = $this->Html->url('/',true);

		// set default header data
		//$this->core->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
		$this->core->SetHeaderData(
			"unerg_min.jpg",30,
			"Universidad Nacional Experimental Rómulo Gallegos",
			"Área de Ingeniería de Sistemas\nPrograma de Ingeniería en Informática\nCoordinación de Proyecto de Grado"
		);

		// set header and footer fonts
		$this->core->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->core->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$this->core->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$this->core->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$this->core->SetHeaderMargin(PDF_MARGIN_HEADER);
		$this->core->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$this->core->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$this->core->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$this->core->setLanguageArray($l);
		}
	}

	public function SetFont($family, $style='', $size=null, $fontfile='', $subset='default', $out=true) {
		$this->core->SetFont($family, $style, $size, $fontfile, $subset, $out);
	}

	public function AddPage($orientation='', $format='', $keepmargins=false, $tocpage=false) {
		$this->core->AddPage($orientation, $format, $keepmargins, $tocpage);
	}

	public function lastPage($resetmargins=false) {
		$this->core->lastPage($resetmargins);
	}

	public function Output($name='doc.pdf', $dest='I') {
		$this->core->Output($name, $dest);
	}

	public function writeHTML($html, $ln=true, $fill=false, $reseth=true, $cell=false, $align='') {
		$this->core->writeHTML($html, $ln, $fill, $reseth, $cell, $align);
	}

	public function SetMargins($left, $top, $right=-1, $keepmargins=false) {
		$this->core->SetMargins($left, $top,$right,$keepmargins);
	}

}


class TipoPlanilla extends TCPDF{
	/**
	 * This method is used to render the page header.
	 * It is automatically called by AddPage() and could be overwritten in your own inherited class.
	 * @public
	 */
	public $url;


	public function Header() {

		if ($this->header_xobjid === false) {
			// start a new XObject Template
			$this->header_xobjid = $this->startTemplate($this->w, $this->tMargin);
			$headerfont = $this->getHeaderFont();
			$headerdata = $this->getHeaderData();

			$this->y = $this->header_margin;
			if ($this->rtl) {
				$this->x = $this->w - $this->original_rMargin;
			} else {
				$this->x = $this->original_lMargin;
			}

			if (($headerdata['logo']) AND ($headerdata['logo'] != K_BLANK_IMAGE)) {
				$imgtype = TCPDF_IMAGES::getImageFileType(K_PATH_IMAGES.$headerdata['logo']);
				if (($imgtype == 'eps') OR ($imgtype == 'ai')) {
					$this->ImageEps(K_PATH_IMAGES.$headerdata['logo'], '', '', $headerdata['logo_width']);
				} elseif ($imgtype == 'svg') {
					$this->ImageSVG(K_PATH_IMAGES.$headerdata['logo'], '', '', $headerdata['logo_width']);
				} else {
					$this->Image(K_PATH_IMAGES.$headerdata['logo'], '', '', $headerdata['logo_width']);
				}
				$imgy = $this->getImageRBY();
			} else {
				$imgy = $this->y;
			}

			$cell_height = $this->getCellHeight($headerfont[2] / $this->k);
			// set starting margin for text data cell
			if ($this->getRTL()) {
				$header_x = $this->original_rMargin + ($headerdata['logo_width'] * 1.1);
			} else {
				$header_x = $this->original_lMargin + ($headerdata['logo_width'] * 1.1);
			}
			$cw = $this->w - $this->original_lMargin - $this->original_rMargin - ($headerdata['logo_width'] * 1.1);
			$this->SetTextColorArray($this->header_text_color);
			// header title
			$this->SetFont($headerfont[0], 'B', $headerfont[2] + 1);
			$this->SetX($header_x);
			$this->Cell($cw, $cell_height, $headerdata['title'], 0, 1, '', 0, '', 0);
			// header string
			$this->SetFont($headerfont[0], $headerfont[1], $headerfont[2]);
			$this->SetX($header_x);
			$this->MultiCell($cw, $cell_height, $headerdata['string'], 0, '', 0, 1, '', '', true, 0, false, true, 0, 'T', false);
			
			// print an ending header line
			$this->SetLineStyle(array('width' => 0.85 / $this->k, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $headerdata['line_color']));


			$this->SetY((2.835 / $this->k) + max($imgy, $this->y));
			if ($this->rtl) {
				$this->SetX($this->original_rMargin);
			} else {
				$this->SetX($this->original_lMargin);
			}
			$this->Cell(($this->w - $this->original_lMargin - $this->original_rMargin), 0, '', 'T', 0, 'C');
			$this->endTemplate();
		}
		// print header template
		$x = 0;
		$dx = 0;
		if (!$this->header_xobj_autoreset AND $this->booklet AND (($this->page % 2) == 0)) {
			// adjust margins for booklet mode
			$dx = ($this->original_lMargin - $this->original_rMargin);
		}
		if ($this->rtl) {
			$x = $this->w + $dx;
		} else {
			$x = 0 + $dx;
		}
		$this->printTemplate($this->header_xobjid, $x, 0, 0, 0, '', '', false);
		if ($this->header_xobj_autoreset) {
			// reset header xobject template at each page
			$this->header_xobjid = false;
		}

		$barcode = $this->getBarcode();
		if (!empty($barcode)) {
			//$this->Ln($line_width);
			$barcode_width = round(($this->w - $this->original_lMargin - $this->original_rMargin) / 3);
			$style = array(
				'border' => 0,
				'padding' => '8',
				'fgcolor' => array(0,0,0),
				'bgcolor' => array(255,255,255), //array(255,255,255)
				'module_width' => 1, // width of a single module in points
				'module_height' => 1 // height of a single module in points
			);
			$this->write2DBarcode($barcode, 'QRCODE,L', 175, 3, 30, 30, $style, 'N');
			//$pdf->Text(140, 205, 'QRCODE H - NO PADDING');
			//$this->write1DBarcode($barcode, 'C128', '', $cur_y + $line_width, '', (($this->footer_margin / 3) - $line_width), 0.3, $style, '');
		} /**/
	}

	/**
	 * This method is used to render the page footer.
	 * It is automatically called by AddPage() and could be overwritten in your own inherited class.
	 * @public
	 */
	public function Footer() {
		$cur_y = $this->y;
		$this->SetTextColorArray($this->footer_text_color);
		//set style for cell border
		$line_width = (0.85 / $this->k);
		$this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $this->footer_line_color));

		/*
		//print document barcode
		$barcode = $this->getBarcode();
		if (!empty($barcode)) {
			$this->Ln($line_width);
			$barcode_width = round(($this->w - $this->original_lMargin - $this->original_rMargin) / 3);
			$style = array(
				'position' => $this->rtl?'R':'L',
				'align' => $this->rtl?'R':'L',
				'stretch' => false,
				'fitwidth' => true,
				'cellfitalign' => '',
				'border' => false,
				'padding' => 0,
				'fgcolor' => array(0,0,0),
				'bgcolor' => false,
				'text' => false
			);
			$this->write1DBarcode($barcode, 'C128', '', $cur_y + $line_width, '', (($this->footer_margin / 3) - $line_width), 0.3, $style, '');
		} */

		if (!empty($this->url)) {
			$this->Cell(0, 0, $this->url, 'T', 0, 'L');
		}

		$w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
		if (empty($this->pagegroups)) {
			$pagenumtxt = $w_page.$this->getAliasNumPage().' / '.$this->getAliasNbPages();
		} else {
			$pagenumtxt = $w_page.$this->getPageNumGroupAlias().' / '.$this->getPageGroupAlias();
		}
		$this->SetY($cur_y);
		//Print page number
		if ($this->getRTL()) {
			$this->SetX($this->original_rMargin);
			$this->Cell(0, 0, $pagenumtxt, 'T', 0, 'L');
		} else {
			$this->SetX($this->original_lMargin);
			$this->Cell(0, 0, $this->getAliasRightShift().$pagenumtxt, 'T', 0, 'R');
		}
	}
}


class TipoMemo extends TCPDF {

    //Page header
    public function Header() {
        // Logo
		$headerdata = $this->getHeaderData();

        //$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Image(K_PATH_IMAGES.$headerdata['logo'], '', '', $headerdata['logo_width']);
        // Set font
        $this->SetFont('freesans', 'B', 11);
        // Title
        //$this->SetY('0');

        $this->Cell(0, 0, 'Universidad Rómulo Gallegos', 0, 1, 'C', 0, '', 0);
        $this->Cell(0, 0, 'Área de Ingeniería de Sistemas', 0, 1, 'C', 0, '', 0);
        $this->Cell(0, 0, 'Programa de Ingeniería en Informática', 0, 1, 'C', 0, '', 0);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        //$this->SetY(-15);
        // Set font
        //$this->SetFont('freesans', 'I', 8);
        // Page number
        //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


?>