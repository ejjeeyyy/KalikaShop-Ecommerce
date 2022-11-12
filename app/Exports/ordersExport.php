<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderItem;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class ordersExport implements WithHeadings,FromCollection,WithColumnWidths,ShouldAutoSize
{

    /**
    * @return \Illuminate\Support\Collection
    */
   

    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 8,            
            'C' => 25,            
            'D' => 30,            
            'E' => 20,            
            'F' => 13,            
            'G' => 9,            
            'H' => 20,            
            'I' => 11,            
            'J' => 16,            
            'K' => 19,            
            'L' => 16,            
            'M' => 16,                       
            'N' => 11,            
            'O' => 16,            
            'P' => 8,            
            'Q' => 21,            
            'R' => 8,            
        ];
    }

    public function collection()
    {
        $ordersData = Order::all();
        // return $ordersData;

        foreach ($ordersData as $key => $value) {
            $orderItems = OrderItem::select('id','product_id', 'product_color_id', 'quantity','allocation_percentage', 'price')->where('order_id',$value['id'])->get();
            
            $order_id ="";
            $product_id ="";
            $product_color_id ="";
            $quantity ="";
            $allocation_percentage ="";
            $price ="";

            foreach ($orderItems as $item)
            {
                $product_id .= $item['product_id'].", ";
                $product_color_id .= $item['product_color_id'].", ";
                $quantity .= $item['quantity'].", ";
                $allocation_percentage .= "%".$item['allocation_percentage'].", ";
                $price .= $item['price'].", ";
            }
            $ordersData[$key]['product_id'] = $product_id;
            $ordersData[$key]['product_color_id'] = $product_color_id;
            $ordersData[$key]['quantity'] = $quantity;
            $ordersData[$key]['allocation_percentage'] = $allocation_percentage;
            $ordersData[$key]['price'] = $price;

            
        }
        return $ordersData;

    }

    public function headings():array
    {
        return
        [
            'Order Id',
            'User Id', 
            'Tracking No.', 
            'Fullname', 
            'Email', 
            'Phone', 
            'Zip Code', 
            'Address', 
            'Status', 
            'Payment Mode', 
            'Payment Id', 
            'Order Date', 
            'Updated On',
            'Product Id',
            'Product Color Id',
            'Quantity',
            'Allocation Percentage',
            'Price',
        ];
    }
}
