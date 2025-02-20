<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\homeService;
use Illuminate\Support\Facades\DB;

class IndexStories extends Command
{
    protected $signature = 'index:stories';
    protected $description = 'Index all stories to Elasticsearch';

    protected $homeService;

    public function __construct(homeService $homeService)
    {
        parent::__construct();
        $this->homeService = $homeService;
    }

    public function handle()
    {
        $this->info('Starting indexing...');

        try {
            // Tạo index nếu chưa tồn tại
            $this->homeService->createIndex();

            // Index từng story
            DB::table('product')
                ->join('detail_product', 'product.title', '=', 'detail_product.title')
                ->select(
                    'product.id',
                    'product.title',
                    'product.image',
                    'detail_product.theloai',
                    'detail_product.trangthai',
                    'detail_product.viewers'
                )
                ->orderBy('product.id')
                ->chunk(100, function ($stories) {
                    foreach ($stories as $story) {
                        $this->homeService->indexStory($story);
                        $this->info("Indexed story: {$story->title}");
                    }
                });

            $this->info('Indexing completed successfully!');
        } catch (\Exception $e) {
            $this->error('Error during indexing: ' . $e->getMessage());
        }
    }
} 