<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }} - Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
    @include('includes.header')
    <div class="container-fluid py-5"></div>
    <div class="container-fluid fruite py-5">
        <div class="container my-5 ">

            <!-- TAB MENU -->
            <div class="profile-tabs my-5 py-5">

                <a href="{{ route('profile') }}" 
                class="{{ request()->is('profile') ? 'active' : '' }}">
                Biodata Diri
                </a>

                <a href="{{ route('profile.address') }}" 
                class="{{ request()->is('profile/address') ? 'active' : '' }}">
                Daftar Alamat
                </a>

            </div>


            <div class="d-flex profile-container">

                <!-- LEFT SIDEBAR -->
                <div class="profile-left pt-5">
                    <div class="card p-3 text-center">

                        @if(session('profile_pic'))
                            <img src="{{ session('profile_pic') }}" id="previewImage"
                                class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                        @else
                            <img src="/img/avatar.jpg" id="previewImage"
                                class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                        @endif

                        <button class="btn btn-outline-primary mt-3" id="imagePicker">Choose Photo</button>
                        <input type="file" id="logo" class="d-none" accept="image/*">

                        <div class="text-muted mt-2" style="font-size: 12px;">
                            Max size 10MB. Accepted: JPG, JPEG, PNG.
                        </div>
                    </div>
                </div>

                <!-- RIGHT CONTENT (DINAMIS) -->
                <div class="profile-right pt-5">
                    @yield('profile_content')
                </div>

            </div>
        </div>
    </div>

    @include('includes.footer')


<style>
    .profile-tabs {
        border-bottom: 2px solid #e5e5e5;
        display: flex;
        gap: 30px;
        margin-bottom: 30px;
        overflow-x: auto;
        white-space: nowrap;
    }
    .profile-tabs a {
        padding: 10px 0;
        font-weight: 600;
        color: #555;
        text-decoration: none;
        border-bottom: 3px solid transparent;
    }
    .profile-tabs a.active {
        color: #28a745;
        border-color: #28a745;
    }
    .profile-left { width: 260px; }
    .profile-right { flex: 1; padding-left: 40px; }
</style>

<script>
    document.getElementById("imagePicker").addEventListener("click", () => {
        document.getElementById("logo").click();
    });

    document.getElementById("logo").addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById("previewImage").src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    document.getElementById("imagePicker").addEventListener("click", () => {
        document.getElementById("logo").click();
    });
    
</script>
</body>
</html>
