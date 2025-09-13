@push('styles')
    <style>
        .input-group {
            margin-bottom: 1rem;
        }
    </style>
@endpush


<form id="patient-form" action="{{ $action }}" method="post">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <label for="name">Nama <span class="text-danger">*</span></label>
    <div class="input-group">
        <input type="text" name="name" id="name" class="form-control" placeholder="Minimal 3 huruf" maxlength="100"
            value="{{ old('name', $patient->name ?? '') }}" required {{ $action == null ? 'readonly' : '' }}>
    </div>

    <label for="nik">NIK <span class="text-danger">*</span></label>
    <div class="input-group">
        <input type="text" name="nik" id="nik" class="form-control" placeholder="Harus 16 digit" maxlength="16"
            value="{{ old('nik', $patient->nik ?? '') }}" required {{ $action == null ? 'readonly' : '' }}>
    </div>

    <label for="gender">Gender <span class="text-danger">*</span></label>
    <div class="input-group">
        <select name="gender" id="gender" class="form-control" required {{ $action == null ? 'readonly' : '' }}>
            <option value="L" {{ old('gender', $patient->gender ?? '') === 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('gender', $patient->gender ?? '') === 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>

    </div>

    <label for="birth_date">Tanggal Lahir <span class="text-danger">*</span></label>
    <div class="input-group">
        <input type="date" name="birth_date" id="birth_date" class="form-control"
            value="{{ old('birth_date', $patient->birth_date ?? '') }}" required {{ $action == null ? 'readonly' : '' }}>
    </div>

    <label for="phone">No. HP <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">+62</span>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="8xxxx" maxlength="15"
            value="{{ old('phone', $patient->phone ?? '') }}" required aria-describedby="basic-addon1" {{ $action == null ? 'readonly' : '' }}>
    </div>

    <label for="address">Alamat <span class="text-danger">*</span></label>
    <div class="input-group">
        <textarea name="address" id="address" class="form-control"
            placeholder="Masukkan alamat lengkap, minimal 5 karakter" required {{ $action == null ? 'readonly' : '' }}
            >{{ old('address', $patient->address ?? '') }}</textarea>
    </div>

    @if ($action != null)
        <button type="submit" class="btn btn-primary" {{ $action == null ? 'disabled' : '' }}>{{ $submitText }}</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Batal</a>
    @endif
</form>

@push('scripts')
    <script>
        $(document).ready(function () {
            function setError($el, message) {
                $el.addClass('is-invalid');
                let $msg = $el.next('.invalid-feedback');
                if ($msg.length === 0) {
                    $msg = $('<div class="invalid-feedback d-block"></div>');
                    $el.after($msg);
                }
                $msg.text(message);
            }

            function clearError($el) {
                $el.removeClass('is-invalid');
                const $msg = $el.next('.invalid-feedback');
                if ($msg.length) $msg.remove();
            }

            $('#patient-form').on('submit', function (e) {
                let hasError = false;

                const $name = $('#name');
                clearError($name);
                const nameVal = ($name.val() || '').trim();
                if (nameVal.length < 3 || nameVal.length > 100) {
                    setError($name, 'Nama minimal 3 karakter dan maksimal 100.');
                    hasError = true;
                }

                const $nik = $('#nik');
                clearError($nik);
                const nikVal = ($nik.val() || '').trim();
                if (!/^\d{16}$/.test(nikVal)) {
                    setError($nik, 'NIK harus 16 digit angka.');
                    hasError = true;
                }

                const $gender = $('#gender');
                clearError($gender);
                const genderVal = $gender.val();
                if (!genderVal || !['L', 'P'].includes(genderVal)) {
                    setError($gender, 'Pilih gender yang valid.');
                    hasError = true;
                }

                const $birth = $('#birth_date');
                clearError($birth);
                const birthVal = $birth.val();
                if (!birthVal) {
                    setError($birth, 'Tanggal lahir wajib diisi.');
                    hasError = true;
                } else {
                    const today = new Date();
                    const bdate = new Date(birthVal);
                    if (bdate > today) {
                        setError($birth, 'Tanggal lahir tidak boleh di masa depan.');
                        hasError = true;
                    }
                }

                const $phone = $('#phone');
                clearError($phone);
                const phoneVal = ($phone.val() || '').trim();
                const phoneRegex = /^(\8)\d{7,13}$/;
                if (!phoneRegex.test(phoneVal) || phoneVal.length > 15) {
                    setError($phone, 'No. HP harus diawali 8 dan total 9-15 digit.');
                    hasError = true;
                }

                const $address = $('#address');
                clearError($address);
                const addressVal = ($address.val() || '').trim();
                if (addressVal.length < 5) {
                    setError($address, 'Alamat minimal 5 karakter.');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();
                }
            });

            $('#patient-form').on('input change', 'input, textarea, select', function () {
                clearError($(this));
            });

            $('#nik').on('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#phone').on('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
@endpush