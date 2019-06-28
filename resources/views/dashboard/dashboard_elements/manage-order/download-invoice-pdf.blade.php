<h1 align="center"><span style="color: #6610f2">Himel-</span><span style="color: red">Shop</span>'s Customer Order invoice</h1>
<br/>




<h3>Billing info : <span style="color: yellowgreen; margin-left: 250px;">Himel Shop's</span></h3>

<table  >

    <tr>
        <th style="color: #BF8020">Customer name</th>
        <td style="color: #0291df">: {{ $customer->first_name.' '.$customer->last_name }} <span style="color: #18C0DF; margin-left: 150px;">Habibadnan6854@gmail.com</span></td>
    </tr>
    <tr>
        <th style="color: #BF8020">Email</th>

        <td>: {{ $customer->email }}  <span style="color: #18C0DF; margin-left: 40px;">Mo: 01770936854</span></td>

    </tr>
    <tr>
        <th style="color: #BF8020">Mobile</th>
        <td>: {{ $customer->mobile }} <span style="color: #18C0DF; margin-left: 138px;">Nazim khan, Razarhat</span></td>
    </tr>

    <tr>
        <th style="color: #BF8020">Address</th>
        <td>: {{ $customer->address }} <span style="color: #18C0DF; margin-left: 163px;">Kurigram, Bangladesh</span></td>
    </tr>


</table>

<h3 style="margin-left: 300px; ">Shipping info :</h3>
<table style="margin-left: 250px; ">
    <tr>
        <th style="color: magenta">Customer name</th>
        <td style="color: #0291df">: {{ $shipping->full_name }}</td>
    </tr>
    <tr>
        <th style="color: magenta">Email</th>
        <td>: {{ $shipping->email }}</td>
    </tr>
    <tr>
        <th style="color: magenta">Mobile</th>
        <td>: {{ $shipping->mobile }}</td>
    </tr>
    <tr>
        <th style="color: magenta">Address</th>
        <td>: {{ $shipping->address }}</td>
    </tr>
</table>
<h3 >Product info : <span style="color: red; margin-left: 150px;">Order Date: {{ $order->created_at }}</span></h3>
<table width="80%" align="center" border="1px">

    <tr style="color: #fdfdfe;background-color: black">
        <th align="center">Sl</th>
        <th align="center" style="padding-left: 10px">Product name</th>
        <th align="center" style="padding-left: 10px">Product price</th>
        <th align="center" style="padding-left: 10px">Product photo</th>
        <th align="center" style="padding-left: 10px">Product Quantity</th>
        <th align="center" style="padding-left: 10px">Total</th>
    </tr>
    @php($i = 1)
    <?php $sum=0 ?>
    @foreach($orderDetails as $orderDetail)
        <tr>
            <td align="center" style="padding-left: 10px">{{ $i++ }}</td>
            <td align="center" style="padding-left: 10px">{{ $orderDetail->product_name }}</td>
            <td align="center" style="padding-left: 10px">{{ $orderDetail->product_price }} .Tk</td>
            <td align="center" style="padding-left: 10px">Empty</td>
            <td align="center" style="padding-left: 10px">{{ $orderDetail->product_quantity }}</td>
            <td align="center" style="padding-left: 10px;color: red; background-color: #d4edda">{{ $total=$orderDetail->product_price*$orderDetail->product_quantity }} .Tk</td>
        </tr>
        <?php $grandTotal=$sum+=$total ?>
    @endforeach


</table>
<br/>
<table style="padding-left: 340px">
    <tr>
        <th>Total Price</th>
        <td>: {{ $grandTotal }} .TK</td>
    </tr><tr>
        <th>Vat</th>
        <td>: 0</td>
    </tr><tr>
        <th>Delivery charge </th>
        <td>: 90 .Tk</td>
    </tr><tr>
        <th>Grand total</th>
        <td>: {{ $grandTotal+90 }} .Tk</td>
    </tr>

</table>

<p align="center" style="color: #0b2e13">** Thanks for stay with us ,we are ready to service our cliend in every moment. Customer satisfaction is our main priority .....</p>


