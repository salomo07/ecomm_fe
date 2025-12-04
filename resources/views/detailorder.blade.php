<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}} - Orders</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .invoice-box {
            background: #fff;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
            max-width: 900px;
            margin: auto;
        }
        .invoice-box h2, .invoice-box h4 {
            margin: 0 0 10px 0;
        }
        .invoice-box table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .invoice-box table th, .invoice-box table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .invoice-box table th {
            background: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>

<body>

@include('includes.header')
<div class="container-fluid py-5"></div>
<div class="container-fluid py-5 fruite">
    <div class="container py-4">
        <div id="invoiceContainer"></div>
    </div>
</div>

@include('includes.footer')

<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>    
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script type="module">
import { apiFetch } from '/js/fetch.js';

var idorder = new URLSearchParams(window.location.search).get('id');

function renderInvoice(data) {
    const container = document.getElementById("invoiceContainer");

    const header = `
        <div class="invoice-box">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Invoice</h2>
                    <p><strong>Email:</strong> ${data.email}</p>
                    <p><strong>Shipping Address:</strong> ${data.user?data.user.receiver_name:''} - ${data.user?data.user.address_detail:''}</p>
                </div>
                <div>
                    <h4>${data.invoice_number}</h4>
                    <p><strong>Order ID:</strong> ${data.id}</p>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Store</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    ${data.order_details.map(item => {
                        const subtotal = item.qty * item.product.basic_price;
                        return `<tr>
                            <td>${item.product.name}</td>
                            <td>${item.store?item.store.name:''}</td>
                            <td>${item.qty}</td>
                            <td>Rp ${item.product.basic_price.toLocaleString()}</td>
                            <td>Rp ${subtotal.toLocaleString()}</td>
                        </tr>`;
                    }).join('')}
                </tbody>
            </table>
            <div class="text-right total">
                Total: Rp ${data.final_amount.toLocaleString()}
            </div>
        </div>
    `;

    container.innerHTML = header;
}

function loadDetailOrder (){
    apiFetch("{{env('API_BASE_URL')}}order?id_order="+idorder,"{}","GET")
        .then(result => {
            console.log(result.data);
            if(result.success){
                renderInvoice(result.data);
            }
        })
        .catch(err => {
            alert('Gagal memuat Order Detail: ' + JSON.stringify(err))
        });
}

loadDetailOrder();
</script>

</body>
</html>
