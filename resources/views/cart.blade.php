<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{env('APP_NAME')}} - Cart</title>
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
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle" style="border-color:#eee;">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 30%">Product</th>
                                <th style="width: 30%">Variant</th>
                                <th style="width: 10%">Pilih</th>
                                <th style="width: 20%">Qty</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cartTable" style="background: #fcfcff;"></tbody>
                    </table>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-white rounded shadow-sm p-4" id="summaryCard">

                            <h5 class="fw-bold mb-3">Total Belanja</h5>

                            <div class="d-flex justify-content-between mb-2">
                                <center><span id="totalPrice"></span></center>
                            </div>

                            <hr>

                            <a href="/checkout" id="btnCheckout"
                                class="btn w-100 py-2 mt-2"
                                disabled style="background-color:#81c408">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">{{env('APP_NAME')}}</h1>
                                <p class="text-secondary mb-0">Fresh products</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="">About Us</a>
                            <a class="btn-link" href="">Contact Us</a>
                            <a class="btn-link" href="">Privacy Policy</a>
                            <a class="btn-link" href="">Terms & Condition</a>
                            <a class="btn-link" href="">Return Policy</a>
                            <a class="btn-link" href="">FAQs & Help</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="">My Account</a>
                            <a class="btn-link" href="">Shop details</a>
                            <a class="btn-link" href="">Shopping Cart</a>
                            <a class="btn-link" href="">Wishlist</a>
                            <a class="btn-link" href="">Order History</a>
                            <a class="btn-link" href="">International Orders</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: 1429 Netus Rd, NY 48247</p>
                            <p>Email: Example@gmail.com</p>
                            <p>Phone: +0123 4567 8910</p>
                            <p>Payment Accepted</p>
                            <img src="img/payment.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // Render Tabel Cart

        function updateSummaryCard() {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            let totalProducts = 0;
            let totalQty = 0;
            let total = 0;
            cart.forEach(p => {
                p.attributes.forEach(a => {
                    if (a.checked) {
                        totalProducts++;
                        totalQty += parseInt(a.qty);
                    }
                });

                const basic = p.productBasicePrice;                

                p.attributes.forEach(att => {
                    if (att.checked) {
                        const pricePerItem = basic + att.itemAdjustPrice;
                        total += pricePerItem * att.qty;
                    }
                });
            });

            document.getElementById("totalPrice").innerText = "Rp. "+Number(total).toLocaleString('id-ID');
            getTotalQty()
            console.log("updateSummaryCard")
        }
        function renderCartTable() {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");
            let tbody = document.getElementById("cartTable");
            tbody.innerHTML = "";

            cart.forEach((product, pIndex) => {

                // Row header Product Name
                let productRow = document.createElement("tr");
                productRow.classList.add("product-header-row");
                productRow.innerHTML = `
                    <td colspan="5" class="py-3 px-3">
                        <b class="fs-5"><i class="fa fa-box text-primary me-2"></i> ${product.productname} (@${Number(product.productBasicePrice).toLocaleString('id-ID')})</b>
                    </td>
                `;
                tbody.appendChild(productRow);

                // Anak atribut
                product.attributes.forEach((attr, aIndex) => {
                    let row = document.createElement("tr");
                    row.classList.add("variant-row");
                    row.innerHTML = `
                        <td></td>

                        <!-- Nama atribut -->
                        <td class="py-3" style"overflow:">${attr.itemName} ${Number(attr.itemAdjustPrice)!=0?Number(attr.itemAdjustPrice):""}</td>

                        <!-- Checkbox pilih -->
                        <td class="py-3 text-center">
                            <input type="checkbox" class="form-check-input attr-check"
                                data-product="${pIndex}" data-attr="${aIndex}"
                                ${attr.checked ? "checked" : ""}>
                        </td>

                        <!-- Qty dengan tombol - + -->
                        <td class="py-3">
                            <div class="qty-group">
                                <button class="qty-btn minus"
                                    data-product="${pIndex}" data-attr="${aIndex}">-</button>

                                <input type="number" min="1"
                                    value="${attr.qty}"
                                    class="qty-input"
                                    data-product="${pIndex}" data-attr="${aIndex}">

                                <button class="qty-btn plus"
                                    data-product="${pIndex}" data-attr="${aIndex}">+</button>
                            </div>
                        </td>

                        <td class="text-center">
                            <button class="btn btn-sm btn-danger delete-attr"
                                data-product="${pIndex}" data-attr="${aIndex}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            });

            attachEvents();
        }

        // Event Listener
        function attachEvents() {

            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            // Checkbox
            document.querySelectorAll(".attr-check").forEach(chk => {
                chk.addEventListener("change", function () {
                    let p = this.dataset.product;
                    let a = this.dataset.attr;
                    cart[p].attributes[a].checked = this.checked;
                    localStorage.setItem("cart", JSON.stringify(cart));
                    updateSummaryCard();
                });
            });

            // Input qty manual
            document.querySelectorAll(".qty-input").forEach(inp => {
                inp.addEventListener("change", function () {
                    let p = this.dataset.product;
                    let a = this.dataset.attr;
                    let val = parseInt(this.value);

                    if (val < 1) val = 1;
                    this.value = val;

                    cart[p].attributes[a].qty = val;
                    localStorage.setItem("cart", JSON.stringify(cart));
                    updateSummaryCard();
                });
            });

            // Tombol + qty
            document.querySelectorAll(".qty-btn.plus").forEach(btn => {
                btn.addEventListener("click", function () {
                    let p = this.dataset.product;
                    let a = this.dataset.attr;

                    cart[p].attributes[a].qty++;
                    localStorage.setItem("cart", JSON.stringify(cart));
                    updateSummaryCard();
                    renderCartTable();
                });
            });

            // Tombol - qty
            document.querySelectorAll(".qty-btn.minus").forEach(btn => {
                btn.addEventListener("click", function () {
                    let p = this.dataset.product;
                    let a = this.dataset.attr;

                    if (cart[p].attributes[a].qty > 1) {
                        cart[p].attributes[a].qty--;
                        localStorage.setItem("cart", JSON.stringify(cart));
                    }
                    updateSummaryCard();
                    renderCartTable();
                });
            });

            // Hapus atribut
            document.querySelectorAll(".delete-attr").forEach(btn => {
                btn.addEventListener("click", function () {
                    let p = this.dataset.product;
                    let a = this.dataset.attr;

                    cart[p].attributes.splice(a, 1);

                    if (cart[p].attributes.length === 0) {
                        cart.splice(p, 1);
                    }

                    localStorage.setItem("cart", JSON.stringify(cart));
                    renderCartTable();
                    updateSummaryCard();
                });
            });
        }

        renderCartTable();
        updateSummaryCard();
    </script>


    <style>
        .product-header-row {
            background: #eef3ff;
            border-left: 4px solid #4e73df;
            font-weight: bold;
        }

        .variant-row td {
            background: #fafbff;
            border-color: #eee;
        }

        .qty-group {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ced4da;
            background: #fff;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .qty-btn:hover {
            background: #e2e6ea;
        }

        .qty-input {
            width: 55px;
            text-align: center;
            border-radius: 6px;
        }
    </style>

    </body>
</html>