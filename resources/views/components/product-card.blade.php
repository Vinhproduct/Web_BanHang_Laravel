<div class="col-md-3">
    <table style="border: 0.5px solid #f10a72; padding: 10px;">
        <tr>
            <td colspan="2">
                <a href="{{route('site.product.detail',['slug'=>$product->slug])}}">
                    <img src="{{asset('images/products/'.$product->image)}}" alt="">
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="{{route('site.product.detail',['slug'=>$product->slug])}}" style="text-decoration: none;  color: rgb(152, 0, 99);">
                    <h5><strong>{{ $product->name }}</strong></h5>
                </a>
            </td>
        </tr>
        @if ($product->pricesale>0 && $product->pricesale< $product->price)
            <tr>
                <td colspan="2">
                    <h6 style="text-align: center;">{{ number_format($product->price) }}</h6>
                    <del>{{ number_format($product->pricesale) }}</del>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">50%</td>
                <td></td>
            </tr>
        @else
            <tr>
                <td colspan="2">
                    <h6 style="text-align: center;">{{ number_format($product->price) }}<sub>VNĐ</sub></h6>
                </td>
            </tr>
        @endif
    </table>
</div>