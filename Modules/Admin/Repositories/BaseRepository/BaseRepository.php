<?php
namespace Modules\Admin\Repositories\BaseRepository;

use Illuminate\Support\Facades\Http;

class BaseRepository implements BaseRepositoryInterface
{
    
    

    // Constructor
    public function __construct() {
        $customer = Http::get('http://127.0.0.1:8000/api/author')->json();
        $diamondShell = Http::get('http://127.0.0.1:8000/api/author')->json();
        $employee = Http::get('http://127.0.0.1:8000/api/author')->json();
        $diamondPriceList = Http::get('http://127.0.0.1:8000/api/author')->json();
        $exDiamond = Http::get('http://127.0.0.1:8000/api/author')->json();
        $mainDiamond =Http::get('http://127.0.0.1:8000/api/author')->json();
        $order = Http::get('http://127.0.0.1:8000/api/author')->json();
        $orderDetail = Http::get('http://127.0.0.1:8000/api/author')->json();
        $payment = Http::get('http://127.0.0.1:8000/api/author')->json();
        $product = Http::get('http://127.0.0.1:8000/api/author')->json();
        $rewardPoint = Http::get('http://127.0.0.1:8000/api/author')->json();
        $role = Http::get('http://127.0.0.1:8000/api/author')->json();
        $warrantyCetificate = Http::get('http://127.0.0.1:8000/api/author')->json();
    }

    private $customer, $diamondShell, $employee, $diamondPriceList, $exDiamond, $mainDiamond, 
    $order, $orderDetail, $payment, $product, $rewardPoint, $role, $warrantyCetificate;

    public function getCustomer() {
        return $this->customer;
    }
    public function getDiamondShell() {
        return $this->diamondShell;
    }
    public function getEmployee() {
        return $this->employee;
    }
    public function getDiamondPriceList() {
        return $this->diamondPriceList;
    }
    public function getExDiamond() {
        return $this->exDiamond;
    }
    public function getMainDiamond() {
        return $this->mainDiamond;
    }
    public function getOrder() {
        return $this->order;
    }
    public function getOrderDetail() {
        return $this->orderDetail;
    }
    public function getPayment() {
        return $this->payment;
    }
    public function getProduct() {
        return $this->product;
    }
    public function getRewardPoint() {
        return $this->rewardPoint;
    }
    public function getRole() {
        return $this->role;
    }
    public function getWarrantyCetificate() {
        return $this->warrantyCetificate;
    }
    
    





}