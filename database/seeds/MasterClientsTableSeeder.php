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
        ['clientName'=>'社内業務','clientNameKana'=>'0しゃないぎょうむ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)ITコア','clientNameKana'=>'あいてぃーこあ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛南町','clientNameKana'=>'あいなんちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)アドバンテック','clientNameKana'=>'あどばんてっく','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'伊豆技研工業（株）','clientNameKana'=>'いずぎけんこうぎょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'イマジカ','clientNameKana'=>'いまじか','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Infinite Pointe','clientNameKana'=>'いんふぃにっとぽいんと','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'宇和島市','clientNameKana'=>'うわじまし','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)STNet','clientNameKana'=>'えすてぃーねっと','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'SPC','clientNameKana'=>'えすぴーしー','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'NSK(株)','clientNameKana'=>'えぬえすけい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県高速道路交通安全協議会','clientNameKana'=>'えひめけんこうそくどうろこうつうあんぜんきょうぎかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県交通安全協会','clientNameKana'=>'えひめけんこうつうあんぜんきょうかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'エヒメ健診協会','clientNameKana'=>'えひめけんしんきょうかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県庁','clientNameKana'=>'えひめけんちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'FIS','clientNameKana'=>'えふあいえす','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)えむぼま','clientNameKana'=>'えむぼま','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)オレンジシステム','clientNameKana'=>'おれんじしすてむ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'国立研究開発法人科学技術振興機構','clientNameKana'=>'かがくぎじゅつしんこうきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'神奈川県薬剤師会','clientNameKana'=>'かながわけんやくざいしかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'気象庁','clientNameKana'=>'きしょうちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'厚生労働省','clientNameKana'=>'こうせいろうどうしょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県地産外商課','clientNameKana'=>'こうちけんちさんがいしょうか','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県地産外商公社','clientNameKana'=>'こうちけんちさんがいしょうこうしゃ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県土木部道路課','clientNameKana'=>'こうちけんどぼくぶどうろか','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'国立保健医療科学院','clientNameKana'=>'こくりつほけんいりょうかがくいん','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)サカワ','clientNameKana'=>'さかわ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Jストリーム','clientNameKana'=>'じぇいすとりーむ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'四国中央市','clientNameKana'=>'しこくちゅうおうし','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)宍戸国際ゴルフ倶楽部','clientNameKana'=>'ししどこくさいごるふくらぶ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'住友金属鉱山エンジニアリング','clientNameKana'=>'すみともきんぞくこうざんえんじにありんぐ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'石油天然ガス・金属鉱物資源機構','clientNameKana'=>'せきゆてんねんがすきんぞくこうぶつしげんきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'ソニーＰＣＬ(株)','clientNameKana'=>'そにーぴーしーえる','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'駐留軍等労働者労務管理機構','clientNameKana'=>'ちゅうりゅうぐんとうろうどうしゃろうむかんりきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'東京大学','clientNameKana'=>'とうきょうだいがく','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'東和コンピューター','clientNameKana'=>'とうわこんぴゅーたー','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'土木研究所','clientNameKana'=>'どぼくけんきゅうじょ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'公益財団法人　日本財団','clientNameKana'=>'にほんざいだん','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'日本放送協会 ','clientNameKana'=>'にほんほうそうきょうかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'学校法人根津育英会','clientNameKana'=>'ねづいくえいかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)BTI','clientNameKana'=>'びーてぃーあい','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)フォーライフミュージックエンタテイメント','clientNameKana'=>'ふぉーらーふみゅーじっくえんたていめんと','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'文化庁','clientNameKana'=>'ぶんかちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'ベルソ','clientNameKana'=>'べるそ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'放送論理・番組向上機構（BPO）','clientNameKana'=>'ほうそうりんりばんぐみこうじょうきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)マイナビ','clientNameKana'=>'まいなび','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'松山市','clientNameKana'=>'まつやまし','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'文科省','clientNameKana'=>'もんかしょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'読売連合広告社','clientNameKana'=>'よみうりれんごうこうこくしゃ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Y2S','clientNameKana'=>'わいつーえす','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
