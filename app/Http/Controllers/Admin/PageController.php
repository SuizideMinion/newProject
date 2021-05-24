<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Page;
use Illuminate\Contracts\View\View;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return view('admin.page.index', compact('pages'));
    }

    public function create(): View
    {
        return view('admin.page.create');
    }

    public function store(StorePageRequest $request)
    {
          up:
          $md5id = substr(md5(time() + rand(0,1000)), 0, 7);
          $var = DB::table('pages')->where('md5id', $md5id)->first();
          if (empty($var->id))
          {
            $page = new page;
            $page->name = $request->name;
            $page->description = $request->description;
            $page->last_edit_from = $request->last_edit_from;
            $page->navigation = $request->navigation;
            $page->markdowntext = $request->markdowntext;
            $page->md5id = $md5id;
            $page->owner = Auth::id();
            $page->save();
            DB::table('logs')->insert(array ('category' => 'page', 'created_at' => Carbon::now(), 'text' => "Hat eine neue Page Erstellt " . $request->name . "",'owner' => Auth::id()));
            return redirect('/admin/pages');
          } else {
            goto up;
          }
    }

    public function show(Page $page): View
    {
        $getsite = DB::table('pages')->where('md5id', $page)->first();
        if(!isset($getsite->id))
        {
            $getsite = DB::table('pages')->where('navigation', $page)->first();
            if(!isset($getsite->id))
            {
              abort(404);
            }
        }
        $Parsedown = new \Parsedown();
        $markdown = $Parsedown->text($getsite->markdowntext);

        // $markdown  = htmlspecialchars($markdown, ENT_QUOTES, $charset);

        $find = array(
            '~\[\[suiCollapsible=(.*?)\]\[code=(.*?)\]\[(.*?)\]\]~s',
            '~\[\[center\]\](.*?)\[\[/center\]\]~s',
            '~\[\[rechts\]\](.*?)\[\[/rechts\]\]~s',
            '~\[\[icon=(.*?)\]\](.*?)\[\[/icon\]\]~s',
            '~\[\[i1=(.*?)\]\]~s',
            '~\[\[i2=(.*?)\]\]~s',
            '~\[\[i3=(.*?)\]\]~s',
            '~\[\[suihelp=(.*?)\]\]~s'
        );

        $replace = array(
          '<div id="accordion"><div class="card"><div class="card-header"><h5 class="mb-0"><a data-toggle="collapse" href="#$2" role="button" aria-expanded="false">$1</a></h5></div><div id="$2" class="collapse"><div class="card-body">$3</div></div></div></div>',
          '<center>$1</center>',
          '<p style="text-align:right">$1</p>',
          '<i class="bi-$1" style="$2"></i>',
          '<i class="bi-$1" style="font-size:1rem;color:black;"></i>',
          '<i class="bi-$1" style="font-size:2rem;color:black;"></i>',
          '<i class="bi-$1" style="font-size:3rem;color:black;"></i>',
          '<i class="bi-question-diamond" style="font-size:1.2rem;color:grey;width:32px;" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="" aria-describedby="popover979283"></i>'
        );
        $markdown = preg_replace($find,$replace,$markdown);
        $markdown = nl2br($markdown);
        return view('test', ['markdown' => $markdown, 'beschreibung' => $getsite->description]);
    }

    public function edit(Page $page): View
    {
         return view('admin.page.edit', compact('page'));
    }

    public function update(UpdatePageRequest $request, Page $page): View
    {
        $page->update($request->validated());

        $pages = Page::all();

        DB::table('logs')->insert(array ('category' => 'page', 'created_at' => Carbon::now(), 'text' => "Hat eine Page Bearbeitet ->" . $page->name,'owner' => Auth::id()));
        return view('admin.page.index', compact('pages'));
    }

    public function destroy(Page $page): View
    {
        DB::table('logs')->insert(array ('category' => 'page', 'created_at' => Carbon::now(), 'text' => "Hat eine Page Gelöscht ->" . $page->name,'owner' => Auth::id()));
        $page->delete();

        $pages = Page::all();

        return view('admin.page.index', compact('pages'));
    }
}
