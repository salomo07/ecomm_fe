@extends('profile.profile')

@section('profile_content')

<h4 class="fw-bold mb-3">Address List</h4>

@foreach ($addresses as $address)
<div class="card mb-3 addressCard @if($address['status'] == 1) border-success shadow-sm border-2 bg-light @endif" data-id="{{ $address['id'] }}">
    <div class="card-body">
        <h6>{{ $address["address_name"] }}</h6>

        <p class="mb-1">Name : {{ $address['receiver_name']??"" }}</p>
        <p class="mb-1">Phone : {{ $address["receiver_phone_number"] }}</p>
        <p class="mb-1">Address : {{ $address["address_detail"] }}</p>

        <div>
            <a href="#" class="btn btn-sm btn-outline-primary editAddressBtn"
                data-id="{{ $address['id'] }}"
                data-name="{{ $address['address_name'] }}"
                data-detail="{{ $address['address_detail'] }}"
                data-recipient="{{ $address['receiver_name'] }}"
                data-phone="{{ $address['receiver_phone_number'] }}"
                data-status="{{ $address['status'] }}">
                Edit
            </a>
            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
        </div>

    </div>
</div>
@endforeach

<a href="#" class="btn btn-success" id="btnAddAddress">+ Add New Address</a>
<div class="modal fade" id="editAddressModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="editAddressForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="edit_id">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Address Name</label>
                        <input type="text" name="address_name" id="edit_address_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Recipient</label>
                        <input type="text" name="recipient" id="edit_recipient" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" id="edit_phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address Detail</label>
                        <textarea name="address_detail" id="edit_address_detail" class="form-control" rows="3"></textarea>
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="edit_status" name="status">
                        <label class="form-check-label">Set as Default Address</label>
                    </div> -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="module">
var isEdit = false;
import { apiFetch } from '/js/fetch.js';
document.querySelectorAll('.editAddressBtn').forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.preventDefault();

        document.getElementById('edit_id').value = this.dataset.id;
        document.getElementById('edit_address_name').value = this.dataset.name;
        document.getElementById('edit_recipient').value = this.dataset.recipient;
        document.getElementById('edit_phone').value = this.dataset.phone;
        document.getElementById('edit_address_detail').value = this.dataset.detail;
        // document.getElementById('edit_status').checked = this.dataset.status == "1";
        isEdit = true;
        let modal = new bootstrap.Modal(document.getElementById('editAddressModal'));
        modal.show();
    });
});
document.getElementById("btnAddAddress").addEventListener('click', function (e) {
    e.preventDefault();
    isEdit = false;
    document.getElementById('edit_id').value = "";
    document.getElementById('edit_address_name').value = "";
    document.getElementById('edit_recipient').value = "";
    document.getElementById('edit_phone').value = "";
    document.getElementById('edit_address_detail').value = "";
    // document.getElementById('edit_status').checked = 0;

    let modal = new bootstrap.Modal(document.getElementById('editAddressModal'));
    modal.show();
});
document.getElementById("editAddressForm").addEventListener("submit", async function(e) {
    e.preventDefault(); // stop reload page

    // Data diambil dari input form
    let payload = {
        id: Number(document.getElementById("edit_id").value),
        id_user: Number("{{session('id_user')}}"),
        address_name: document.getElementById("edit_address_name").value,
        nama_penerima: document.getElementById("edit_recipient").value,
        nomor_hp_penerima: document.getElementById("edit_phone").value,
        address_detail: document.getElementById("edit_address_detail").value,
        // status: document.getElementById("edit_status").checked ? 1 : 0
    };

    console.log("Payload JSON: ", payload);

    // Kirim ke API (contoh)
    if(isEdit){
        await apiFetch("{{env('API_BASE_URL')}}shipping-address/"+document.getElementById("edit_id").value,JSON.stringify(payload),"PUT",@json($token)).then(result => {

        }).catch(err => {
            alert('Gagal menyimpan alamat'+JSON.stringify(err));
        })
        isEdit=false;
    }else{
        await apiFetch("{{env('API_BASE_URL')}}shipping-address/",JSON.stringify(payload),"POST",@json($token)).then(result => {

        }).catch(err => {
            alert('Gagal menyimpan alamat'+JSON.stringify(err));
        })
        isEdit=false;
    }
    // await apiFetch("{{env('API_BASE_URL')}}shipping-address/",JSON.stringify(payload),"POST",@json($token)).then(result => {

    // }).catch(err => {
    //     alert('Gagal menyimpan alamat'+JSON.stringify(err));
    // })
    location.reload()
    
});

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".addressCard").forEach(card => {
        card.addEventListener("click", async  function (e) {

            // Abaikan klik pada tombol
            if (e.target.closest("a")) return;

            let id = this.dataset.id;

            // Contoh: redirect atau panggil modal
            console.log("Card clicked ID:", id);

            // Misal redirect:
            // window.location.href = "/address/" + id;
            var payload=JSON.stringify({id_user:Number("{{session('id_user')}}")})
            await apiFetch("{{env('API_BASE_URL')}}shipping-address/set-active/"+id,payload,"PUT",@json($token)).then(result => {

            }).catch(err => {
                alert('Gagal menyimpan alamat'+JSON.stringify(err));
            })
            location.reload()
        });
    });

});
</script>
@endsection
<!-- Modal Edit Address -->
