@extends('layouts.website')
@section('content')

    <main>
        <div class="container p-0 card w-75 position-absolute top-50 start-50 translate-middle border shadow ">
            <div class="btn-group btn-group-lg w" role="group" aria-label="Large button group">
                <button type="button" class="master btn btn-outline-dark active" data-name="admin">Admin Dashboard</button>
                <button type="button" class="master btn btn-outline-dark" data-name="trading">View Trading History</button>
            </div>
            <section class="manage p-3 ">
                <h1 class="h2 text-dark  p-3">Manage Renewable
                    Energy</h1>

                <div class="container-fluid mb-3">
                    <h2 class="h2 text-center fs-4 ">Renewable Energy</h2>
                    <div class="btn-group d-flex mt-4" role="group" aria-label="Basic example">
                        <button type="button" class="ms-2 btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#addRenewableModal">Add</button>
                        <button type="button" class="ms-2 btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editRenewableModal">Edit</button>
                        <button type="button" class="ms-2 btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#removeRenewableModal">Remove</button>
                    </div>

                    <h2 class="h2 text-center fs-4 mt-4">Update Charges</h2>
                    <div class="btn-group d-flex mt-4" role="group" aria-label="Basic example">
                        <button type="button" class="ms-2 btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#updateMarketPriceModal">Market Price</button>
                        <button type="button" class="ms-2 btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#updateAdminFeeModal">Administration
                            Fee</button>
                        <button type="button" class="ms-2 btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#updateTaxModal">Tax
                            Rate</button>
                    </div>
                </div>

            </section>
            <section class="sell p-3 d-none">
                <h2 class="h2 text-center text-dark">Trading History</h2>

                <p class="small">No current trading history</p>
            </section>

            <section class="modals">
                <!-- Add Renewable Modal -->
                <div class="modal fade" id="addRenewableModal" tabindex="-1" aria-labelledby="addRenewableModalLabel"
                     aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h1 class="modal-title fs-5" id="addRenewableModalLabel">New Renewable Energy Details</h1>

                            </div>
                            <div class="modal-body">
                                <label for="zone" class="form-label w-100">Name
                                    <div class="input-group mb-3 w-100 mt-2">
                                        <input type="text" class="form-control" placeholder="Solar" aria-label="type" required>
                                    </div>
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary">Add</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Renewable Modal -->
                <div class="modal fade" id="editRenewableModal" tabindex="-1" aria-labelledby="editRenewableModalLabel"
                     aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h1 class="modal-title fs-5" id="editRenewableModalLabel">Renewable Energy Details</h1>

                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Renewable Type</label>
                                    <select class="form-select" aria-label="Default select example" required>
                                        <option selected>Solar</option>
                                        <option value="1">Wind</option>
                                        <option value="2">Hydro</option>
                                    </select>
                                </div>
                                <label for="zone" class="form-label w-100">New Type Name
                                    <div class="input-group mb-3 w-100 mt-2">
                                        <input type="text" class="form-control" placeholder="Solar" aria-label="type" required>

                                    </div>
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary">Edit Renewable</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Remove Renewable Modal -->
                <div class="modal fade" id="removeRenewableModal" tabindex="-1" aria-labelledby="removeRenewableModalLabel"
                     aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h1 class="modal-title fs-5" id="removeRenewableModalLabel">Remove Renewable Energy</h1>

                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Renewable Type</label>
                                    <select class="form-select" aria-label="Default select example" required>
                                        <option selected>Solar</option>
                                        <option value="1">Wind</option>
                                        <option value="2">Hydro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary">Remove Renewable</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Market Price Modal -->
                <div class="modal fade" id="updateMarketPriceModal" tabindex="-1" aria-labelledby="updateMarketPriceModalLabel"
                     aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h1 class="modal-title fs-5" id="updateMarketPriceModalLabel">Update Market Price</h1>
                            </div>
                            <div class="modal-body">
                                <div class="input-group w-100">
                                    <div class="mb-3 w-100">
                                        <label for="type" class="form-label">Renewable Type</label>
                                        <select class="form-select" aria-label="Default select example" required>
                                            <option selected>Solar</option>
                                            <option value="1">Wind</option>
                                            <option value="2">Hydro</option>
                                        </select>
                                    </div>

                                    <label for="zone" class="form-label w-100">Price
                                        <div class="input-group mb-3 w-100 mt-2">
                                            <span class="input-group-text" id="kwh-addon">$</span>

                                            <input type="text" class="form-control" placeholder="550" aria-label="volume"
                                                   aria-describedby="kwh-addon" required>
                                        </div>
                                    </label>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary">Update Price</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Update Administration Fee Modal -->
                <div class="modal fade" id="updateAdminFeeModal" tabindex="-1" aria-labelledby="updateAdminFeeModalLabel"
                     aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h1 class="modal-title fs-5" id="updateAdminFeeModalLabel">New Admin Fee</h1>

                            </div>
                            <div class="modal-body">
                                <div class="mb-3">

                                    <label for="zone" class="form-label w-100">Fee
                                        <div class="input-group mb-3 w-100 mt-2">
                                            <span class="input-group-text" id="kwh-addon">$</span>

                                            <input type="text" class="form-control" placeholder="550" aria-label="volume"
                                                   aria-describedby="kwh-addon" required>
                                        </div>
                                    </label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary">Update Fee</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Tax Modal -->
                <div class="modal fade" id="updateTaxModal" tabindex="-1" aria-labelledby="updateTaxModalLabel"
                     aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h1 class="modal-title fs-5" id="updateTaxModalLabel">New Tax Rate</h1>

                            </div>
                            <div class="modal-body">
                                <label for="zone" class="form-label w-100">Tax Rate
                                    <div class="input-group mb-3 w-100 mt-2">
                                        <span class="input-group-text" id="kwh-addon">$</span>

                                        <input type="text" class="form-control" placeholder="2" aria-label="volume"
                                               aria-describedby="kwh-addon" required>
                                    </div>
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary">Update Tax</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
