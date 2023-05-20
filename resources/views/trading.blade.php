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
                        <th scope="col">Seller Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Energy Type</th>
                        <th scope="col">Net Volume</th>
                        <th scope="col">Zone</th>
                        <th scope="col">Price</th>
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
                            <td class="fw-bold text-success">${{ $item->price }}</td>
                            <td>
                                <button onclick="getItem({{ $item }})" class="btn btn-outline-secondary w-100" data-bs-toggle="modal"
                                        data-bs-target="#buyModal">Buy</button></td>
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
                <div class="modal-header bg-dark text-white">
                    <h1 class="modal-title fs-5" id="buyModalLabel">Purchase Details</h1>
                </div>
                <form action="{{ route('order.index') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="zone" class="form-label w-100">Volume
                            <div class="input-group mb-3 w-100 mt-2">
                                <input type="hidden" id="renewable-energy-id" name="renewable_energy_id">
                                <input id="volume" onkeyup="updatePrice(this.value)" type="number" name="volume" class="form-control" placeholder="25" aria-label="volume"
                                       aria-describedby="kwh-addon" required>
                                <span class="input-group-text" id="kwh-addon">kWh</span>
                            </div>
                            <div id="volume-error" class="d-none text-danger">The volume cannot greater than available energy volume</div>
                        </label>
                        <label for="zone" class="form-label w-100">Payable Amount
                            <div class="input-group mb-3 w-100 mt-2">
                                <span class="input-group-text" id="kwh-addon">$</span>
                                <input id="payable-amount" readonly type="text" class="form-control" placeholder="0">
                            </div>
                        </label>
                        The Administration Fee and Tax automatically added.
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark" id="submit-btn">Confirm Purchase</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
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
                    document.getElementById('payable-amount').value = amount;
                }
            } else {
                document.getElementById('payable-amount').value = 0;
            }
        }

        function getItem(item) {
            renewable_energy = item;
            document.getElementById('renewable-energy-id').value = item.id;
            document.getElementById('payable-amount').value = null;
            document.getElementById('volume').value = null;
            document.getElementById('submit-btn').classList.remove('disabled');
            document.getElementById('volume-error').classList.add('d-none');
        }

        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        @if (session()->has('message'))
        toastMixin.fire({
            animation: true,
            title: '{{ session()->get('message') }}'
        });
        @endif
        @if (session()->has('error'))
        toastMixin.fire({
            animation: true,
            icon: 'error',
            title: '{{ session()->get('error') }}'
        });
        @endif
    </script>
@endsection
