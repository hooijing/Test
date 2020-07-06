<?php
		class MigrationController extends AppController{
		public function q1(){
			
		$this->setFlash('Question: Migration of data to multiple DB table');
				$this->loadModel('Member');
				$this->loadModel('Transaction');
				$this->loadModel('TransactionItem');	
	
		if(isset($this->request->data['MigrateFile'])) {
			ini_set('auto_detect_line_endings', true);
			
			$file = $this->request->data['MigrateFile']['file'];
			
			$filename = $this->request->data['MigrateFile']['file']['type'];
			
			$mimes = array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','text/plain','text/csv','text/tsv');
		
		if(in_array($filename, $mimes)){
			        $content = array(); 
				$handle  = fopen($file['tmp_name'], 'r'); 
				$row = 0;
				while(($data  = fgetcsv($handle, 0, ",")) !== false) {
					if ($row !== 0) {$content[] = array(
							           'Member' => $data[0],
							           'Transaction' => $data[1],
								   'TransactionItem' => $data[2]);
					}$row ++;
				}$this->Member->saveAll($content, array('deep' => true));
			}
			else {
					$this->setFlash("unavailable");
				}
			}
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
		public function q1_instruction(){

			$this->setFlash('Question: Migration of data to multiple DB table');
				
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
	}
