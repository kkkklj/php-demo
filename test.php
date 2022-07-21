<?php
class MyClass {
    const CONST_VALUE = 'A constant value';
    public static function func1() {
        echo 'func1';
    }
    protected static function  func2() {
        //只能通过 parent:: 或者 this-> 调用
        echo 'func2';
    }
    private function func3() {
        //只能通过 this-> 调用
        echo 'func3';
    }
}
class ChildClass extends MyClass{
    public static function childFunc() {
        parent::func1();
        parent::func2();
    }
}
//->可以看成js的点，用于访问实例的属性
//::范围解析操作符
$classname = 'MyClass';
//$classname::func1();
//ChildClass::childFunc();
//echo $classname::CONST_VALUE;
//echo MyClass::CONST_VALUE;
//::可以用于访问类的变量或静态方法；
//同样，在类中的方法要访问静态变量或方法，也要通过::访问（self::变量或方法），访问类中定义的其他变量或方法，则通过->（this->变量或方法）;
class myClass2
{
    public $a = 12334;
    public function myFunc() {
        echo 'execute myFunc';
    }
}
$instance = new myClass2();
//true和false都是php内置的布尔常量，true打印会被转换成1，false转换成空字符串
//echo isset($instance);
//$instance -> myFunc();
//实例调用属性的时候要去掉$
$instance -> a = 2333;
echo $instance -> a . '<br>';

// . 会连接字符串（相当于js字符串的+），+则是进行数值计算，字符串会被转换为数字，"20"转20
echo 1 . 'xx';
//ABC被转换成0
echo 100 + "ABC";

//var_dump可以识别出变量的相关信息
$b = 3.1;
$c = true;
var_dump($b, $c);
//new static()返回当前实例的类的；new self()则是一直指向一开始定义的类


//接口定义的方法只要没被实现就会报错。
interface Demo{
    const NAME = 'C语言中文网';
    const URL = 'http://c.biancheng.net/php/';
    function fun1();
    function fun2();
}
class Website implements Demo{
    public function fun1(){
        echo self::NAME.'<br>';
    }
    public function fun2(){
        echo self::URL;
    }
}
//$obj = new Website();
//$obj -> fun1();
//$obj -> fun2();

//不同于js的基本类型，php可以把两个变量指向同一内容。&是一种引用赋值，包括foreach里的as声明别名当中都可以生效，修改将修改原数组。
$a="ABC";
$b=&$a;
//a、b的修改都会互相影响

//从数组变量$arr中，读取键为apple的值
$arr = array('apple' => "苹果", 'banana' => "香蕉", 'pineapple' => "菠萝");
$arr0 = $arr["apple"];
if (isset($arr0)) {
    print_r($arr0);
}


// 数组里=>相当于定义了一个map，关联数组结构
function testMapFn() {

}
$mapArr = [
    testMapFn => 334,
    'xx' => 3
];
echo $mapArr[testMapFn];
//下标数组里，变量的arr[]=xxx相当于arr.push(xxx)