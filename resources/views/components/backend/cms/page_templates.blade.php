<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>Templates</h2>
        </div>
    </div>
    <div class="card-body pt-0 fv-row fl">
        <label for="brand_id" class="form-label">Templates</label>
        <select name="brand_id" id="brand_id" class="form-select form-select-solid"
        data-hide-search="false"
        data-control="select2"
        data-close-on-select="true"
        data-placeholder="Templates"
        data-allow-clear="true"
        required data-fv-not-empty___message="
        {{ __('validation.required', ['attribute' => 'brand']) }}">
        <option></option>
        {{-- @foreach() --}}
        <option value="">

            asdasdasdsd
        </option>
        {{-- @endforeach --}}
    </select>
    </div>
</div>
