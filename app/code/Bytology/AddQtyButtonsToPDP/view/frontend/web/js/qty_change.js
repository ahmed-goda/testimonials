<div class="control" data-bind="scope: 'qty_change'">
    <button data-bind="click: decreaseQty">-</button>
    <input  data-bind="value: qty()"
        type="number"
        name="qty"
        id="qty"
        maxlength="12"
        title="<?php echo __('Qty') ?>"
        class="input-text qty"
        data-validate="<?php echo $block->escapeHtml(json_encode($block->getQuantityValidators())) ?>"
    />
    <button data-bind="click: increaseQty">+</button>
</div>