@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <section class="p-3">
            <h1 class="h2  text-center text-dark pt-4">Trading Renewable Energies List</h1>
            <div class="energies mt-4 table-responsive pt-3">
                <table class="table table-hover table-striped table-bordered text-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Seller Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Zone</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @foreach($renewable_energies as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->user->email }}</td>
                            <td class="text-capitalize">{{ $item->renewableEnergyType->energy_type }}</td>
                            <td>{{ $item->volume }} kWh</td>
                            <td>{{ $item->user->zone }}</td>
                            <td class="fw-bold">${{ $item->price }}</td>
                            <td>
                                <button onclick="getItem({{ $item }})" class="btn btn-outline-success w-100" data-bs-toggle="modal"
                                        data-bs-target="#buyModal">
                                    Buy
                                </button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
{{----}}
    <!-- Purchase Modal -->
    <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h1 class="modal-title fs-5" id="buyModalLabel">Buy Energy</h1>
                </div>
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="zone" class="form-label w-100">Volume
                            <div class="input-group mb-3 w-100 mt-2">
                                <input type="hidden" id="renewable-energy-id" name="renewable_energy_id">
                                <input id="volume" type="number" name="volume" class="form-control" placeholder="enter volume" aria-label="volume"
                                       aria-describedby="kwh-addon" required>
                            </div>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success" id="submit-btn">Purchase <span id="payable-amount"></span></button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let renewable_energy = null;
        function getItem(item) {
            renewable_energy = item;
            document.getElementById('renewable-energy-id').value = item.id;
        }
    </script>
@endsection
