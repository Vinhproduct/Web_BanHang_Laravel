<div class="container">
    <div class="row">
      <div class="col-md-3 text-white py-3">
        <select class="form-select" name="brand" onchange="redirectToBrandPage(this)">
            <option value="">Thương Hiệu</option>
            @foreach ($list_brand as $brand)
                <option value="{{ $brand->slug }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
    
    <script>
        function redirectToBrandPage(selectElement) {
            var selectedBrandSlug = selectElement.value;
            if (selectedBrandSlug) {
                var url = "{{ route('site.product.brand', ['slug' => ':slug']) }}";
                url = url.replace(':slug', selectedBrandSlug);
                window.location.href = url;
            }
        }
    </script>
        <div class="col-md-9">
            <nav class="navbar navbar-expand-lg bg-danger">
                <div class="container-fluid">
                  <a class="navbar-brand d-none" href="#">Navbar</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                       
                      @foreach ($list_menu as $row_menu)
                        <x-main-menu-item :rowmenu="$row_menu" />
                      @endforeach
                      
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    </div>
</div>