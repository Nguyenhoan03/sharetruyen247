<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class categoryRepository
{
    public function getAllCategories()
    {
        return DB::table('category')->get();
    }

    public function getCategoryData($category)
    {
        return DB::table('detail_product')
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->where('product.' . $category, 1)
            ->where(function ($query) {
                $query->where('product.trang_thai', 'đã duyệt')
                    ->orWhereNull('product.trang_thai');
            })
            ->select('detail_product.*', 'product.image')
            ->orderBy('detail_product.id', 'DESC')
            ->paginate(28);
    }

    public function getCategoryFullStories($category)
    {
        return DB::table('detail_product')
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->where('product.' . $category, 1)
            ->where('detail_product.trangthai', 'Hoàn Thành')
            ->where(function ($query) {
                $query->where('product.trang_thai', 'đã duyệt')
                    ->orWhereNull('product.trang_thai');
            })
            ->select('detail_product.*', 'product.image')
            ->orderBy('detail_product.id', 'DESC')
            ->take(16)
            ->get();
    }

    public function getCategoryHotStories($category)
    {
        return DB::table('detail_product')
            ->join('product', 'detail_product.title', '=', 'product.title')
            ->where('product.' . $category, 1)
            ->where(function ($query) {
                $query->where('product.trang_thai', 'đã duyệt')
                    ->orWhereNull('product.trang_thai');
            })
            ->select('detail_product.*', 'product.image')
            ->orderBy('detail_product.viewers', 'DESC')
            ->take(16)
            ->get();
    }

    // Thêm các phương thức khác nếu cần
}