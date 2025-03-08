@if($data)
    @foreach($data as $dt)
    <div class="story-item-no-image">
        <div class="story-item-no-image__name d-flex align-items-center">
            <h3 class="me-1 mb-0 d-flex align-items-center">
                <svg style="width: 10px; margin-right: 5px;"
                    xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 320 512">
                    <path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                    </path>
                </svg>
                <img loading="lazy" src="{{$dt->image}}" style="width:15%;border-radius:7px" alt="">
                <a href="/{{$dt->slug}}" class="text-decoration-none text-dark fs-6 hover-title text-one-row story-name">
                    {{$dt->title}}
                </a>
            </h3>
            <span class="badge text-bg-info text-light me-1">New</span>
            <span class="badge text-bg-success text-light me-1">{{$dt->trangthai}}</span>
            <span class="badge text-bg-danger text-light">Hot</span>
        </div>
        <div class="story-item-no-image__categories ms-2 d-none d-lg-block">
            <p class="mb-0">
                <a href="#" class="hover-title text-decoration-none text-dark category-name">{{$dt->theloai}}</a>
            </p>
        </div>
        <div class="story-item-no-image__chapters ms-2">
            <a href="#" class="hover-title text-decoration-none text-info">{{$dt->chapter}}</a>
        </div>
    </div>
    @endforeach
@endif