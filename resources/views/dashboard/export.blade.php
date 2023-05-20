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
        <tr>en
            <th>Buyer Name</th>
            <th>Seller Name</th>
            <th>Energy Type</th>
            <th>Zone</th>
            <th>Volume</th>
            <th>Price</th>
            <th>Trade Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="align-middle text-capitalize">{{ $order->buyer->name }}</td>
                <td class="align-middle">{{ $order->seller->name }}</td>
                <td class="align-middle text-capitalize">{{ $order->renewableEnergy->renewableEnergyType->energy_type }}</td>
                <td class="align-middle">{{ $order->seller->zone }}</td>
                <td class="align-middle">{{ $order->volume }} KWH</td>
                <td class="align-middle">${{ $order->price }}</td>
                <td class="align-middle">{{ date('d M, Y', strtotime($order->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
