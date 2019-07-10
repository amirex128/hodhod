<?php

	namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\model\Brand;
    use App\model\Category;
    use App\model\Color;
    use App\model\Design;
    use App\model\Product;
    use App\model\Size;

    class ProductController extends Controller
	{

		public function getAllProduct()
		{

			$products = Product::with("categories" , "colors" , "designs" , "sizes" , "brand" , "user")->get();

			return $products;
		}

		public function getManyProduct(Category $Category)
		{

			return response([
				'category' => $Category->products->all()
				, 'filter' => [
					'brands' => Brand::all() ,
					'colors' => Color::all() ,
					'sizes' => Size::all() ,
					'designs' => Design::all() ,
					'price_min' => Product::min('price') ,
					'price_max' => Product::max('price') ,
				],
			]);

		}

        public function getOneProduct($product)
        {
            if (!Product::whereId($product)->count() > 0) {
                return response(['error' => 'not found'], 404);
            }

            $product = Product::find($product);

            $product->increment('view_count');

            $product->save();

            return $product->load("categories" , "colors" , "designs" , "sizes" , "brand" , "user");
		}


        public function popular($count)
        {
            return Product::orderBy('view_count', 'desc')->take($count)->get();
		}

        public function new($count)
        {
            return Product::latest()->take($count)->get();
		}

        public function special($count)
        {

            return Product::where('special',1)->orderBy('view_count', 'desc')->take($count)->get();
		}


        public function offer($count)
        {
            return Product::whereNotNull('offer')->orderBy('view_count','desc')->take($count)->get();
		}

        public function search()
        {
            $searchTrem=\request()->search;
            return Product::where('title',"like","%{$searchTrem}%")->orWhere('description',"like","%{$searchTrem}%")->get();
		}

        public function getArray()
        {
            return Product::find(\request()->products)->load("colors","sizes");
		}
	}
