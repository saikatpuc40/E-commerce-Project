<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{asset('home/css/dashboardCard.css')}}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    @include('admin.navsidebar')
    <div class="container">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            Details
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card text-white bg-primary" style="width: 12rem;">
                                        <div class="card-body">
                                            <p class="card-text">Total Products: <br> {{$productCount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-success" style="width: 12rem;">
                                        <div class="card-body">
                                            <p class="card-text">Total Orders: <br>{{$orderCount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-info" style="width: 12rem;">
                                        <div class="card-body">
                                            <p class="card-text">Total Customers:<br> {{$userCount}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="card text-white bg-danger" style="width: 12rem;">
                                        <div class="card-body">
                                            <p class="card-text">Total Revenue:<br> {{$revenueCount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-warning" style="width: 12rem;">
                                        <div class="card-body">
                                            <p class="card-text">Order Delivered: <br>{{$deliveryCount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white bg-secondary" style="width: 12rem;">
                                        <div class="card-body">
                                            <p class="card-text">Order Processing:<br> {{$processingCount}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>