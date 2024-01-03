<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="{{ $product->Product_Image }}" width="250" height="400" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"></div> 
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"></span>
                                <h5 style="margin-top: 60px;font-weight:700;" class="text-uppercase">{{ $product->Product_Name }}</h5>
                                <div class="price d-flex flex-row align-items-center"> <span style="color: green;" class="act-price">Price: {{ $product->Price }} tk</span>
                                    <div class="ml-2"> <small class="dis-price"></small> <span></span> </div>
                                </div>
                            </div>
                            <p class="about"><span style="color:green">Category:</span> {{ $product->Category }}</p>
                            <p class="about"><span style="color:green">Description:</span> {{ $product->Description }}</p>
                          
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>