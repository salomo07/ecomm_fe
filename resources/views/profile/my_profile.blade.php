@extends('profile.profile')

@section('profile_content')

<h4 class="fw-bold mb-3">My Profile</h4>

<table class="table table-borderless ">
    <tr>
        <th width="180">Name</th>
        <td id="val_name">{{ session('name') }}</td>
        <td><a href="#" class="text-primary myprofile">Edit</a></td>
    </tr>

    <tr>
        <th>Email</th>
        <td id="val_email">{{ session('email') }}</td>
        <td><a href="#" class="text-primary myprofile">Edit</a></td>
    </tr>

    <tr>
        <th>Phone</th>
        <td id="val_phone">{{ session('name') }}</td>
        <td><a href="#" class="text-primary myprofile">Edit</a></td>
    </tr>
</table>
<div class="modal fade" id="profileModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="profileForm" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <div class="mb-3">
          <label>Name</label>
          <input type="text" class="form-control" id="inp_name">
        </div>

        <div class="mb-3">
          <label>Email</label>
          <input type="text" class="form-control" id="inp_email">
        </div>

        <div class="mb-3">
          <label>Phone</label>
          <input type="text" class="form-control" id="inp_phone">
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.myprofile').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            // Ambil value dari tabel
            let name  = document.getElementById('val_name').innerText;
            let email = document.getElementById('val_email').innerText;
            let phone = document.getElementById('val_phone').innerText;

            // Set ke input modal
            document.getElementById('inp_name').value  = name;
            document.getElementById('inp_email').value = email;
            document.getElementById('inp_phone').value = phone;

            // Tampilkan modal
            let modal = new bootstrap.Modal(document.getElementById('profileModal'));
            modal.show();
        });
    });

});
</script>
@endsection


