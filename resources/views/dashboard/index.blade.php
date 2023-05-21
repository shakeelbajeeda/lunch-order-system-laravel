@extends('layouts.dashboard')
@section('content')
    <div class="container">
        @if(auth()->user()->user_type !== 'service_manager')
        <div class="py-3 text-center h2 text-success">
            Market Price List
        </div>
        <div class="table-responsive table-success table-striped">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Energy Type</th>
                    <th>Market Price</th>
                    <th>Administration Fee</th>
                    <th>Tax</th>
                </tr>
                </thead>
                <tbody>
                @foreach($market_prices as $item)
                    <tr>
                        <td class="align-middle text-capitalize">{{ $item->energy_type }}</td>
                        <td class="align-middle">${{ $item->market_price }}</td>
                        <td class="align-middle">${{ $item->administration_fee }}</td>
                        <td class="align-middle">${{ $item->tax }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <!-- Trading History Chart -->
        <div class="card shadow my-4">
            <div class="card-header py-3 bg-success">
                <h6 class="m-0 font-weight-bold text-white">Traded Energy</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="trading-history"></canvas>
                </div>
            </div>
        </div>

        <!-- Trade Price Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-success">
                <h6 class="m-0 font-weight-bold text-white">Market Prices</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="market-price-change"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        let trading_history = {{ \Illuminate\Support\Js::from($weekly_statistics) }};
        let dates = [];
        let earnings = [];
        if (trading_history && trading_history.length) {
            trading_history.forEach(item => {
                dates.push(item.date);
                earnings.push(item.trading_price)
            })
        }
        let price_change_history = {{ \Illuminate\Support\Js::from($market_prices_graph_data) }} ;
        let price_dates = [];
        let prices_datasets = [];

        if (price_change_history && price_change_history.length) {
            price_change_history.forEach(item => {
                price_dates.push(item.date)
                if (item.history && item.history.length) {
                    item.history.forEach((h, index) => {
                        if (prices_datasets && prices_datasets.length) {
                            let findIndex = prices_datasets.findIndex(p => p.label == h.type);
                            if (findIndex !== -1) {
                                prices_datasets[findIndex].data.push(h.price);
                            } else {
                                let obj = {
                                    label: h.type,
                                    backgroundColor: '#4CAF50',
                                    hoverBackgroundColor: '#4CAF50',
                                    borderColor: '#4CAF50',
                                    data: [],
                                }
                                obj.data.push(h.price)
                                prices_datasets.push(obj)
                            }
                        } else {
                            let obj = {
                                label: h.type,
                                backgroundColor: '#4CAF50',
                                hoverBackgroundColor: '#4CAF50',
                                borderColor: '#4CAF50',
                                data: [],
                            }
                            obj.data.push(h.price)
                            prices_datasets.push(obj)
                        }
                    })
                }
            })
        }

        // Trading History Graph
        var ctx = document.getElementById("trading-history");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: "Traded Amount",
                    backgroundColor: "#4CAF50",
                    hoverBackgroundColor: "#4CAF50",
                    borderColor: "#4CAF50",
                    data: earnings,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 8,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });


        // Trade Price Graph
        var ctx = document.getElementById("market-price-change");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: prices_datasets,
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 8,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });
    </script>
@endsection
