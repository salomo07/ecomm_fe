<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>{{env('APP_NAME')}} - Shop Detail</title>
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
        <style>
            /* Center wrapper carousel */
            #attributeCarousel {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Atur ukuran gambar */
            .carousel-item img {
                width: 350px;        /* ubah sesuai kebutuhan */
                height: 350px;       /* kotak */
                object-fit: cover;   /* agar gambar rapi */
                margin: auto;        /* center */
                border-radius: 12px;
            }

            /* Agar tombol next/prev lebih kecil & tidak menutupi gambar */
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                filter: invert(1); /* ubah jadi putih */
                width: 25px;
                height: 25px;
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 5%;
            }
            #sellerLink:hover b {
                text-decoration: underline;
            }

            #sellerLogo {
                border: 1px solid #ddd;
            }
        </style>
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        @include('includes.header')


        <div class="container-fluid py-5"></div>
        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5 mt-5">
            <div class="container py-5 ">
                <div class="row g-4 mb-5">
                    <div class="col-lg-12 col-xl-12">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div id="attributeCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" id="carouselImages"></div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#attributeCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>

                                    <button class="carousel-control-next" type="button" data-bs-target="#attributeCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                            </div>
                            <div id="attributeList" class="mt-3"></div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3" id="productName">Brocoli</h4>
                                <p class="mb-3" id="productCat">Category: Vegetables</p>
                                <p class="mb-3">Basic price : <b id="productPrice">3,35 $</b></p>
                                <p class="mb-3">SKU : <b id="productSKU">3,35 $</b></p>
                                <div class="mb-3 d-flex align-items-center">
                                    <span class="me-2">Seller :</span>

                                    <a id="sellerLink" href="#" class="d-flex align-items-center text-decoration-none">
                                        <img id="sellerLogo" 
                                            src="/img/default-store.png" 
                                            alt="Seller Logo" 
                                            class="rounded-circle me-2"
                                            style="width: 32px; height: 32px; object-fit: cover;">

                                        <b id="productStore" class="text-primary"></b>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                        <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p id="productDesc">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc. 
                                            Susp endisse ultricies nisi vel quam suscipit </p>
                                            <div class="px-2">
                                            <div class="row g-4">
                                                <!-- <div class="col-6 mt-5">
                                                    <p>Variant : </p>
                                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">1 kg</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Country of Origin</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Agro Farm</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Quality</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Organic</p>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Сheck</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">Healthy</p>
                                                        </div>
                                                    </div>
                                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                        <div class="col-6">
                                                            <p class="mb-0">Min Weight</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0">250 Kg</p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-12 mt-5">
                                                    <p>Variant :</p>

                                                    <!-- Header -->
                                                    <div class="row bg-dark text-white text-center py-2">
                                                        <div class="col-2"><strong>Type</strong></div>
                                                        <div class="col-2"><strong>Name</strong></div>
                                                        <div class="col-2"><strong>Adjustment Price</strong></div>
                                                        <div class="col-2"><strong>Stock</strong></div>
                                                        <div class="col-2"><strong>Qty</strong></div>
                                                    </div>

                                                    <div id="variantContainer"></div>
                                                    
                                                </div>
                                                <div class="col-12 mt-4 text-center">
                                                    <a id="btnKeranjang"
                                                    class="btn border border-secondary rounded-pill px-4 py-2 mb-3 text-primary me-2">
                                                        <i class="fa fa-shopping-basket me-2 text-primary" ></i>
                                                        + Keranjang
                                                    </a>

                                                    <a href="#"
                                                    id="btnOrder"
                                                    class="btn rounded-pill px-4 py-2 mb-3 text-white"
                                                    style="background-color: #28a745;">
                                                        <i class="fa fa-bolt me-2 text-white"></i>
                                                        Beli Langsung
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                        <div class="d-flex">
                                            <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Jason Smith</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic 
                                                    words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="">
                                                <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Sam Peters</h5>
                                                    <div class="d-flex mb-3">
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic 
                                                    words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-vision" role="tabpanel">
                                        <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                            amet diam et eos labore. 3</p>
                                        <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                            Clita erat ipsum et lorem et sit</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        @include('includes.footer')
        

        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
        <x-modal id="editUserModal" title="Edit User" size="lg">

            <div id="lottieContainer" style="width:300px; height:300px;"></div>

        </x-modal>

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script type="module">
        var id = new URLSearchParams(window.location.search).get('id')
        import { apiFetch } from '/js/fetch.js';
        var product;
        var getProductDetail = (product) => {
            document.getElementById("productName").innerText = product.name;
            document.getElementById("productCat").innerText = "Category : "+product.category.name;
            document.getElementById("productPrice").innerText = "Rp."+product.basic_price;
            document.getElementById("productDesc").innerText = product.description;
            document.getElementById("productSKU").innerText = product.sku;
            document.getElementById("productStore").innerText = product.store.name;
            document.getElementById("sellerLogo").src =
            product.store.logo
                ? "{{env('API_IMAGE_URL')}}/" + product.store.logo
                : "/img/avatar.jpg";
            document.getElementById("sellerLink").href = "/store?id=" + product.store.id;
            getIsiTable(product, product.attributes);
            loadCarouselImages(product.attributes)
        };
        await apiFetch("{{$productDetailURL}}","{}","GET").then(result => {
            getProductDetail(result.data) 
            product = result.data;
        }).catch(err => {
            console.error("API ERROR:", err);
        });
        

        function getIsiTable(prod) {
            var attributes =prod.attributes
            let container = document.getElementById("variantContainer");
            container.innerHTML = ""; // reset

            attributes.forEach(attr => {
                container.innerHTML += `
                    <div class="row text-center align-items-center py-2 border-bottom">
                        <input type="hidden" class="itemId" value="${attr.id ?? '-'}">
                        <input type="hidden" class="itemName" value="${attr.name ?? '-'}">
                        <input type="hidden" class="productId" value="${prod.id ?? '-'}">
                        <input type="hidden" class="productName" value="${prod.name ?? '-'}">
                        <input type="hidden" class="itemAdjustPrice" value="${attr.price_adjustment ?? '-'}">
                        <input type="hidden" class="itemImage" value="${attr.image ?? '-'}">
                        <input type="hidden" class="productStoreName" value="${prod.store.name ?? '-'}">
                        <div class="col-2">${attr.type ?? '-'}</div>
                        <div class="col-2">${attr.name ?? '-'}</div>
                        <div class="col-2">Rp ${Number(attr.price_adjustment || 0).toLocaleString()}</div>
                        <div class="col-2">${Number(attr.qty) ?? 0}</div>
                        <div class="col-2">
                            <input 
                                type="number" 
                                name="qty[${attr.id}]" 
                                class="form-control text-center" 
                                min="0" 
                                max="${attr.qty ?? 0}" 
                                style="width: 70px; margin: auto;"
                            >
                        </div>
                    </div>
                `;
            });
        }

        function loadCarouselImages(attributes) {
            let html = "";

            attributes.forEach((attr, index) => {
                html += `
                    <div class="carousel-item ${index === 0 ? 'active' : ''}">
                        <img src="{{env('API_IMAGE_URL')}}${attr.image}" class="d-block rounded" alt="${attr.name}">
                    </div>
                `;
            });

            document.getElementById("carouselImages").innerHTML = html;
        }

        document.getElementById("btnKeranjang").addEventListener("click", function () {
            var cart =saveToLocalStorage()
            console.log("UPDATED CART:", cart, JSON.stringify(cart));

            console.log("FINAL FORMAT:", convertCartFormat(cart));
            
            var modalEl = document.getElementById('editUserModal');
            var modal = new bootstrap.Modal(modalEl);
            modal.show();


            alert("Product ditambahkan ke keranjang")
            getTotalQty()
            sendCartToBE(convertCartFormat(cart))
        });
        document.getElementById("btnOrder").addEventListener("click", function () {
            saveDirectOrder();
            window.location.href = "/checkout?dir=true";
        })
        function saveToLocalStorage(){
            let rows = document.querySelectorAll("#variantContainer .row");
            let items = [];
            let productStoreName = '';
            // KUMPULKAN ATTRIBUTE YANG QTY > 0
            rows.forEach(row => {
                let itemId = row.querySelector(".itemId")?.value;
                let itemName = row.querySelector(".itemName")?.value;
                let itemImage = row.querySelector(".itemImage")?.value;
                let itemAdjustPrice = row.querySelector(".itemAdjustPrice")?.value;
                productStoreName= row.querySelector(".productStoreName")?.value;
                
                let qtyInput = row.querySelector("input[type='number']");
                let qty = parseInt(qtyInput.value || 0);

                if (qty > 0) {
                    items.push({
                        itemId: Number(itemId),
                        itemName: itemName,
                        itemImage: itemImage,
                        itemAdjustPrice:Number(itemAdjustPrice),
                        qty: Number(qty)
                    });
                }
            });

            // ⛔ Tidak ada yang diinput
            if (items.length === 0) {
                alert("Silahkan masukkan qty terlebih dahulu")
                console.log("Tidak ada qty > 0");
                return;
            }

            // DATA PRODUCT BARU
            let productCart = {
                iduser: "{{session('id_user') }}",
                email: "{{session('email') }}",
                idproduct: product.id,
                productname: product.name,
                productStoreName:productStoreName,
                productBasicePrice: product.basic_price,
                attributes: items
            };

            // ============================
            // UPDATE LOCALSTORAGE CART
            // ============================
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            // CARI PRODUCT YANG SAMA
            let existing = cart.find(p => p.idproduct == productCart.idproduct);

            if (!existing) {

                // ➕ PRODUCT BELUM ADA → PUSH LANGSUNG
                cart.push(productCart);

            } else {

                // 🔄 PRODUCT SUDAH ADA → UPDATE ATTRIBUTE

                productCart.attributes.forEach(newAttr => {

                    let existingAttr = existing.attributes.find(a => a.itemId == newAttr.itemId);

                    if (existingAttr) {
                        // ATTRIBUTE SAMA → TAMBAHKAN QTY
                        existingAttr.qty += newAttr.qty;
                    } else {
                        // ATTRIBUTE BARU → MASUKKAN
                        existing.attributes.push(newAttr);
                    }

                });
            }

            // SIMPAN KEMBALI KE LOCAL STORAGE
            localStorage.setItem("cart", JSON.stringify(cart));
            return cart
        }
        function saveDirectOrder() {
            let rows = document.querySelectorAll("#variantContainer .row");
            let items = [];
            let productStoreName = '';

            rows.forEach(row => {
                let itemId = row.querySelector(".itemId")?.value;
                let itemName = row.querySelector(".itemName")?.value;
                let itemImage = row.querySelector(".itemImage")?.value;
                let itemAdjustPrice = row.querySelector(".itemAdjustPrice")?.value;
                productStoreName = row.querySelector(".productStoreName")?.value;

                let qtyInput = row.querySelector("input[type='number']");
                let qty = parseInt(qtyInput.value || 0);

                if (qty > 0) {
                    items.push({
                        itemId: Number(itemId),
                        itemName: itemName,
                        itemImage: itemImage,
                        itemAdjustPrice: Number(itemAdjustPrice),
                        qty: Number(qty),
                        checked:true
                    });
                }
            });

            // ⛔ Jika tidak ada qty > 0
            if (items.length === 0) {
                alert("Silahkan masukkan qty dahulu sebelum direct order");
                return;
            }

            // DATA DIRECT ORDER
            let directOrder = [{
                iduser: "{{session('id_user')}}",
                email: "{{session('email')}}",
                idproduct: product.id,
                productname: product.name,
                productStoreName: productStoreName,
                productBasicePrice: product.basic_price,
                attributes: items
            }];

            // ===========================
            // SIMPAN KE LOCAL STORAGE
            // ===========================

            // Overwrite langsung tanpa merge
            localStorage.setItem("directorder", JSON.stringify(directOrder));

            console.log("Direct Order tersimpan:", directOrder);
        }

        function sendCartToBE(dataCart) {
            apiFetch("{{$sendCartURL}}",JSON.stringify(dataCart),"POST").then(result => {
                console.log(result)
            }).catch(err => {
                console.error("API ERROR:", err);
            });
        }
        function convertCartFormat(oldCart) {
            if (!Array.isArray(oldCart) || oldCart.length === 0) {
                return null;
            }

            let first = oldCart[0]; // Karena format lama hanya 1 user per cart

            let newCart = {
                iduser: Number(first.iduser || 0),
                email: first.email || "",
                products: []
            };

            oldCart.forEach(prod => {
                let cleanProduct = {
                    idproduct: prod.idproduct,
                    productname: prod.productname,
                    attributes: []
                };

                prod.attributes.forEach(attr => {
                    // Abaikan attribute yg qty kosong atau nol
                    if (!attr.qty || attr.qty <= 0) return;

                    cleanProduct.attributes.push({
                        itemId: Number(attr.itemId),
                        itemName: attr.itemName,
                        qty: Number(attr.qty)
                    });
                });

                if (cleanProduct.attributes.length > 0) {
                    newCart.products.push(cleanProduct);
                }
            });

            return newCart;
        }

        lottie.loadAnimation({
            container: document.getElementById('lottieContainer'), // elemen container
            renderer: 'svg',    // atau 'canvas', 'html'
            loop: true,         // true = animasi berulang
            autoplay: true,     // true = otomatis main
            path: '/shopcart.json' // path ke file JSON
        });
    </script>
    </body>

</html>