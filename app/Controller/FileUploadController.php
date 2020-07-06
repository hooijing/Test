<?php

class FileUploadController extends AppController {
	public function index() {

		$this->set('title', __('File Upload Answer'));
		
		if(isset($this->request->data['FileUpload'])) {
			ini_set('auto_detect_line_endings', true);

			$file = $this->request->data['FileUpload']['file'];
			
			$filename = $this->request->data['FileUpload']['file']['type'];
			
			$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
			
			if(in_array($filename, $mimes)){
				$content = array(); 
				$handle  = fopen($file['tmp_name'], 'r'); 
				$row = 0;
				while(($data  = fgetcsv($handle, 1000, ",")) !== false) {
					if ($row !== 0) {$content[] = array(
							           'name' => $data[0],
							           'email' => $data[1]);
					}$row ++;
				}$this->FileUpload->saveAll($content, array('deep' => true));
			} else {
				$this->setFlash("unavailable");
			}
		}
		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}
}
