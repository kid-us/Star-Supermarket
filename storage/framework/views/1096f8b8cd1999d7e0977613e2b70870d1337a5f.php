<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('Bootstrap/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('Css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Invoice</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center p-5 fw-semibold mt-5 shadow p-5 rounded">
            
            <div class="mt-2 w-75">
                <div class="float-start mb-3">
                    <h3 class="bi bi-cart-fill"> Shopify Mart</h3>
                </div>
                <div class="float-end mb-3">
                    <p class="small"><?php echo e(date('Y-m-d')); ?></p>
                </div>
            </div>

            <hr>

            
            <div class="col-4">
                <p>From</p>
                <h6>Shopify</h6>
                <p>Ethiopia Adama</p>
                <p>Phone: (+251) 937263698</p>
                <p>Email: shopify@gmail.com</p>
            </div>
            <div class="col-4">
                <p>To</p>
                <h6>Kidus</h6>
                <p>Address: Ethiopia</p>
                <p>Phone: (+251) 983274894</p>
                <p>Email: kidushh29@gmail.com</p>
            </div>
            <div class="col-4">
                <p>Invoice</p>
                <h6>#7632832</h6>
                <p>Payment Due: 2-12-2022</p>
                <p>Account: 424242442424242</p>
            </div>
            

            <hr>

            <div class="col-12 px-5 py-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            

        </div>

    </div>
</body>


</html>
<?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/invoice.blade.php ENDPATH**/ ?>