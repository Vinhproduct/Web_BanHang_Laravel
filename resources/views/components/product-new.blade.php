<div class="product-list mb-3" style="margin-left: 140px;">
    <div class="product_title border-bottom">
        <strong class="bg-danger text-white p-2">thời trang</strong>
    </div>
    <div class="product-list-s py-3">
        <div class="row">
            @foreach ($product_new as $product_item)
            <div class="col-md-3">
                <x-product-card :productitem="$product_item" />
            </div> 
            @endforeach       
        </div>
    </div>
</div>