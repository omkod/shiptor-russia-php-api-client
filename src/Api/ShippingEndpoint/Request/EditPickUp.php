<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Pickup as EditPickUpResult;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest;

class EditPickUp extends GenericShippingRequest
{
    protected $name = "editPickUp";

    protected function initFields()
    {
        $this->getFieldsCollection()
        ->Number("id")->setRequired()->add()
        ->Number("warehouse_id")->setRequired()->add()
        ->String("date")->setRequired()->add()
        ->Number("time")->add()
        ->String("comment")->add()
        ->Number("packages")->setMulty()->setRequired()->add();
    }

    public function getResponseClassName()
    {
        return EditPickUpResult::class;
    }

    public function setId($id)
    {
        $this->setField("id", $id);
        return $this;
    }

    public function setWarehouse($warehouseId){
       return $this->setField("warehouse_id", $warehouseId);
    }

    public function setDate($date){
       $convertedDate = date("Y-m-d",strtotime($date));
       return $this->setField("date", $convertedDate);
    }

    public function setTime($time)
    {
       return $this->setField("time", $time);
    }

    public function setPackages($arPackages){
       return $this->setField("packages", (array)$arPackages);
    }

    public function setComment($comment){
       return $this->setField("comment", $comment);
    }
}

