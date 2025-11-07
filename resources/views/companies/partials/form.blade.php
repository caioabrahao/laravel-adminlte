<div class="form-group mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $company->name ?? '') }}" class="form-control" required>
</div>

<div class="form-group mb-3">
    <label>CNPJ</label>
    <input type="text" name="cnpj" value="{{ old('cnpj', $company->cnpj ?? '') }}" class="form-control" required>
</div>

<div class="form-group mb-3">
    <label>Responsible Name</label>
    <input type="text" name="responsible_name" value="{{ old('responsible_name', $company->responsible_name ?? '') }}" class="form-control">
</div>

<div class="form-group mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $company->email ?? '') }}" class="form-control">
</div>

<div class="form-group mb-3">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $company->phone ?? '') }}" class="form-control">
</div>

<div class="form-group mb-3">
    <label>Address</label>
    <input type="text" name="address" value="{{ old('address', $company->address ?? '') }}" class="form-control">
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
