<?php
namespace lccong\EasyTBK\SuNing\Request\Netalliance;

use lccong\EasyTBK\SuNing\SuningRequest;
use lccong\EasyTBK\SuNing\RequestCheckUtil;

/**
 * 苏宁开放平台接口 -
 *
 * @author suning
 * @date   2019-11-6
 */
class InverstmentcategoryidQueryRequest  extends SuningRequest{

	public function getApiMethodName(){
		return 'suning.netalliance.inverstmentcategoryid.query';
	}

	public function getApiParams(){
		return $this->apiParams;
	}

	public function check(){
		//非空校验
	}

	public function getBizName(){
		return "queryInverstmentcategoryid";
	}

}

?>
