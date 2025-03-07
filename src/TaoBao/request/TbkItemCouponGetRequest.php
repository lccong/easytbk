<?php

namespace lccong\EasyTBK\TaoBao\request;

use lccong\EasyTBK\TaoBao\RequestCheckUtil;
/**
 * TOP API: taobao.tbk.item.coupon.get request
 *
 * @author auto create
 * @since 1.0, 2017.06.28
 */
class TbkItemCouponGetRequest
{
    /**
     * 后台类目ID，用,分割，最大10个，该ID可以通过taobao.itemcats.get接口获取到
     **/
    private $cat;

    /**
     * 第几页，默认：1（当后台类目和查询词均不指定的时候，最多出10000个结果，即page_no*page_size不能超过10000；当指定类目或关键词的时候，则最多出100个结果）
     **/
    private $pageNo;

    /**
     * 页大小，默认20，1~100
     **/
    private $pageSize;

    /**
     * 三方pid，满足mm_xxx_xxx_xxx格式
     **/
    private $pid;

    /**
     * 1：PC，2：无线，默认：1
     **/
    private $platform;

    /**
     * 查询词
     **/
    private $q;

    private $apiParas = array();

    public function setCat($cat)
    {
        $this->cat = $cat;
        $this->apiParas["cat"] = $cat;
    }

    public function getCat()
    {
        return $this->cat;
    }

    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
        $this->apiParas["page_no"] = $pageNo;
    }

    public function getPageNo()
    {
        return $this->pageNo;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        $this->apiParas["page_size"] = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;
        $this->apiParas["pid"] = $pid;
    }

    public function getPid()
    {
        return $this->pid;
    }

    public function setPlatform($platform)
    {
        $this->platform = $platform;
        $this->apiParas["platform"] = $platform;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function setQ($q)
    {
        $this->q = $q;
        $this->apiParas["q"] = $q;
    }

    public function getQ()
    {
        return $this->q;
    }

    public function getApiMethodName()
    {
        return "taobao.tbk.item.coupon.get";
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function check()
    {

        RequestCheckUtil::checkNotNull ($this->pid, "pid");
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }
}
