<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mail extends Fruitcrm {

	public function __construct() {
	    parent::__construct();
	    $this->load->library('email');
	}

	private function get_banners_by_lead_id($lead_id) {
		$banners = array();

		$query = $this->db->get_where("letters", array("lead_id" => $lead_id));
		if ($query->num_rows() > 0) {
			$letter = $query->row_array();
			$pre_banners = array();
			
			$sort_order = array();

			$places = array(
				'banners_main' => 1,
				'banners_standart' => 2,
				'banners_small_top' => 3,
				'banners_small_bottom' => 4
			);

			$limits = array(
				'banners_main' => 1,
				'banners_standart' => 6,
				'banners_small_top' => 1,
				'banners_small_bottom' => 1
			);

			foreach ($places as $place => $place_id) {
				$banners_id = unserialize($letter[$place]);

				$query = $this->db->select("*")->from("mail_banners")->where_in("banner_id",$banners_id)->where("type",$place_id)->order_by('rand()')->limit($limits[$place])->get();
				if ($query->num_rows() > 0) {
					$result = $query->result_array();
					shuffle($result);
					foreach($result as $row) {
						$pre_banners[$place][$row['banner_id']] = $row;
						$pre_banners[$place][$row['banner_id']]['image_file'] = ltrim($row['image_file'], "/");
						$sort_order[$row['banner_id']] = $row['sort_order'];
					}
				}
			}

			asort($sort_order);

			foreach ($sort_order as $banner_id => $value) {
				foreach ($pre_banners as $place => $place_banners) {					
					if(isset($place_banners[$banner_id])) {
						$banners[$place][] = $place_banners[$banner_id];
					}
				}
			}
		}

		return $banners;
	}
	
	public function send_order_email($order_id) {
		$this->load->model('order');
		$this->load->model('account');

		$order = new Order();
		$order->set_id($order_id);
		$order_data = $order->get_data();

		$account = new Account();
		$account->set_id($order_data['account_id']);
		$account_data = $account->get_data();

		$banners = $this->get_banners_by_lead_id(10);

		foreach ($banners as $place => $place_banners) {
			foreach ($place_banners as $banner_id => $banner) {
				$this->email->attach($banner['image_file']);
				$banners[$place][$banner_id]['cid'] = $this->email->attachment_cid($banner['image_file']);
			}
		}

		$this->email->attach('assets/img/emails/logoSmall.png');
		$this->email->attach('assets/img/emails/vk.jpg');
		$this->email->attach('assets/img/emails/fb.jpg');
		$this->email->attach('assets/img/emails/ok.jpg');
		$this->email->attach('assets/img/emails/tw.jpg');

		$logo_cid = $this->email->attachment_cid('assets/img/emails/logoSmall.png');
		$vk_cid = $this->email->attachment_cid('assets/img/emails/vk.jpg');
		$fb_cid = $this->email->attachment_cid('assets/img/emails/fb.jpg');
		$ok_cid = $this->email->attachment_cid('assets/img/emails/ok.jpg');
		$tw_cid = $this->email->attachment_cid('assets/img/emails/tw.jpg');

		$data = array(
			'name' => $account_data['name'],
			'order_id' => $order_data['order_id'],
			'logo_cid' => $logo_cid,
			'vk_cid' => $vk_cid,
			'fb_cid' => $fb_cid,
			'ok_cid' => $ok_cid,
			'tw_cid' => $tw_cid,
			'banners' => $banners
		);
		
		$subject = 'Заказ оформлен';
		$message = $this->load->view('emails/order', $data, true);

		if($this->send_email($account_data['email'],$subject,$message)) {
			return true;
		}

		return false;
	}
	
	public function send_reseted_password($account_id,$password) {
		$account = new Account();
		$account->set_id($account_id);
		$account_data = $account->get_data();

		$banners = $this->get_banners_by_lead_id(9);

		foreach ($banners as $place => $place_banners) {
			foreach ($place_banners as $banner_id => $banner) {
				$this->email->attach($banner['image_file']);
				$banners[$place][$banner_id]['cid'] = $this->email->attachment_cid($banner['image_file']);
			}
		}

		$this->email->attach('assets/img/emails/logoSmall.png');
		$this->email->attach('assets/img/emails/vk.jpg');
		$this->email->attach('assets/img/emails/fb.jpg');
		$this->email->attach('assets/img/emails/ok.jpg');
		$this->email->attach('assets/img/emails/tw.jpg');

		$logo_cid = $this->email->attachment_cid('assets/img/emails/logoSmall.png');
		$vk_cid = $this->email->attachment_cid('assets/img/emails/vk.jpg');
		$fb_cid = $this->email->attachment_cid('assets/img/emails/fb.jpg');
		$ok_cid = $this->email->attachment_cid('assets/img/emails/ok.jpg');
		$tw_cid = $this->email->attachment_cid('assets/img/emails/tw.jpg');

		$data = array(
			'email' => $account_data['email'],
			'password' => $password,
			'logo_cid' => $logo_cid,
			'vk_cid' => $vk_cid,
			'fb_cid' => $fb_cid,
			'ok_cid' => $ok_cid,
			'tw_cid' => $tw_cid,
			'banners' => $banners
		);

		$subject = 'Новый пароль для входа';
		$message = $this->load->view('emails/reset', $data, true);

		if($this->send_email($account_data['email'],$subject,$message)) {
			return true;
		}

		return false;
	}
	
	public function send_register_email($account_id,$password) {
		$account = new Account();
		$account->set_id($account_id);
		$account_data = $account->get_data();

		$banners = $this->get_banners_by_lead_id(8);

		foreach ($banners as $place => $place_banners) {
			foreach ($place_banners as $banner_id => $banner) {
				$this->email->attach($banner['image_file']);
				$banners[$place][$banner_id]['cid'] = $this->email->attachment_cid($banner['image_file']);
			}
		}

		$this->email->attach('assets/img/emails/logoSmall.png');
		$this->email->attach('assets/img/emails/vk.jpg');
		$this->email->attach('assets/img/emails/fb.jpg');
		$this->email->attach('assets/img/emails/ok.jpg');
		$this->email->attach('assets/img/emails/tw.jpg');

		$logo_cid = $this->email->attachment_cid('assets/img/emails/logoSmall.png');
		$vk_cid = $this->email->attachment_cid('assets/img/emails/vk.jpg');
		$fb_cid = $this->email->attachment_cid('assets/img/emails/fb.jpg');
		$ok_cid = $this->email->attachment_cid('assets/img/emails/ok.jpg');
		$tw_cid = $this->email->attachment_cid('assets/img/emails/tw.jpg');

		$data = array(
			'email' => $account_data['email'],
			'password' => $password,
			'logo_cid' => $logo_cid,
			'vk_cid' => $vk_cid,
			'fb_cid' => $fb_cid,
			'ok_cid' => $ok_cid,
			'tw_cid' => $tw_cid,
			'banners' => $banners
		);

		$subject = 'Новый пароль для входа';
		$message = $this->load->view('emails/reset', $data, true);

		if($this->send_email($account_data['email'],$subject,$message)) {
			return true;
		}

		return false;
	}	

	private function send_email($email,$subject,$message) {
		$this->email->from('info@aydaeda.ru', 'aydaeda.ru');
		$this->email->to($email);

		$this->email->subject($subject);
		$this->email->message($message);	
		
		$this->email->send();

		return true;		
	}
}