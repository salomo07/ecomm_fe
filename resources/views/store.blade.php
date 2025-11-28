<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>{{env('APP_NAME')}} - Store</title>
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
                <div class="container my-5">
                    <h2>Data Store</h2>
                    <form class="mt-3" id="storeForm" enctype="multipart/form-data">
                        <input type="hidden" id="id_seller" value="{{ $id_seller ?? '' }}">
                        <div class="mb-3">
                            <label class="form-label mb-2">Logo Store</label>

                            {{-- Circle Image Picker --}}
                            <div id="imagePicker" class="image-circle">
                                @if (!empty($logo))
                                    <img id="previewImage" src="{{ $logo }}" alt="Store logo">
                                @else
                                    <span id="placeholderIcon" class="plus-icon">+</span>
                                    <img id="previewImage" style="display:none;">
                                @endif
                            </div>

                            {{-- Input file asli (hidden) --}}
                            <input type="file" id="logo" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Store</label>
                            <input type="text" class="form-control" id="name" placeholder="Toko Raja Baja" required>
                        </div>                       
                        

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control"  rows="2" id="address" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="2" required></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan Store</button>
                    </form>
                </div>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4 justify-content-center" id="listProduct">
                                    
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

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <style>
        .image-circle {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 2px dashed #bbb;
        position: relative;
    }

    .image-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-circle .plus-icon {
        font-size: 50px;
        color: #888;
    }

    #logo {
        display: none; /* sembunyikan input asli */
    }
    </style>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script type="module">
        document.getElementById("imagePicker").addEventListener("click", function () {
            document.getElementById("logo").click();
        });

        document.getElementById("logo").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                let preview = document.getElementById("previewImage");
                let placeholder = document.getElementById("placeholderIcon");

                preview.src = e.target.result;
                preview.style.display = "block";
                if (placeholder) placeholder.style.display = "none";
            };
            reader.readAsDataURL(file);
        });
    </script>
    </body>

</html>