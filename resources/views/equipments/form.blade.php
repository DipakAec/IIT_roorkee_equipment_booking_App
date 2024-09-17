
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="mb-3">
                <label for="image" class="form-label">Equipment Image</label>
                <input type="file" name="image" class="form-control" id="image"
                    value="{{ old('name', $equipment->image ?? '') }}">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name', $equipment->name ?? '') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="incharge_name" class="form-label">Incharge Name</label>
                <input type="text" name="incharge_name" class="form-control" id="incharge_name"
                    value="{{ old('incharge_name', $equipment->incharge_name ?? '') }}" required>
                @error('incharge_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="incharge_email" class="form-label">Incharge Email</label>
                <input type="text" name="incharge_email" class="form-control" id="incharge_email"
                    value="{{ old('incharge_email', $equipment->incharge_email ?? '') }}" required>
                @error('incharge_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="incharge_phone" class="form-label">Incharge Phone</label>
                <input type="text" name="incharge_phone" class="form-control" id="incharge_phone"
                    value="{{ old('incharge_phone', $equipment->incharge_phone ?? '') }}" required>
                    <small class="form-text text-muted">Please enter only numbers.</small>
                @error('incharge_phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="number_of_slots" class="form-label">Number of Slots</label>
                <input type="number" name="number_of_slots" class="form-control" id="number_of_slots"
                    value="{{ old('number_of_slots', $equipment->number_of_slots ?? '') }}" required>
                @error('number_of_slots')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" id="status" aria-label="Default select example" required>
                    <option value="" disabled>Select the status</option>
                    <option value="1" {{ old('status', $equipment->status ?? '') == '1' ? 'selected' : '' }}>Active
                    </option>
                    <option value="0" {{ old('status', $equipment->status ?? '') == '0' ? 'selected' : '' }}>Deactive
                    </option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="sample_requirements" class="form-label">Sample Requirements</label>
                <input type="text" name="sample_requirements" class="form-control" id="sample_requirements"
                    value="{{ old('sample_requirements', $equipment->sample_requirements ?? '') }}" required>
                @error('sample_requirements')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="additional_accessories" class="form-label">Additional Accessories</label>
                <input type="text" name="additional_accessories" class="form-control" id="additional_accessories"
                    value="{{ old('additional_accessories', $equipment->additional_accessories ?? '') }}" required>
                @error('additional_accessories')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control" id="location"
                    value="{{ old('location', $equipment->location ?? '') }}" required>
                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6">
        @if( isset($equipment->image) && $equipment->image != null)
        <img style="max-height:500px;object-size:cover;" src="{{ asset('website/' . $equipment->image) }}" alt="">
        @else
        <img style="max-height:250px;width:fit-content;" src="{{ asset('assets/img/undraw_posting_photo.svg') }}" alt="">
        @endif
    </div>
</div>

