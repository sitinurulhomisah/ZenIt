<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Nunito -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- css native -->
  <link rel="stylesheet" href="{{ asset('front/detail.css') }}">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <title>ZenIT</title>
</head>

<body>
  <section>
    <!-- navbar -->
    @php
                  $total = App\Models\Cart::all()->where('user_ip',auth()->id())->sum(function($a){
                   return $a->price * $a->quantity;
                  });
                  $qty = App\Models\Cart::all()->where('user_ip',auth()->id())->sum('quantity');


              @endphp

    @include('layouts.sidebar')

    <!-- content -->
    <div class="container">
      <div class="content">
        <div class="product">
          <div class="main-product">
            <img src="{{ $product->gallery->first()->getUrl() }}" alt="" id="main-product" onclick="prev(this)">
          </div>
          <div class="other-product">
            <div class="prev">
                @foreach ($product -> getMedia('gallery') as $gallery)
              <img src="{{ $gallery->getUrl() }}" alt="">
                @endforeach
            </div>
          </div>
        </div>
        <div class="description">
          <div class="name-product">
            <p>{{ $product->name }}</p>
          </div>
          <div id="rate">
            <div class="d-flex align-items-center">
              <div class="ratings">
                <i class="fa fa-star rating-color"></i>
                <i class=" fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star"></i>
              </div>
              <h5 class="review-count">(12 product)</h5>
            </div>
          </div>
          <div class="price">
            <p>Rp. {{ $product->price }}</p>
          </div>
          <div class="info-product">
            <p>{{ $product->desc }}</p>
          </div>
          <div class="btn-product">
            <a href="checkout-delivery.html"><button class="btn-buy"><i class="fa-solid fa-bag-shopping"></i>Buy Now</button></a>
            <button class="btn-cart"><i class="fa-solid fa-cart-shopping"></i>Add to cart</button>
          </div>
          <div class="profile">
            <div class="profile-img">
              <img src="assets/user.png" alt="">
            </div>
            <div class="profile-name">
              <div class="name">
                <p>Seller's Name</p>
              </div>
              <div class="other">
                <button id="btn-review">Visit Shop <i class="fa-solid fa-shop"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="review">
        <div class="review-rate">
          <div class="title-reviews">
            <p>Customer Reviews</p>
          </div>
          <div class="title-rate">
            <p>4.8</p>
            <div id="rate">
              <div class="d-flex align-items-center">
                <div class="ratings">
                  <i class="fa fa-star rating-color"></i>
                  <i class=" fa fa-star rating-color"></i>
                  <i class="fa fa-star rating-color"></i>
                  <i class="fa fa-star rating-color"></i>
                  <i class="fa fa-star"></i>
                </div>
                <h5 class="review-count">(12 Reviews)</h5>
              </div>
            </div>
          </div>
          <div class="review-rating">
            <div class="five-rate">
              <div class="icon-star">
                <i class="fa fa-star rating-color"></i>
              </div>
              <div class="title-star">
                <p>5</p>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 90%; background-color: #29BB89;"
                  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="four-rate">
              <div class="icon-star">
                <i class="fa fa-star rating-color"></i>
              </div>
              <div class="title-star">
                <p>4</p>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #7ECA9C;"
                  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="three-rate">
              <div class="icon-star">
                <i class="fa fa-star rating-color"></i>
              </div>
              <div class="title-star">
                <p>3</p>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 30%; background-color: #FFCC29;"
                  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="two-rate">
              <div class="icon-star">
                <i class="fa fa-star rating-color"></i>
              </div>
              <div class="title-star">
                <p>2</p>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 10%; background-color: #F58634;"
                  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="one-rate">
              <div class="icon-star">
                <i class="fa fa-star rating-color"></i>
              </div>
              <div class="title-star">
                <p>1</p>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 5%; background-color: #FF4A4A;"
                  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="other-comment">
          <div class="comment">
            <div class="comment-user">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
          </div>
          <div class="comment">
            <div class="comment-user">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quam quae blanditiis
                  quibusdam cupiditate. Quis eos dignissimos odio ducimus voluptates suscipit, vitae nisi harum voluptas
                  sunt exercitationem eligendi nam omnis? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Voluptatum corrupti fugiat officiis ratione error cum, quia, vero dicta praesentium, dignissimos ex a
                  esse deserunt accusantium aliquid? Non, soluta eaque. Voluptas?</p>
              </div>
            </div>
          </div>
          <div class="comment">
            <div class="comment-user">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore unde quo doloribus
                  perferendis neque consectetur iste dolore enim nostrum quam, omnis ab veniam! Praesentium rerum, alias
                  aut ipsam tempora fuga!</p>
              </div>
            </div>
          </div>
        </div>
        </div>
      <div class="related">
        <div class="related-title">
          <div class="related-text">
            <p>Related Product</p>
          </div>
          <div class="see-more">
            <a href="">See More...</a>
          </div>
        </div>
        <div class="related-product">
            @foreach($related_products as $related_product)
          <div class="card-related">
            <img class="gambar" src="{{ $related_product->gallery->first()->getUrl() }}" alt="">
            <div class="isinya">
              <div class="details">
                <div class="nama">
                  <p><a href="{{ route('product.show', $related_product->slug) }}">{{ $related_product->name }}</a></p>
                </div>
                <div class="harga">
                  <p>Rp.{{ $related_product->price }}</p>
                </div>
              </div>
              <img class="detail" src="assets/menu.png" alt="">
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- end content -->

    <!-- modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="header">
          <span class="close">&times;</span>
          <p>Product Name</p>
        </div>
        <div class="product">
          <div class="main-modal">
            <!-- <div class="modal-prev">
              <button><i class="fa-solid fa-caret-left"></i></button>
            </div> -->
            <div class="modal-product">
              <img src="" alt="" id="main-modal">
            </div>
            <!-- <div class="modal-next">
              <button><i class="fa-solid fa-caret-right"></i></button>
            </div> -->
          </div>
          <div class="other-modal">
            <img src="assets/web1.jpg" alt="" class="coba">
            <img src="assets/web2.jpg" alt="" class="coba">
            <img src="assets/web3.jpg" alt="" class="coba">
            <img src="assets/web4.jpg" alt="" class="coba">
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->
    <!-- modal -->
    <div id="myRev" class="modalreview">
      <div class="modalreview-content">
        <div class="header">
          <span class="close close-rev">&times;</span>
        </div>
        <p class="cust-rev">Customer Review</p>
        <div class="review-modal scrollbar" id="style-3">
          <div class="comment force-overflow">
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>

            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
            <div class="comment-modal">
              <div class="profile-comment">
                <div class="profile-comment-img">
                  <img src="assets/user.png" alt="">
                </div>
                <div class="profile-comment-name">
                  <div class="name-comment">
                    <p>Customers Name</p>
                  </div>
                  <div id="rate">
                    <div class="d-flex align-items-center">
                      <div class="ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class=" fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-comment">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel cum quibusdam eaque laboriosam, voluptate
                  id molestiae consectetur ipsa tempore quas eum, recusandae beatae, delectus minus harum rerum architecto
                  error modi!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal -->

    <!-- footer -->
    <footer>
      <div class="footer">
        <div class="konten">
          <div class="kategori">
            <ul>
              <li>
                <p>Kategori</p>
              </li>
              <li><a href="">RPL</a></li>
              <li><a href="">TJKT</a></li>
              <li><a href="">BRC</a></li>
              <li><a href="">TE</a></li>
              <li><a href="">Animasi</a></li>
            </ul>
          </div>
          <div class="help-center">
            <ul>
              <li>
                <p>Help Center</p>
              </li>
              <li><a href="">FAQS</a></li>
              <li><a href="">Terms & Conditions</a></li>
              <li><a href="">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="school-info">
            <ul>
              <li>
                <p>School Info</p>
              </li>
              <li><a
                  href="https://smktarunabhakti.net/index.php/whytarbak-before-import/identitas-sekolah-before-import/">About
                  Us</a>
              </li>
              <li><a
                  href="https://smktarunabhakti.net/index.php/struktur-kurikulum-sekolah-menengah-kejuruan-madrasah-aliyah-kejuruan-before-import/">Curicullum</a>
              </li>
              <li><a
                  href="https://smktarunabhakti.net/index.php/kurikulum-before-import/kompetensi-keahlian-smk-taruna-bhakti-before-import/">Subject</a>
              </li>
            </ul>
          </div>

          <div class="logo-copyright">
            <img src="assets/logoTb.png" alt="">
            <p>Copyright ©2022 SMK Taruna Bhakti </p>
          </div>
        </div>
        <div class="sosmed">
          <p>Contact Us</p>
          <ul>
            <li>
              <a href="https://www.instagram.com/smktarunabhakti.depok/">
                <img src="assets/instagram.png" alt="">
              </a>
            </li>
            <li>
              <a href="https://www.youtube.com/c/SMKTarunaBhaktiDepok">
                <img src="assets/youtube.png" alt="">
              </a>
            </li>
            <li>
              <a href="https://www.facebook.com/smktarunabhaktidepok">
                <img src="assets/facebook.png" alt="">
              </a></li>

            <li>
              <a href="https://mail.google.com/mail/u/0/?hl=en#inbox">
                <img src="assets/email.png" alt="">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <div class="copyright">
      <p>Copyright ©2022 SMK Taruna Bhakti </p>
    </div>

    <!-- end footer -->
  </section>
  <script src="{{ asset('front/detail.js') }}"></script>
</body>

</html>
