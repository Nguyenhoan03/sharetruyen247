<?php

namespace App\Http\Controllers;

use Goutte;
use App\Models\product;
use App\Models\detail_product;
use App\Models\chapter;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class CrawlController extends Controller
{
    public function scrapeMainPage($category)
    {
        try {
            $url = "https://doctruyen.pro/the-loai/$category";
            $url_category = str_replace('-','',$category);
            $this->runPuppeteer($url);

            // Đọc HTML từ file Puppeteer đã lưu
            $htmlPath = public_path('assets/tmp/page.html');
            if (!file_exists($htmlPath)) {
                throw new \Exception("Không tìm thấy file HTML.");
            }

            $html = file_get_contents($htmlPath);
            $crawler = new Crawler($html);

            // Lấy danh sách truyện
            $image = $crawler->filter('.list-stories li.story-list a img')->each(fn($node) => $node->attr('data-layzr') ?? '');
            $title = $crawler->filter('.list-stories li.story-list .info h3 a')->each(fn($node) => $node->text() ?? '');
            $detailLinks = $crawler->filter('.list-stories li.story-list .info h3 a')->each(fn($node) => $node->attr('href') ?? '');

            foreach ($title as $key => $value) {
                if (empty($value) || empty($detailLinks[$key])) {
                    continue;
                }

                $existingProduct = product::where('title', $value)->first();
                if (!$existingProduct) {
                    product::create([
                        'title' => $value,
                        'slug' => Str::slug($value),
                        'image' => $image[$key] ?? null,
                        $url_category => 1,
                        'trang_thai' => 'đã duyệt',
                    ]);
                    sleep(1);
                }

                // Gọi hàm scrapeData để lấy thông tin chi tiết truyện
                $this->scrapedata($detailLinks[$key]);
            }
        } catch (\Exception $e) {
            print("Lỗi khi lấy dữ liệu: " . $e->getMessage());
        }
    }

    private function runPuppeteer($url)
    {
        $command = "node " . public_path('assets/js/scrape.js') . " " . escapeshellarg($url);
        shell_exec($command);
    }

    public function scrapedata($detailUrl)
    {
        try {
            $crawler = Goutte::request('GET', $detailUrl);

            // Lấy thông tin truyện
            $title = $crawler->filter('.col2 h1.title')->count() ? $crawler->filter('.col2 h1.title')->text() : 'Không rõ';
            $tacgia = $crawler->filter('.col1 .infos p.author span a')->count() ? $crawler->filter('.col1 .infos p.author span a')->text() : 'Không rõ';
            $theloai = $crawler->filter('.col1 .infos p.story_categories span a')->each(fn($node) => $node->text()) ?? ['Không rõ'];
            $descripts = $crawler->filter('.col2 .description')->count() ? $crawler->filter('.col2 .description')->text() : 'Không rõ';
            $trangthai = $crawler->filter('.col1 .infos p')->eq(4)->count() ? $crawler->filter('.col1 .infos p')->eq(4)->text() : 'Không rõ';

            $data = [
                'title' => $title,
                'slug' => Str::slug($title),
                'descripts' => $descripts,
                'tacgia' => $tacgia,
                'theloai' => implode(', ', $theloai),
                'nguon' => 'sưu tầm',
                'trangthai' => $trangthai,
                'capnhatmoi' => 'full',
                'viewers' => 0,
            ];
            detail_product::updateOrCreate(['slug' => $data['slug']], $data);
            sleep(1);

            // Lấy danh sách chapter
            $this->scrapeChaptersFromPage($crawler, $title);

        } catch (\Exception $e) {
            print("Lỗi khi lấy dữ liệu truyện: " . $e->getMessage());
        }
    }

    private function scrapeChaptersFromPage($crawler, $title)
    {
        try {
            $chapters = $crawler->filter('#chapters ul.chapters li a')->each(fn($node) => $node->attr("href"));
            foreach ($chapters as $chapterUrl) {
                $this->scrapechapter($chapterUrl, $title);
                sleep(1);
            }
        } catch (\Exception $e) {
            print("Lỗi khi lấy danh sách chương: " . $e->getMessage());
        }
    }

    public function scrapechapter($chapterUrl, $title)
    {
        try {
            $crawler = Goutte::request('GET', $chapterUrl);
            $content = $crawler->filter('#chapter #chapter-content')->count() ? $crawler->filter('#chapter #chapter-content')->text() : 'Không có nội dung';
            $chapter = $crawler->filter('#chapter h2.chapter-title')->count() ? $crawler->filter('#chapter h2.chapter-title')->text() : 'Không rõ';

            $datachapter = [
                'title' => $title,
                'title_slug' => Str::slug($title),
                'content' => $content,
                'chapter' => $chapter,
                'chapter_slug' => Str::slug($chapter),
            ];
            chapter::updateOrCreate(['chapter_slug' => $datachapter['chapter_slug']], $datachapter);
            sleep(2);
        } catch (\Exception $e) {
            print("Lỗi khi lấy dữ liệu chương: " . $e->getMessage());
        }
    }
}
