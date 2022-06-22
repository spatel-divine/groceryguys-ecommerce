
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <style>
 html {
    width: 180px;
}
  * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 65px;
    max-width: 65px;
}

td.quantity,
th.quantity {
    width: 30px;
    max-width: 30px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}  </style>
    </head>
    <body>
        <div class="ticket" align="center">
            <img src="{{url($logo->icon)}}" alt="app-logo" style="width:40px"/>
            <p class="centered">ADDRESS-
            <p> <b>Name</b> : {{$order->name}}<br>
            <b>Address</b> : {{$order->house_no}},{{$order->society}},{{$order->landmark}},{{$order->city}},{{$order->state}},{{$order->pincode}}</br>
            <b>Email</b> : {{$order->email}}</br>
            <b>Phone</b> : {{$order->user_phone}}</br>
        </p></p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity" align="left">#</th>
                        <th class="description" align="left">Item</th>
                        <th class="price" align="left">Qty</th>
                        <th class="price" align="left">Price</th>
                    </tr>
                </thead>
                <tbody>
                     @if(count($details)>0)
                          @php $i=1; @endphp
                          @foreach($details as $detail)
                          
							<tr class="service">
							     <td class="quantity" align="left">{{$i}}</td>
								<td class="description" align="left">{{$detail->product_name}}(<b>{{$detail->quantity}} {{$detail->unit}})</b></td>
								<td class="price" align="left">{{$detail->qty}}</td>
								<td class="price" align="left">{{$detail->price}}</td>
							</tr>
							   @php $i++; @endphp
                        @endforeach
                      @else
                        <tr>
                          <td>No data found</td>
                        </tr>
                      @endif  
                      <tr class="service">
							     <td class="quantity"></td>
								<td class="description"><b>Total PRICE</b></td>
								<td class="price"></td>
								<td class="price">{{$order->total_price}}</td>
							</tr>
							
					<tr class="service">
							     <td class="quantity"></td>
								<td class="description"><b>Delivery Charge</b></td>
								<td class="price"></td>
								<td class="price">{{$order->delivery_charge}}</td>
							</tr>
							
					<tr class="service">
							     <td class="quantity"></td>
								<td class="description"><b>Paid By Wallet</b></td>
								<td class="price"></td>
								<td class="price">{{$order->paid_by_wallet}}</td>
							</tr>
					<tr class="service">
							     <td class="quantity"></td>
								<td class="description"><b>Coupon Discount</b></td>
								<td class="price"></td>
								<td class="price">{{$order->coupon_discount}}</td>
							</tr>
					<tr class="service">
							     <td class="quantity"></td>
								<td class="description"><b>Remaining Price</b></td>
								<td class="price"></td>
								<td class="price">{{$order->rem_price}}</td>
							</tr>
                      
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script>const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});</script>
    </body>
</html>