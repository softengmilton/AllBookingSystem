<?php if(is_default_lang()): ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Price")); ?> <span class="text-danger">*</span></label>
            <input type="number" required value="<?php echo e($row->price); ?>" min="1" placeholder="<?php echo e(__("Price")); ?>" name="price" id="price" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Number of room")); ?> <span class="text-danger">*</span></label>
            <input type="number" required value="<?php echo e($row->number ?? 1); ?>" min="1" max="100" placeholder="<?php echo e(__("Number")); ?>" name="number" class="form-control">
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Discount Type")); ?> <span class="text-danger">*</span></label>
            <select name="tax_type" id="tax_type" class="form-control" onchange="toggleDiscountInput()">
                <option value="">Select</option>
                <option value="fixed">Fixed</option>
                <option value="percentage">Percentage</option>
            </select>
        </div>
    </div>
    <div class="col-md-6" id="discount_input_container" style="display: none;">
        <div class="form-group">
            <label id="discount_label"></label>
            <div class="input-group mb-3">
                <input type="number" name="tax" id="tax" class="form-control" placeholder="Enter discount value">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" onclick="updatePrice()">Apply Discount</button>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<!---hotel room--->
<?php if(is_default_lang()): ?>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="control-label"><?php echo e(__("Minimum day stay requirements")); ?></label>
            <input type="number" name="min_day_stays" class="form-control" value="<?php echo e($row->min_day_stays); ?>" placeholder="<?php echo e(__("Ex: 2")); ?>">
            <i><?php echo e(__("Leave blank if you dont need to set minimum day stay option")); ?></i>
        </div>
    </div>
</div>
<hr>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Number of beds")); ?> </label>
            <input type="number" value="<?php echo e($row->beds ?? 1); ?>" min="1" max="10" placeholder="<?php echo e(__("Number")); ?>" name="beds" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Room Size")); ?> </label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="size" value="<?php echo e($row->size ?? 0); ?>" placeholder="<?php echo e(__("Room size")); ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><?php echo size_unit_format(); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Max Adults")); ?> </label>
            <input type="number" min="1" value="<?php echo e($row->adults ?? 1); ?>" name="adults" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label><?php echo e(__("Max Children")); ?> </label>
            <input type="number" min="0" value="<?php echo e($row->children ?? 0); ?>" name="children" class="form-control">
        </div>
    </div>
</div>
<hr>
<?php endif; ?>

<script>
    function toggleDiscountInput() {
        const discountType = document.getElementById('tax_type').value;
        const discountInputContainer = document.getElementById('discount_input_container');
        const discountLabel = document.getElementById('discount_label');
        const discountValueInput = document.getElementById('tax');

        if (discountType === 'fixed' || discountType === 'percentage') {
            discountInputContainer.style.display = 'block';
            discountLabel.innerText = discountType === 'fixed' ? 'Fixed Discount' : 'Percentage Discount';
            discountValueInput.placeholder = discountType === 'fixed' ? 'Enter fixed amount' : 'Enter percentage';
        } else {
            discountInputContainer.style.display = 'none';
        }
    }

    function updatePrice() {
        const priceInput = document.getElementById('price');
        const discountType = document.getElementById('tax_type').value;
        const discountValue = parseFloat(document.getElementById('tax').value);
        const originalPrice = parseFloat(priceInput.value);

        if (!isNaN(discountValue) && !isNaN(originalPrice)) {
            let newPrice;

            if (discountType === 'fixed') {
                // Subtract fixed discount from the original price
                newPrice = originalPrice - discountValue;
            } else if (discountType === 'percentage') {
                // Calculate percentage discount
                newPrice = originalPrice - (originalPrice * (discountValue / 100));
            } else {
                // No discount selected, keep the original price
                newPrice = originalPrice;
            }

            // Ensure the price doesn't go below 0
            if (newPrice < 0) {
                newPrice = 0;
            }

            // Update the price input with the new calculated price
            priceInput.value = newPrice.toFixed(2); // Round to 2 decimal places
        } else {
            alert('Please enter valid discount value and original price.');
        }
    }
</script><?php /**PATH E:\Mytravel.2.4.2\modules/Hotel/Views/admin/room/form-detail/pricing.blade.php ENDPATH**/ ?>