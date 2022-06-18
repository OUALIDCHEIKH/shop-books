@section('title', 'Shop')

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>New Books</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<!-- start Filter Bar -->
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
							@foreach($categories as $category)
                            <li data-filter=".strawberry"><a href="{{route('bookCategory',['category_id'=>$category->id])}}">{{$category->category_name}}</a></li>
							@endforeach
                        </ul>
                    </div>
                </div>
            </div>
			<!-- End Filter Bar -->
			<!-- single product -->
			<div class="row product-lists">
				@foreach($books as $book)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{route('singleproduct',['book_id' => $book->id])}}"><img src="{{ asset($book->book_cover)}}" alt="" style="height: 450px !important;"></a>
						</div>
						<h3>{{$book->title}}</h3>
						<p class="product-price"> ${{$book->price}} </p>
						<form action="/cart" method="POST">
							@csrf
							<input type="hidden" name="book_id" value="{{$book->id}}" wire:model="qty">
							<button  name="submit" style="background: transparent; border:none;"><a class="cart-btn"><i class="fas fa-shopping-cart"></i>Add to Cart</a> </button>		
						</form>
					</div>
				</div>
				@endforeach
			</div>
			<!-- End single product -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->