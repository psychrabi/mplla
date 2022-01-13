<x-admin-layout>


    @includeIf("layouts.partials.heading",['header' => 'Dashboard'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- all in one -->
                    <div class="card card-primary card-outline">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button type="button" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="btn-group">
                                    <button
                                        type="button"
                                        class="btn btn-tool dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <div
                                        class="dropdown-menu dropdown-menu-end"
                                        role="menu"
                                    >
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item"
                                        >Something else here</a
                                        >
                                        <a class="dropdown-divider"></a>
                                        <a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-lte-toggle="card-collapse"
                                >
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-lte-toggle="card-maximize"
                                >
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-lte-dismiss="card-remove"
                                >
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Popularity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a href="pages/examples/invoice.html">OR9842</a>
                                        </td>
                                        <td>Call of Duty IV</td>
                                        <td>
                                            <span class="badge bg-success">Shipped</span>
                                        </td>
                                        <td>
                                            <div
                                                class="sparkbar"
                                                data-color="#00a65a"
                                                data-height="20"
                                            >
                                                90,80,90,-70,61,-83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="pages/examples/invoice.html">OR1848</a>
                                        </td>
                                        <td>Samsung Smart TV</td>
                                        <td>
                                            <span class="badge bg-warning">Pending</span>
                                        </td>
                                        <td>
                                            <div
                                                class="sparkbar"
                                                data-color="#f39c12"
                                                data-height="20"
                                            >
                                                90,80,-90,70,61,-83,68
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="pages/examples/invoice.html">OR7429</a>
                                        </td>
                                        <td>iPhone 6 Plus</td>
                                        <td>
                                            <span class="badge bg-danger">Delivered</span>
                                        </td>
                                        <td>
                                            <div
                                                class="sparkbar"
                                                data-color="#f56954"
                                                data-height="20"
                                            >
                                                90,-80,90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="pages/examples/invoice.html">OR7429</a>
                                        </td>
                                        <td>Samsung Smart TV</td>
                                        <td>
                                            <span class="badge bg-purple">Processing</span>
                                        </td>
                                        <td>
                                            <div
                                                class="sparkbar"
                                                data-color="#00c0ef"
                                                data-height="20"
                                            >
                                                90,80,-90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="pages/examples/invoice.html">OR1848</a>
                                        </td>
                                        <td>Samsung Smart TV</td>
                                        <td>
                                            <span class="badge bg-warning">Pending</span>
                                        </td>
                                        <td>
                                            <div
                                                class="sparkbar"
                                                data-color="#f39c12"
                                                data-height="20"
                                            >
                                                90,80,-90,70,61,-83,68
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="pages/examples/invoice.html">OR7429</a>
                                        </td>
                                        <td>iPhone 6 Plus</td>
                                        <td>
                                            <span class="badge bg-danger">Delivered</span>
                                        </td>
                                        <td>
                                            <div
                                                class="sparkbar"
                                                data-color="#f56954"
                                                data-height="20"
                                            >
                                                90,-80,90,70,-61,83,63
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="pages/examples/invoice.html">OR9842</a>
                                        </td>
                                        <td>Call of Duty IV</td>
                                        <td>
                                            <span class="badge bg-success">Shipped</span>
                                        </td>
                                        <td>
                                            <div
                                                class="sparkbar"
                                                data-color="#00a65a"
                                                data-height="20"
                                            >
                                                90,80,90,-70,61,-83,63
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a
                                href="javascript:void(0)"
                                class="btn btn-sm btn-primary float-start"
                            >Place New Order</a
                            >
                            <a
                                href="javascript:void(0)"
                                class="btn btn-sm btn-secondary float-end"
                            >View All Orders</a
                            >
                        </div>
                        <!-- /.card-footer -->
                    </div>

                    <!-- /.card -->
                </div>

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->


</x-admin-layout>
