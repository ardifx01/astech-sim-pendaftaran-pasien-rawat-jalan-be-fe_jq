@push('styles')
    <style>
        .input-group {
            margin-bottom: 1rem;
        }
    </style>
@endpush

<form action="{{ route('visits.store') }}" method="post" id="visit-form">
    @csrf
    <label for="patient_id">Pasien <span class="text-danger">*</span></label>
    <div class="input-group">
        <select name="patient_id" id="patient_id" class="form-control" required {{ $visit ? 'readonly' : '' }}>
            @if ($visit)
                <option value="{{ $visit->patient_id }}" selected>{{ $visit->patient->name }}</option>
            @else
                <option value="" disabled selected>- Pilih Pasien -</option>
            @endif
        </select>
        @if($visit)
            <input type="hidden" name="patient_id" value="{{ $visit->patient_id }}">
        @endif
    </div>

    <label for="poli">Poli <span class="text-danger">*</span></label>
    <div class="input-group">
        <select name="department" id="poli" class="form-control" required {{ $visit ? 'readonly' : '' }}>
            @if ($visit)
                <option value="{{ $visit->department }}" selected>{{ $visit->department }}</option>
            @else
                <option value="" disabled selected>- Pilih Poli -</option>
            @endif
        </select>
        @if($visit)
            <input type="hidden" name="department" value="{{ $visit->department }}">
        @endif
    </div>
    
    <label for="dokter">Dokter <span class="text-danger">*</span></label>
    <div class="input-group">
        <select name="doctor_name" id="dokter" class="form-control" required {{ $visit ? 'readonly' : '' }}>
            @if ($visit)
                <option value="{{ $visit->doctor_name }}" selected>{{ $visit->doctor_name }}</option>
            @else
                <option value="" disabled selected>- Pilih Dokter -</option>
            @endif
        </select>
        @if($visit)
            <input type="hidden" name="doctor_name" value="{{ $visit->doctor_name }}">
        @endif
    </div>

    <label for="visit_date">Tanggal Kunjungan <span class="text-danger">*</span></label>
    <div class="input-group">
        <input type="date" name="visit_date" id="visit_date" class="form-control" required
               {{ $visit ? 'readonly' : '' }} value="{{ old('visit_date', $visit->visit_date ?? '') }}">
    </div>

    <label for="complaint">Keluhan <span class="text-danger">*</span></label>
    <div class="input-group">
        <textarea name="complaint" id="complaint" class="form-control" placeholder="Minimal 5 karakter" required
                  {{ $visit ? 'readonly' : '' }}>{{ old('complaint', $visit->complaint ?? '') }}</textarea>
    </div>

    @if (!$visit)
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('visits.index') }}" class="btn btn-secondary">Batal</a>
    @endif

</form>