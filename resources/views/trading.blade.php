@extends('layouts.website')
@section('content')
    <div class="container">
        <section class="p-3 ">
            <h1 class="h2  text-center text-dark pt-4">Renewable Energies List</h1>
            @if(!empty($_GET['energy_type']) || !empty($_GET['zone']))
                <div class="text-center">
                    <a href="{{ route('trading') }}" class="btn btn-primary">Reset Search</a>
                </div>
            @endif
            <div class="energies mt-4 table-responsive pt-3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Seller</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Zone</th>
                        <th scope="col">Price</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Administration Fee</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @foreach($renewable_energies as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td class="text-capitalize">{{ $item->renewableEnergyType->energy_type }}</td>
                            <td>{{ $item->volume }} kWh</td>
                            <td>{{ $item->user->zone }}</td>
                            <td class="fw-bold">${{ $item->price }}</td>
                            <td class="fw-bold">${{ $item->renewableEnergyType->tax }}</td>
                            <td class="fw-bold">${{ $item->renewableEnergyType->administration_fee }}</td>
                            <td>
                                <button onclick="getItem({{ $item }})" class="btn btn-outline-success w-100" data-bs-toggle="modal"
                                        data-bs-target="#buyModal">Purchase</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Purchase Modal -->
    <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h1 class="modal-title fs-5" id="buyModalLabel">Purchase Available Volume</h1>
                </div>
                <form action="{{ route('order.index') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="zone" class="form-label w-100">Volume
                            <div class="input-group mb-3 w-100 mt-2">
                                <input type="hidden" id="renewable-energy-id" name="renewable_energy_id">
                                <input id="volume" onkeyup="updatePrice(this.value)" type="number" name="volume" class="form-control" placeholder="e.g, 100" aria-label="volume"
                                       aria-describedby="kwh-addon" required>
                            </div>
                            <div id="volume-error" class="d-none text-danger">Volume Limit Exceeds</div>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success" id="submit-btn">Pay <span id="payable-amount"></span></button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let renewable_energy = null;
        function updatePrice (value) {
            if(value) {
                if (value > Number(renewable_energy.volume) || Number(value) == 0) {
                    document.getElementById('submit-btn').classList.add('disabled');
                    document.getElementById('volume-error').classList.remove('d-none');
                } else {
                    document.getElementById('submit-btn').classList.remove('disabled');
                    document.getElementById('volume-error').classList.add('d-none');
                }
                if (value > 0) {
                    let amount = renewable_energy.price * value;
                    amount += Number(renewable_energy.renewable_energy_type.administration_fee) + Number(renewable_energy.renewable_energy_type.tax);
                    document.getElementById('payable-amount').innerHTML = '($'+amount+')';
                }
            } else {
                document.getElementById('payable-amount').innerHTML = '($0)';
            }
        }

        function getItem(item) {
            renewable_energy = item;
            document.getElementById('renewable-energy-id').value = item.id;
            document.getElementById('payable-amount').innerHTML = '($0)';
            document.getElementById('volume').value = null;
            document.getElementById('submit-btn').classList.remove('disabled');
            document.getElementById('volume-error').classList.add('d-none');
        }

        @if (session()->has('message'))
        Swal.fire(
            'Good job!',
            '{{ session()->get('message') }}',
            'success'
        )
        @endif
        @if (session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `{{ session()->get('error') }}`,
        })
        @endif
    </script>
@endsection
