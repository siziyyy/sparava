<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once APPPATH."/third_party/PHPExcel.php";

class Excellib extends PHPExcel {
 	function __construct() {
 		$this->_ci =& get_instance();
    	parent::__construct();
    }

    public function download_products_in_excel($type,$ids) {

    	$query = $this->_ci->db->select("*")->from("products")->where_in($type,$ids)->order_by($type)->get();

    	if ($query->num_rows() > 0) {

    		$data = $query->result_array();

			$category_names = array();
			
			$query = $this->_ci->db->select('category_id,title')->from('categories')->get();
			
			if ($query->num_rows() > 0) {
				foreach($query->result_array() as $row) {
					$category_names[$row['category_id']] = $row['title'];
				}
			}

			$fields = $this->_ci->db->list_fields("products");

			$this->setActiveSheetIndex(0);
			$this->getActiveSheet()->setTitle("products");

		
			$j = 0;
			
			for($i = 0 ; $i <= count($fields)+2 ; $i++ ) {
				
				if(isset($fields[$j])) {
					$this->getActiveSheet()->setCellValue($this->_chars[$i].'1', $fields[$j]);
				} else {
					$this->getActiveSheet()->setCellValue($this->_chars[$i].'1', 'delete');
				}
				
				$this->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setAutoSize( true );
				$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setSize(13);
				$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setBold(true);	
				$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cccccc');
				
				if(isset($fields[$j])) {
					if($fields[$j] == 'product_id') {
						
						$i++;
						
						$this->getActiveSheet()->setCellValue($this->_chars[$i].'1', 'categories');
						
						$this->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setAutoSize( true );
						$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setSize(13);
						$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setBold(true);	
						$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cccccc');
						
						$categories_index = $i;
					}
					
					if($fields[$j] == 'percent') {
						
						$i++;
						
						$this->getActiveSheet()->setCellValue($this->_chars[$i].'1', 'auto_price');
						
						$this->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setAutoSize( true );
						$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setSize(13);
						$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setBold(true);	
						$this->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cccccc');
						
						$auti_price_index = $i;
					}	
				}
				
				$j++;
			}

			if(isset($data)) {
				$j = 2;
				foreach($data as $row) {
					$i = 0;
					
					foreach($row as $cell) {
						if(isset($categories_index)) {
							if($categories_index == $i) {
								$categories = array();
								
								$query = $this->_ci->db->select('category_id')->from('product_to_category')->where('product_id', $row['product_id'])->get();
								
								if ($query->num_rows() > 0) {
									foreach($query->result_array() as $product) {
										if(isset($category_names[$product['category_id']])) {
											$categories[] = $category_names[$product['category_id']];
										}
									}
								}
								
								$this->getActiveSheet()->setCellValue($this->_chars[$i].$j, (count($categories) > 0 ? implode(';',$categories) : ''));
								$i++;
							}
						}
						
						if(isset($auti_price_index)) {
							if($auti_price_index == $i) {
								
								$auto_price = (($row['cost']*$row['percent'])/100) + $row['cost'];

								$this->getActiveSheet()->setCellValue($this->_chars[$i].$j, $auto_price);
								$i++;
							}
						}					
						
						$this->getActiveSheet()->setCellValue($this->_chars[$i].$j, $cell);					
						$i++;
					}
					
					$j++;
				}
			}			

			$filename = substr(sha1(uniqid(mt_rand(), true)), 0, 32).'.xls';

			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache	
			
			$objWriter = PHPExcel_IOFactory::createWriter($this, 'Excel5');
			$objWriter->save('php://output');				

    	}

    	return false;
    } 

    private $_chars = array(
		'0' => 'A',
		'1' => 'B',
		'2' => 'C',
		'3' => 'D',
		'4' => 'E',
		'5' => 'F',
		'6' => 'G',
		'7' => 'H',
		'8' => 'I',
		'9' => 'J',
		'10' => 'K',
		'11' => 'L',
		'12' => 'M',
		'13' => 'N',
		'14' => 'O',
		'15' => 'P',
		'16' => 'Q',
		'17' => 'R',
		'18' => 'S',
		'19' => 'T',
		'20' => 'U',
		'21' => 'V',
		'22' => 'W',
		'23' => 'X',
		'24' => 'Y',
		'25' => 'Z',
		'26' => 'AA',
		'27' => 'AB',
		'28' => 'AC',
		'29' => 'AD',
		'30' => 'AE',
		'31' => 'AF',
		'32' => 'AG',
		'33' => 'AH',
		'34' => 'AI',
		'35' => 'AJ',
		'36' => 'AK',
		'37' => 'AL',
		'38' => 'AM',
		'39' => 'AN',
		'40' => 'AO',		
		'41' => 'AP',
		'42' => 'AQ',
		'43' => 'AR',
		'44' => 'AS',
		'45' => 'AT',
		'46' => 'AU',
		'47' => 'AV',
		'48' => 'AW',
		'49' => 'AX',
		'50' => 'AY',
		'50' => 'AZ'
	);
}