@if(is_default_lang())
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Price")}} <span class="text-danger">*</span></label>
            <input type="number" step="0.01" value="{{$row->price}}" min="1" placeholder="{{__("Price")}}" name="price" id="price" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Number of room")}} <span class="text-danger">*</span></label>
            <input type="number" required value="{{$row->number ?? 1}}" min="1" max="100" placeholder="{{__("Number")}}" name="number" class="form-control">
        </div>
    </div>
</div>
<hr>

<div class="row">
    <input name="tax_type" id="tax_type" value="percentage" class="form-control" hidden>

    <div class="col-md-12">
        <div class="form-group">
            <label>{{__("Percentage Discount")}}</label>
            <div class="input-group mb-3">
                <input type="number" step="0.01" name="tax" id="tax" value="{{$row->tax ?? 0}}" class="form-control" placeholder="Enter percentage">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" onclick="updatePrice()">Apply Discount</button>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<!---hotel room--->
@if(is_default_lang())
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="control-label">{{__("Minimum day stay requirements")}}</label>
            <input type="number" name="min_day_stays" class="form-control" value="{{$row->min_day_stays}}" placeholder="{{__("Ex: 2")}}">
            <i>{{ __("Leave blank if you dont need to set minimum day stay option") }}</i>
        </div>
    </div>
</div>
<hr>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Number of beds")}} </label>
            <input type="number" value="{{$row->beds ?? 1}}" min="1" max="10" placeholder="{{__("Number")}}" name="beds" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Room Size")}} </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="size" value="{{$row->size ?? 0}}" placeholder="{{__("Room size")}}">
                <div class="input-group-append">
                    <span class="input-group-text">{!! size_unit_format() !!}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Max Adults")}} </label>
            <input type="number" min="1" value="{{$row->adults ?? 1}}" name="adults" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>{{__("Max Children")}} </label>
            <input type="number" min="0" value="{{$row->children ?? 0}}" name="children" class="form-control">
        </div>
    </div>
</div>
<hr>
@endif

<script>
    function updatePrice() {
        const priceInput = document.getElementById('price');
        const discountValue = parseFloat(document.getElementById('tax').value);
        const originalPrice = parseFloat(priceInput.value);

        if (!isNaN(discountValue) && !isNaN(originalPrice)) {
            // Calculate percentage discount
            newPrice = originalPrice - (originalPrice * (discountValue / 100));

            // Ensure the price doesn't go below 0
            if (newPrice < 0) {
                newPrice = 0;
            }

            // Update the price input with the new calculated price
            priceInput.value = newPrice.toFixed(2); // Round to 2 decimal places
        } else {
            alert('Please enter valid discount percentage and original price.');
        }
    }
</script>