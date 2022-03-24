@if(Session::has('verify'))
    <div class="row mr-2 ml-2" >
            <button type="button" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    id="type-error">{{Session::get('verify')}} <a href="{{route('site.verifyEmailPage')}}">Click here to verify it<a/></a></button>
    </div>
@endif
