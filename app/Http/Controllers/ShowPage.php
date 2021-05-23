<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;

class ShowPage extends Controller
{
  function showmarkdown($seitenid)
  {
    $getsite = DB::table('pages')->where('md5id', $seitenid)->first();
    if(!isset($getsite->id))
    {
        $getsite = DB::table('pages')->where('navigation', $seitenid)->first();
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
        '~\[\[suihelp=(.*?)\]\]~s',
    );

    $replace = array(
      '<div id="accordion"><div class="card"><div class="card-header"><h5 class="mb-0"><a data-toggle="collapse" href="#$2" role="button" aria-expanded="false">$1</a></h5></div><div id="$2" class="collapse"><div class="card-body">$3</div></div></div></div>',
      '<center>$1</center>',
      '<p style="text-align:right">$1</p>',
      '<i class="bi-$1" style="$2"></i>',
      '<i class="bi-$1" style="font-size:1rem;color:black;"></i>',
      '<i class="bi-$1" style="font-size:2rem;color:black;"></i>',
      '<i class="bi-$1" style="font-size:3rem;color:black;"></i>',
      '<a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="" data-content="$1" data-original-title=""><i class="bi-question-diamond" style="font-size:20px;color:grey;width:32px;"></i></a>',

    );
    $markdown = preg_replace($find,$replace,$markdown);
    $markdown = nl2br($markdown);
    return view('test', ['markdown' => $markdown, 'beschreibung' => $getsite->description]);
  }
}
