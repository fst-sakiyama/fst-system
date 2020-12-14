@extends('layouts.system_top')

@section('title','勉強会')

@section('pageCss')
<link rel="stylesheet" href="{{asset('/css/study-session.css')}}">
@endsection

@include('components.common.head_livewire')

@include('components.common.header')

@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">

        <div class="mt-3 h3"><span class="lineMarker">普通にLaravelで書いた場合</span></div>

        <div class="mt-3"><div class="row"><div class="col">
        <span class="lineMarker">コントローラでデータベースからデータを取得してviewに渡します。</span><br>
        <span class="lineMarker">Eloquentを使用して書いたコントローラはこのようになります。</span><br>
        <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
        <div class="box sessionBlock d-none">
            StudySessionController.php
                <pre>
                    <code>
    use App\Models\StudySession;

        public function test01()
        &#123;
            $items = <span class="lineMarker">StudySession::all();</span>
            return view('study_session.test01',<span class="lineMarker">compact('items')</span>);
        &#125;
                    </code>
                </pre>
        </div>
        </div></div></div>

        <div class="mt-3"><div class="row"><div class="col">
        <span class="lineMarker">コントローラから渡されたデータをviewで展開します。</span><br>
        <span class="lineMarker">削除ボタンは飾りです。Formタグのネストは不可ですので、少し面倒、なので割愛します。</span><br>
        <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
        <div class="box sessionBlock d-none">
            study_session\test01.blade.php
                <pre>
                    <code>
    &lt;table class=&quot;table table-sm table-hover&quot; style=&quot;width:20%;&quot;&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th&gt;姓&lt;/th&gt;
                &lt;th&gt;名&lt;/th&gt;
                &lt;th&gt;削除&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            <span class="lineMarker">&#64;foreach($items as $item)</span>
                &lt;tr&gt;
                    &lt;td&gt;&#123;&#123;$item-&gt;firstName&#125;&#125;&lt;/td&gt;
                    &lt;td&gt;&#123;&#123;$item-&gt;lastName&#125;&#125;&lt;/td&gt;
                    &lt;td&gt;
                        &lt;button class=&quot;btn btn-sm btn-danger p-0&quot; id=&#123;&#123;$item-&gt;id&#125;&#125;&gt;
                            削除
                        &lt;/button&gt;
                    &lt;/td&gt;
                &lt;/tr&gt;
            &#64;endforeach
        &lt;/tbody&gt;
    &lt;/table&gt;
                    </code>
                </pre>
        </div>
    </div></div></div>

    <div class="mt-3"><div class="row"><div class="col">
        これで作成されたページが<a href="{{route('study_session.test01')}}" target="testPage">こちら</a>です。
    </div></div></div>

    <div class="mt-3 h3"><span class="lineMarker">Livewireを使用した場合</span></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">コントローラでは表示させるページを指定するだけです。</span></br>
    <span class="lineMarker">データの取得、データ渡しは行いません。</span><br>
    <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
    <div class="box sessionBlock d-none">
        StudySessionController.php
            <pre>
                <code>
    public function test02()
    &#123;
        return view('study_session.test02');
    &#125;
                </code>
            </pre>
    </div>
    </div></div></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">viewはlivewire用のviewを表示させる設定を行います。</span><br>
    <span class="lineMarker">しかし、難しいことはありません。一文追記するだけです。</span><br>
    <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
    <div class="box sessionBlock d-none">
        study_session\test02.blade.php
            <pre>
                <code>
    <span class="lineMarker">&lt;livewire:study-session-test&gt;</span>
                </code>
            </pre>
    </div>
    </div></div></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">次に、livewireを使用するためのファイル2種を作成します。</span></br>
    <span class="lineMarker">簡単なコマンドで作成できます。</span><br>
    <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
    <div class="box sessionBlock d-none">
        プロジェクトディレクトリにて
        <pre>
            <code>
    <span class="lineMarker">php artisan make:livewire ファイル名</span>

    <img class="" alt="総合" src="{{ asset('images/study_session_01.png') }}" width="90%">
            </code>
        </pre>
    </div>
    </div></div></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">表示を行うためのファイルを作成します。これは、bladeテンプレートを使用します。</span></br>
    <span class="lineMarker">通常のviewと変わりません。これは、divタグで囲まれている必要があります。</span><br>
    <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
    <div class="box sessionBlock d-none">
        livewire\study-session-test.blade.php
            <pre>
                <code>
&lt;div&gt;
    &lt;table class=&quot;table table-sm table-hover&quot; style=&quot;width:20%;&quot;&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th&gt;姓&lt;/th&gt;
                &lt;th&gt;名&lt;/th&gt;
                &lt;th&gt;削除&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            <span class="lineMarker">&#64;foreach($items as $item)</span>
                &lt;tr&gt;
                    &lt;td&gt;&#123;&#123;$item-&gt;firstName&#125;&#125;&lt;/td&gt;
                    &lt;td&gt;&#123;&#123;$item-&gt;lastName&#125;&#125;&lt;/td&gt;
                    &lt;td&gt;
                        &lt;button class=&quot;btn btn-sm btn-danger p-0&quot; wire:click=&quot;delUser(&#123;&#123;$item-&gt;id&#125;&#125;)&quot;&gt;
                            削除
                        &lt;/button&gt;
                    &lt;/td&gt;
                &lt;/tr&gt;
            &#64;endforeach
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
                </code>
            </pre>
    </div>
    </div></div></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">livewireでのキモの部分。</span></br>
    <span class="lineMarker">livewireのviewで突如として現れた[$items]へデータを送ります。</span><br>
    <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
    <div class="box sessionBlock d-none">
        Http\Livewire\StudySessionTest.php
            <pre>
                <code>
&lt;?php

namespace App\Http\Livewire;

use App\Models\StudySession;
use Livewire\Component;

class StudySessionTest extends Component
&#123;
    <span class="lineMarker">public $items;</span>

    <span class="lineMarker">public function mount()</span>
    &#123;
        <span class="lineMarker">$this->items = StudySession::all();</span>
    &#125;

    <span class="lineMarker">public function delUser($id)</span>
    &#123;
        <span class="lineMarker">$item = StudySession::find($id);</span>
        <span class="lineMarker">$item->delete();</span>
        <span class="lineMarker">$this->items = StudySession::all();</span>
    &#125;

    <span class="lineMarker">public function render()</span>
    &#123;
        <span class="lineMarker">return view('livewire.study-session-test');</span>
    &#125;
&#125;
                </code>
            </pre>
    </div>
    </div></div></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">もしこれをJS（jQuery）で書くとすると、こんな感じになるでしょうか。</span><br>
    <span class="lineMarker">コントローラへ削除対象者のidを送り、コントローラ側で削除を行うようにしました。</span><br>
    <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
    <div class="box sessionBlock d-none">
        study-session.js
            <pre>
                <code>
    &#36;('[id^=btn_name]').on('click',function(){
        var id=$(this).attr('id').replace('btn_name','');

        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'study_session/userDel',
            type: 'POST',
            data: { 'id' : id },
        }).done(function (){
            $('line_name'+id).remove();
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert('fail');
        });
    });
                </code>
            </pre>
    </div>
    </div></div></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">JS（jQuery）を使用するよりもシンプルで分かりやすい。</span><br>
    <span class="lineMarker">Eloquentが使えるため、JSの知識が必要なく非同期のプログラムが書けるようになりました。</span><br>
    <br>
    これで作成されたページが<a href="{{route('study_session.test02')}}" target="testPage">こちら</a>です。
    </div></div></div>

    <div class="mt-3 h3"><span class="lineMarker">まとめ</span></div>

    <div class="mt-3"><div class="row"><div class="col">
    <span class="lineMarker">Livewireを使用することで、phpの知識（Laravelの知識）だけで非同期なプログラムが書ける。</span><br>
    <span class="lineMarker">さて、このページで使用したjsファイルです。</span><br>
    <button class="sessionOpen btn btn-outline-warning mt-2 py-0">ソースを開く</button>
    <div class="box sessionBlock d-none">
        <span class="lineMarker">study-session.js</span>
            <pre>
                <code>
    $('.sessionOpen').on('click',function(){
        removeClassLineMarker();
        var obj=$(this).next('.sessionBlock');
        obj.toggleClass('d-none');
        if($(this).text().indexOf('開く') > -1){
            $(this).text('ソースを閉じる');
        }else{
            $(this).text('ソースを開く');
        }
    });

    $('.lineMarker').on('click',function(){
        removeClassLineMarker();
        $(this).addClass('mark');
    });

    function removeClassLineMarker()
    {
        $('.lineMarker').each(function(){
            if($(this).hasClass('mark')){
                $(this).removeClass('mark');
            }
        });
    }
                </code>
            </pre>
    </div>
    </div></div></div>


  </div>
</div>

@endsection



@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_studySession.js')}}"></script>
@endsection

@include('components.common.footer_livewire')
