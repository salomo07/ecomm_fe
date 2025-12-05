<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{{env('APP_NAME')}} - Login</title>

   <link rel="stylesheet" href="css/bootstrap.min.css" />

   <style>
      body {
         margin: 0;
         font-family: "Poppins", sans-serif;
         background: #f5f7fb;
         height: 100vh;
         display: flex;
      }

      .left-side {
         width: 50%;
         /* background: linear-gradient(180deg, #c8e4ff, #d7f0ff); */
         display: flex;
         align-items: center;
         justify-content: center;
         position: relative;
         padding: 40px;
      }

      .left-side img {
         width: 100%;
         max-width: 100%;
         animation: float 4s infinite ease-in-out;
      }

      @keyframes float {
         0% { transform: translateY(0); }
         50% { transform: translateY(-12px); }
         100% { transform: translateY(0); }
      }

      .right-side {
         width: 50%;
         background: #fff;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 40px;
      }

      .login-box {
         width: 100%;
         max-width: 380px;
      }

      .login-box h2 {
         font-weight: 700;
         font-size: 28px;
         margin-bottom: 10px;
      }

      .login-box p {
         color: #666;
         margin-bottom: 25px;
      }

      .form-control {
         height: 48px;
         border-radius: 10px;
      }

      .btn-login {
         height: 48px;
         border-radius: 10px;
         background-color: #1662f3;
         border: none;
         font-weight: 600;
         color: white;
      }

      .btn-login:hover {
         background-color: #0a4cca;
      }

      .divider {
         text-align: center;
         position: relative;
         margin: 25px 0;
      }
      .divider:before, .divider:after {
         content: "";
         position: absolute;
         top: 50%;
         width: 40%;
         height: 1px;
         background: #ddd;
      }
      .divider:before { left: 0; }
      .divider:after { right: 0; }

      .google-btn, .fb-btn {
         width: 100%;
         height: 45px;
         border-radius: 10px;
         border: 1px solid #ddd;
         background: white;
         display: flex;
         align-items: center;
         justify-content: center;
         gap: 10px;
         margin-bottom: 10px;
         cursor: pointer;
      }

      .left-side {
         width: 50%;              /* laptop/desktop */
         height: 100vh;
         overflow: hidden;
      }

      .left-side img {
         width: 100%;
         height: 100%;
         object-fit: cover;
         object-position: center;
      }

      /* --- Responsive --- */
      @media (max-width: 768px) {
         .left-side {
            width: 100%;         /* full di HP */
            height: 40vh;        /* tinggi lebih kecil biar tidak kepanjangan */
         }
      }

   </style>
</head>

<body>

<div class="left-side">
   <img src="img/loginbanner.png" alt="Illustration">
</div>

<div class="right-side">
   <div class="login-box">
      <h2>Welcome</h2>
      <p>Enter your details to sign in to your account.</p>

      <form>
         <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="admin@email.com">
         </div>

         <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••">
         </div>

         <div class="d-flex justify-content-between align-items-center mb-3">
            <small>
               <input type="checkbox"> Remember me
            </small>
            <a href="#" class="text-primary small">Forgot password?</a>
         </div>

         <button class="btn btn-login w-100 bg-primary">Sign In</button>

         <div class="text-center mt-3">
            Don't have an account?
            <a href="/register" class="text-primary fw-bold">Sign up</a>
         </div>

         <a href="/shop" class="btn w-100 mt-3 text-primary" style="border:1px solid #81c408; color:#1662f3;">
            Continue Shopping
         </a>
      </form>
   </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="module">
import { apiFetch } from '/js/fetch.js';

document.querySelector("form").addEventListener("submit", async function (e) {
   e.preventDefault();

   const email = document.querySelector("input[name='email']").value;
   const password = document.querySelector("input[name='password']").value;

   const raw = JSON.stringify({ email, password });

   await apiFetch("login", raw, "POST").then(result => {
      if (result.success) {
         if (result.data.role == 1) {
            alert("Silahkan login melalui dashboard admin");
         } else {
            console.log(result);
            setTimeout(() => {
               window.location.href = "/";
               localStorage.setItem("loginData", JSON.stringify(result.data));
            }, 500);
         }
      } else {
         alert("Login gagal!");
      }
   }).catch(err => {
      alert('Gagal login, silahkan ulangi atau lanjutkan belanja');
      console.error("API ERROR:", err);
   });
});
</script>

</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{{env('APP_NAME')}} - Login</title>

   <link rel="stylesheet" href="css/bootstrap.min.css" />

   <style>
      body {
         background: linear-gradient(135deg, #6ECF59, #3A8F3A);
         height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         font-family: "Poppins", sans-serif;
      }

      .login-card {
         background: #fff;
         border-radius: 15px;
         width: 380px;
         padding: 35px 30px;
         box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
         animation: fadeIn 0.6s ease-out;
      }

      @keyframes fadeIn {
         from { opacity: 0; transform: translateY(20px); }
         to   { opacity: 1; transform: translateY(0); }
      }

      .login-logo img {
         width: 140px;
         margin-bottom: 20px;
      }

      .form-control {
         height: 45px;
         border-radius: 10px;
      }

      .btn-login {
         height: 45px;
         border-radius: 10px;
         background-color: #28a745;
         border: none;
         font-weight: 600;
      }

      .btn-login:hover {
         background-color: #218838;
      }

      .register-link {
         font-size: 14px;
         margin-bottom: 15px;
      }
   </style>
</head>
<body>

<div class="login-card">
   <div class="text-center login-logo">
      <img src="img/vegetable-item-3.png" alt="Logo">
   </div>

   <h4 class="text-center mb-4">Login</h4>

   <div class="register-link text-center">
      Belum punya akun? <a href="/register" class="text-success fw-bold">Registrasi</a>
   </div>

   <form>
      <div class="mb-3">
         <label class="form-label">Email Address</label>
         <input type="email" name="email" class="form-control" placeholder="Masukkan email">
      </div>

      <div class="mb-3">
         <label class="form-label">Password</label>
         <input type="password" name="password" class="form-control" placeholder="Masukkan password">
      </div>

      <button class="btn btn-login w-100 text-white mt-3">Login</button>
      <a href="/shop" class="btn w-100 mt-3" style="color:#28a745; border:1px solid #28a745;">Lanjut Belanja</a>
   </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="module">
import { apiFetch } from '/js/fetch.js';

document.querySelector("form").addEventListener("submit", async function (e) {
   e.preventDefault();

   const email = document.querySelector("input[name='email']").value;
   const password = document.querySelector("input[name='password']").value;

   const raw = JSON.stringify({
      email: email,
      password: password
   });

   await apiFetch("login", raw, "POST").then(result => {
      if (result.success) {
         if (result.data.role == 1) {
               alert("Silahkan login melalui dashboard admin");
         } else {
            // localStorage.clear();
            console.log(result)
               setTimeout(() => {
                  window.location.href = "/";
                  
                  localStorage.setItem("loginData", JSON.stringify(result.data));
               }, 500);
         }
      } else {
         alert("Login gagal!");
      }
   }).catch(err => {
      alert('Gagal login, silahkan ulangi atau lanjutkan belanja')
      alert(JSON.stringify(err))
      console.error("API ERROR:", err);
   });
});
</script>

</body>
</html> -->
