<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Trading History</title>
</head>
<body>
<div class="table-responsive">
    <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Seller</th>
            <th>Buyer</th>
            <th>Type of Energy</th>
            <th>Energy Zone</th>
            <th>Purchased Volume</th>
            <th>Total Price</th>
            <th>Date of Trade</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="align-middle">{{ $order->energy_seller->user_name }}</td>
                <td class="align-middle text-capitalize">{{ $order->energy_buyer->user_name }}</td>
                <td class="align-middle text-capitalize">{{ $order->energy->all_energy_type->type }}</td>
                <td class="align-middle">{{ $order->energy_buyer->zone }}</td>
                <td class="align-middle">{{ $order->purchased_volume }} KWH</td>
                <td class="align-middle">${{ $order->total_price }}</td>
                <td class="align-middle">{{ date('d M, Y', strtotime($order->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
