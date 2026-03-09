@props([
    'img'=>"https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp",
    'title'=>"",
    "description"=>"",
    "ref"=>"",
    'label'=>'Click me'
])
<div class="card bg-base-100 w-96 shadow-sm">
    <figure>
        <img

            src="{{$img}}"
            alt="{{$title}}" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{$title}}</h2>
        <p>{{$description}}</p>
        <div class="card-actions justify-end">
            <a href="{{$ref}}" class="btn btn-primary">{{$label}}</a>
        </div>
    </div>
</div>
