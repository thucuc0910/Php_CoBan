<?php 

    function total_price($cart){
        $total_price =0;
        foreach($cart as $key => $value){
            $total_price += $value['quatity'] * $value['product_price'];
            //tong = sl * gia
        }
        return $total_price;
    }




?>