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
        ['clientName'=>'(株)ITコア','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)アドバンテック','slack_prefix'=>'112','slack_abbreviated'=>'advn','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'伊豆技研工業(株)','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)IMAGICA Lab.','slack_prefix'=>'125','slack_abbreviated'=>'img','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Infinite Points','slack_prefix'=>'106','slack_abbreviated'=>'インフィニットポイント','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県中央病院','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)SPC','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)STNet','slack_prefix'=>'109','slack_abbreviated'=>'stnet','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'NSK(株)','slack_prefix'=>'141','slack_abbreviated'=>'nsk','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'ガイオ・テクノロジー(株)','slack_prefix'=>'140','slack_abbreviated'=>'ガイオ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'神奈川県薬剤師会','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'国立研究開発法人科学技術振興機構','slack_prefix'=>'102','slack_abbreviated'=>'jst','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)クールアース','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'一般財団法人高知県地産外商公社','slack_prefix'=>'129','slack_abbreviated'=>'高知県','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'国立保健医療科学院','slack_prefix'=>'126','slack_abbreviated'=>'科学院','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)ゴトウグラフィックス','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'公益財団法人　笹川保健財団','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Jストリーム','slack_prefix'=>'103','slack_abbreviated'=>'jスト','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'ソニーPCL(株)','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)TACT','slack_prefix'=>'110','slack_abbreviated'=>'tact','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'TBS','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Tポイント・ジャパン','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'東京大学','slack_prefix'=>'122','slack_abbreviated'=>'東大教','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'日本放送協会','slack_prefix'=>'136','slack_abbreviated'=>'nhk','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)BTI','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)フォーライフミュージックエンタテイメント','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)ベルソ','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'放送論理・番組向上機構（BPO）','slack_prefix'=>'133','slack_abbreviated'=>'bpo','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)マイナビ','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'三浦工業(株)','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'ライフワンズ(株)','slack_prefix'=>'114','slack_abbreviated'=>'ライフワンズ','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)Y2S','slack_prefix'=>'142','slack_abbreviated'=>'y2s','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)えむぼま','slack_prefix'=>'135','slack_abbreviated'=>'えむぼま','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'交通安全協会','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県高速道路交通安全協議会','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)サカワ','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'愛媛県庁','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'(株)うるる','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県地産外商公社','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県地産外商課','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'高知県土木部道路課','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'厚生労働省','slack_prefix'=>'117','slack_abbreviated'=>'厚労省','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'文化庁','slack_prefix'=>'118','slack_abbreviated'=>'文化庁','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'駐留軍等労働者労務管理機構','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'土木研究所','slack_prefix'=>'134','slack_abbreviated'=>'土木研','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'栄養研究所','slack_prefix'=>'124','slack_abbreviated'=>'栄養研','created_at'=>$now,'updated_at'=>$now,],
        ['clientName'=>'農畜産業振興機構','slack_prefix'=>null,'slack_abbreviated'=>null,'created_at'=>$now,'updated_at'=>$now,],
      ]);
    }
}
