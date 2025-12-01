<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{env('APP_NAME')}} - Checkout</title>
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
                    
                    <!-- LEFT CONTENT -->
                    <div class="col-lg-8 col-md-12">

                        <!-- CARD DATA USER -->
                        <div class="card mb-3 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">📍 Data Pembeli</h5>

                                <p class="mb-1 fw-bold" id="userName">Nama Pembeli</p>
                                <p class="mb-1" id="userAddress">Alamat Pembeli ...</p>

                                <a class="btn btn-outline-primary btn-sm mt-2">Ganti</a>
                            </div>
                        </div>

                        <!-- CARD LIST ITEM -->
                        <div class="card mb-3 shadow-sm border-0">
                            <div class="card-body">

                                <h5 class="fw-bold mb-3">🛒 List Item</h5>

                                <div id="cartList"></div>

                            </div>
                        </div>

                    </div>

                    <!-- RIGHT CONTENT - TOTAL -->
                    <div class="col-lg-4 col-md-12">
                        <div class="card shadow-sm border-0 position-sticky" style="top: 90px">

                            <div class="card-body">
                                <h5 class="fw-bold mb-3">Ringkasan Belanja</h5>

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Total Harga</span>
                                    <span id="totalPrice">Rp0</span>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label class="form-label fw-bold">Metode Pembayaran</label>
                                    <select id="paymentMethod" class="form-select">
                                        <option value="" selected disabled>Pilih metode pembayaran</option>
                                        <option value="QRIS">QRIS</option>
                                        <option value="VA">Virtual Account</option>
                                    </select>
                                </div>

                                <hr>

                                <button id="btnPayment"
                                        class="btn btn-success w-100 py-2 fw-bold"
                                        style="background-color:#81c408">
                                    Bayar Sekarang
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Cart Page End -->

        @include('includes.footer')
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
        <div class="modal fade" id="emailDialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Lengkapi data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Input email -->
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Alamat Email</label>
                            <input type="email" id="emailInput" class="form-control" placeholder="user@example.com">
                            <small id="emailError" class="text-danger d-none">Email tidak valid</small>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="btnSendEmail">Simpan</button>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="qrModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title">QR Code Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center">
                        {!! QrCode::size(220)->generate("Inicontoh ya") !!}
                        
                        <p class="mt-3">
                            <b>{{ "Inicontoh ya" }}</b>
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>

                </div>
            </div>
        </div>
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script id="itemTemplate" type="text/template">
        <div class="border rounded p-3 mb-3">

            <h6 class="fw-bold mb-3">
                <i class="fa fa-store text-primary me-2"></i> __STORE__
            </h6>

            <div class="d-flex">
                <img src="__IMAGE__" class="rounded border me-3" width="80" height="80">

                <div class="flex-fill">
                    <p class="fw-bold mb-1">__PRODUCT__</p>
                    <p class="text-muted mb-1">__VARIANT__</p>

                    <div class="d-flex justify-content-between">
                        <span>__QTY__ x Rp__PRICE__</span>
                        <span class="fw-bold">Rp__SUBTOTAL__</span>
                    </div>
                </div>
            </div>

        </div>
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // Ambil email dari session
        var email = "{{ session('email') }}";

        let emailModal = new bootstrap.Modal(document.getElementById('emailDialog'));
        let qrModal = new bootstrap.Modal(document.getElementById('qrModal'));

        // Render semua item dari localStorage
        function renderCartList() {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");
            let container = document.getElementById("cartList");
            let template = document.getElementById("itemTemplate").innerHTML;
            let html = "";
            let total = 0;

            cart.forEach(product => {
                console.log(product)
                product.attributes.forEach(attr => {
                    
                    if (!attr.checked) return;

                    let price = product.productBasicePrice + attr.itemAdjustPrice;
                    let subtotal = price * attr.qty;

                    total += subtotal;

                    html += template
                        .replace(/__STORE__/g, product.productStoreName)      // atau product.storeName kalau ada
                        .replace(/__IMAGE__/g, "{{env('API_IMAGE_URL')}}"+attr.itemImage)
                        .replace(/__PRODUCT__/g, product.productname)
                        .replace(/__VARIANT__/g, attr.itemName)
                        .replace(/__QTY__/g, attr.qty)
                        .replace(/__PRICE__/g, price.toLocaleString('id-ID'))
                        .replace(/__SUBTOTAL__/g, subtotal.toLocaleString('id-ID'));
                });
            });

            container.innerHTML = html;
            document.getElementById("totalPrice").innerHTML = "Rp " + total.toLocaleString("id-ID");
        }

        // Hitung total
        function updateSummary() {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");
            let total = 0;

            cart.forEach(p => {
                p.attributes.forEach(attr => {
                    if (attr.checked) {
                        total += (p.productBasicePrice + attr.itemAdjustPrice) * attr.qty;
                    }
                });
            });

            document.getElementById("totalPrice").innerText =
                "Rp" + Number(total).toLocaleString('id-ID');
        }

        // Ketika klik tombol Bayar
        document.getElementById("btnPayment").addEventListener("click", function () {
            let pm = document.getElementById("paymentMethod").value;

            if (pm === "") {
                alert("Silakan pilih metode pembayaran.");
                return;
            }else if (!email || email.trim() === "") {
                emailModal.show();
                return;
            }
        });

        // Tombol submit email
        document.getElementById("btnSendEmail").addEventListener("click", function () {
            let input = document.getElementById("emailInput").value;
            let err = document.getElementById("emailError");

            if (!input || !input.includes("@")) {
                err.classList.remove("d-none");
                return;
            }

            err.classList.add("d-none");

            email = input; // simpan ke variabel

            emailModal.hide();

            qrModal.show(); // lanjut ke QR
        });


        // Load pertama kali
        renderCartList();
        updateSummary();
    </script>



    <script type="module">
        // Render Tabel Cart
        import { apiFetch } from '/js/fetch.js';
        var email = "{{session('email')}}";
        let emailModal = new bootstrap.Modal(document.getElementById('emailDialog'));
        document.getElementById("btnPayment").addEventListener("click", function () {
            if(email=='')
            {
                emailModal.show();
                return
            }
        })

        if(email=='')
        {
            emailModal.show();
        }
    </script>

    </body>
</html>