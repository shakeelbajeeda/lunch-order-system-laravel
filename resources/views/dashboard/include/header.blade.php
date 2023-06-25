<style>
    .br-15 {
        border-radius: 15px;
        list-style: none;
    }
</style>

<div class="mt-3">
    <div class="w-100 p-3 br-15" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" >
        <li class="bg-gradient-success br-15">
            <a class="nav-link text-white" href="{{ url('/dashboard') }}">
                Main Dashboard
            </a>
        </li>
        @auth
            @if(auth()->user()->role == 'service_manager')
                <li class="bg-gradient-success shadow mt-3 br-15">
                    <a class="nav-link text-white" href="{{ route('all-energy-types.index') }}">
                        Master Trading Page
                    </a>
                </li>
                <li class="bg-gradient-success shadow mt-3 br-15">
                    <a class="nav-link text-white" href="{{ route('users.index') }}">
                        User Management Page
                    </a>
                </li>
            @endif
            <li class="bg-gradient-success shadow mt-3 br-15">
                <a class="nav-link text-white" href="{{ route('energy.trade.history') }}">
                    Energy Trade History
                </a>
            </li>
            @if(auth()->user()->role !== 'buyer')
                <li class="bg-gradient-success shadow mt-3 br-15">
                    <a class="nav-link text-white" href="{{ route('energies.index') }}">
                        Manage Renewable Energy
                    </a>
                </li>
            @endif
            <li class="bg-gradient-success shadow mt-3 br-15">
                <a class="nav-link text-white" href="{{ url('/profile') }}">
                    Profile
                </a>
            </li>
            @if(auth()->user()->role == 'buyer')
            <li class="bg-gradient-success shadow mt-3 br-15">
                <a class="nav-link text-white" href="{{ url('/account') }}">
                    My Account Balance
                </a>
            </li>
            @endif
        @endauth
    </div>
</div>
