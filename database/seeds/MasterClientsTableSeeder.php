<?php

use Illuminate\Database\Seeder;
use App\Models\MasterClient;
use Carbon\Carbon;

class MasterClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
/*
    public function run()
    {
      $file = new SplFileObject('database/csv/master_clients.csv');
      $file->setFlags(
          \SplFileObject::READ_CSV |
          \SplFileObject::READ_AHEAD |
          \SplFileObject::SKIP_EMPTY |
          \SplFileObject::DROP_NEW_LINE
      );
      $list = [];
      $now = Carbon::now();
      foreach($file as $line) {
          $list[] = [
              "clientName" => $line[0],
              "clientNameKana" => $line[1],
              "created_at" => $now,
              "updated_at" => $now,
          ];
      }

      $MasterClient = new MasterClient;
      $MasterClient::insert($list);
    }
*/
    public function run()
    {
      $now=Carbon::now();
      $MasterClient=new MasterClient;
      $MasterClient::insert([
        ['clientName'=>'社内業務','clientNameKana'=>'0シャナイギョウム','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)ITコア','clientNameKana'=>'アイティーコア','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛南町','clientNameKana'=>'アイナンチョウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)アドバンテック','clientNameKana'=>'アドバンテック','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'伊豆技研工業（株）','clientNameKana'=>'イズギケンコウギョウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'イマジカ','clientNameKana'=>'イマジカ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Infinite Pointe','clientNameKana'=>'インフィニットポイント','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'宇和島市','clientNameKana'=>'ウワジマシ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)STNet','clientNameKana'=>'エスティーネット','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'SPC','clientNameKana'=>'エスピーシー','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'NSK(株)','clientNameKana'=>'エヌエスケイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県高速道路交通安全協議会','clientNameKana'=>'エヒメケンコウソクドウロコウツウアンゼンキョウギカイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県交通安全協会','clientNameKana'=>'エヒメケンコウツウアンゼンキョウカイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'エヒメ健診協会','clientNameKana'=>'エヒメケンシンキョウカイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県庁','clientNameKana'=>'エヒメケンチョウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'FIS','clientNameKana'=>'エフアイエス','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)えむぼま','clientNameKana'=>'エムボマ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)オレンジシステム','clientNameKana'=>'オレンジシステム','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'国立研究開発法人科学技術振興機構','clientNameKana'=>'カガクギジュツシンコウキコウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'神奈川県薬剤師会','clientNameKana'=>'カナガワケンヤクザイシカイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'気象庁','clientNameKana'=>'キショウチョウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'厚生労働省','clientNameKana'=>'コウセイロウドウショウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県地産外商課','clientNameKana'=>'コウチケンチサンガイショウカ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県地産外商公社','clientNameKana'=>'コウチケンチサンガイショウコウシャ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県土木部道路課','clientNameKana'=>'コウチケンドボクブドウロカ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'国立保健医療科学院','clientNameKana'=>'コクリツホケンイリョウカガクイン','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)サカワ','clientNameKana'=>'サカワ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Jストリーム','clientNameKana'=>'ジェイストリーム','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'四国中央市','clientNameKana'=>'シコクチュウオウシ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)宍戸国際ゴルフ倶楽部','clientNameKana'=>'シシドコクサイゴルフクラブ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'住友金属鉱山エンジニアリング','clientNameKana'=>'スミトモキンゾクコウザンエンジニアリング','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'石油天然ガス・金属鉱物資源機構','clientNameKana'=>'セキユテンネンガスキンゾクコウブツシゲンキコウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'ソニーＰＣＬ(株)','clientNameKana'=>'ソニーピーシーエル','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'駐留軍等労働者労務管理機構','clientNameKana'=>'チュウリュウグントウロウドウシャロウムカンリキコウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'東京大学','clientNameKana'=>'トウキョウダイガク','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'東和コンピューター','clientNameKana'=>'トウワコンピューター','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'土木研究所','clientNameKana'=>'ドボクケンキュウジョ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'公益財団法人　日本財団','clientNameKana'=>'ニホンザイダン','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'日本放送協会 ','clientNameKana'=>'ニホンホウソウキョウカイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'学校法人根津育英会','clientNameKana'=>'ネヅイクエイカイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)BTI','clientNameKana'=>'ビーティーアイ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)フォーライフミュージックエンタテイメント','clientNameKana'=>'フォーラーフミュージックエンタテイメント','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'文化庁','clientNameKana'=>'ブンカチョウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'ベルソ','clientNameKana'=>'ベルソ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'放送論理・番組向上機構（BPO）','clientNameKana'=>'ホウソウリンリバングミコウジョウキコウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)マイナビ','clientNameKana'=>'マイナビ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'松山市','clientNameKana'=>'マツヤマシ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'文科省','clientNameKana'=>'モンカショウ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'読売連合広告社','clientNameKana'=>'ヨミウリレンゴウコウコクシャ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Y2S','clientNameKana'=>'ワイツーエス','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
