<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use App\NewsLetterSubscriber;
use App\NewsLetter;
use App\Mail\NewsLetterMail;
use Illuminate\Support\Facades\Mail;

class AdminNewsLetterController extends Controller
{
    function createNewsLetter(){

      return view('admin.admin_new_news_letter');

    }

    function saveNewsLetter(Request $request){
      $title = $request->input('title');
      $body = $request->input('news-letter-editor');

      $newsLetter = new NewsLetter();

      $newsLetter->title = $title;
      $newsLetter->body = $body;

      if($newsLetter->save()){

        $subscribers = NewsLetterSubscriber::all();

        if($subscribers->count() > 0){

          $nlid = $newsLetter->id;

          $n_letter = newsLetter::find($nlid);
          foreach ($subscribers as $subscriber) {

            Mail::to($subscriber->email)
              ->send(new NewsLetterMail($n_letter));
            $n_letter->subscribers()->attach($subscriber->id);

          }

          flash('News letter send successfully')->success();
          return redirect()->route('admin.create.news.letter.form');
        }else{
          flash('No subscribers available, news letter saved for later')->error();
          return redirect()->route('admin.create.news.letter.form');
        }



      }else{
        flash('Failed to send news letter')->error();
        return redirect()->route('admin.create.news.letter.form');
      }
    }

}
