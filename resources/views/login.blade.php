<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Fruitables - Login</title>

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

   await apiFetch("{{ $loginURL }}", raw, "POST").then(result => {
      if (result.success) {
         localStorage.setItem("loginData", JSON.stringify(result.data));

         if (result.data.role == 1) {
               alert("Silahkan login melalui dashboard admin");
         } else {
               setTimeout(() => {
                  window.location.href = "/";
               }, 1500);
         }
      } else {
         alert("Login gagal!");
      }
   }).catch(err => {
      console.error("API ERROR:", err);
   });
});
</script>

</body>
</html>
