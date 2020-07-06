<?php
		class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
			
			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));

			
        foreach ($orders as $order) {
            $odr = $order['Order'];
            $order_details = $order['OrderDetail'];

            if ($odr['valid'] == 1) {
                $result = array();
                foreach($order_details as $order_detail) {
                    if ($order_detail['valid'] == 1) {
                        $quantity = $order_detail['quantity'];
                        $portion = $portions[$order_detail['item_id']-1];
                        $portion_details = $portion['PortionDetail'];
                     foreach ($portion_details as $portion_detail) {
                              $part = $portion_detail['Part'];
                         if (empty($result[$part['name']])) {
                                $result[$part['name']] = 0;
                            }$result[$part['name']] += $quantity * $portion_detail['value'];
                        }
                    }   
                }$order_reports[$order['Order']['name']] = $result;
            }
        }

			// To Do - write your own array in this format
			// $order_reports = array('Order 1' => array(
										// 'Ingredient A' => 1,
										// 'Ingredient B' => 12,
										// 'Ingredient C' => 3,
										// 'Ingredient G' => 5,
										// 'Ingredient H' => 24,
										// 'Ingredient J' => 22,
										// 'Ingredient F' => 9,
									// ),
								  // 'Order 2' => array(
								  		// 'Ingredient A' => 13,
								  		// 'Ingredient B' => 2,
								  		// 'Ingredient G' => 14,
								  		// 'Ingredient I' => 2,
								  		// 'Ingredient D' => 6,
								  	// ),
								// );

			// ...

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}
