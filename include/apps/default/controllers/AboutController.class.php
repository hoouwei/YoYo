<?php



/* 访问控制 */
defined('IN_ECTOUCH') or die('Deny Access');

class AboutController extends CommonController {

    public function map() {
        $address = I('get.address', '');
        if(empty($address)){
        	$province = model('RegionBase')->get_region_name(C('SHOP_PROVINCE'));
        	$city = model('RegionBase')->get_region_name(C('SHOP_CITY'));
            $address = C('CFG.SHOP_ADDRESS');
        }
        $this->assign('city', $city);
        $this->assign('address', $city . $address);
        $this->display('about_map.dwt');
    }

}
