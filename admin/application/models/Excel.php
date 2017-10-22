<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Excel extends Fruitcrm {
	
 	function __construct() {
    	parent::__construct();
		$this->load->library('excellib');
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
		'25' => 'Z'
	);
	
	public function download($table_name,$where = false) {
		$category_names = array();
		
		$query = $this->db->select('category_id,title')->from('categories')->get();
		
		if ($query->num_rows() > 0) {
			foreach($query->result_array() as $row) {
				$category_names[$row['category_id']] = $row['title'];
			}
		}

		$fields = $this->db->list_fields($table_name);
		
		$query = $this->db->select("*")->from($table_name);
		
		if($where) {
			$query = $query->where($where[0],$where[1]);
		}
		
		$query = $query->get();
		
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
		}
		
		$this->excellib;
		$this->excellib->setActiveSheetIndex(0);
		$this->excellib->getActiveSheet()->setTitle($table_name);
		
		$j = 0;
		
		for($i = 0 ; $i <= count($fields)+2 ; $i++ ) {
			
			if(isset($fields[$j])) {
				$this->excellib->getActiveSheet()->setCellValue($this->_chars[$i].'1', $fields[$j]);
			} else {
				$this->excellib->getActiveSheet()->setCellValue($this->_chars[$i].'1', 'delete');
			}
			
			$this->excellib->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setAutoSize( true );
			$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setSize(13);
			$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setBold(true);	
			$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cccccc');
			
			if(isset($fields[$j])) {
				if($fields[$j] == 'product_id' and $table_name == 'products') {
					
					$i++;
					
					$this->excellib->getActiveSheet()->setCellValue($this->_chars[$i].'1', 'categories');
					
					$this->excellib->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setAutoSize( true );
					$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setSize(13);
					$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setBold(true);	
					$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cccccc');
					
					$categories_index = $i;
				}
				
				if($fields[$j] == 'percent' and $table_name == 'products') {
					
					$i++;
					
					$this->excellib->getActiveSheet()->setCellValue($this->_chars[$i].'1', 'auto_price');
					
					$this->excellib->getActiveSheet()->getColumnDimension( $this->_chars[$i] )->setAutoSize( true );
					$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setSize(13);
					$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFont()->setBold(true);	
					$this->excellib->getActiveSheet()->getStyle($this->_chars[$i].'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cccccc');
					
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
							
							$query = $this->db->select('category_id')->from('product_to_category')->where('product_id', $row['product_id'])->get();
							
							if ($query->num_rows() > 0) {
								foreach($query->result_array() as $product) {
									$categories[] = $category_names[$product['category_id']];
								}
							}
							
							$this->excellib->getActiveSheet()->setCellValue($this->_chars[$i].$j, (count($categories) > 0 ? implode(';',$categories) : ''));
							$i++;
						}
					}
					
					if(isset($auti_price_index)) {
						if($auti_price_index == $i) {
							
							$auto_price = (($row['cost']*$row['percent'])/100) + $row['cost'];

							$this->excellib->getActiveSheet()->setCellValue($this->_chars[$i].$j, $auto_price);
							$i++;
						}
					}					
					
					$this->excellib->getActiveSheet()->setCellValue($this->_chars[$i].$j, $cell);					
					$i++;
				}
				
				$j++;
			}
		}
		
		
		$filename='products.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache	
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excellib, 'Excel5');
		$objWriter->save('php://output');		
	}
	
	public function upload($filename) {
		$query = $this->db->select('category_id,title')->from('categories')->get();
		
		if ($query->num_rows() > 0) {
			foreach($query->result_array() as $row) {
				$category_names[$row['title']] = $row['category_id'];
			}
		}		
		
		
		$objPHPExcel = PHPExcel_IOFactory::load($filename);
		
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			$table_name = $worksheet->getTitle();
			
			foreach ($worksheet->getCellCollection() as $cell) {
				
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				
				if ($row == 1) {
					$header[$table_name][$row][$column] = $data_value;
				} else {
					$data[$table_name][$row][$column] = $data_value;
				}				
			}
		}
		
		foreach($data as $table_name => $table) {
			foreach($table as $row) {
				
				$insert = array();
				$categories = array();
				
				foreach($header[$table_name][1] as $index => $value) {
					
					if($index == "A") {
						if(isset($row[$index])) {
							$element_id_name = $value;
							$element_id = $row[$index];
						} else {
							$element_id_name = $value;
							$element_id = 0;							
						}
					}

					if($value == 'categories') {
						$this->db->delete('product_to_category', array('product_id' => $element_id));
						
						if(isset($row[$index])) {
							foreach(explode(';',$row[$index]) as $category_title) {
								$categories[] = $category_names[$category_title];
							}
						}
						
						continue;	
					}
					
					if($value == 'auto_price') {
						continue;	
					}					
					
					if(isset($row[$index])) {
						$insert[$value] = $row[$index];
					} else {
						$insert[$value] = NULL;
					}
				}
				
				if($insert['delete']=='1') {
					$this->db->delete($table_name, array($element_id_name => $element_id));
					$this->db->delete('product_to_category', array('product_id' => $element_id));
					continue;
				}
				
				unset($insert['delete']);
				unset($insert[$element_id_name]);
				
				if(count($insert) > 0) {
					$query = $this->db->get_where($table_name, array($element_id_name => $element_id));
					if ($query->num_rows() > 0) {
						$this->db->update($table_name, $insert, array($element_id_name => $element_id));
					} else {						
						$this->db->insert($table_name, $insert);
						$element_id = $this->db->insert_id();
					}
				}
				
				if(count($categories) > 0) {
					foreach($categories as $category_id) {
						
						$ptc = array(
							'product_id' => $element_id,
							'category_id' => $category_id
						);
						
						$this->db->insert('product_to_category', $ptc);
					}
				}
			}
		}
	}
}