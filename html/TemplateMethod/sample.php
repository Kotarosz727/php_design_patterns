<?php

abstract class Builder
{
    final public function build()
    {
        $this->test();
        $this->lint();
        $this->assemble();
        $this->deploy();
    }

    abstract public function test();
    abstract public function lint();
    abstract public function assemble();
    abstract public function deploy();
}

class AndroidBUilder extends Builder
{
    public function test()
    {
        echo "Android test";
    }

    public function lint()
    {
        echo 'Android lint';
    }

    public function assemble()
    {
        echo 'Android assemble';
    }

    public function deploy()
    {
        echo 'Android deploy';
    }
}

class IosBuilder extends Builder
{
    public function test()
    {
        echo 'iOSのテストを実行';
    }

    public function lint()
    {
        echo 'iOSコードのLintを実行';
    }

    public function assemble()
    {
        echo 'iOSビルドのアセンブリを実行';
    }

    public function deploy()
    {
        echo 'iOSビルドをサーバーにデプロイ';
    }
}

$androidBuilder = new AndroidBUilder();
$androidBuilder->build();

$iosBuilder = new IosBuilder();
$iosBuilder->build();

?>