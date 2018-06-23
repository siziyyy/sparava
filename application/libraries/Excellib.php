<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once APPPATH."/third_party/PHPExcel.php";

class Excellib extends PHPExcel {
 	function __construct() {
 		$this->_ci =& get_instance();
    	parent::__construct();
    }

    public function download_products_in_excel($type,$ids) {

    	if($type == 'category') {

			if(!is_numeric($ids)) {
				$c_query = $this->_ci->db->get_where("categories", array("seo_url" => $ids,"status" => 1));
				if ($c_query->num_rows() > 0) {
					$category_id = $c_query->row_array()['category_id'];
				} else {
					$category_id = 0;
				}
			} else {
				$category_id = $ids;
			}

			$sql = 'SELECT p.* FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND ptc.category_id = c.category_id AND ptc.category_id = ' . (int)$category_id . ' ORDER BY product_id ASC';
					
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
    			$data = $query->result_array();
    		}

    	} elseif($type == 'provider') {

    		$data = array();

    		foreach ($ids as $store) {
	    		$sql = 'SELECT p.* FROM products AS p, product_to_provider AS ptp, providers AS pr WHERE p.product_id = ptp.product_id AND ptp.provider_id = pr.provider_id AND pr.store = "' . $store . '" ORDER BY product_id ASC';

				$query = $this->_ci->db->query($sql);

				if ($query->num_rows() > 0) {
	    			foreach($query->result_array() as $row) {
	    				$data[$row['product_id']] = $row;
		    		}
	    		}
	    	}

    	} else {
    		$query = $this->_ci->db->select("*")->from("products")->where_in($type,$ids)->order_by('product_id', 'ASC')->get();

    		if ($query->num_rows() > 0) {
    			$data = $query->result_array();
    		}
    	}

    	if ($query->num_rows() > 0) {

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

    public function download_price_list($type,$ids) {

    	if($type == 'category') {

			if(!is_numeric($ids)) {
				$c_query = $this->_ci->db->get_where("categories", array("seo_url" => $ids,"status" => 1));
				if ($c_query->num_rows() > 0) {
					$category_id = $c_query->row_array()['category_id'];
				} else {
					$category_id = 0;
				}
			} else {
				$category_id = $ids;
			}

			$data = array();

			$sql = 'SELECT p.*, c.bm FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND p.status > 0 AND ptc.category_id = c.category_id AND ptc.category_id = ' . (int)$category_id . ' ORDER BY product_id ASC';
					
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
    			foreach($query->result_array() as $row) {
    				$products[$row['product_id']] = $this->_ci->productlib->get_product_by_id($row['product_id'],true);
	    		}

    			foreach ($products as $product) {
    				$data[] = array(
    					'articul' => $product['product_id'],
    					'title' => $this->_ci->baselib->text_limiter($product['title_full'],65),
    					'price' => (isset($product['price']) ? $product['price'] : 0 ),
    					'box_price' => (isset($product['box_price']) ? $product['box_price'] : 0),
    					'box_kol' => (isset($product['box_kol']) ? $product['box_kol'] : 0),
    					'box_summ' => (isset($product['box_kol']) ? $product['box_kol']*$product['box_price'] : 0)
    				);
    			}
    		}
    	} elseif($type == 'provider') {

    		$data = array();

    		foreach ($ids as $store) {
	    		$sql = 'SELECT p.* FROM products AS p, product_to_provider AS ptp, providers AS pr WHERE p.product_id = ptp.product_id AND ptp.provider_id = pr.provider_id AND pr.store = "' . $store . '" ORDER BY product_id ASC';

				$query = $this->_ci->db->query($sql);

				if ($query->num_rows() > 0) {
	    			foreach($query->result_array() as $row) {
	    				$data[$row['product_id']] = $row;
		    		}
	    		}
	    	}

    	} else {
    		$query = $this->_ci->db->select("*")->from("products")->where_in($type,$ids)->order_by('product_id', 'ASC')->get();

    		if ($query->num_rows() > 0) {
    			$data = $query->result_array();
    		}
    	}

    	if ($query->num_rows() > 0) {

			$fields = array(
				'№',
				'Наименование',
				'шт.цена',
				'короб. цена',
				'шт в уп.',
				'цена уп.'
			);

			$this->setActiveSheetIndex(0);
			$this->getActiveSheet()->setTitle("products");

			$this->getActiveSheet()->mergeCells('A1:F1');
			$this->getActiveSheet()->setCellValue('A1', 'AYDAEDA.RU');
			$this->getActiveSheet()->getStyle('A1')->getFont()->setSize(24);

			$this->getActiveSheet()->mergeCells('A2:F2');
			$this->getActiveSheet()->setCellValue('A2', 'Площадка оптовой торговли по ценам крупных поставщиков и производителей, без наценки. Оперативная доставка.');
			$this->getActiveSheet()->getStyle('A2')->getFont()->setSize(11);
			$this->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);	

			$this->getActiveSheet()->mergeCells('A4:F4');
			$this->getActiveSheet()->setCellValue('A4', 'aydaeda.ru   Email: info@aydaeda.ru   Телефон: +7 495 544 88 64   График работы 9 - 19:00  График работы 9 - 19:00, без выходных.');

			
		
			$j = 6;
			
			for($i = 0 ; $i < count($fields) ; $i++ ) {
				$this->getActiveSheet()->setCellValue($this->_chars[$i].$j, $fields[$i]);
				
				if($this->_chars[$i] == 'B') {
					$this->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setWidth(60);
				} else {
					$this->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setAutoSize( true );
				}
				
				$this->getActiveSheet()->getStyle($this->_chars[$i].$j)->getFont()->setSize(13);
				$this->getActiveSheet()->getStyle($this->_chars[$i].$j)->getFont()->setBold(true);	
				$this->getActiveSheet()->getStyle($this->_chars[$i].$j)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cccccc');
			}

			if(isset($data)) {
				$j++;
				foreach($data as $row) {
					$i = 0;
					
					foreach($row as $cell) {
						$this->getActiveSheet()->setCellValue($this->_chars[$i].$j, $cell);					
						$i++;
					}
					
					$j++;
				}
			}

		    $style = array(
		        'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        )
		    );

		    $this->getActiveSheet()->getStyle("C7:F".($j-1))->applyFromArray($style);			

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
		'51' => 'AZ',
		'52' => 'BA',
		'53' => 'BB',
		'54' => 'BC',
		'55' => 'BD',
		'56' => 'BE',
		'57' => 'BF',
		'58' => 'BG',
		'59' => 'BH',
		'60' => 'BI',
		'61' => 'BJ',
		'62' => 'BK',
		'63' => 'BL',
		'64' => 'BM',
		'65' => 'BN',
		'66' => 'BO',
		'67' => 'BP',
		'68' => 'BQ',
		'69' => 'BR',
		'70' => 'BS',
		'71' => 'BT',
		'72' => 'BU',
		'73' => 'BV',
		'74' => 'BW',
		'75' => 'BX',
		'76' => 'BY',
		'77' => 'BZ'		
	);
}