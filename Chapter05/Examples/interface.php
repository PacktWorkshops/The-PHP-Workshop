interface A 
{
    function a();
}
     
interface B 
{
    function b();
}
interface C extends A, B 
{
    function c();
}
class D implements C 
{
    function a(){
        ...
    }
    function b()
    {
        ...
    }
    function c()
    {
        ...
    }
}
