<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class PageController extends Controller
{
    // Главная страница (доступна всем)
    public function home()
    {
        return view('pages.home');
    }

    // Страница1 — карточки
    public function page1()
    {
        $items = Item::all();
        return view('pages.page1', compact('items'));
    }

    // Страница2 — список
    public function page2()
    {
        $items = Item::all();
        return view('pages.page2', compact('items'));
    }
}
