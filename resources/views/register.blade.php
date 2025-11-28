<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Fruitables - Register</title>

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

      .register-card {
         background: #fff;
         border-radius: 15px;
         width: 420px;
         padding: 35px 30px;
         box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
         animation: fadeIn 0.6s ease-out;
      }

      @keyframes fadeIn {
         from { opacity: 0; transform: translateY(20px); }
         to   { opacity: 1; transform: translateY(0); }
      }

      .form-control {
         height: 45px;
         border-radius: 10px;
      }

      .btn-register {
         height: 45px;
         border-radius: 10px;
         background-color: #28a745;
         border: none;
         font-weight: 600;
      }

      .btn-register:hover {
         background-color: #218838;
      }

      .reg-logo img {
         width: 140px;
         margin-bottom: 20px;
      }

      .login-link {
         font-size: 14px;
         margin-bottom: 15px;
      }
   </style>
</head>

<body>

<div class="register-card">
   <div class="text-center reg-logo">
      <img src="img/vegetable-item-3.png" alt="Logo">
   </div>

   <h4 class="text-center mb-4">Buat Akun Baru</h4>

   <div class="login-link text-center">
      Sudah punya akun? <a href="/login" class="text-success fw-bold">Login</a>
   </div>

   <form id="registerForm">
      <div class="mb-3">
         <label class="form-label">Nama Lengkap</label>
         <input type="text" name="name" class="form-control" placeholder="Nama lengkap" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Email</label>
         <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Password</label>
         <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Konfirmasi Password</label>
         <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
      </div>

      <button class="btn btn-register w-100 text-white mt-3">Registrasi</button>
   </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="module">
import { apiFetch } from '/js/fetch.js';

document.getElementById("registerForm").addEventListener("submit", async function(e){
   e.preventDefault();

   const name = document.querySelector("input[name='name']").value;
   const email = document.querySelector("input[name='email']").value;
   const password = document.querySelector("input[name='password']").value;
   const password_confirmation = document.querySelector("input[name='password_confirmation']").value;

   if(password !== password_confirmation){
      alert("Password dan Konfirmasi Password tidak sama!");
      return;
   }

   const raw = JSON.stringify({
      "name": name,
      "email": email,
      "password": password,
      "role": 2
   });
   // await apiFetch("{{ $registerURL }}", raw, "POST")
   // .then(result => {
   //    if(result.success){
   //       alert("Registrasi berhasil! Silakan login.");
   //       setTimeout(() => {
   //          // window.location.href = "/login";
   //       }, 1500);
   //    } else {
   //       alert(result.message ?? "Registrasi gagal!");
   //    }
   // })
   // .catch(err => {
   //    console.error("API ERROR:", err);
   // });
   await fetch("{{ $registerURL }}", {
      method: "POST",
      headers: {
         "Content-Type": "application/json",
         "Accept": "application/json"
      },
      body: JSON.stringify({
         name,
         email,
         password,
         role: 2
      })
   })
   .then(res => res.json())
   .then(result => console.log(result))
   .catch(err => console.error(err));
});
</script>

</body>
</html>
