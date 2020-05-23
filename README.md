1.Iteratorパターン<br>
繰り返し処理を行う一連の流れをパターン化したもの

2.Adapterパターン<br>
Adapterパターンは、機能の再利用の際に用いられるデザインパターン。<br><br>

互換性のないインターフェースを持つクラスやそれらの機能を吸収するクラス（＝アダプタ）を設けて両者を吸収する事で、既に存在しているクラスを変更する事なく新しい機能を持ったクラスを定義できる。（Wrapper（ラッパー）パターンとも呼ばれる）<br><br>

アダプター、つまりは両者を連絡するという意味の通り、これまで別々に存在し使われていた機能をつなぎ合わせ、一つの処理モデルを定義する事が出来る。そしてそれは、再利用する機能を再利用用に変更するのではなく、それらをつなぎ合わせ１つのクラスを作成する事で、従来のものを変更せずに済む事になる。<br>

3.TemplateMethodパターン<br>
TemplateMethodパターンは、スーパークラスとして定義されたメソッドをサブクラスで継承し、1つの処理モデルを構築するパターン。<br><br>

テンプレート＝共通の処理を定義したスーパークラスをそれぞれのサブクラスたちが継承し、継承元から与えられたそれぞれの機能を実装し、さらにそのクラス独自の処理を実装することで、それぞれが１つの完成形となる。<br>

4.FactoryMethodパターン<br>
FactoryMethodパターンは、オブジェクト生成方法に関するデザインパターンの手法の１つ。<br>
<br>
それぞれ必要なオブジェクト生成の為のインターフェイスを用意しておき、どのクラスをインスタンス化するかをFactoryクラスで決定し供給するようにする。<br>

5.Singletonパターン<br>
Singletonパターンはインスタンスが１つしかない事を保証するもの。<br>
それによってインスタンスの生成を制御し、アプリケーションをシンプルに、そして堅牢に保つ為の手法。<br>

6.Prototypeパターン<br>
Prototypeパターンは、オブジェクトの生成に関するデザインパターン手法の１つで、インスタンスの複製に関する処理モデル。<br>
既にある型を利用して効率的にインスタンスを回していく手法。<br>
Prototypeパターンでは大まかに、プロトタイプとなるインスタンスを流用し、作成するオブジェクトのタイプを指定する事で原型となるインスタンスのコピーを行い、その際に自分自身を複製する事から、よく細胞に例えられたりする。

7.Builderパターン<br>
Builderパターンはオブジェクトの生成方法に関する処理モデル。<br>
オブジェクト生成の流れを抽象化する（生成の手順や手段を切り離す）事で、オブジェクトの生成を柔軟にする。<br>
Builderという言葉自体が「建築者」「建造者」を指している通り、このパターンにはDirector（ディレクター）とBuilder（ビルダー）という関係が構築されていて、管理実行・処理手法・扱う素材がそれぞれ独立している。

例えば、監督（ディレクター）が、職人（ビルダー）と扱う素材の２つを以て家具の制作指示を出す事で、職人はせっせとその素材を加工し、返す。<br>
この時、職人は今作っている家具がどこの家のどの部屋のものなのかを知らず、知る必要もない。この疎結合な関係は、変更（差し替えなど）も影響範囲が少なく容易に行う事が出来る。<br>

簡単な話、Builderパターンを実装すると、処理の流れを変えずに職人と素材だけを変更すれば、それで様々なものが作れるようになる。<br>

この「保持する」「処理する」「対象のデータ」分離させる事によって、柔軟な処理導線を構築するのがBuilderパターンの特徴。<br>

8.AbstractFactoryパターン<br>
AbstractFactoryパターン（アブストラクト・ファクトリ・パターン）は「抽象的な工場」を意味する通り、関係するオブジェクトたちを”まとめて”生成する為のデザインパターン手法の一つ。<br>
FactoryでProductのパターンを宣言し、Productで細分化されたItemを取りまわして作成していく。<br>
この流れの中で、FactoryとProductには共通のルールを持たせる（抽象化）事で、それぞれのFactoryのバリエーション（処理ロジックの切り替えレベル）、そしてProductのパターン（生成するオブジェクトの種類レベル）に関して処理の流れを共通化。<br>
こうするとあとはFactoryを選ぶだけで処理を切り替える事ができる。<br>

9.Bridgeパターン<br>
bridgeパターンとは、ソフトウェアエンジニアリングにおいて「実装からその抽象（abstraction）を切り離して、両者を別々に変更できるようにする」ために使うデザインパターン。

10.Strategyパターン<br>
Strategyパターン（ストラテジー・パターン）は、振る舞いに関するデザインパターン手法の１つで、戦略部分（アルゴリズム等）をクラス単位で定義（カプセル化）する事で、その切り替えや追加・拡張を容易にする処理モデル。<br>

11.Compositeパターン<br>
compositeパターンとは、分割（partitioning）のためのデザインパターンである。compositeパターンは、オブジェクトのグループを単一オブジェクトのインスタンスと同じに扱えるよう記述する。compositeパターンの意図は、オブジェクトをツリー構造として「構成する（compose）」ことであり、このツリー構造は部分/全体階層を表現する。compositeパターンを実装することで、クライアントは個別のオブジェクトやcompositionを統一的に扱えるようになる。<br>

12.Decoratorパターン<br>
Decoratorパターンは構造に関するデザインパターン。<br>
基となるオブジェクトとそれを装飾するオブジェクトを同一のレベルで扱えるような関係性を築く事で、より柔軟なパラメータの取り回しや機能拡張を実現できる処理モデル

13.Visitorパターン<br>
オブジェクト指向プログラミングやソフトウェアエンジニアリングにおけるvisitorデザインパターンは、visitorが操作するオブジェクトの構造からアルゴリズムを切り離す方法である。アルゴリズムの分離による直接の結果として、既存のオブジェクトに新しい操作を加えられるようになり、かつオブジェクトの構造を変更する必要が生じない。visitorパターンは、開放/閉鎖の原則に沿うための方法のひとつである。<br>

14.Chain of Responsibilityパターン
Chain of Responsibilityパターンは、コマンドオブジェクトの提供元と、一連の処理オブジェクトで構成される。各処理オブジェクトには、オブジェクトが扱えるコマンドオブジェクトの種類を定義するロジックが含まれ、それ以外のコマンドオブジェクトは、チェイン上の次の処理オブジェクトに渡される。<br>