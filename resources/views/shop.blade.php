<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>{{env('APP_NAME')}} - Shop</title>
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


        <div class="container-fluid py-5"></div>
        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input id="keywordShop" type="search" class="form-control p-3" placeholder="Keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-xl-3">
                                <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                        <option value="volvo">Nothing</option>
                                        <option value="saab">Popularity</option>
                                        <option value="opel">Organic</option>
                                        <option value="audi">Fantastic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">

                            <!-- CATEGORIES COLLAPSIBLE -->
                            <div class="col-lg-12">
                                <div class="mb-3">

                                    <!-- Trigger -->
                                    <h4 data-bs-toggle="collapse" data-bs-target="#collapseCategories" style="cursor:pointer;">
                                        Categories
                                        <i class="fa fa-chevron-down float-end"></i>
                                    </h4>

                                    <!-- Content -->
                                    <div class="collapse show" id="collapseCategories">
                                        <ul class="list-unstyled fruite-categorie" id="categoryList">
                                            
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center" id="listProduct">
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            
                                            <div class="fruite-img skeleton-box" style="height:200px;"></div>

                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute skeleton-box"
                                                style="top: 10px; left: 10px; width: 80px; height: 25px;"></div>

                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="skeleton-box mb-2" style="height: 20px; width: 70%;"></div>
                                                <div class="skeleton-box mb-3" style="height: 14px; width: 100%;"></div>
                                                <div class="skeleton-box mb-3" style="height: 14px; width: 90%;"></div>

                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div class="skeleton-box" style="height: 20px; width: 80px;"></div>
                                                    <div class="skeleton-box rounded-pill" style="height: 35px; width: 120px;"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="emptyAnimation" style="width:300px; margin:auto;"></div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5" id="pagination-products"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->


        @include('includes.footer')
        



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <style>
/* Card */
.product-card {
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    transition: 0.2s;
}
.product-card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Image */
.product-card img {
    height: 200px;
    width: 100%;
    object-fit: cover;
}

/* Category badge */
.category-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #ffb524;
    color: #fff;
    padding: 2px 8px;
    font-size: 11px;
    border-radius: 8px;
    max-width: 120px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Product name */
.product-name {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 4px;
    display: -webkit-box;
    -webkit-line-clamp: 2;     /* 2 baris saja */
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Price */
.product-price {
    font-size: 16px;
    font-weight: bold;
    color: #e60023;
}

/* Variation text */
.var-text {
    font-size: 12px;
    color: #777;
}

/* Button */
.view-btn {
    border-radius: 20px;
    border: 1px solid #e5e5e5;
    font-size: 13px;
    padding: 6px 12px;
}
.skeleton-box {
    background: linear-gradient(90deg, #e0e0e0 25%, #f8f8f8 50%, #e0e0e0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.4s ease infinite;
    border-radius: 5px;
}

@keyframes skeleton-loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}
</style>
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.1/lottie.min.js"></script>
    <script type="module">

        import { apiFetch } from '/js/fetch.js';
        /* -------------------------------
        LOAD CATEGORIES
        -------------------------------- */
        function getCategories() {
            const categoryList = document.getElementById("categoryList");
            apiFetch("{{env('API_BASE_URL')}}list-category", "{}", "GET").then(result => {
                const data = result.data;
                data.forEach(cat => {
                    const li = document.createElement("li");
                    li.innerHTML = `
                        <div class="d-flex justify-content-between fruite-name" title="${cat.description}">
                            <a href="#" class="category-filter" data-cat="${cat.id}">
                                <i class="fas fa-apple-alt me-2"></i>${cat.name}
                            </a>
                        </div>
                    `;
                    categoryList.appendChild(li);
                })
            })
            .catch(err => {
                alert("Gagal memuat data \n" + JSON.stringify(err));
            });
            
            
            categoryList.innerHTML = "";
            
        }
        getCategories();
        document.getElementById("categoryList").addEventListener("click", function (e) {
            const el = e.target.closest(".category-filter");
            if (!el) return; // jika bukan klik di category-filter
            
            e.preventDefault();
            const catId = el.dataset.cat;
            console.log("CAT:", catId);

            loadPage(1, catId);
        });


        /* -------------------------------
        RENDER PRODUCT LIST
        -------------------------------- */
        function getProduct(dataProducts) {
            const listProduct = document.getElementById("listProduct");
            listProduct.innerHTML = ""; // kosongkan dulu

            dataProducts.forEach((p) => {
                const col = document.createElement("div");
                col.className = "col-md-6 col-lg-6 col-xl-4";

                const attrText = (p.attributes && p.attributes.length > 0)
                    ? p.attributes.map(a => a.name).join(", ")
                    : "-";

                col.innerHTML = `
                    <a href="/shop?id=${p.id}" class="text-decoration-none text-dark">
                        <div class="product-card position-relative d-flex flex-column">

                            <div class="position-relative">
                                <img src="${p.attributes.length > 0 
                                    ? '{{env('API_IMAGE_URL')}}/' + p.attributes[0].image 
                                    : '/img/featur-1.jpg'}" 
                                alt="${p.name}">
                                
                                <div class="category-badge">
                                    ${p.category?.name ?? 'Unknown'}
                                </div>
                            </div>

                            <div class="p-3 d-flex flex-column flex-grow-1">

                                <div class="product-name" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">${p.name}</div>

                                <div class="product-price">
                                    ${p.basic_price ? "Rp " + p.basic_price.toLocaleString('id-ID') : ""}
                                </div>

                                <div class="var-text">Variasi: ${attrText}</div>

                                <div class="mt-auto pt-2">
                                    <a href="/shop?id=${p.id}" class="btn view-btn w-100 text-primary">
                                        <i class="fa fa-eye me-1"></i> View Detail
                                    </a>
                                </div>

                            </div>

                        </div>
                    </a>
                `;
                listProduct.appendChild(col);
            });
        }



        /* -------------------------------
        PAGINATION VIEW
        -------------------------------- */
        function renderPagination(pg) {
            const paginationDiv = document.getElementById("pagination-products");
            paginationDiv.innerHTML = "";

            const { current_page, last_page } = pg;

            // PREV BUTTON
            if (current_page > 1) {
                paginationDiv.innerHTML += `
                    <a href="#" data-page="${current_page - 1}" class="rounded">&laquo;</a>`;
            }

            // NUMBER BUTTONS
            for (let page = 1; page <= last_page; page++) {
                paginationDiv.innerHTML += `
                    <a href="#" data-page="${page}"
                        class="rounded ${page === current_page ? 'active' : ''}">
                        ${page}
                    </a>`;
            }

            // NEXT BUTTON
            if (current_page < last_page) {
                paginationDiv.innerHTML += `
                    <a href="#" data-page="${current_page + 1}" class="rounded">&raquo;</a>`;
            }

            // CLICK EVENTS
            document.querySelectorAll("#pagination-products a").forEach(el => {
                el.addEventListener("click", (e) => {
                    e.preventDefault();
                    loadPage(el.dataset.page);
                });
            });
        }



        /* -------------------------------
        LOAD PRODUCT PAGE
        -------------------------------- */
        function loadPage(page = 1, cat = 0, keyword = "") {
            const url = "{{$productURL}}"
                + "?page=" + page
                + "&per_page=10"
                + "&cat_id=" + cat
                + "&search=" + keyword;

            apiFetch(url, "{}", "GET")
                .then(result => {
                    const data = result.data.data;
                    const pg = result.data.pagination;
                    document.getElementById("listProduct").innerHTML = "";
                    document.getElementById('emptyAnimation').innerHTML = "";
                    document.getElementById("pagination-products").innerHTML="";

                    if(data.length==0){                        
                        // Render Lottie animation
                        lottie.loadAnimation({
                            container: document.getElementById('emptyAnimation'), // elemen container
                            renderer: 'svg',
                            loop: true,
                            autoplay: true,
                            path: '/empty.json' // path ke JSON animasi
                        });

                        const textEl = document.createElement('p');
                        textEl.innerText = "Product tidak ditemukan";
                        textEl.style.textAlign = "center";
                        textEl.style.marginTop = "15px";
                        textEl.style.fontSize = "16px";
                        textEl.style.color = "#555";

                        document.getElementById('emptyAnimation').appendChild(textEl);
                        return;
                    }
                    getProduct(data);
                    setTimeout(() => {
                        renderPagination(pg)
                    }, 200);
                })
                .catch(err => {
                    alert("Gagal memuat data \n" + JSON.stringify(err));
                });
        }



        /* -------------------------------
        INITIAL LOAD
        -------------------------------- */
        
        document.addEventListener("DOMContentLoaded", () => {
            loadPage(1,Number({{$cat??0}}),"{{$keyword}}");
            document.getElementById("keywordShop").value="{{$keyword}}";
        })
        document.getElementById("keywordShop").addEventListener("keyup", function () {
            const keyword = this.value;
            loadPage(1, 0, keyword);  
        });
    </script>

    </body>

</html>