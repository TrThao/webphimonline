<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use App\Models\Genre;

class SitemapController extends Controller
{
    public function generate()
    {
        $sitemap = app('sitemap');

        // Thêm trang chủ vào sitemap
        $homepageUrl = url('/');
        $sitemap->add($homepageUrl, Carbon::now('Asia/Ho_Chi_Minh'), '1.0', 'daily');
        Log::info("Generated URL: $homepageUrl");

        // Lấy tất cả các thể loại từ cơ sở dữ liệu
        $genres = Genre::orderBy('id', 'DESC')->get();
        $category = Category::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        // Thêm mỗi thể loại vào sitemap
        foreach ($genres as $genre) {
            $url = url("/the-loai/{$genre->slug}");
            $sitemap->add($url, Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
            Log::info("Generated URL: $url");
        }
        

        // Thêm mỗi thể loại vào sitemap
        foreach ($category as $cate) {
            $url = url("/danh-muc/{$cate->slug}");
            $sitemap->add($url, Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
            Log::info("Generated URL: $url");
        }
        foreach ($country as $coun) {
            $url = url("/danh-muc/{$coun->slug}");
            $sitemap->add($url, Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
            Log::info("Generated URL: $url");
        }
        

        // Tạo và lưu sitemap với định dạng XML và tên tệp 'sitemap.xml'
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response('Sitemap generated successfully');
    }
    
}