<?php
namespace Database\Seeders;

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
        ['clientCode'=>100,'clientName'=>'社内業務','clientNameKana'=>'しゃないぎょうむ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>101,'clientName'=>'(株)ITコア','clientNameKana'=>'あいてぃーこあ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>102,'clientName'=>'愛南町','clientNameKana'=>'あいなんちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>103,'clientName'=>'(株)アドバンテック','clientNameKana'=>'あどばんてっく','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>104,'clientName'=>'伊豆技研工業（株）','clientNameKana'=>'いずぎけんこうぎょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>105,'clientName'=>'イマジカ','clientNameKana'=>'いまじか','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>106,'clientName'=>'(株)Infinite Pointe','clientNameKana'=>'いんふぃにっとぽいんと','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>107,'clientName'=>'宇和島市','clientNameKana'=>'うわじまし','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>108,'clientName'=>'(株)STNet','clientNameKana'=>'えすてぃーねっと','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>109,'clientName'=>'SPC','clientNameKana'=>'えすぴーしー','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>110,'clientName'=>'NSK(株)','clientNameKana'=>'えぬえすけい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>111,'clientName'=>'愛媛県高速道路交通安全協議会','clientNameKana'=>'えひめけんこうそくどうろこうつうあんぜんきょうぎかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>112,'clientName'=>'愛媛県交通安全協会','clientNameKana'=>'えひめけんこうつうあんぜんきょうかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>113,'clientName'=>'エヒメ健診協会','clientNameKana'=>'えひめけんしんきょうかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>114,'clientName'=>'愛媛県庁','clientNameKana'=>'えひめけんちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>115,'clientName'=>'FIS','clientNameKana'=>'えふあいえす','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>116,'clientName'=>'(株)えむぼま','clientNameKana'=>'えむぼま','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>117,'clientName'=>'(株)オレンジシステム','clientNameKana'=>'おれんじしすてむ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>118,'clientName'=>'国立研究開発法人科学技術振興機構','clientNameKana'=>'かがくぎじゅつしんこうきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>119,'clientName'=>'神奈川県薬剤師会','clientNameKana'=>'かながわけんやくざいしかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>120,'clientName'=>'気象庁','clientNameKana'=>'きしょうちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>121,'clientName'=>'厚生労働省','clientNameKana'=>'こうせいろうどうしょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>122,'clientName'=>'高知県地産外商課','clientNameKana'=>'こうちけんちさんがいしょうか','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>123,'clientName'=>'高知県地産外商公社','clientNameKana'=>'こうちけんちさんがいしょうこうしゃ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>124,'clientName'=>'高知県土木部道路課','clientNameKana'=>'こうちけんどぼくぶどうろか','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>125,'clientName'=>'国立保健医療科学院','clientNameKana'=>'こくりつほけんいりょうかがくいん','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>126,'clientName'=>'(株)サカワ','clientNameKana'=>'さかわ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>127,'clientName'=>'(株)Jストリーム','clientNameKana'=>'じぇいすとりーむ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>128,'clientName'=>'四国中央市','clientNameKana'=>'しこくちゅうおうし','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>129,'clientName'=>'(株)宍戸国際ゴルフ倶楽部','clientNameKana'=>'ししどこくさいごるふくらぶ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>130,'clientName'=>'住友金属鉱山エンジニアリング','clientNameKana'=>'すみともきんぞくこうざんえんじにありんぐ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>131,'clientName'=>'石油天然ガス・金属鉱物資源機構','clientNameKana'=>'せきゆてんねんがすきんぞくこうぶつしげんきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>132,'clientName'=>'ソニーＰＣＬ(株)','clientNameKana'=>'そにーぴーしーえる','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>133,'clientCode'=>0,'clientName'=>'駐留軍等労働者労務管理機構','clientNameKana'=>'ちゅうりゅうぐんとうろうどうしゃろうむかんりきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>134,'clientName'=>'東京大学','clientNameKana'=>'とうきょうだいがく','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>135,'clientName'=>'東和コンピューター','clientNameKana'=>'とうわこんぴゅーたー','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>136,'clientName'=>'土木研究所','clientNameKana'=>'どぼくけんきゅうじょ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>137,'clientName'=>'公益財団法人　日本財団','clientNameKana'=>'にほんざいだん','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>138,'clientName'=>'日本放送協会 ','clientNameKana'=>'にほんほうそうきょうかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>139,'clientName'=>'学校法人根津育英会','clientNameKana'=>'ねづいくえいかい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>140,'clientName'=>'(株)BTI','clientNameKana'=>'びーてぃーあい','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>141,'clientName'=>'(株)フォーライフミュージックエンタテイメント','clientNameKana'=>'ふぉーらーふみゅーじっくえんたていめんと','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>142,'clientName'=>'文化庁','clientNameKana'=>'ぶんかちょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>143,'clientName'=>'ベルソ','clientNameKana'=>'べるそ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>144,'clientName'=>'放送論理・番組向上機構（BPO）','clientNameKana'=>'ほうそうりんりばんぐみこうじょうきこう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>145,'clientName'=>'(株)マイナビ','clientNameKana'=>'まいなび','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>146,'clientName'=>'松山市','clientNameKana'=>'まつやまし','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>147,'clientName'=>'文科省','clientNameKana'=>'もんかしょう','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>148,'clientName'=>'読売連合広告社','clientNameKana'=>'よみうりれんごうこうこくしゃ','created_at'=>$now,'updated_at'=>$now,],
        ['clientCode'=>149,'clientName'=>'(株)Y2S','clientNameKana'=>'わいつーえす','created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
