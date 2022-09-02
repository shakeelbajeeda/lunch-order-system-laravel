<!-- Header Start here -->
<style>
@media only screen and (max-width:768px) {
    .navbar {
        background: white;
    }
    .auth {
        margin-bottom: 8px;
    }

}
</style>
<div class="position-absolute fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid mx-md-5">
            <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"  style="height: 40px;" class="d-inline-block align-top" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item"><a class="nav-link text-dark active" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="menu.html">Menu</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{route('products.index')}}">Master Food & Beverage </a></li>
                    @if(auth()->check())
                    @if(auth()->user()->role == 'director')
                    <li class="nav-item"><a href="" class="nav-link text-dark">Dashboard</a></li>
                    @elseif(auth()->user()->role == 'user')
                        <li class="nav-item"><a href="" class="nav-link text-dark">Dashboard</a></li>
                    @endif
                    <div class="float-end">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <li class="nav-item ms-5"><button type="submit"  class="btn-style text-decoration-none rounded-pill me-3"><i class="fa fa-lock me-2"></i> Logout</button></li>
                        </form>
                    </div>
                    @else
                        <li class="nav-item"><a href="{{route('login')}}"   class="btn-style auth text-decoration-none rounded-pill"><i class="fa fa-lock me-2"></i> Login</a></li>
                        <li class="nav-item"><a href="{{route('register')}}"  class="btn-style auth text-decoration-none rounded-pill ms-3"><i class="fa fa-user me-2"></i> Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Header End Here -->
