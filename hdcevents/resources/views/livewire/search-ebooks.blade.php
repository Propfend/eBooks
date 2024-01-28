<div>

    <div class="row container">

    <input wire:model.live.debounce.300ms='search' class="input" type="search" placeholder="Text input">

    @foreach ($ebooks as $ebook)
  
    <a href="{{route('site.detalhes', $ebook->slug)}}">
      <div class="card">
      <div class="card-content">
        <div class="media">
          <div class="media-content">
            <p class="title is-4">{{$ebook->nome}}</p>
            <a href="">
              <p class="title is-5">{{$ebook->autor}}</p>
            </a>
          </div>
        </div>
    </a>
  
      <div class="content">
        {{$ebook->sinopse}}
        <br>
      </div>
    </div>
    </div>
  
    @endforeach

    <div wire:loading>
        <div class="loadingio-spinner-dual-ball-gt4hbk1r3hp"><div class="ldio-2rcgbbil1nw">
          <div></div><div></div><div></div>
          </div></div>
          <style type="text/css">
          @keyframes ldio-2rcgbbil1nw-o {
              0%    { opacity: 1; transform: translate(0 0) }
             49.99% { opacity: 1; transform: translate(54px,0) }
             50%    { opacity: 0; transform: translate(54px,0) }
            100%    { opacity: 0; transform: translate(0,0) }
          }
          @keyframes ldio-2rcgbbil1nw {
              0% { transform: translate(0,0) }
             50% { transform: translate(54px,0) }
            100% { transform: translate(0,0) }
          }
          .ldio-2rcgbbil1nw div {
            position: absolute;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            top: 23px;
            left: -4px;
          }
          .ldio-2rcgbbil1nw div:nth-child(1) {
            background: #e90c59;
            animation: ldio-2rcgbbil1nw 0.819672131147541s linear infinite;
            animation-delay: -0.4098360655737705s;
          }
          .ldio-2rcgbbil1nw div:nth-child(2) {
            background: #46dff0;
            animation: ldio-2rcgbbil1nw 0.819672131147541s linear infinite;
            animation-delay: 0s;
          }
          .ldio-2rcgbbil1nw div:nth-child(3) {
            background: #e90c59;
            animation: ldio-2rcgbbil1nw-o 0.819672131147541s linear infinite;
            animation-delay: -0.4098360655737705s;
          }
          .loadingio-spinner-dual-ball-gt4hbk1r3hp {
            width: 38px;
            height: 38px;
            display: inline-block;
            overflow: hidden;
            background: #ffffff;
          }
          .ldio-2rcgbbil1nw {
            width: 100%;
            height: 100%;
            position: relative;
            transform: translateZ(0) scale(0.38);
            backface-visibility: hidden;
            transform-origin: 0 0; /* see note above */
          }
          .ldio-2rcgbbil1nw div { box-sizing: content-box; }
          /* generated by https://loading.io/ */
          </style>
      </div>

    {{$ebooks->links()}}
  
  </div>
  
  </div>
  
</div>
