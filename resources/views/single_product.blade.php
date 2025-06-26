@extends('layouts.frontend')

@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__title">
                    <h3>Product</h3>
                </div>
                <div class="breadcrumb__list">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li class="color-blue">Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- Product Detail Start -->
<div class="single-product sp_top_50 sp_bottom_80">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="featurearea_details_img">
                    <div class="featurearea_big_img">
                        <div class="featurearea_single_big_img">
                            <img src="{{ Storage::exists($product->image) ? Storage::url($product->image) : asset('assets/frontend/img/grid/grid_1.png') }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="featurearea_thumb_img featurearea_thumb_img_slider_active slider_default_arrow">
                        <div class="featurearea_single_thumb_img">
                            <img src="{{ Storage::exists($product->image) ? Storage::url($product->image) : asset('assets/frontend/img/grid/grid_1.png') }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-xl-6 col-lg-6">
                <div class="single_product_wrap">
                    <div class="single_product_heading">
                        <h2>{{ $product->name }}</h2>
                    </div>

                    <div class="single_product_price mb-2">
                        <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <hr>

                    <div class="single_product_description mb-3">
                        <p>{{ $product->description }}</p>
                    </div>

                    <div class="single_product__special_feature mb-3">
                        <ul>
                            <li class="product__variant_inventory">
                                <strong class="inventory__title">Availability:</strong>
                                <span class="variant__inventory">
                                    {{ $product->stock > 0 ? $product->stock . ' left in stock' : 'Out of Stock' }}
                                </span>
                            </li>
                            @php $averageRating = $product->reviews()->avg('point'); @endphp
                            @if($averageRating)
                                <li>
                                    <strong>Rating rata-rata: <strong>{{ number_format($averageRating, 1) }}/5</strong></strong>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="single_product_quantity mb-3">
                            <div class="qty-container mb-2">
                                <button type="button" class="qty-btn-minus btn-qty">-</button>
                                <input type="number" name="qty" value="1" max="{{ $product->stock }}" class="input-qty">
                                <button type="button" class="qty-btn-plus btn-qty">+</button>
                            </div>
                        </div>

                        <button type="submit" class="default_btn"> <i class="fa fa-shopping-cart"></i> Add to Cart </button>
                        <a href="#" class="default_button black_button">Buy it Now</a>
                    </form>

                    <div class="single_product_bottom_menu">
                        <ul>
                            <li><a href="#"><i class="far fa-heart"></i> Add to Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange-alt"></i> Compare</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Ask a Question</a></li>
                            <li><a href="#"><i class="fa fa-chart-bar"></i> Size Chart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review & Contact Section -->
<div class="single_product_contact sp_bottom_80">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-6">
                <div class="border p-4 rounded shadow-sm">
                    <h5 class="mb-3">Tulis Ulasan Anda</h5>

                    @auth
                    <form action="{{ route('review.store', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="mb-3">
                            <label for="point" class="form-label">Rating</label>
                            <select name="point" id="point" class="form-select" required>
                                <option value="">Pilih rating</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} Bintang</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komentar</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Ulasan</button>
                    </form>
                    @else
                    <p>Silahkan <a href="{{ route('login') }}">login</a> untuk memberikan ulasan.</p>
                    @endauth
                </div>
            </div>

            <!-- Display Review -->
            <div class="col-xl-6">
                <div class="border p-4 rounded shadow-sm">
                    <h5 class="mb-3">Ulasan pelanggan</h5>
                    @forelse ($product->reviews as $review)
                        <div class="mb-3 border-bottom">
                            <div class="d-flex justify-content-between mb-2">
                                <strong>{{ $review->user->name }}</strong>
                                <small class="text-muted">{{ $review->created_at->format('d M, H:i') }}</small>
                            </div>
                            <div class="mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa {{ $i <= $review->point ? 'fas' : 'far' }} fa-star text-warning"></i>
                                @endfor
                            </div>
                            <p class="mb-0">{{ $review->comment }}</p>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada ulasan untuk produk ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
