<div class="wrapper d-flex justify-content-between">
    <label class="label" for="sorting"><?php echo app('translator')->get('sorting'); ?>:</label>
    <select name="selected" id="sorting" wire:model="selected"  >
        <option value="default"><?php echo app('translator')->get('default-sorting'); ?></option>
        <option value="lowest"><?php echo app('translator')->get('lowest-price'); ?></option>
        <option value="highest" ><?php echo app('translator')->get('highest-price'); ?></option>
        <option value="popular"><?php echo app('translator')->get('most-popular'); ?></option>
    </select>
    <i class="icon-caret_down icon"></i>
</div><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/front/livewire/filter-for-products.blade.php ENDPATH**/ ?>