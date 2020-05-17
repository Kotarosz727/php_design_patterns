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
それによってインスタンスの生成を制御し、アプリケーションをシンプルに、そして堅牢に保つ為の手法です。<br>