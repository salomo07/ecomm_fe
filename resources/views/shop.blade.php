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
                                    <input id="keyword" type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
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
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Apples</a>
                                                    <span>(3)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                                                    <span>(2)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                                    <span>(8)</span>
                                                </div>
                                            </li>
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
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Grapes</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Grapes</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Raspberries</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Apricots</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script type="module">

        import { apiFetch } from '/js/fetch.js';

        // Convert php array -> json
        // const shopData = @json($shopData);
        // console.log(shopData);

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
                            <span>(${cat.id})</span>
                        </div>
                    `;
                    categoryList.appendChild(li);
                })
            })
            .catch(err => {
                alert("Gagal memuat data \n" + JSON.stringify(err));
            });
            
            
            categoryList.innerHTML = "";

            // shopData.productcategory.forEach(cat => {
            //     const li = document.createElement("li");
            //     li.innerHTML = `
            //         <div class="d-flex justify-content-between fruite-name" title="${cat.desc}">
            //             <a href="#" class="category-filter" data-cat="${cat.id}">
            //                 <i class="fas fa-apple-alt me-2"></i>${cat.name}
            //             </a>
            //             <span>(${cat.id})</span>
            //         </div>
            //     `;
            //     categoryList.appendChild(li);
            // });

            // event click category
            
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
                        <div class="rounded position-relative fruite-item h-100 d-flex flex-column">

                            <div class="fruite-img">
                                <img 
                                    src="${p.attributes.length > 0 
                                        ? '{{env('API_IMAGE_URL')}}/' + p.attributes[0].image 
                                        : '/img/featur-1.jpg'}"
                                    class="img-fluid w-100 rounded-top"
                                    alt="${p.name}"
                                    style="max-height: 300px; min-height: 300px; object-fit: cover;">
                            </div>

                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" 
                                style="top: 10px; left: 10px;">
                                ${p.category?.name ?? 'Unknown'}
                            </div>

                            <div class="p-4 border border-secondary border-top-0 rounded-bottom 
                                        flex-grow-1 d-flex flex-column">

                                <div>
                                    <h4>${p.name}</h4>
                                    <p style="display: -webkit-box;
                                            -webkit-line-clamp: 4;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;">
                                        ${p.description ?? ""}
                                    </p>
                                </div>

                                <div class="mt-auto">
                                    <p class="text-dark fs-5 fw-bold mb-0">Rp. ${p.basic_price}</p>
                                    <p class="text-muted mt-2">Variasi : ${attrText}</p>
                                </div>

                                <a href="/shop?id=${p.id}" 
                                class="btn border border-secondary rounded-pill px-3 text-primary">
                                    <i class="fa fa-eye me-2 text-primary"></i> 
                                    View Detail
                                </a>

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
                + "&per_page=2"
                + "&cat_id=" + cat
                + "&search=" + keyword;

            apiFetch(url, "{}", "GET")
                .then(result => {
                    const data = result.data.data;
                    const pg = result.data.pagination;
                    getProduct(data);
                       // ⬅ PAGINATION MUNCUL DI SINI
                    setTimeout(() => {
                        renderPagination(pg);
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
            loadPage(1);
        })
        document.getElementById("keyword").addEventListener("keyup", function () {
            const keyword = this.value;
            loadPage(1, 0, keyword);  
        });
    </script>

    </body>

</html>