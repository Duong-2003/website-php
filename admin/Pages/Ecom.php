<?php
include_once('./MenuAdmin.php');
?>
<style>
    .col-xl-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 41.66666667%;
    }

    .row {
        --ct-gutter-x: 1.5rem;
        --ct-gutter-y: 0;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--ct-gutter-y));
        margin-right: calc(-.5 * var(--ct-gutter-x));
        margin-left: calc(-.5 * var(--ct-gutter-x));
    }

    .col-sm-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 50%;
    }

    .widget-flat {
        position: relative;
        overflow: hidden;
    }

    .card-body {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: var(--ct-card-spacer-y) var(--ct-card-spacer-x);
        color: var(--ct-card-color);
    }

    .float-end {
        float: right !important;
    }

    .text-muted {
        --ct-text-opacity: 1;
        color: var(--ct-secondary-color) !important;
    }

    .mb-3 {
        margin-bottom: 1.5rem !important;
    }

    .text-muted {
        --ct-text-opacity: 1;
        color: var(--ct-secondary-color) !important;
    }

    .text-success {
        --ct-text-opacity: 1;
        color: rgba(var(--ct-success-rgb), var(--ct-text-opacity)) !important;
    }

    .text-nowrap {
        white-space: nowrap !important;
    }
</style>

<script>
    var myDiv = document.getElementById("Ecom");
    myDiv.classList.add("active");
</script>
<div class="col-xl-5 col-lg-6">
    <div>Đơn hàng</div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card widget-flat">
                <div class="card-body text-bg-info">
                    <div class="float-end">
                        <i class="mdi mdi-account-multiple widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Số lượng đơn</h5>
                    <h3 class="mt-3 mb-3">36,254</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-sm-4">
            <div class="card widget-flat">
                <div class="card-body text-bg-warning">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Chờ xác nhận</h5>
                    <h3 class="mt-3 mb-3">5,543</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->


        <div class="col-sm-4">
            <div class="card widget-flat">
                <div class="card-body text-bg-danger">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Đơn hủy</h5>
                    <h3 class="mt-3 mb-3">5,543</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->

    <div>Sản phẩm</div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card widget-flat">
                <div class="card-body text-bg-info">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Số sản phẩm</h5>
                    <h3 class="mt-3 mb-3">$6,254</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-sm-4">
            <div class="card widget-flat">
                <div class="card-body text-bg-danger">
                    <div class="float-end">
                        <i class="mdi mdi-pulse widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Growth">Sản phẩm hết</h5>
                    <h3 class="mt-3 mb-3">+ 30.56%</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-sm-4">
            <div class="card widget-flat">
                <div class="card-body text-bg-success">
                    <div class="float-end">
                        <i class="mdi mdi-pulse widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Growth">Sản phẩm còn</h5>
                    <h3 class="mt-3 mb-3">+ 30.56%</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div> <!-- end row -->

    <div>Người dùng</div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card widget-flat">
                <div class="card-body text-bg-info">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Số tài khoản</h5>
                    <h3 class="mt-3 mb-3">$6,254</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                        <span class="text-nowrap">Since last month</span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
</div>