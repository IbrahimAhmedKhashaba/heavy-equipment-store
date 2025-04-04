<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Catalog;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Cache::remember('setting', 3600, function () {
            return $this->firstOrCreateSetting();
        });
        $categories = Cache::remember('categories', 3600, function () {
            return Category::all();
        });
        $catalog = Cache::remember('catalog', 3600, function () {
            return Catalog::first();
        });
        $products_count = Cache::remember('products_count', 3600, function () {
            return Product::all()->count();
        });

        view()->share([
            'setting' => $setting,
            'categories' => $categories,
            'catalog' => $catalog,
            'products_count' => $products_count,
        ]);


        view()->composer('dashboard.*', function ($view) use ($categories, $products_count) {

            $categories_count = $categories->count();

            $users_count = Cache::remember('users_count', 3600, function () {
                return User::all()->count();
            });
            $products_count = Cache::remember('products_count', 3600, function () {
                return Product::all()->count();
            });
            $contacts_count = Cache::remember('contacts_count', 3600, function () {
                return Contact::all()->count();
            });

            $unread_contacts = Cache::remember('unread_contacts', 3600, function () {
                return Contact::where('is_read', 0)->get();
            });

            view()->share([
                'users_count' => $users_count,
                'products_count' => $products_count,
                'categories_count' => $categories_count,
                'contacts_count' => $contacts_count,
                'unread_contacts' => $unread_contacts
            ]);
        });
    }

    public function firstOrCreateSetting()
    {
        $getSetting = Setting::firstOr(function () {
            return Setting::create([
                'site_name' => [
                    'ar' => 'متجر الكتروني',
                    'en' => 'E-Commerce',
                ],
                'site_description' => [
                    'en' => 'Welcome to [Your Store Name], your one-stop destination for the latest and greatest products!
                                We are committed to providing high-quality products, affordable prices, and exceptional customer service.

                                At [Your Store Name], we offer a wide range of categories, from fashion and electronics to home essentials and more. Our goal is to make online shopping easy, secure, and enjoyable.

                                💡 Why shop with us?
                                ✔️ 100% Authentic Products
                                ✔️ Secure Payments & Fast Shipping
                                ✔️ 24/7 Customer Support

                                Thank you for choosing [Your Store Name] – where quality meets convenience!',

                    'ar' => 'مرحبًا بكم في [اسم المتجر]، وجهتكم المثالية للحصول على أحدث المنتجات وأفضل العروض!
                                        نحن ملتزمون بتقديم منتجات عالية الجودة بأسعار تنافسية وخدمة عملاء استثنائية.

                                        في [اسم المتجر]، نقدم مجموعة واسعة من المنتجات، بدءًا من الأزياء والإلكترونيات إلى المستلزمات المنزلية وأكثر من ذلك. هدفنا هو جعل التسوق عبر الإنترنت سهلًا وآمنًا وممتعًا.

                                        💡 لماذا تتسوق معنا؟
                                        ✔️ منتجات أصلية 100%
                                        ✔️ طرق دفع آمنة وشحن سريع
                                        ✔️ دعم فني متاح 24/7

                                        شكرًا لاختيارك [اسم المتجر] – حيث تلتقي الجودة بالراحة!',
                ],
                'about_us_image' => 'about-us.jpg',
                'site_address' => [
                    'en' => 'Egypt , Sohag , Awlad Hamza',
                    'ar' => 'مصر , سوهاج ,  أولاد حمزة',
                ],
                'site_phone' => '01124782711',
                'site_whatsapp' => '01124782711',
                'site_email' => 'ibrahim@gmail.com',

                'site_fax' => '01124782711',
                'latitude' => 24.694969,
                'longitude' => 46.724129,
                'site_logo' => 'logo.png',
                'site_favicon' => 'logo.png',
                'site_vedio' => 'https://www.youtube.com/embed/SsE5U7ta9Lw?rel=0&amp;controls=0&amp;showinfo=0',

                'after_sale_content' => [
                    'en' => 'Welcome to [Your Store Name], your one-stop destination for the latest and greatest products!
                                We are committed to providing high-quality products, affordable prices, and exceptional customer service.

                                At [Your Store Name], we offer a wide range of categories, from fashion and electronics to home essentials and more. Our goal is to make online shopping easy, secure, and enjoyable.

                                💡 Why shop with us?
                                ✔️ 100% Authentic Products
                                ✔️ Secure Payments & Fast Shipping
                                ✔️ 24/7 Customer Support

                                Thank you for choosing [Your Store Name] – where quality meets convenience!',

                    'ar' => 'مرحبًا بكم في [اسم المتجر]، وجهتكم المثالية للحصول على أحدث المنتجات وأفضل العروض!
                                        نحن ملتزمون بتقديم منتجات عالية الجودة بأسعار تنافسية وخدمة عملاء استثنائية.

                                        في [اسم المتجر]، نقدم مجموعة واسعة من المنتجات، بدءًا من الأزياء والإلكترونيات إلى المستلزمات المنزلية وأكثر من ذلك. هدفنا هو جعل التسوق عبر الإنترنت سهلًا وآمنًا وممتعًا.

                                        💡 لماذا تتسوق معنا؟
                                        ✔️ منتجات أصلية 100%
                                        ✔️ طرق دفع آمنة وشحن سريع
                                        ✔️ دعم فني متاح 24/7

                                        شكرًا لاختيارك [اسم المتجر] – حيث تلتقي الجودة بالراحة!',
                ],
                'quality_policy' => [
                    'en' => 'Welcome to [Your Store Name], your one-stop destination for the latest and greatest products!
                                We are committed to providing high-quality products, affordable prices, and exceptional customer service.

                                At [Your Store Name], we offer a wide range of categories, from fashion and electronics to home essentials and more. Our goal is to make online shopping easy, secure, and enjoyable.

                                💡 Why shop with us?
                                ✔️ 100% Authentic Products
                                ✔️ Secure Payments & Fast Shipping
                                ✔️ 24/7 Customer Support

                                Thank you for choosing [Your Store Name] – where quality meets convenience!',

                    'ar' => 'مرحبًا بكم في [اسم المتجر]، وجهتكم المثالية للحصول على أحدث المنتجات وأفضل العروض!
                                        نحن ملتزمون بتقديم منتجات عالية الجودة بأسعار تنافسية وخدمة عملاء استثنائية.

                                        في [اسم المتجر]، نقدم مجموعة واسعة من المنتجات، بدءًا من الأزياء والإلكترونيات إلى المستلزمات المنزلية وأكثر من ذلك. هدفنا هو جعل التسوق عبر الإنترنت سهلًا وآمنًا وممتعًا.

                                        💡 لماذا تتسوق معنا؟
                                        ✔️ منتجات أصلية 100%
                                        ✔️ طرق دفع آمنة وشحن سريع
                                        ✔️ دعم فني متاح 24/7

                                        شكرًا لاختيارك [اسم المتجر] – حيث تلتقي الجودة بالراحة!',
                ],
            ]);
        });
        return $getSetting;
    }
}
