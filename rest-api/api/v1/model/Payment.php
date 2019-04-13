<?php

class Payment
{

    var $id;

    var $memo;

    var $amount;

    var $assetCode;

    var $assetIssuer;

    var $from;

    public function __construct($id, $memo, $amount, $assetCode, $assetIssuer, $from)
    {
        $this->id = $id;
        $this->memo = $memo;
        $this->amount = $amount;
        $this->assetCode = $assetCode;
        $this->assetIssuer = $assetIssuer;
        $this->from = $from;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMemo()
    {
        return $this->memo;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getAssetCode()
    {
        return $this->assetCode;
    }

    public function getAssetIssuer()
    {
        return $this->assetIssuer;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setMemo($memo)
    {
        $this->memo = $memo;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setAssetCode($assetCode)
    {
        $this->assetCode = $assetCode;
    }

    public function setAssetIssuer($assetIssuer)
    {
        $this->assetIssuer = $assetIssuer;
    }
}