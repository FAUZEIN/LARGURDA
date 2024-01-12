@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ url('/admin/dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    @php
                    $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>{{ $setting->company_name }}</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard')? 'active':'' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header nav-small-cap">Data Master</li>

            @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $coupons = (auth()->guard('admin')->user()->coupons == 1);
            $shipping = (auth()->guard('admin')->user()->shipping == 1);
            $cancel = (auth()->guard('admin')->user()->cancel == 1);
            $setting = (auth()->guard('admin')->user()->setting == 1);
            $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
            $review = (auth()->guard('admin')->user()->review == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $stock = (auth()->guard('admin')->user()->stock == 1);
            $reports = (auth()->guard('admin')->user()->reports == 1);
            $alluser = (auth()->guard('admin')->user()->alluser == 1);
            $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);

            @endphp


            @if($brand == true)
            <li class="treeview {{ ($prefix == '/brand')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Merek</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i
                                class="ti-more"></i>Kelola Merek</a></li>

                </ul>
            </li>
            @else
            @endif

            @if($category == true)
            <li class="treeview {{ ($prefix == '/category')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i> <span>Kategori </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i
                                class="ti-more"></i>Kategori</a></li>
                    <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a
                            href="{{ route('all.subcategory') }}"><i class="ti-more"></i>Sub Kategori</a></li>
                    <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a
                            href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>Sub->SubKategori</a>
                    </li>
                </ul>
            </li>

            @else
            @endif

            @if($product == true)

            <li class="treeview {{ ($prefix == '/product')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Produk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'add.product')? 'active':'' }}"><a href="{{ route('add.product') }}"><i
                                class="ti-more"></i>Tambah Produk</a></li>

                    <li class="{{ ($route == 'manage.product')? 'active':'' }}"><a
                            href="{{ route('manage.product') }}"><i class="ti-more"></i>Kelola Produk</a></li>

                </ul>
            </li>

            @else
            @endif

            @if($slider == true)


            <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i
                                class="ti-more"></i>Kelola Slider</a>
                    </li>
                </ul>
            </li>

            @else
            @endif

            @if($coupons == true)

            <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Kupon</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i
                                class="ti-more"></i>Kelola Kupon</a></li>
                </ul>
            </li>
            @else
            @endif

            @if($shipping == true)


            <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Data Wilayah</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a
                            href="{{ route('manage-division') }}"><i class="ti-more"></i>Provinsi</a></li>

                    <li class="{{ ($route == 'manage-district')? 'active':'' }}"><a
                            href="{{ route('manage-district') }}"><i class="ti-more"></i>Kota / Kabupaten</a></li>

                    <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{ route('manage-state') }}"><i
                                class="ti-more"></i>Kecamatan</a>
                    </li>
                </ul>
            </li>
            @else
            @endif

            {{-- @if($blog == true)


            <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i
                                class="ti-more"></i>Kategori Blog</a></li>

                    <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i
                                class="ti-more"></i>Daftar Blog</a></li>

                    <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i
                                class="ti-more"></i>Tambah Blog</a></li>

                </ul>
            </li>

            @else
            @endif --}}

            
            
            <li class="header nav-small-cap">Kelola Pesanan</li>

            @if($orders == true)
            <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Pesanan </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a
                            href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pesanan Masuk</a></li>

                    <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a
                            href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Pesanan Di Konfirmasi</a></li>

                    <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a
                            href="{{ route('processing-orders') }}"><i class="ti-more"></i>Pesanan Di Kemas</a></li>

                    <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i
                                class="ti-more"></i> Pesanan Dikirim</a></li>

                    <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a
                            href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Pesanan Dalam Perjalanan </a></li>

                    <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a
                            href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Pesanan Selesai</a></li>

                </ul>
            </li>
            @else
            @endif

            @if($cancel == true)
            <li class="treeview {{ ($prefix == '/cancel')?'active':'' }}">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Pembatalan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'cancel.request')? 'active':'' }}">
                        <a href="{{ route('cancel.request') }}"><i class="ti-more"></i>Permintaan Pembatalan</a>
                    </li>
                    <li class="{{ ($route == 'cancel.all.request')? 'active':'' }}">
                        <a href="{{ route('cancel.all.request') }}"><i class="ti-more"></i>Data Pembatalan</a>
                    </li>
                </ul>
            </li>
            @else
            @endif

            @if($returnorder == true)
            
            <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Pengembalian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'return.request')? 'active':'' }}"><a
                            href="{{ route('return.request') }}"><i class="ti-more"></i>Permintaan Pengembalian</a></li>

                    <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i
                                class="ti-more"></i>Data Pengembalian</a></li>


                </ul>
            </li>

            @else
            @endif

            

            @if($review == true)


            <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Ulasan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a
                            href="{{ route('pending.review') }}"><i class="ti-more"></i>Ulasan Masuk</a></li>

                    <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a
                            href="{{ route('publish.review') }}"><i class="ti-more"></i>Data Ulasan</a></li>


                </ul>
            </li>

            @else
            @endif

            @if($stock == true)


            <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Stok Produk </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i
                                class="ti-more"></i>Stok</a></li>


                </ul>
            </li>

            @else
            @endif



            <li class="header nav-small-cap">Pengaturan</li>

            @if($alluser == true)

            <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Data User </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i
                                class="ti-more"></i>User</a></li>


                </ul>
            </li>
            @else
            @endif

            @if($adminuserrole == true)


            <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Data Admin </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a
                            href="{{ route('all.admin.user') }}"><i class="ti-more"></i>Admin </a></li>


                </ul>
            </li>

            @else
            @endif

            @if($reports == true)

            <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Laporan </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i
                                class="ti-more"></i>Laporan Transaksi</a></li>


                </ul>
            </li>


            @else
            @endif

            @if($setting == true)

            <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i
                                class="ti-more"></i>Website</a></li>

                    <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i
                                class="ti-more"></i>Seo</a></li>


                </ul>
            </li>

            @else
            @endif

            


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>