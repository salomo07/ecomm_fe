<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{env('APP_NAME')}} - Orders</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

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

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        @include('includes.header')


        <!-- Single Page Header start -->
        <div class="container-fluid py-5 ">
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-5 fruite">
            <div class="container py-4">
                <div class="row">
                    
                    <div id="cartList"></div>

                </div>
            </div>

        </div>
        <!-- Cart Page End -->

        @include('includes.footer')
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
        <script id="invoiceTemplate" type="text/template">
            <div class="card mb-4 shadow-sm border-0" data-invoiceid="__INVOICE_ID__" style="border-radius: 14px;">
                <div class="card-body">

                    <!-- Header Invoice -->
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h6 class="fw-bold mb-1">__INVOICE_NUMBER__</h6>
                            <small class="text-muted">__DATE__</small>
                        </div>

                        <div class="text-end">
                            <span class="text-muted small">Total Belanja</span><br>
                            <span class="fw-bold text-primary">Rp__TOTAL__</span>
                        </div>
                    </div>

                    <!-- List produk akan ditaruh di sini -->
                    <div class="invoice-items">
                        __ITEMS__
                    </div>

                    <div class="mt-3 text-end">
                        <button class="btn btn-sm btn-success">Kirim Email</button>
                    </div>

                </div>
            </div>
        </script>   
        <script id="itemTemplate" type="text/template">
            <div class="d-flex mb-3 clickable-item" >
                <img src="__IMAGE__"
                    class="rounded border me-3"
                    style="width: 70px; height: 70px; object-fit: cover;">
                <div class="flex-grow-1">
                    <p class="fw-bold mb-1">__PRODUCT__</p>
                    <p class="text-muted small mb-1">STORE: __STORE__</p>
                    <p class="text-muted small mb-1">SKU: __SKU__</p>

                    <div class="d-flex justify-content-between">
                        <span class="small text-muted">__QTY__ × Rp__PRICE__</span>
                        <span class="fw-bold text-primary">Rp__SUBTOTAL__</span>
                    </div>
                </div>
            </div>
        </script>
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="js/main.js"></script>
    <style>
        .card {
            cursor: pointer;
        }
    </style>
    <script type="module">
        import { apiFetch } from '/js/fetch.js';
        function getAllTransaction(){
            apiFetch("{{env('API_BASE_URL')}}order-transactions?id_user="+"{{session('id_user')}}",{},"GET").then(result => {
                console.log(result)
                if (result.success) {
                    renderInvoiceList(result.data);
                }
            }).catch(err => {
                console.error("API ERROR:", err);
            });
        }

        function formatRupiah(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        function renderInvoiceList(data) {
            const container = document.getElementById("cartList");
            container.innerHTML = "";

            const itemTpl = document.getElementById("itemTemplate").innerHTML;
            const invoiceTpl = document.getElementById("invoiceTemplate").innerHTML;

            data.forEach(invoice => {

                let itemsHTML = "";

                invoice.order_details.forEach(item => {
                    let row = itemTpl
                        .replace(/__STORE__/g, item.store.name)
                        .replace(/__IMAGE__/g, "{{env('API_IMAGE_URL')}}" + item.product_attribute.image || 'img/featur-1.jpg')
                        .replace(/__PRODUCT__/g, item.product.name)
                        .replace(/__SKU__/g, item.product.sku ?? "-")
                        .replace(/__QTY__/g, item.qty)
                        .replace(/__PRICE__/g, formatRupiah(item.product.basic_price))
                        .replace(/__SUBTOTAL__/g, formatRupiah(item.product.basic_price * item.qty));

                    itemsHTML += row;
                });

                // invoice header
                let html = invoiceTpl
                    .replace(/__INVOICE_NUMBER__/g, invoice.invoice_number)
                    .replace(/__INVOICE_ID__/g, invoice.id)
                    .replace(/__DATE__/g, new Date(invoice.created_at).toLocaleDateString('id-ID'))
                    .replace(/__TOTAL__/g, formatRupiah(invoice.final_amount))
                    .replace(/__ITEMS__/g, itemsHTML);

                container.innerHTML += html;
            });

            // 🔥 Tambahkan event click SETELAH semuanya di-render
            document.addEventListener("click", function (e) {
                const card = e.target.closest(".card");
                if (card && card.dataset.invoiceid) {
                    console.log("Invoice clicked:", card.dataset.invoiceid);
                    window.location.href='/orders?id='+card.dataset.invoiceid;
                }
            });
        }


        document.addEventListener("DOMContentLoaded", () => {
            getAllTransaction()            
        });
    </script>


    </body>
</html>