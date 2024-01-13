<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EvaraController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ProductOfferController;
use App\Http\Controllers\PurchaseGuideController;
use App\Http\Controllers\ReturnPolicyController;
use App\Http\Controllers\ShippingPolicyController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\TermsConditionController;

// Evara Controller
Route::get('/', [EvaraController::class,'index'])->name('home');
Route::get('/product-category/{id}', [EvaraController::class,'category'])->name('product-category');
Route::get('/product-sub-category/{id}', [EvaraController::class,'subCategory'])->name('product-sub-category');
Route::get('/product-details/{id}', [EvaraController::class,'product'])->name('product-details');

// Pages Controller
Route::get('/about-us', [PagesController::class,'about'])->name('about');
Route::get('/purchase-guide', [PagesController::class,'purchaseGuide'])->name('purchase-guide');
Route::get('/terms-condition', [PagesController::class,'termsCondition'])->name('terms-condition');
Route::get('/return-policy', [PagesController::class,'returnPolicy'])->name('return-policy');
Route::get('/shipping-policy', [PagesController::class,'shippingPolicy'])->name('shipping-policy');
Route::get('/contact', [PagesController::class,'contact'])->name('contact');

// Cart Controller
Route::resources(['cart' => CartController::class]);
Route::get('/cart/delete-product/{rowId}',[CartController::class,'delete'])->name('cart.delete');
Route::post('/cart/update-product',[CartController::class,'updateProduct'])->name('cart.update-product');

// Checkout Controller
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/new-order',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');

// Custom Auth Controller
Route::get('/login-register',[CustomerAuthController::class,'login'])->name('login-register');
Route::post('/login-check',[CustomerAuthController::class,'loginCheck'])->name('login-check');
Route::post('/new-customer',[CustomerAuthController::class,'newCustomer'])->name('new-customer');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer-logout');

Route::middleware(['customer'])->group(function () {
    Route::get('/my-dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard');
});

// Wishlish Controller
Route::resource('wishlist', WishlistController::class);
Route::get('/wishlist/add/{id}',[WishlistController::class,'addWishlist'])->name('wishlist.add');




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('category',CategoryController::class);
    Route::resource('sub-category',SubCategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('unit',UnitController::class);
    Route::resource('color',ColorController::class);
    Route::resource('size',SizeController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product_offer', ProductOfferController::class);
    Route::resource('order', OrderController::class);
    Route::resource('feature',FeatureController::class);
    Route::resource('courier',CourierController::class);
    Route::resource('ad',AdController::class);
    Route::resource('setting',SettingController::class);
    Route::resource('user',UserController::class)->middleware('superAdmin');
    Route::resource('purchase-guide',PurchaseGuideController::class);
    Route::resource('shipping-policy',ShippingPolicyController::class);
    Route::resource('return-policy',ReturnPolicyController::class);
    Route::resource('terms-condition',TermsConditionController::class);
    Route::get('/get-sub-category-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::get('/order/invoice-show/{id}',[OrderController::class,'showInvoice'])->name('order.invoice-show');
    Route::get('/order/invoice-download/{id}',[OrderController::class,'showDownload'])->name('order.invoice-download');
});
