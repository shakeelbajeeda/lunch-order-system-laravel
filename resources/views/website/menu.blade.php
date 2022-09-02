@extends('layouts.website')
@section('content')
    <div class="header-bg vh-50 d-flex">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h4>Shop Opening Time: <span class="text-danger">9AM</span></h4>
                </div>
                <div class="col-6">
                    <h4 class="float-end">Shop Closing Time: <span class="text-danger">12PM</span></h4>
                </div>
                <div class="col-12">
                    <h1 class="text-center">Landscape Restaurant & Grill</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Start Here -->
    <section>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center fs-2">FOOD & BEVERAGE AVAILABLE AT THE SHOP</div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/1.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage Items</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/2.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage & Food</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/3.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage & Food</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/4.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage & Food</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/5.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage Items</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/6.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage Items</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/7.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage Items</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/8.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage Items</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/9.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage Items</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="card shadow-lg">
                        <div>
                            <img src="assets/images/products/1.jpg" width="100%" alt="product img">
                        </div>
                        <div class="card-body">
                            <div class="fs-4">Beverage Items</div>
                            <div class="fs-6 description">  Beverage Items Beverage Items</div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Qty:<input type="number" value="1" id="quantity" name="quantity"
                                               oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               min="1" style="width: 50px;" maxlength="2">
                                </div>
                                <div class="col-6">
                                    Price : $26.45
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <a href="" class="btn-style text-decoration-none rounded-pill"><i class="fa fa-shopping-cart me-2"></i> Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Section End Here -->
@endsection
