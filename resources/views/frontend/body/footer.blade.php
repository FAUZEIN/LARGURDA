<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                @php
                $setting = App\Models\SiteSetting::find(1);
                @endphp

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">{{ $setting->company_name }}</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <a href="">
                            <p style="color: #fff;">{!! $setting->description !!}</p>
                        </a>
                    </div>
                    <!-- /.module-body -->
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Link</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="#">Tentang Kami</a></li>
                            <li><a title="Information" href="#">Pelayanan Pelanggan</a></li>
                            <li><a title="Information" href="#">Blog</a></li>
                            <li><a title="Information" href="#">Brand</a></li>
                            <li><a title="Addresses" href="#">Kontak Kami</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Pelayanan Pelanggan</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">Akun Saya</a></li>
                            <li><a href="#" title="About us">Riwayat Transaksi</a></li>
                            <li><a href="#" title="faq">FAQ</a></li>
                            <li><a href="#" title="Popular Searches">Promo</a></li>
                            <li class="last"><a href="#" title="Where is my order?">Bantuan</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Hubungi Kami</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{ $setting->company_name }}, {{ $setting->company_address }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-whatsapp fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{ $setting->phone_one }}<br>
                                        {{ $setting->phone_two }}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">{{ $setting->email }}</a></span> </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-12 no-padding social">
                <p class="text-center" style="color: #b667f1"><i class="fa fa-copyright" aria-hidden="true"></i>2022 Largurda. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>