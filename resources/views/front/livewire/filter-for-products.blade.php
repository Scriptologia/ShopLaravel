<div class="wrapper d-flex justify-content-between">
    <label class="label" for="sorting">@lang('sorting'):</label>
    <select name="selected" id="sorting" wire:model="selected"  >
        <option value="default">@lang('default-sorting')</option>
        <option value="lowest">@lang('lowest-price')</option>
        <option value="highest" >@lang('highest-price')</option>
        <option value="popular">@lang('most-popular')</option>
    </select>
    <i class="icon-caret_down icon"></i>
</div>