<form method="POST" action="{{route('userlog')}}">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input id="noHp" type="text" class="form-control "  name="noHp" value="{{ old('email') }}" >
       </div>
            <button type="submit" class="btn login_btn">
                {{ __('Login') }}
            </button>
            
        </div>
    </form>

    @if (session('danger'))
    <div class="alert alert-danger alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{session('danger')}}</strong>
    </div>
@endif