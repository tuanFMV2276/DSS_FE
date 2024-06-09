<?php
namespace Modules\Admin\Repositories\BaseRepository;

interface BaseRepositoryInterface 
{
    public function getCustomer();
    public function getDiamondShell();
    public function getEmployee();
    public function getDiamondPriceList();
    public function getExDiamond();
    public function getMainDiamond();
    public function getOrder();
    public function getOrderDetail();
    public function getPayment();
    public function getProduct();
    public function getRewardPoint();
    public function getRole();
    public function getWarrantyCetificate();
}