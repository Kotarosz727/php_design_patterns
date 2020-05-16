1.Iteratorパターン
繰り返し処理を行う一連の流れをパターン化したもの

2.Adapterパターン
Adapterパターンは、機能の再利用の際に用いられるデザインパターン。

互換性のないインターフェースを持つクラスやそれらの機能を吸収するクラス（＝アダプタ）を設けて両者を吸収する事で、既に存在しているクラスを変更する事なく新しい機能を持ったクラスを定義できる。（Wrapper（ラッパー）パターンとも呼ばれる）

アダプター、つまりは両者を連絡するという意味の通り、これまで別々に存在し使われていた機能をつなぎ合わせ、一つの処理モデルを定義する事が出来る。そしてそれは、再利用する機能を再利用用に変更するのではなく、それらをつなぎ合わせ１つのクラスを作成する事で、従来のものを変更せずに済む事になる。