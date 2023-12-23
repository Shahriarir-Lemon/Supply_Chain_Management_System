
    
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="next">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class="bx bx-chevron-right"></i></li>
                <li class="{{ Route::is('raw_material_list') ? 'active' : '' }}">
                    <a href="{{ route('raw_material_list') }}">
                        {{ Route::is('raw_material_list') ? 'Raw Materials' : '' }}
                    </a>
                </li>
                <li class="{{ Route::is('product_list') ? 'active' : '' }}">
                    <a href="{{ route('product_list') }}">
                        {{ Route::is('product_list') ? 'Products' : '' }}
                    </a>
                </li>
                <li class="{{ Route::is('category_list') ? 'active' : '' }}">
                    <a href="{{ route('category_list') }}">
                        {{ Route::is('category_list') ? 'Manage Category' : '' }}
                    </a>
                </li>
                <li class="{{ Route::is('unit_list') ? 'active' : '' }}">
                    <a href="{{ route('unit_list') }}">
                        {{ Route::is('unit_list') ? 'Manage Unit' : '' }}
                    </a>
                </li>
                <li class="{{ Route::is('all_request') ? 'active' : '' }}">
                    <a href="{{ route('all_request') }}">
                        {{ Route::is('all_request') ? 'All Request(Dis.)' : '' }}
                    </a>
                </li>
                <li class="{{ Route::is('available_product') ? 'active' : '' }}">
                    <a href="{{ route('available_product') }}">
                        {{ Route::is('available_product') ? 'Available Product' : '' }}
                    </a>
                </li>
                <li class="{{ Route::is('customer_order') ? 'active' : '' }}">
                    <a href="{{ route('customer_order') }}">
                        {{ Route::is('customer_order') ? 'Customer Orders' : '' }}
                    </a>
                </li>
            </ul>
        </div>
      
    </div> 







  