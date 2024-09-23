<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('page', 'about-us') }}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('industries.index') }}">Industries</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('page', 'support') }}">Support</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>PRODUCTS</h4>
                    <ul>
                        @foreach ($categories as $category)
                            <li><i class="bx bx-chevron-right"></i><a title="{{ $category->title}}" href="{{ route('categories.index',$category->slug)}}">{{ $category->title}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>
                    {{ $address }}
                    </p>

                </div>

                <div class="col-lg-3 col-md-6 footer-info">
                    <h3></h3>
                    <p>
                        Phone: + {{ $phone }}<br>
                        Mob.: +  {{ $mobile }}<br>
                        Email:  {{ $email }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <P>
                &copy; Copyright. All Rights Reserved <br>
                <em>Designed by:</em> <strong>Invent solutions</strong>
            </P>
        </div>

    </div>
</footer><!-- End Footer -->
