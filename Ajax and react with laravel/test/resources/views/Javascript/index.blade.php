@extends('layouts.app')
@section('content')
    <div class="container">
        <h4>Testing Page</h4>



        <h8>Testing 1</h8>
            <button type="button" class="btn btn-light" onclick='demothingsonbuttonclick()'>Test1</button>
        <div id="demo"></div>

        <h8>Testing 2</h8>
            <button type="button" class="btn btn-light" onclick='changeimageon()'>Test2</button>
        <image id="myImage" src="#">

    </div>
@endsection

<script>

var flag=true;

function demothingsonbuttonclick()
{
    document.getElementById("demo").innerHTML = "Hello JavaScript";
}

function changeimageon()
{
    
    if(flag){
        flag=false;
        document.getElementById('myImage').src='https://toppng.com/uploads/preview/light-bulb-on-off-png-11553940208oq66nq8jew.png';
    }
    else
    {
        flag=true;
        document.getElementById('myImage').src='https://toppng.com/uploads/preview/light-bulb-on-off-png-11553940186lbyqngqg1y.png';
    }


}

</script>