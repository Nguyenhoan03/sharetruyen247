<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Goutte;
use App\Models\product;
use App\Models\detail_product;
use App\Models\chapter;

class crawlcontroller extends Controller
{
   
    public function scrapeMainPage($category)
    {
        $url = "https://dtruyen.net/$category";
        $url_category = str_replace('-','',$category);
        $crawler = Goutte::request('GET', $url);
    
        $image = $crawler->filter('.list-stories li.story-list a img')->each(function ($node) {
            return $node->attr('data-layzr');
        });
    
        $title = $crawler->filter('.list-stories li.story-list .info h3 a')->each(function ($node) {
            return $node->text();
        });
    
        foreach ($title as $key => $value) {
          
            $existingProduct = product::where('title', $value)->first();
         
            if (!$existingProduct) {
                product::insert([
                    'title' => $value,
                    'image' => $image[$key],
                    // 'tienhiep' => 0,
                    // 'ngontinh' => 0,
                    // 'quantruong' => 0,
                    // 'khoanguyen' => 0,
                    // 'huyenhuyen' => 0,
                    // 'dinang' => 0,
                    // 'kiemhiep' => 0,
                    // 'dammy' => 0,
                    // 'vongdu' => 0,
                    // 'haihuoc' => 0,
                    // 'kinhdi' => 0,
                    // 'dothi' => 1,
                    // 'lichsu' => 0,
                    // 'truyenma' => 0,
                    // 'truyenngan' => 0,
                    // 'tieuthuyet' => 0,
                    // 'truyenteen' => 0,
                    // 'quansu' => 0,
                    // 'xuyenkhong' => 0,
                    // 'trinhtham' => 0,
                    $url_category => 1,
                  
                    'trang_thai' => 'đã duyệt',
                ]);
    
              
                sleep(1);
    
                $link = $crawler->filter('li.story-list .info h3.title a')->eq($key)->attr('href');
                self::scrapedata($link);
                print("Lấy dữ liệu từ {$link} thành công" . "\t");
            } else {
              
                print("Title '{$value}' already exists in the Product table. Skipping insertion." . "\t");
            }
        }
    }
    
    
    public function scrapedata($detailUrl)
    {
        $data = [];
      
        $crawler = Goutte::request('GET', $detailUrl);
    
        $titlenode = $crawler->filter('.col2 h1.title');
        $title = $titlenode->count() > 0 ? $titlenode->text() : 'Not available';
    
        $tacgiaNode = $crawler->filter('.col1 .infos p.author span a');
        $tacgia = $tacgiaNode->count() > 0 ? $tacgiaNode->text() : 'Not available';
    
        $theloaiNode = $crawler->filter('.col1 .infos p.story_categories span a');
        $theloai = $theloaiNode->count() > 0 ? $theloaiNode->text() : 'Not available';
    
        $descriptsNode = $crawler->filter('.col2 .description');
        $descripts = $descriptsNode->count() > 0 ? $descriptsNode->text() : 'Not available';
    
        $trangthaiNode = $crawler->filter('.col1 .infos p')->eq(4);
        $trangthai = $trangthaiNode->count() > 0 ? $trangthaiNode->text() : 'Not available';
    
        $data = [
            'title'=>$title,
            'descripts' => $descripts,
            'tacgia' => $tacgia,
            'theloai' => $theloai,
            'nguon' => 'sưu tầm',
            'trangthai' => $trangthai,
            'capnhatmoi' => 'full',
            'viewers' => 0,
        ];
    
     
        detail_product::create($data);
        sleep(1);
    
     
        $this->scrapeChaptersFromPage($crawler, $title);
    
     
        $lastPage = $crawler->filter('ul.pagination li:last-child')->previousAll()->eq(0)->text();
        for ($page = 2; $page <= $lastPage; $page++) {
         
            $pageUrl = $detailUrl . '/' . $page;
    
       
            $crawler = Goutte::request('GET', $pageUrl);
    
        
            $this->scrapeChaptersFromPage($crawler, $title);
        }
    }
    
    private function scrapeChaptersFromPage($crawler, $title)
    {
     
        $linkchpater = $crawler->filter('#chapters ul.chapters li a')->each(function ($node) {
            return $node->attr("href");
        });
    
       
        foreach ($linkchpater as $linkct) {
            $this->scrapechapter($linkct, $title);
            print("Lấy dữ liệu thành công cho chapter " . $linkct . "\n");
            sleep(1);
        }
    }
    
    public function scrapechapter($linkchapter, $title)
    {
        $datachapter = [];
        $crawler = Goutte::request('GET', $linkchapter);
    
        $contentnode = $crawler->filter('#chapter #chapter-content');
        $content = $contentnode->count() > 0 ? $contentnode->text() : 'Not available';
    
        $chapternode = $crawler->filter('#chapter h2.chapter-title');
        $chapter = $chapternode->count() > 0 ? $chapternode->text() : 'Not available';
    
        $datachapter = [
            'title' => $title,
            'content' => $content,
            'chapter' => $chapter,
        ];
        chapter::create($datachapter);
        sleep(2);
    }
}
