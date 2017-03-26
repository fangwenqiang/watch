<?php
namespace app\lib;
/**
 * ���ﳵ�� Cookies ���棬��������Ϊ1�� ע�⣺���������֧��Cookie���ܹ�ʹ��
 * ��������Ⱥ��100352308
 */
class Cart {
	private $CartArray = array(); // ��Ź��ﳵ�Ķ�ά����
	private $CartCount; // ͳ�ƹ��ﳵ����
	public $Expires = 86400; // Cookies����ʱ�䣬���Ϊ0�򲻱��浽���� ��λΪ��
	/**
	 * ���캯�� ��ʼ������ ���$Id��Ϊ�գ���ֱ����ӵ����ﳵ
	 *
	 */
	public function __construct($Id = "",$Name = "",$Price1 = "",$Price2 = "",$Price3 = "",$Count = "",$Image = "",$Expires = 86400) {
		if ($Id != "" && is_numeric($Id)) {
			$this->Expires = $Expires;
			$this->addCart($Id,$Name,$Price1,$Price2,$Price3,$Count,$Image);
		}
	}
	/**
	 * �����Ʒ�����ﳵ
	 *
	 * @param int $Id ��Ʒ�ı��
	 * @param string $Name ��Ʒ���
	 * @param decimal $Price1 ��Ʒ�۸�
	 * @param decimal $Price2 ��Ʒ�۸�
	 * @param decimal $Price3 ��Ʒ�۸�
	 * @param int $Count ��Ʒ����
	 * @param string $Image ��ƷͼƬ
	 * @return �����Ʒ���ڣ�����ԭ���������ϼ�1��������false
	 */
	public function addCart($Id,$Name,$Price1,$Price2,$Price3,$Count,$Image='') {
		//�ж�cookie�й��ﳵ�����Ƿ��Ѵ���
		if(isset($_COOKIE['CartAPI'])){
			$this->CartArray = $this->CartView(); // ����ݶ�ȡ��д������
		}
		if ($this->checkItem($Id)) { // �����Ʒ�Ƿ����
			$this->ModifyCart($Id,$Count,0); // ��Ʒ������$Count
			return true;
		}
		$this->CartArray[0][$Id] = $Id;
		$this->CartArray[1][$Id] = $Name;
		$this->CartArray[2][$Id] = $Price1;
		$this->CartArray[3][$Id] = $Price2;
		$this->CartArray[4][$Id] = $Price3;
		$this->CartArray[5][$Id] = $Count;
		$this->CartArray[6][$Id] = $Image;

		return $this->save();
	}
	/**
	 * �޸Ĺ��ﳵ�����Ʒ
	 *
	 * @param int $Id ��Ʒ���
	 * @param int $Count ��Ʒ����
	 * @param int $Flag �޸����� 0���� 1:�� 2:�޸� 3:���
	 * @return ����޸�ʧ�ܣ��򷵻�false
	 */
	public function ModifyCart($Id, $Count, $Flag = "") {
		$tmpId = $Id;
		$this->CartArray = $this->CartView(); // ����ݶ�ȡ��д������
		$tmpArray = &$this->CartArray;  // ����
		if (!is_array($tmpArray[0])) return false;
		if ($Id < 1) {
			return false;
		}
		foreach ($tmpArray[0] as $item) {
			if ($item === $tmpId) {
				switch ($Flag) {
					case 0: // ������� һ��$CountΪ1
						$tmpArray[5][$Id] += $Count;
						break;
					case 1: // ��������
						$tmpArray[5][$Id] -= $Count;
						break;
					case 2: // �޸�����
						if ($Count == 0) {
							unset($tmpArray[0][$Id]);
							unset($tmpArray[1][$Id]);
							unset($tmpArray[2][$Id]);
							unset($tmpArray[3][$Id]);
							unset($tmpArray[4][$Id]);
							unset($tmpArray[5][$Id]);
							unset($tmpArray[6][$Id]);
							break;
						} else {
							$tmpArray[5][$Id] = $Count;
							break;
						}
					case 3: // �����Ʒ
						unset($tmpArray[0][$Id]);
						unset($tmpArray[1][$Id]);
						unset($tmpArray[2][$Id]);
						unset($tmpArray[3][$Id]);
						unset($tmpArray[4][$Id]);
						unset($tmpArray[5][$Id]);
						unset($tmpArray[6][$Id]);
						break;
					default:
						break;
				}
			}
		}
		return $this->save();
	}
	/**
	 * ��չ��ﳵ
	 *
	 */
	public function RemoveAll() {
		$this->CartArray = array();
		return $this->save();
	}
	/**
	 * �鿴���ﳵ��Ϣ
	 *
	 * @return array ����һ����ά����
	 */
	public function CartView() {
		if(empty($_COOKIE['CartAPI'])){
			return false;
		}else{
            $cookie = stripslashes($_COOKIE['CartAPI']);
			if (!$cookie) return false;
			$tmpUnSerialize = unserialize($cookie);
			return $tmpUnSerialize;
		}
	}
	/**
	 * ��鹺�ﳵ�Ƿ�����Ʒ
	 *
	 * @return bool �������Ʒ������true������false
	 */
	public function checkCart() {
		$tmpArray = $this->CartView();
		if($tmpArray){
			if (count($tmpArray[0]) < 1) {			
				return false;
			}
			return true;
		}else{
			return false;
		}
	}
	/**
	 * ��Ʒͳ��
	 *
	 * @return array ����һ����ά���飬��ÿ����Ʒ��idΪ��Ȼ���������ǲ�ͬ�۸���ܺͣ�numΪ��Ʒ����
	 */
	public function CountPrice() {
		$tmpArray = $this->CartArray = $this->CartView();
		$outArray = array(); //һά����
		$i = 0;
		if (is_array($tmpArray[0])) {
			foreach ($tmpArray[0] as $key=>$val) {
				$outArray[$key]['price1'] = $tmpArray[2][$key] * $tmpArray[5][$key];
				$outArray[$key]['price2'] = $tmpArray[3][$key] * $tmpArray[5][$key];
				$outArray[$key]['price3'] = $tmpArray[4][$key] * $tmpArray[5][$key];
				$outArray[$key]['num'] = $tmpArray[5][$key];
				$i++;
			}
		}

		return $outArray;
	}
	/**
	 * ͳ����Ʒ����
	 *
	 * @return int
	 */
	public function CartCount() {
		$tmpArray = $this->CartView();
		$tmpCount = count($tmpArray[0]);
		$this->CartCount = $tmpCount;
		return $tmpCount;
	}
	/**
	 * ������Ʒ ���ʹ�ù��췽�����˷�������ʹ��
	 *
	 */
	public function save() {
		$tmpArray = $this->CartArray;
		$tmpSerialize = serialize($tmpArray);

		return setcookie("CartAPI",$tmpSerialize,time()+$this->Expires);
	}
	/**
	 * ��鹺�ﳵ��Ʒ�Ƿ����
	 *
	 * @param int $Id
	 * @return bool ������ true ����false
	 */
	private function checkItem($Id) {
		$tmpArray = $this->CartArray;
		if (!isset($tmpArray[0])) return;
		foreach ($tmpArray[0] as $item) {
			if ($item === $Id) return true;
		}
		return false;
	}
}
?>