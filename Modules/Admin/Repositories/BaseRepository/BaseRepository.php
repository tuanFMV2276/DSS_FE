<?php
namespace Modules\Admin\Repositories\BaseRepository;

use Illuminate\Support\Facades\Http;

class BaseRepository implements BaseRepositoryInterface
{
    private $customer, $diamondShell, $employee, $diamondPriceList, $exDiamond, $mainDiamond, 
    $order, $orderDetail, $payment, $product, $rewardPoint, $role, $warrantyCetificate, $user;

    // Constructor
    public function __construct() {
        $customer = Http::get('http://127.0.0.1:8000/api/customer')->json();
        $diamondShell = Http::get('http://127.0.0.1:8000/api/diamondshell')->json();
        $employee = Http::get('http://127.0.0.1:8000/api/employee')->json();
        $diamondPriceList = Http::get('http://127.0.0.1:8000/api/diamondpricelist')->json();
        $exDiamond = Http::get('http://127.0.0.1:8000/api/exdiamond')->json();
        $mainDiamond =Http::get('http://127.0.0.1:8000/api/maindiamond')->json();
        $order = Http::get('http://127.0.0.1:8000/api/order')->json();
        $orderDetail = Http::get('http://127.0.0.1:8000/api/orderdetail')->json();
        $payment = Http::get('http://127.0.0.1:8000/api/payment')->json();
        $product = Http::get('http://127.0.0.1:8000/api/product')->json();
        $rewardPoint = Http::get('http://127.0.0.1:8000/api/rewardpoint')->json();
        $role = Http::get('http://127.0.0.1:8000/api/role')->json();
        $warrantyCetificate = Http::get('http://127.0.0.1:8000/api/warrantycertificate')->json();
        $user = Http::get('http://127.0.0.1:8000/api/user')->json();
    }


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
    
    public function getUser() {
        return $this->user;
    }





}